<?php
/**
 * @package         Modules Anywhere
 * @version         7.3.2
 * 
 * @author          Peter van Westen <info@regularlabs.com>
 * @link            http://www.regularlabs.com
 * @copyright       Copyright © 2017 Regular Labs All Rights Reserved
 * @license         http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */

namespace RegularLabs\ModulesAnywhere;

defined('_JEXEC') or die;

use JFactory;
use JLayoutHelper;
use JModuleHelper;
use JPluginHelper;
use JRegistryFormat;
use JText;
use PlgSystemAdvancedModuleHelper;
use PlgSystemAdvancedModulesPrepareModuleList;
use RegularLabs\Library\Document as RL_Document;
use RegularLabs\Library\Html as RL_Html;
use RegularLabs\Library\PluginTag as RL_PluginTag;
use RegularLabs\Library\Protect as RL_Protect;
use RegularLabs\Library\RegEx as RL_RegEx;
use RegularLabs\Library\StringHelper as RL_String;

class Replace
{
	static $message       = '';
	static $protect_start = '<!-- START: MA_PROTECT -->';
	static $protect_end   = '<!-- END: MA_PROTECT -->';

	public static function replaceTags(&$string, $area = 'article', $context = '')
	{
		if (!is_string($string) || $string == '')
		{
			return false;
		}

		$params = Params::get();

		if (!RL_String::contains($string, Params::getTags(true)))
		{
			return false;
		}

		// allow in component?
		if (RL_Protect::isRestrictedComponent(isset($params->disabled_components) ? $params->disabled_components : [], $area))
		{

			Protect::_($string);

			self::removeAll($string, $area);

			RL_Protect::unprotect($string);

			return true;
		}

		Protect::_($string);

		// COMPONENT
		if (RL_Document::isFeed())
		{
			$string = RL_RegEx::replace('(<item[^>]*>)', '\1<!-- START: MODA_COMPONENT -->', $string);
			$string = str_replace('</item>', '<!-- END: MODA_COMPONENT --></item>', $string);
		}

		if (strpos($string, '<!-- START: MODA_COMPONENT -->') === false)
		{
			Area::tag($string, 'component');
		}

		self::$message = '';

		$components = Area::get($string, 'component');

		foreach ($components as $component)
		{
			if (strpos($string, $component['0']) === false)
			{
				continue;
			}

			self::processModules($component['1'], 'components');
			$string = str_replace($component['0'], $component['1'], $string);
		}

		// EVERYWHERE
		self::processModules($string, 'other');

		RL_Protect::unprotect($string);

		return true;
	}

	public static function processModules(&$string, $area = 'article', $context = '', $article = null)
	{

		// Check if tags are in the text snippet used for the search component
		if (strpos($context, 'com_search.') === 0)
		{
			$limit = explode('.', $context, 2);
			$limit = (int) array_pop($limit);

			$string_check = substr($string, 0, $limit);

			if (!RL_String::contains($string_check, Params::getTags(true)))
			{
				return;
			}
		}


		if (!RL_String::contains($string, Params::getTags(true)))
		{
			return;
		}

		jimport('joomla.application.module.helper');

		if (!RL_Document::isFeed())
		{
			JPluginHelper::importPlugin('content');
		}

		self::replace($string, $area);
	}

	private static function removeAll(&$string, $area = 'article')
	{
		self::$message = JText::_('MA_OUTPUT_REMOVED_NOT_ENABLED');
		self::processModules($string, $area);
	}

	private static function replace(&$string, $area = 'article')
	{
		list($start_tags, $end_tags) = Params::getTags();

		list($pre_string, $string, $post_string) = RL_Html::getContentContainingSearches(
			$string,
			$start_tags,
			$end_tags
		);

		if ($string == '' || !RL_String::contains($string, Params::getTags(true)))
		{
			$string = $pre_string . $string . $post_string;

			return;
		}

		$regex = Params::getRegex();

		if (!RL_RegEx::match($regex, $string))
		{
			$string = $pre_string . $string . $post_string;

			return;
		}

		$matches   = [];
		$break     = 0;
		$max_loops = 5;

		while (
			$break++ < $max_loops
			&& RL_String::contains($string, Params::getTags(true))
			&& RL_RegEx::matchAll($regex, $string, $matches)
		)
		{
			self::replaceMatches($string, $matches, $area);
			$break++;
		}

		$string = $pre_string . $string . $post_string;
	}

