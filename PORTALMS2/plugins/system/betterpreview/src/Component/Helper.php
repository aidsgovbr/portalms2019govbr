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

use JFactory;
use JText;

class Helper
{
	public static function getItemId($url)
	{
		$db = JFactory::getDbo();

		$query = $db->getQuery(true)
			->select('a.id')
			->from('#__menu as a')
			->where('a.link = ' . $db->quote($url))
			->where('a.client_id = 0')
			->where('a.published = 1');
		$db->setQuery($query);

		return $db->loadResult();
	}

	public static function getItem($id = 0, $table, $selects = [], $texts = [])
	{
		$db = JFactory::getDbo();

		list($selects, $names) = self::getSelects($selects);
		$texts = self::getTexts($texts, $names);

		$query = $db->getQuery(true)
			->from('#__' . $table . ' as a')
			->where('a.' . $names['id'] . ' = ' . (int) $id);

		foreach ($selects as $select)
		{
			$query->select($select);
		}

		$db->setQuery($query);
		$item      = $db->loadObject();
		$itemfound = 1;

		if ( ! $item)
		{
			$itemfound = 0;
			$item      = (object) [];

			foreach ($selects as $k => $v)
			{
				$item->{$k} = '';
			}
		}

		foreach ($texts as $k => $v)
		{
			$item->{$k} = JText::_($v);
		}

		if ($itemfound && ! $item->published)
		{
			$item->error = JText::_('BP_MESSAGE_ITEM_UNPUBLISHED');
		}

		$item->home = 0;

		return $item;
	}

	public static function getParents(&$item, $table, $selects = [], $texts = [], $root = 0)
	{
		if ( ! isset($item->parent))
		{
			return [];
		}

		$db = JFactory::getDbo();

		list($selects, $names) = self::getSelects($selects);
		$texts = self::getTexts($texts, $names);

		$id      = $item->parent;
		$parents = [];
		while ($id > $root)
		{
			$query = $db->getQuery(true)
				->from('#__' . $table . ' as a')
				->where('a.' . $names['id'] . ' = ' . (int) $id);

			foreach ($selects as $select)
			{
				$query->select($select);
			}

			$db->setQuery($query);
			$parent = $db->loadObject();
			if ( ! $parent)
			{
				break;
			}

			$parents[] = $parent;
			$id        = $parent->parent;
		}

		$parents     = array_reverse($parents);
		$unpublished = 0;
		foreach ($parents as &$parent)
		{
			foreach ($texts as $k => $v)
			{
				$parent->{$k} = JText::_($v);
			}

			if ( ! $parent->published)
			{
				$unpublished   = 1;
				$parent->error = JText::_('BP_MESSAGE_ITEM_UNPUBLISHED');
				continue;
			}

			if ($unpublished)
			{
				$parent->published = 0;
				$parent->error     = JText::_('BP_MESSAGE_PARENT_UNPUBLISHED');
				continue;
			}
		}

		$parents = array_reverse($parents);

		if ($unpublished)
		{
			$item->published = 0;
			$item->error     = JText::_('BP_MESSAGE_PARENT_UNPUBLISHED');
		}

		return $parents;
	}

	public static function getSelects($selects)
	{
		$names = array_merge(
			[
				'id'        => 'id',
				'name'      => 'name',
				'published' => 'published',
				'parent'    => 'parent',
			], $selects
		);

		$selects = [];

		foreach ($names as $k => $v)
		{
			if ( ! $k || ! $v)
			{
				continue;
			}

			$selects[$k] = 'a.' . $v . ' as ' . $k;
		}

		return [$selects, $names];
	}

	public static function getTexts($texts, $names)
	{
		$text_defaults = [
			'url'  => '',
			'type' => '',
		];

		foreach ($text_defaults as $k => $v)
		{
			if (isset($names[$k]))
			{
				unset($text_defaults[$k]);
			}
		}

		return array_merge($text_defaults, $texts);
	}
}
