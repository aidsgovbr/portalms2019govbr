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

use RegularLabs\Library\Parameters as RL_Parameters;
use RegularLabs\Library\PluginTag as RL_PluginTag;
use RegularLabs\Library\RegEx as RL_RegEx;

class Params
{
	protected static $params  = null;
	protected static $regexes = null;

	public static function get()
	{
		if (!is_null(self::$params))
		{
			return self::$params;
		}

		$params = RL_Parameters::getInstance()->getPluginParams('modulesanywhere');

		$params->tag_module = RL_PluginTag::clean($params->module_tag);
		$params->tag_pos    = RL_PluginTag::clean($params->modulepos_tag);


		self::$params = $params;

		return self::$params;
	}

	public static function getTagNames()
	{
		$params = self::get();

		$tags = [
			$params->tag_module,
			$params->tag_pos,
		];

		if ($params->handle_loadposition)
		{
			$tags[] = 'loadposition';
		}

		return $tags;
	}

	public static function getTags($only_start_tags = false)
	{
		$params = self::get();

		list($tag_start, $tag_end) = self::getTagCharacters();

		$tags = [
			[],
			[
				$tag_end,
			],
		];

		foreach (self::getTagNames() as $tag)
		{
			$tags['0'][] = $tag_start . $tag;
		}

		return $only_start_tags ? $tags['0'] : $tags;
	}

	public static function getRegex($type = 'tag')
	{
		$regexes = self::getRegexes();

		return isset($regexes->{$type}) ? $regexes->{$type} : $regexes->tag;
	}

	private static function getRegexes()
	{
		if (!is_null(self::$regexes))
		{
			return self::$regexes;
		}

		// Tag character start and end
		list($tag_start, $tag_end) = Params::getTagCharacters();
		$tag_start = RL_RegEx::quote($tag_start);
		$tag_end   = RL_RegEx::quote($tag_end);

		$pre        = RL_PluginTag::getRegexLeadingHtml();
		$post       = RL_PluginTag::getRegexTrailingHtml();
		$inside_tag = RL_PluginTag::getRegexInsideTag();
		$spaces     = RL_PluginTag::getRegexSpaces();

		self::$regexes = (object) [];

		$tags = RL_RegEx::quote(self::getTagNames());

		self::$regexes->tag =
			'(?P<pre>' . $pre . ')'
			. $tag_start . '(?P<type>' . $tags . ')' . $spaces . '(?P<id>' . $inside_tag . ')' . $tag_end
			. '(?P<post>' . $post . ')';

		return self::$regexes;
	}

	public static function getTagCharacters()
	{
		$params = self::get();

		if (!isset($params->tag_character_start))
		{
			self::setTagCharacters();
		}

		return [$params->tag_character_start, $params->tag_character_end];
	}

	public static function setTagCharacters()
	{
		$params = self::get();

		list(self::$params->tag_character_start, self::$params->tag_character_end) = explode('.', $params->tag_characters);
	}
}