	private static function replaceMatches(&$string, $matches, $area = 'article')
	{
		$protects = [];

		foreach ($matches as $match)
		{
			if (strpos($string, $match['0']) === false)
			{
				continue;
			}

			if (self::processMatch($string, $match, $area))
			{
				continue;
			}

			$protected  = self::$protect_start . base64_encode($match['0']) . self::$protect_end;
			$string     = str_replace($match['0'], $protected, $string);
			$protects[] = [$match['0'], $protected];
		}

		foreach ($protects as $protect)
		{
			if (strpos($string, $protect['1']) === false)
			{
				continue;
			}

			$string = str_replace($protect['1'], $protect['0'], $string);
		}
	}

	private static function processMatch(&$string, &$data, $area = 'article')
	{
		$params = Params::get();

		if (!empty(self::$message))
		{
			$html = '';

			if ($params->place_comments)
			{
				$html = Protect::getMessageCommentTag(self::$message);
			}

			$string = str_replace($data['0'], $html, $string);

			return true;
		}

		$type = trim($data['type']);

		// The core loadposition tag supports chrome after a comma. Modules Anywhere uses a bar.
		if ($type == 'loadposition')
		{
			$data['id'] = str_replace(',', '|', $data['id']);
		}

		$tag = self::getTagValues($data);

		$id = trim($tag->id);

		$chrome     = '';
		$forcetitle = 0;

		$ignores   = [];
		$overrides = [];

		if ($params->override_style && isset($tag->style))
		{
			$chrome = $tag->style;
		}

		foreach ($tag as $key => $val)
		{
			switch ($key)
			{
				case 'id':
				case 'fixhtml':
					break;

				case 'style':
					$chrome = $val;
					break;

				case 'ignore_access':
				case 'ignore_state':
				case 'ignore_assignments':
				case 'ignore_caching':
					$ignores[$key] = $val;
					break;

				case 'showtitle':
					$overrides['showtitle'] = $val;
					$forcetitle             = $val;
					break;

				default:
					break;
			}
		}

		if ($type == $params->module_tag)
		{
			if (!$chrome)
			{
				$chrome = ($forcetitle && $params->style == 'none') ? 'xhtml' : $params->style;
			}

			// module
			$html = self::processModule($id, $chrome, $ignores, $overrides, $area);

			if ($html == 'MA_IGNORE')
			{
				return false;
			}
		}
		else
		{
			if (!$chrome)
			{
				$chrome = ($forcetitle) ? 'xhtml' : '';
			}

			// module position
			$html = self::processPosition($id, $chrome);
		}

		list($pre, $post) = RL_Html::cleanSurroundingTags(
			[$data['pre'], $data['post']],
			['p', 'span']
		);

		$html = $pre . $html . $post;

		if (self::shouldFixHtml($tag, $pre, $post))
		{
			$html = RL_Html::fix($html);
		}

		if ($params->place_comments)
		{
			$html = Protect::wrapInCommentTags($html);
		}

		$string = str_replace($data['0'], $html, $string);
		unset($data);

		return $id;
	}

	private static function shouldFixHtml($tag, $pre, $post)
	{
		if (isset($tag->fixhtml))
		{
			return $tag->fixhtml;
		}

		$params = Params::get();

		if (!$params->fix_html)
		{
			return false;
		}

		$pre  = trim($pre);
		$post = trim($post);

		if (empty($pre) && empty($post))
		{
			return false;
		}

		// Ignore if pre/post is a surrounding div
		list($pre, $post) = RL_Html::cleanSurroundingTags(
			[$pre, $post],
			['div']
		);

		if (empty($pre) && empty($post))
		{
			return false;
		}

		return true;
	}

