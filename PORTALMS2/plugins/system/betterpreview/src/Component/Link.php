<?php
/**
 * @package         Better Preview
 * @version         6.0.6
 * 
 * @author          Peter van Westen <info@regularlabs.com>
 * @link            http://www.regularlabs.com
 * @copyright       Copyright © 2017 Regular Labs All Rights Reserved
 * @license         http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */

namespace RegularLabs\Plugin\System\BetterPreview\Component;

defined('_JEXEC') or die;

require_once JPATH_ADMINISTRATOR . '/components/com_menus/helpers/menus.php';
require_once JPATH_ADMINISTRATOR . '/components/com_menus/models/menutypes.php';

use JFactory;
use JRoute;
use JText;
use JUri;
use MenusModelMenutypes;
use RegularLabs\Library\Http as RL_Http;
use RegularLabs\Library\RegEx as RL_RegEx;
use RegularLabs\Plugin\System\BetterPreview\Params;

class Link extends Helper
{
	var $_has_home = false;

	public function __construct()
	{
		$model = new MenusModelMenutypes;
		$model->getTypeOptions();
		$this->types = $model->getReverseLookup();
	}

	public function convertLinks()
	{
		$links = $this->getLinks();

		$html = JFactory::getApplication()->getBody();

		if ($html == '')
		{
			return;
		}

		$params = Params::get();

		$this->prepareLinks($links);

		$title_class = 'betterpreview-dropdown dropdown pull-right visible-desktop visible-tablet';

		if ( ! $this->_has_home && count($links) < 2)
		{
			if ($params->display_title_link)
			{
				$title_link = '<div class="' . $title_class . '">'
					. '<a class="brand" href="' . JUri::root() . '" target="_blank">'
					. '\2'
					. '</a>'
					. '</div>';
			}

			if ($params->display_status_link)
			{
				$status_link = '<div class="betterpreview-dropdown">'
					. '<a href="' . JUri::root() . '" target="_blank">'
					. '\2'
					. '</a>'
					. '</div>';
			}
		}
		else
		{
			$mainurl     = 0;
			$main        = 0;
			$list_title  = [];
			$list_status = [];

			foreach ($links as $link)
			{
				if ($link->published)
				{
					if ( ! $mainurl)
					{
						$mainurl = $link->url;
						$main    = 1;
					}
					else
					{
						$main = 0;
					}
				}

				$item = [];

				$item[] = '<li>';

				if ($link->published)
				{
					$item[] = '<a href="' . $link->url . '" target="_blank" class="list-item"><span class="wrapper">';
				}
				else if (isset($link->error))
				{
					$item[] = '<span class="disabled list-item hasTooltip" data-placement="right" title="' . str_replace('"', '&quot;', $link->error) . '">';
				}
				else
				{
					$item[] = '<span class="disabled list-item">';
				}

				$item[] = '<table><tr>';

				$item[] = '<td>';
				if ( ! $link->published)
				{
					$item[] = '<span class="icon-not-ok"></span> ';
				}
				else if ($link->type)
				{
					$item[] = '<span class="icon-url"></span> ';
				}
				else
				{
					$item[] = '<span class="icon-home"></span> ';
				}

				$item[] = '<span class="rl_status_item_text">' . $link->name . '</span>';
				$item[] = '</td>';


				$item[] = '</tr></table>';

				if ($link->published)
				{
					$item[] = '</span></a>';
				}
				else
				{
					$item[] = '</span>';
				}

				$item[] = '</li>';

				$list_title[] = implode('', $item);
				$list_status[] = implode('', $item);
			}

			if ( ! $mainurl)
			{
				// should really never happen
				$mainurl = JUri::root();
			}

			if ($params->display_title_link)
			{
				$title_link = '<div class="' . $title_class . '">'
					. '<a class="dropdown-toggle \1" href="' . $mainurl . '" target="_blank">'
					. '\2'
					. '<span class="icon-arrow-down-3"></span>'
					. '</a>'
					. '<ul class="dropdown-menu">'
					. implode('<li class="divider"></li>', $list_title)
					. '</ul>'
					. '</div>';
			}

			if ($params->display_status_link)
			{
				if ($params->reverse_status_link)
				{
					$list_status = array_reverse($list_status);
				}

				$status_link = '<div class="betterpreview-dropdown">'
					. '<a class="dropdown-toggle" href="' . $mainurl . '" target="_blank">'
					. '\2'
					. '<span class="icon-arrow-up-3"></span>'
					. '</a>'
					. '<ul class="dropdown-menu dropup-menu">'
					. implode('<li class="divider"></li>', $list_status)
					. '</ul>'
					. '</div>';
			}
		}

		if ($params->display_title_link)
		{
			$html = RL_RegEx::replace(
				'<a class="(brand visible-desktop visible-tablet)" [^>]*>(.*?)</a>',
				$title_link,
				$html
			);
		}

		if ($params->display_status_link)
		{
			$html = RL_RegEx::replace(
				'(<div class="btn-group">)<a [^>]*>(<i class="icon-share-alt"></i>.*?)</a>(</div>)',
				'\1' . $status_link . '\3',
				$html
			);
		}

		JFactory::getApplication()->setBody($html);
	}

	public function prepareLinks(&$links)
	{
		$home_link = (object) [
			'url'       => JUri::root(),
			'type'      => '',
			'name'      => 'Home',
			'published' => 1,
		];

		if (empty($links))
		{
			$links[] = $home_link;

			return;
		}

		foreach ($links as $link)
		{
			$this->prepareNonSefLink($link);
			$urls[$link->url] = $link->url;
		}

		$urls = $this->getUrlsFromCache($urls);

		foreach ($links as $i => $link)
		{
			$this->prepareSefLink($link, $urls);
		}

		if ( ! $this->_has_home)
		{
			$links[] = $home_link;
		}
	}

	public function prepareNonSefLink(&$link)
	{
		Menu::setItemId($link);

		$default_menu_item = Menu::getDefaultMenuItem($link);

		if (empty($default_menu_item))
		{
			return;
		}

		// Check if current item is the home menu item
		if ($link->published
			&& in_array(
				$link->url,
				[
					'',
					$default_menu_item->link,
					$default_menu_item->link . '&Itemid=' . $default_menu_item->id,
				]
			)
		)
		{
			$this->_has_home = true;
			$link->home      = true;
			$link->name      = '<span class="icon-home"></span> ' . $link->name;
		}
	}

	public function prepareSefLink(&$link, &$urls)
	{
		$roots = [JUri::root(), JUri::root(0), JUri::root(0) . '/', '/'];

		$link->nonsef = $this->createURL($link->url);
		$url          = isset($urls[$link->url]) ? $urls[$link->url] : $link->url;
		$link->url    = $this->createURL($url);

		if ($link->published && in_array($url, $roots))
		{
			$this->_has_home = true;
			$link->name      = (isset($link->home) && $link->home) ? $link->name : '<span class="icon-home"></span> ' . $link->name;
		}
	}

	/**
	 * Default method for getting the links for a component view
	 * Based on searching for matching menu item links
	 *
	 * @return array
	 */
	public function getLinks()
	{
		$links = [];

		$uri = JUri::getInstance();
		$url = $uri->toString(['query']);

		// find menu item based on current admin url
		if ( ! $url)
		{
			return $links;
		}

		$url     = 'index.php' . $url;
		$com_url = RL_RegEx::replace('&.*', '', $url);

		$db = JFactory::getDbo();

		// get all urls matching

		$query = $db->getQuery(true)
			->select('a.id as id')
			->select('a.link as url')
			->from('#__menu as a')
			->where(
				'('
				. 'a.link = ' . $db->quote($com_url)
				. ' OR a.link LIKE ' . $db->quote($com_url . '&%')
				. ')'
			)
			->where('a.client_id = 0')
			->where('a.published = 1');
		if (JFactory::getApplication()->input->get('id'))
		{
			$query->where(
				'('
				. 'a.link LIKE ' . $db->quote('%&id=' . JFactory::getApplication()->input->get('id'))
				. ' OR a.link NOT LIKE ' . $db->quote('%&id=%')
				. ')'
			);
		}
		$db->setQuery($query);
		$items = $db->loadAssocList('id', 'url');

		if (empty($items))
		{
			return $items;
		}

		// search for exact url match
		$id = array_search($url, $items);

		// search for url match without layout edit/form
		if ( ! $id && (( ! strpos($url, '&layout=edit') === false) || ( ! strpos($url, '&layout=form') === false)))
		{
			$url = RL_RegEx::replace('&layout=(?:edit|form)(&|$)', '\1', $url);
			$id  = array_search($url, $items);
		}

		// search for url match drilling down to first url parameter
		while ( ! $id)
		{
			$url = RL_RegEx::replace('^(.*)&.*$', '\1', $url);

			// search for exact url match with last url parameter stripped off
			if ($id = array_search($url, $items))
			{
				break;
			}

			// search for url starting with url with last url parameter stripped off
			// (disregarding urls with specific ids)
			foreach ($items as $itemid => $itemurl)
			{
				if (strpos($itemurl, $url) === 0 && strpos($itemurl, '&id=') === false)
				{
					$id = $itemid;
					break;
				}
			}
			if (strpos($url, '&') === false)
			{
				break;
			}
		}

		if ($id)
		{
			$query = $db->getQuery(true)
				->select('a.id')
				->select('a.title as name')
				->select('a.link as url')
				->select('a.published as published')
				->select('a.language as language')
				->select('a.parent_id as parent')
				->from('#__menu as a')
				->where('a.id = ' . $id);
			$db->setQuery($query);
			$item       = $db->loadObject();
			$item->type = '';

			$parents = $this->getParents(
				$item,
				'menu',
				['name' => 'title', 'parent' => 'parent_id', 'url' => 'link'],
				[],
				1
			);

			$links = array_merge([$item], $parents);

			foreach ($links as $i => $link)
			{
				if (isset($link->language) && $link->language)
				{
					if (strpos($link->url, '&lang=') == false && strpos($link->url, '?lang=') == false)
					{
						$links[$i]->url .= '&lang=' . $link->language;
					}
				}
				if (isset($link->published) && $link->published)
				{
					if (strpos($link->url, '&Itemid=') == false && strpos($link->url, '?Itemid=') == false)
					{
						$links[$i]->url .= '&Itemid=' . $link->id;
					}
				}
				if (isset($link->url) && RL_RegEx::match('option=([a-z0-9_]+)', $link->url, $type))
				{
					$links[$i]->type = JText::_($type['1']);
				}
			}
		}

		return $links;
	}