	private static function getTagValues($data)
	{
		$string = RL_String::html_entity_decoder($data['id']);

		if (strpos($string, '="') == false)
		{
			$string = self::convertTagToNewSyntax($string, $data['type']);
		}

		$known_boolean_keys = [
			'ignore_access', 'ignore_state', 'ignore_assignments', 'ignore_caching',
			'showtitle',
		];

		// Get the values from the tag
		$set = RL_PluginTag::getAttributesFromString($string, 'id', $known_boolean_keys);

		$key_aliases = [
			'id'      => ['ids', 'module', 'position', 'title', 'alias'],
			'style'   => ['module_style', 'chrome'],
			'fixhtml' => ['fix_html', 'html_fix', 'htmlfix'],
		];

		RL_PluginTag::replaceKeyAliases($set, $key_aliases);

		return $set;
	}

	private static function convertTagToNewSyntax($string, $tag_type)
	{
		RL_PluginTag::protectSpecialChars($string);

		if (strpos($string, '|') == false && strpos($string, ':') == false)
		{
			RL_PluginTag::unprotectSpecialChars($string);

			return $string;
		}

		RL_PluginTag::protectSpecialChars($string);

		$sets = explode('|', $string);

		foreach ($sets as $i => &$set)
		{
			if ($i == 0)
			{
				$set = 'id="' . $set . '"';
				continue;
			}

			if (strpos($set, '=') == false)
			{
				$set = 'style="' . $set . '"';
				continue;
			}

			$key_val = explode('=', $set, 2);

			$set = $key_val['0'] . '="' . $key_val['1'] . '"';
		}

		return implode(' ', $sets);
	}

	private static function processPosition($position, $chrome = 'none')
	{
		$params = Params::get();

		$document = clone JFactory::getDocument();
		$renderer = $document->setType('html')->loadRenderer('module');

		$html = [];
		foreach (JModuleHelper::getModules($position) as $module)
		{
			$module_html = $renderer->render($module, ['style' => $chrome]);


			$html[] = $module_html;
		}

		return implode('', $html);
	}

	private static function processModule($id, $chrome = '', $ignores = [], $overrides = [], $area = 'article')
	{
		$params = Params::get();

		$ignore_access      = isset($ignores['ignore_access']) ? $ignores['ignore_access'] : $params->ignore_access;
		$ignore_state       = isset($ignores['ignore_state']) ? $ignores['ignore_state'] : $params->ignore_state;
		$ignore_assignments = isset($ignores['ignore_assignments']) ? $ignores['ignore_assignments'] : $params->ignore_assignments;
		$ignore_caching     = isset($ignores['ignore_caching']) ? $ignores['ignore_caching'] : $params->ignore_caching;

		$db    = JFactory::getDbo();
		$query = $db->getQuery(true)
			->select('m.*')
			->from('#__modules AS m')
			->where('m.client_id = 0');
		if (is_numeric($id))
		{
			$query->where('m.id = ' . (int) $id);
		}
		else
		{
			$query->where('m.title = ' . $db->quote(RL_String::html_entity_decoder($id)));
		}
		if (!$ignore_access)
		{
			$levels = JFactory::getUser()->getAuthorisedViewLevels();
			$query->where('m.access IN (' . implode(',', $levels) . ')');
		}
		if (!$ignore_state)
		{
			$query->where('m.published = 1')
				->join('LEFT', '#__extensions AS e ON e.element = m.module AND e.client_id = m.client_id')
				->where('e.enabled = 1');
		}

		if (!$ignore_assignments)
		{
			$date     = JFactory::getDate();
			$now      = $date->toSql();
			$nullDate = $db->getNullDate();
			$query->where('(m.publish_up = ' . $db->quote($nullDate) . ' OR m.publish_up <= ' . $db->quote($now) . ')')
				->where('(m.publish_down = ' . $db->quote($nullDate) . ' OR m.publish_down >= ' . $db->quote($now) . ')');

			if (JFactory::getApplication()->isSite() && JFactory::getApplication()->getLanguageFilter())
			{
				$query->where('m.language IN (' . $db->quote(JFactory::getLanguage()->getTag()) . ',' . $db->quote('*') . ')');
			}
		}
		$query->order('m.ordering');
		$db->setQuery($query);
		$module = $db->loadObject();

		if (!$ignore_assignments)
		{
			self::applyAssignments($module);
		}

		if (empty($module))
		{
			if ($params->place_comments)
			{
				return Protect::getMessageCommentTag(JText::_('MA_OUTPUT_REMOVED_NOT_PUBLISHED'));
			}

			return '';
		}

		//determine if this is a custom module
		$module->user = (substr($module->module, 0, 4) == 'mod_') ? 0 : 1;

		// set style
		$module->style = $chrome ?: 'none';

		$settings = (object) [];

		if (!empty($module->params))
		{
			$settings = substr(trim($module->params), 0, 1) == '{'
				? json_decode($module->params)
				// Old ini style. Needed for crappy old style modules like swMenuPro
				: JRegistryFormat::getInstance('INI')->stringToObject($module->params);
		}

		if (!empty($overrides))
		{
			// override module parameters
			foreach ($overrides as $key => $value)
			{
				if (isset($module->{$key}))
				{
					$module->{$key} = $value;
					continue;
				}

				if ($value && $value['0'] == '[' && $value[strlen($value) - 1] == ']')
				{
					$value            = json_decode('{"val":' . $value . '}');
					$settings->{$key} = $value->val;
					continue;
				}

				if (isset($settings->{$key}) && is_array($settings->{$key}))
				{
					$settings->{$key} = explode(',', $value);
					continue;
				}

				$settings->{$key} = $value;
			}
		}

		$levels = JFactory::getUser()->getAuthorisedViewLevels();

		if (isset($module->access) && !in_array($module->access, $levels))
		{
			if ($params->place_comments)
			{
				return Protect::getMessageCommentTag(JText::_('MA_OUTPUT_REMOVED_ACCESS'));
			}

			return '';
		}

		// Set style in params to override the chrome override in module settings
		if ($chrome)
		{
			if (is_null($settings))
			{
				$settings = (object) [];
			}

			if (isset($settings->style) && $pos = strrpos($settings->style, '-'))
			{
				// Get part before the last '-'
				$settings->style = substr($settings->style, 0, $pos);
			}

			$settings->style = isset($settings->style) && $settings->style ? $settings->style . '-' . $chrome : $chrome;
		}

		$module->params = json_encode($settings);
		$document       = clone JFactory::getDocument();
		$renderer       = $document->setType('html')->loadRenderer('module');
		$html           = $renderer->render($module, ['style' => $module->style, 'name' => '']);


		// don't return html on article level when caching is set
		if (
			$area == 'article'
			&& !$ignore_caching
			&& (
				(isset($settings->cache) && !$settings->cache)
				|| (isset($settings->owncache) && !$settings->owncache) // for stupid modules like RAXO that mess about with default params
			)
		)
		{
			return 'MA_IGNORE';
		}

		return $html;
	}


	private static function applyAssignments(&$module)
	{
		if (empty($module))
		{
			return;
		}

		self::setModulePublishState($module);

		if (empty($module->published))
		{
			$module = null;
		}
	}

	private static function setModulePublishState(&$module)
	{
		if (empty($module->id))
		{
			return;
		}

		$module->published = true;
		// for old Advanced Module Manager versions
		if (function_exists('PlgSystemAdvancedModulesPrepareModuleList'))
		{
			$modules = [$module->id => $module];
			PlgSystemAdvancedModulesPrepareModuleList($modules);
			$module = array_shift($modules);

			return;
		}

		// for new Advanced Module Manager versions
		if (class_exists('PlgSystemAdvancedModuleHelper'))
		{
			$modules = [$module->id => $module];
			$helper  = new PlgSystemAdvancedModuleHelper;
			$helper->onPrepareModuleList($modules);
			$module = array_shift($modules);

			return;
		}

		// for core Joomla
		$db    = JFactory::getDbo();
		$query = $db->getQuery(true)
			->select('mm.moduleid')
			->from('#__modules_menu AS mm')
			->where('mm.moduleid = ' . (int) $module->id)
			->where('(mm.menuid = ' . ((int) JFactory::getApplication()->input->getInt('Itemid')) . ' OR mm.menuid <= 0)');
		$db->setQuery($query);
		$result = $db->loadResult();

		$module->published = !empty($result);
	}
}