	public function getUrlFromCache($nonsef)
	{
		$urls = $this->getUrlsFromCache([$nonsef]);

		if ( ! isset($urls[$nonsef]))
		{
			return $nonsef;
		}

		return $urls[$nonsef];
	}

	public function getUrlsFromCache($nonsefs)
	{
		if (empty($nonsefs))
		{
			return [];
		}

		$urls = $nonsefs;

		$sefs = $this->getUrlsFromDB($urls);

		// merge sef urls into url list
		$urls = array_merge($urls, $sefs);

		// remaining not-found urls
		$nonsefs = array_diff($urls, $sefs);

		if (empty($nonsefs))
		{
			return $urls;
		}

		$this->saveUrlsToDB($nonsefs);
		$sefs = $this->getUrlsFromDB($nonsefs);

		// merge sef urls into url list
		$urls = array_merge($urls, $sefs);

		return $urls;
	}

	public function getUrlsFromDB($urls)
	{
		$params = Params::get();

		$db = JFactory::getDbo();

		$date = JFactory::getDate('now - ' . $params->index_timeout . ' hours');

		$query = $db->getQuery(true)
			->select('a.url')
			->select('a.sef')
			->from('#__betterpreview_sefs as a')
			->where('a.url IN (\'' . implode('\',\'', $urls) . '\')')
			->where('a.created > ' . $db->quote($date->toSql()));
		$db->setQuery($query);
		$sef = $db->loadAssocList('url', 'sef');

		return $sef ? $sef : [];
	}

	public function saveUrlsToDB($urls)
	{
		$db = JFactory::getDbo();

		$query_urls = [];
		foreach ($urls as $url)
		{
			$query_urls[] = $db->quote($url);
		}

		// remove any records of these urls
		$query = $db->getQuery(true)
			->delete('#__betterpreview_sefs')
			->where($db->quoteName('url') . ' IN (' . implode(',', $query_urls) . ')');
		$db->setQuery($query);
		$db->execute();

		// add empty url records that will be picked up in the generatesefs page
		$query = $db->getQuery(true)
			->insert('#__betterpreview_sefs')
			->columns($db->quoteName('url'))
			->values($query_urls);

		$db->setQuery($query);
		$db->execute();

		// get session id
		$query = $db->getQuery(true)
			->select($db->quoteName('session_id'))
			->from($db->quoteName('#__session'))
			->where($db->quoteName('userid') . ' = ' . $db->quote(JFactory::getUser()->id))
			->where($db->quoteName('client_id') . ' = 1')
			->order($db->quoteName('time') . ' DESC');
		$db->setQuery($query);
		$session = (string) $db->loadResult();

		// update db
		RL_Http::get(JRoute::_(JUri::root() . 'index.php?tmpl=component&bp_generatesefs=1&session=' . $session));
	}

	public function createURL($url)
	{
		$root = JUri::root(0);

		if ($url && substr($url, 0, strlen($root)) == $root)
		{
			$url = substr($url, strlen($root));
		}

		if ($url && $url[0] == '/')
		{
			$url = substr($url, 1);
		}

		return JUri::root() . $url;
	}
}
