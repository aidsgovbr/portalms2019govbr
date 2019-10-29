<?php
/**
 * @package         Articles Anywhere
 * @version         6.3.0
 *
 * @author          Peter van Westen <info@regularlabs.com>
 * @link            http://www.regularlabs.com
 * @copyright       Copyright © 2017 Regular Labs All Rights Reserved
 * @license         http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */

namespace RegularLabs\Plugin\System\ArticlesAnywhere;

defined('_JEXEC') or die;

use JDatabaseQuery;
use JFactory;
use JFile;
use JText;
use JUri;
use RegularLabs\Library\Html as RL_Html;
use RegularLabs\Library\PluginTag as RL_PluginTag;
use RegularLabs\Library\RegEx as RL_RegEx;
use RegularLabs\Library\StringHelper as RL_String;

class Items
{
	static $data                 = null;
	static $content_items        = [];
	static $content_items_to_ids = [];
	static $current_article      = null;
	static $current_article_id   = null;
	static $message              = null;

	static $item_table = 'content';

	static $cat_table       = 'categories';
	static $cat_title       = 'title';
	static $cat_alias       = 'alias';
	static $cat_description = 'description';
	static $cat_parent_id   = 'parent_id';

	static $tags_table = 'tags';
	static $tags_title = 'title';
	static $tags_alias = 'alias';

	public static function get($matches, $message)
	{
		self::$message = $message;

		$items = [];
		foreach ($matches as $match)
		{
			$item = self::getItem($match);

			$items[] = $item;
		}

		self::setContentItemData($items);

		return $items;
	}

	private static function setContentItemData(&$items)
	{
		self::storeSingleContentItems($items);

		self::setContentItems($items);
	}

	private static function setContentItems(&$items)
	{
		foreach ($items as $item)
		{
			self::$data   = $item;
			$item->output = self::getHtmlOutput();
		}

		return $items;
	}

	private static function getHtmlOutput()
	{
		if (empty(self::$data->sets))
		{
			return '';
		}

		$params = Params::get();

		if (self::$message != '')
		{
			if ($params->place_comments)
			{
				return Protect::getMessageCommentTag(self::$message);
			}

			return '';
		}

		list($tag_start, $tag_end) = Params::getDataTagCharacters();

		if (empty(self::$data->content))
		{
			self::$data->content = $tag_start . 'layout' . $tag_end;
		}

		$total = 0;

		foreach (self::$data->sets as $item)
		{
			$content_items = self::getContentItemsBySet($item);

			if ( ! empty($content_items) && is_array($content_items))
			{
				$content_items = array_filter($content_items);
			}

			if (empty($content_items))
			{
				continue;
			}

			foreach ($content_items as $i => $content_item)
			{
				if (empty($content_item))
				{
					unset($content_items[$i]);
					continue;
				}
			}

			$total += count($content_items);

			$item->content_items = $content_items;
		}

		$output = [];

		$count = 1;

		foreach (self::$data->sets as $item)
		{
			if (empty($item->content_items))
			{
				if ( ! empty($item->empty))
				{
					$output[] =
						self::$data->opening_tags_item
						. $item->empty
						. self::$data->closing_tags_item;
				}

				continue;
			}

			foreach ($item->content_items as $content_item)
			{
				Numbers::update($total, $count++);
				Numbers::set('current', ($content_item->id == self::getCurrentArticleId($item->type)));

				$output[] = self::getOutput($item, $content_item);
			}
		}

		return $output;
	}

	private static function getOutput($item, $content_item)
	{
		if (empty($content_item))
		{
			return '<!-- ' . JText::_('AA_ACCESS_TO_ARTICLE_DENIED') . ' -->';
		}

		$output =
			self::$data->opening_tags_item
			. self::$data->content
			. self::$data->closing_tags_item;;

		list($tag_start, $tag_end) = Params::getTagCharacters();
		list($data_tag_start, $data_tag_end) = Params::getDataTagCharacters();

		// Check if there are any tags found in the content
		$regex = '(' . RL_RegEx::quote($tag_start) . '[a-z].*?' . RL_RegEx::quote($tag_end) . '|' . RL_RegEx::quote($data_tag_start) . '[a-z].*?' . RL_RegEx::quote($data_tag_end) . ')';

		if ( ! RL_RegEx::match($regex, $output))
		{
			return $output;
		}

		self::prepareContentItem($item, $content_item, $output);

		$data_tags = new DataTags;

		$data_tags->handleIfStatements($output, $content_item);

		$regex = RL_RegEx::quote($data_tag_start) . '(/?[a-z][a-z0-9-_]*(?:[\s\:].*?)?)' . RL_RegEx::quote($data_tag_end);
		RL_RegEx::matchAll($regex, $output, $matches);

		if (empty($matches))
		{
			return $output;
		}

		$data_tags->replaceTags($output, $matches, $content_item);

		return $output;
	}

	private static function prepareContentItem($item, $content_item, $output)
	{
		$content_item->introtext = htmlspecialchars_decode($content_item->introtext);
		self::addParams(
			$content_item,
			json_decode(
				isset($content_item->attribs)
					? $content_item->attribs
					: $content_item->params
			)
		);

		if (isset($content_item->images))
		{
			self::addParams($content_item, json_decode($content_item->images));
		}

		if (isset($content_item->urls))
		{
			self::addParams($content_item, json_decode($content_item->urls));
		}


		if (strpos($output, 'tag') !== false)
		{
			$method = 'addTags';
			self::$method($content_item);
		}
	}

	public static function addTags(&$content_item)
	{
		$db = JFactory::getDbo();

		$query = $db->getQuery(true)
			->select($db->quoteName('tags.title'))
			->from($db->quoteName('#__tags', 'tags'))
			->join('LEFT', $db->quoteName('#__contentitem_tag_map', 'xref')
				. ' ON ' . $db->quoteName('xref.tag_id') . ' = ' . $db->quoteName('tags.id'))
			->where($db->quoteName('xref.content_item_id') . ' = ' . (int) $content_item->id)
			->where($db->quoteName('tags.published') . ' = 1');

		$db->setQuery($query);

		$content_item->tags = $db->loadColumn();
	}

	public static function addTagsK2(&$content_item)
	{
		$db = JFactory::getDbo();

		$query = $db->getQuery(true)
			->select($db->quoteName('tags.name'))
			->from($db->quoteName('#__k2_tags', 'tags'))
			->join('LEFT', $db->quoteName('#__k2_tags_xref', 'xref')
				. ' ON ' . $db->quoteName('xref.tagID') . ' = ' . $db->quoteName('tags.id'))
			->where($db->quoteName('xref.itemID') . ' = ' . (int) $content_item->id)
			->where($db->quoteName('tags.published') . ' = 1');

		$db->setQuery($query);

		$content_item->tags = $db->loadColumn();
	}

	private static function getContentItemsBySet($data)
	{
		$items = self::getContentItemsBySetType($data);

		if (empty($items))
		{
			return [];
		}

		foreach ($items as $i => $item)
		{
			if ( ! self::passParentState($item, $data))
			{
				unset($items[$i]);
			}
		}

		return $items;
	}

	private static function getContentItemsBySetType($data)
	{
		if ( ! empty($data->current))
		{
			return [self::getCurrentArticle($data)];
		}


		if (empty($data->ids))
		{
			return [];
		}

		return self::getSingleContentItems($data);
	}

	private static function storeSingleContentItems($items)
	{
		$database_ids = [];

		foreach ($items as $item)
		{
			foreach ($item->sets as $data)
			{
				if (empty($data->id) || ! empty($data->current) || isset($data->featured) || ! empty($data->is_category) || ! empty($data->is_tag))
				{
					continue;
				}

				if ( ! isset($database_ids[$data->type]))
				{
					$database_ids[$data->type] = [];
				}

				$database_ids[$data->type][] = $data->id;
			}
		}

		self::storeSingleContentItemsFromDatabase($database_ids);
	}

	private static function storeSingleContentItemsFromDatabase($database_ids)
	{
		if (empty($database_ids))
		{
			return;
		}

		foreach ($database_ids as $type => $ids)
		{

			$item = (object) ['type' => $type];

			$db = JFactory::getDbo();

			$query = $db->getQuery(true)
				->select('a.id')
				->from($db->quoteName('#__' . self::$item_table, 'a'));

			$conditions = [];

			$ids = array_unique($ids);
			foreach ($ids as $id)
			{
				if (isset(self::$content_items_to_ids[$type . ' ' . $id]))
				{
					continue;
				}

				$where = $db->quoteName('a.title') . ' = ' . $db->quote(RL_String::html_entity_decoder($id));
				$where .= ' OR ' . $db->quoteName('a.alias') . ' = ' . $db->quote(RL_String::html_entity_decoder($id));

				if (is_numeric($id))
				{
					$where .= ' OR ' . $db->quoteName('a.id') . ' = ' . $id;
				}

				$conditions[] = $where;
			}

			if (empty($conditions))
			{
				continue;
			}

			$query->where('((' . implode(') OR (', $conditions) . '))');

			self::setItemQueryConditions($query, $item);

			$db->setQuery($query);

			$ids = $db->loadColumn();

			if (empty($ids))
			{
				continue;
			}

			$query = $db->getQuery(true)
				->select('a.*')
				->select('CONCAT("' . $type . '_", ' . $db->quoteName('a.id') . ') AS type_id')
				->select($db->quoteName('a.access') . ' IN (' . implode(', ', Params::getAuthorisedViewLevels()) . ') as has_access')
				->from($db->quoteName('#__' . self::$item_table, 'a'))
				->where($db->quoteName('a.id') . ' IN (' . implode(', ', $ids) . ')');


			$db->setQuery($query);

			$content_items = $db->loadObjectList('type_id');

			self::$content_items = array_merge(self::$content_items, $content_items);

			foreach ($content_items as $type_id => $content_item)
			{
				self::$content_items_to_ids[$type . '_' . $content_item->alias] = $type . '_' . $content_item->id;
				self::$content_items_to_ids[$type . '_' . $content_item->title] = $type . '_' . $content_item->id;
			}
		}
	}

	public static function setTableNames($type = 'joomla')
	{
		switch ($type)
		{
			case 'k2':
				self::$item_table = 'k2_items';

				self::$cat_table     = 'k2_categories';
				self::$cat_title     = 'name';
				self::$cat_parent_id = 'parent';

				self::$tags_table = 'k2_tags';
				self::$tags_title = 'name';
				self::$tags_alias = 'name';  // k2 tags have no alias, easier to just map it to name
				break;

			default:
				self::$item_table = 'content';

				self::$cat_table     = 'categories';
				self::$cat_title     = 'title';
				self::$cat_parent_id = 'parent_id';

				self::$tags_table = 'tags';
				self::$tags_title = 'title';
				self::$tags_alias = 'alias';
				break;
		}
	}

	public static function getQueryIdLists($ids, $type = 'article')
	{
		if ( ! is_array($ids))
		{
			$ids = [$ids];
		}

		$ids = array_filter($ids);

		$db = JFactory::getDbo();

		$numeric      = [];
		$not_nummeric = [];
		$likes        = [];

		foreach ($ids as $id)
		{
			if (is_numeric($id))
			{
				$numeric[] = $db->quote($id);
				continue;
			}

			if (strpos($id, '*') !== false)
			{
				$likes[] = $db->quote(str_replace('*', '%', $id));
				continue;
			}

			if ($id != 'current')
			{
				$not_nummeric[] = $db->quote($id);
				continue;
			}

			$ids = [Article::get('id')];

			$ids = array_filter($ids);

			if (empty($ids))
			{
				continue;
			}

			$numeric = array_merge($numeric, $ids);
		}

		return [$numeric, $not_nummeric, $likes];
	}


	private static function getTagIds($item)
	{
		list($ids, $titles, $likes) = self::getQueryIdLists($item->tags, 'tag');

		if (empty($titles) && empty($likes))
		{
			return $ids;
		}


		$db    = JFactory::getDbo();
		$query = $db->getQuery(true)
			->clear()
			->select($db->quoteName('a.id'))
			->from($db->quoteName('#__' . self::$tags_table, 'a'));

		if ( ! empty($titles))
		{
			$wheres[] = $db->quoteName('a.' . self::$tags_title) . ' IN (' . implode(',', $titles) . ')';
			$wheres[] = $db->quoteName('a.' . self::$tags_alias) . ' IN (' . implode(',', $titles) . ')';

			$query->where('(' . implode(' OR ', $wheres) . ')');
		}

		if ( ! empty($likes))
		{
			$wheres = [];
			foreach ($likes as $like)
			{
				$wheres[] = $db->quoteName('a.' . self::$tags_title) . ' LIKE ' . $like;
				$wheres[] = $db->quoteName('a.' . self::$tags_alias) . ' LIKE ' . $like;
			}
			$query->where('(' . implode(' OR ', $wheres) . ')');
		}

		list($ignore_language, $ignore_state, $ignore_access) = self::getIgnores($item, 'tags');

		if ( ! $ignore_language && $item->type != 'k2')
		{
			$query->where($db->quoteName('a.language') . ' IN (' . $db->quote(JFactory::getLanguage()->getTag()) . ',' . $db->quote('*') . ')');
		}

		if ( ! $ignore_state)
		{
			$query->where($db->quoteName('a.published') . ' = 1');
		}

		if ( ! $ignore_access && $item->type != 'k2')
		{
			$query->where($db->quoteName('a.access') . ' IN (' . implode(', ', Params::getAuthorisedViewLevels()) . ')');
		}

		$db->setQuery($query);

		return array_merge($ids, $db->loadColumn());
	}

	private static function getTagItemIds($item, $is_category = false)
	{
		$tag_ids = self::getTagIds($item);

		if (empty($tag_ids))
		{
			return [];
		}

		$db = JFactory::getDbo();

		$type  = $is_category ? 'com_content.category' : 'com_content.article';
		$query = $db->getQuery(true)
			->select($db->quoteName('content_item_id'))
			->from($db->quoteName('#__contentitem_tag_map'))
			->where($db->quoteName('type_alias') . ' = ' . $db->quote($type))
			->where($db->quoteName('tag_id') . ' IN (' . implode(',', $tag_ids) . ')');
		$db->setQuery($query);

		return $db->loadColumn();
	}

	private static function getTagItems($item)
	{
		if (empty($item->tags))
		{
			return false;
		}

		$item_ids = self::getTagItemIds($item);

		if (empty($item_ids))
		{
			return false;
		}

		$params = Params::get();

		$limit  = isset($item->limit) ? $item->limit : ((int) $params->limit ? $params->limit : 1000);
		$offset = isset($item->offset) ? $item->offset : 0;

		$db = JFactory::getDbo();

		$query = self::getContentItemIdsQuery($item);

		$query->where($db->quoteName('a.id') . ' IN (' . implode(',', $item_ids) . ')');

		$db->setQuery($query, (int) $offset, (int) $limit);

		$ids = $db->loadColumn();

		if (empty($ids))
		{
			return false;
		}

		$query = self::getContentItemQuery($item, $ids);
		$db->setQuery($query);

		return $db->loadObjectList();
	}

	private static function getFeaturedItems($item)
	{
		$params = Params::get();

		$limit  = isset($item->limit) ? $item->limit : ((int) $params->limit ? $params->limit : 1000);
		$offset = isset($item->offset) ? $item->offset : 0;

		$db = JFactory::getDbo();

		$query = self::getContentItemIdsQuery($item);

		$db->setQuery($query, (int) $offset, (int) $limit);

		$ids = $db->loadColumn();

		if (empty($ids))
		{
			return false;
		}

		$query = self::getContentItemQuery($item, $ids);
		$db->setQuery($query);

		return $db->loadObjectList();
	}

	private static function getSingleContentItems($item)
	{
		$items = [];

		foreach ($item->ids as $id)
		{
			$result = self::getSingleContentItem($item, $id);

			if (empty($result))
			{
				continue;
			}


			$items[] = self::getSingleContentItem($item, $id);
		}

		return $items;
	}


	private static function getSingleContentItem($item, $id)
	{
		if ($stored = self::getSingleContentItemStored($item, $id))
		{
			return $stored;
		}

		$db = JFactory::getDbo();

		$query = self::getContentItemIdsQuery($item);

		self::setWhereConditionsForContentIds($query, $id);

		$db->setQuery($query, 0, 1);
		$ids = $db->loadColumn();

		if (empty($ids))
		{
			return false;
		}

		$query = self::getContentItemQuery($item, $ids);
		$db->setQuery($query);

		return $db->loadObject();
	}

	private static function setWhereConditionsForContentIds(JDatabaseQuery &$query, $id)
	{
		$db = JFactory::getDbo();

		list($ids, $titles, $likes) = self::getQueryIdLists($id);

		$title = 'title';

		if ( ! empty($ids))
		{
			$wheres[] = $db->quoteName('a.' . $title) . ' IN (' . implode(',', $ids) . ')';
			$wheres[] = $db->quoteName('a.alias') . ' IN (' . implode(',', $ids) . ')';
			$wheres[] = $db->quoteName('a.id') . ' IN (' . implode(',', $ids) . ')';

			$query->where('(' . implode(' OR ', $wheres) . ')');
		}

		if ( ! empty($titles))
		{
			$wheres[] = $db->quoteName('a.' . $title) . ' IN (' . implode(',', $titles) . ')';
			$wheres[] = $db->quoteName('a.alias') . ' IN (' . implode(',', $titles) . ')';

			$query->where('(' . implode(' OR ', $wheres) . ')');
		}

		if ( ! empty($likes))
		{
			$wheres = [];
			foreach ($likes as $like)
			{
				$wheres[] = $db->quoteName('a.' . $title) . ' LIKE ' . $like;
				$wheres[] = $db->quoteName('a.alias') . ' LIKE ' . $like;
			}
			$query->where('(' . implode(' OR ', $wheres) . ')');
		}
	}

	private static function getSingleContentItemStored($item, $id)
	{
		if ( ! $stored = self::getSingleItemFromStoredItems($item, $id))
		{
			return false;
		}

		$params = Params::get();

		$featured        = isset($item->featured) ? $item->featured : false;
		$ignore_language = isset($item->ignore_language) ? $item->ignore_language : $params->ignore_language;
		$ignore_state    = isset($item->ignore_state) ? $item->ignore_state : $params->ignore_state;
		$ignore_access   = isset($item->ignore_access) ? $item->ignore_access : $params->ignore_access;


		if ( ! $ignore_language && ! in_array($stored->language, [JFactory::getLanguage()->getTag(), '*']))
		{
			return false;
		}

		if ( ! $ignore_state)
		{
			$state = 'state';

			if ( ! $stored->{$state})
			{
				return false;
			}

			$db       = JFactory::getDbo();
			$jnow     = JFactory::getDate();
			$now      = $jnow->toSql();
			$nullDate = $db->getNullDate();

			if (
				$stored->publish_up > $now || ($stored->publish_down != $nullDate && $stored->publish_down < $now)
			)
			{
				return false;
			}
		}

		if ( ! $ignore_access && ! in_array($stored->access, Params::getAuthorisedViewLevels()))
		{
			return false;
		}

		return $stored;
	}

	private static function getSingleItemFromStoredItems($item, $id = 0)
	{
		$id = $id ?: $item->id;

		$type_id = $item->type . '_' . $id;

		if (isset(self::$content_items[$id]))
		{
			return self::$content_items[$id];
		}

		if (isset(self::$content_items_to_ids[$type_id]))
		{
			return self::$content_items[self::$content_items_to_ids[$type_id]];
		}

		return false;
	}

	private static function getContentItemIdsQuery($item)
	{

		$db = JFactory::getDbo();

		$query = $db->getQuery(true)
			->select($db->quoteName('a.id'))
			->from($db->quoteName('#__' . self::$item_table, 'a'))
			->join('LEFT', $db->quoteName('#__' . self::$cat_table, 'c') . ' ON ' . $db->quoteName('c.id') . ' = ' . $db->quoteName('a.catid'))
			->join('LEFT', $db->quoteName('#__users', 'u') . ' ON ' . $db->quoteName('u.id') . ' = ' . $db->quoteName('a.created_by'))
			->join('LEFT', $db->quoteName('#__users', 'm') . ' ON ' . $db->quoteName('m.id') . ' = ' . $db->quoteName('a.modified_by'));

		self::setItemQueryConditions($query, $item);


		return $query;
	}

	private static function getContentItemQuery($item, $ids = [])
	{
		$db    = JFactory::getDbo();
		$query = $db->getQuery(true)
			->select([
				'a.*',

				$db->quoteName('c.' . self::$cat_title, 'cat'),
				$db->quoteName('c.' . self::$cat_title, 'cat_title'),
				$db->quoteName('c.' . self::$cat_title, 'cat_name'),
				$db->quoteName('c.' . self::$cat_alias, 'cat_alias'),
				$db->quoteName('c.' . self::$cat_description, 'cat_description'),
				$db->quoteName('c.id', 'cat_id'),

				$db->quoteName('u.name', 'author'),
				$db->quoteName('u.name', 'author_name'),
				$db->quoteName('u.id', 'author_id'),

				$db->quoteName('m.name', 'modifier'),
				$db->quoteName('m.name', 'modifier_name'),
				$db->quoteName('m.id', 'modifier_id'),
			])
			->select($db->quoteName('a.access') . ' IN (' . implode(', ', Params::getAuthorisedViewLevels()) . ') as has_access')
			->from($db->quoteName('#__' . self::$item_table, 'a'))
			->join('LEFT', $db->quoteName('#__' . self::$cat_table, 'c') . ' ON ' . $db->quoteName('c.id') . ' = ' . $db->quoteName('a.catid'))
			->join('LEFT', $db->quoteName('#__users', 'u') . ' ON ' . $db->quoteName('u.id') . ' = ' . $db->quoteName('a.created_by'))
			->join('LEFT', $db->quoteName('#__users', 'm') . ' ON ' . $db->quoteName('m.id') . ' = ' . $db->quoteName('a.modified_by'))
			->where($db->quoteName('a.id') . ' IN (' . implode(',', $ids) . ')');


		return $query;
	}

	private static function setItemQueryConditions(JDatabaseQuery &$query, $item)
	{
		$db = JFactory::getDbo();

		list($ignore_language, $ignore_state, $ignore_access) = self::getIgnores($item);


		if ( ! $ignore_language)
		{
			$query->where($db->quoteName('a.language') . ' IN (' . $db->quote(JFactory::getLanguage()->getTag()) . ',' . $db->quote('*') . ')');
		}

		if ( ! $ignore_state)
		{
			$jnow     = JFactory::getDate();
			$now      = $jnow->toSql();
			$nullDate = $db->getNullDate();

			$where = $db->quoteName('a.state') . ' = 1';

			$query->where($where)
				->where('( ' . $db->quoteName('a.publish_up') . ' <= ' . $db->quote($now) . ' )')
				->where('( ' . $db->quoteName('a.publish_down') . ' = ' . $db->quote($nullDate)
					. ' OR ' . $db->quoteName('a.publish_down') . ' >= ' . $db->quote($now) . ' )');
		}

		if ( ! $ignore_access)
		{
			$query->where($db->quoteName('a.access') . ' IN (' . implode(', ', Params::getAuthorisedViewLevels()) . ')');
		}
	}

	private static function getOrdering($item = null)
	{


		return JFactory::getDbo()->quoteName('a.ordering') . ' ASC';
	}

	private static function passParentState(&$item, $data)
	{
		if (empty($item->has_access))
		{
			return false;
		}

		$params = Params::get();

		$ignore_state = isset($data->ignore_state) ? $data->ignore_state : $params->ignore_state;

		if ($ignore_state)
		{
			return true;
		}


		$db    = JFactory::getDbo();
		$query = $db->getQuery(true)
			->select($db->quoteName('c.' . self::$cat_parent_id, 'parent'))
			->select($db->quoteName('c.access') . ' IN (' . implode(', ', Params::getAuthorisedViewLevels()) . ') as has_access')
			->from($db->quoteName('#__' . self::$cat_table, 'c'));

		$where_state = $db->quoteName('c.published') . ' = 1';

		$parent = $item->catid;

		while ($parent)
		{
			$query->clear('where')
				->where($where_state)
				->where($db->quoteName('c.id') . ' = ' . (int) $parent);

			$db->setQuery($query);

			$cat = $db->loadObject();

			if (empty($cat))
			{
				return false;
			}

			if (empty($cat->has_access))
			{
				$item->has_access = $cat->has_access;
			}

			if (empty($cat->parent))
			{
				return true;
			}

			$parent = $cat->parent;
		}

		return true;
	}

	private static function getItem($data)
	{
		$sets = self::getTagValues($data);

		if (empty($sets))
		{
			return null;
		}

		$opening_tags_main = RL_Html::removeEmptyTagPairs(
			$data['opening_tags_before_open']
			. $data['closing_tags_after_open']
		);

		$opening_tags_item = $data['opening_tags_before_content'];
		$closing_tags_item = $data['closing_tags_after_content'];

		$closing_tags_main = RL_Html::removeEmptyTagPairs(
			$data['opening_tags_before_close']
			. $data['closing_tags_after_close']
		);

		return (object) [
			'original_string'   => $data['0'],
			'tag'               => $data['tag'],
			'content'           => $data['html'],
			'opening_tags_main' => $opening_tags_main,
			'closing_tags_main' => $closing_tags_main,
			'opening_tags_item' => $opening_tags_item,
			'closing_tags_item' => $closing_tags_item,
			'sets'              => $sets,
		];
	}

	private static function getTagValues($data)
	{
		$params = Params::get();

		$string = RL_String::html_entity_decoder($data['id']);

		if (strpos($string, '="') == false)
		{
			$string = self::convertTagToNewSyntax($string, $data['tag']);
		}

		$parts = [$string];

		$known_boolean_keys = [
			'ignore_language', 'ignore_access', 'ignore_state',
		];

		list($tag_start, $tag_end) = Params::getDataTagCharacters();

		$sets = [];

		foreach ($parts as $string)
		{
			// Get the values from the tag
			$set = RL_PluginTag::getAttributesFromString($string, 'id', $known_boolean_keys);

			$key_aliases = [
				'id'                 => ['ids', 'article', 'articles', 'item', 'items', 'title', 'alias'],
				'fixhtml'            => ['fix_html', 'html_fix', 'htmlfix'],
			];

			RL_PluginTag::replaceKeyAliases($set, $key_aliases);

			$type = 'joomla';
			$set->type = $type;

			$set->ids = [];


			if (empty($set->id))
			{
				$set->id = 'current';
			}

			$set->ids = [$set->id];
			foreach ($set->ids as $id)
			{
				if (in_array($id, ['current', 'self', $tag_start . 'id' . $tag_end, $tag_start . 'title' . $tag_end, $tag_start . 'alias' . $tag_end], true))
				{
					$set->current = true;
					$id           = '';
				}

				$set->id = $id;
			}

			$sets[] = clone $set;
		}

		return $sets;
	}

	private static function getIdsFromString($ids)
	{
		RL_PluginTag::protectSpecialChars($ids);
		$ids = explode(',', $ids);

		foreach ($ids as &$id)
		{
			RL_PluginTag::unprotectSpecialChars($id);
		}

		return $ids;
	}

	private static function getCurrentArticle($item)
	{
		$id = self::getCurrentArticleId($item->type);

		if (empty($id))
		{
			return null;
		}

		$item->id = $id;

		self::$current_article = self::getSingleContentItem($item, $id);

		return self::$current_article;
	}

	private static function getCurrentArticleId($type = 'joomla')
	{
		self::$current_article_id = self::findCurrentArticleId($type);

		return self::$current_article_id;
	}

	private static function findCurrentArticleId($type = 'joomla')
	{
		if (Article::get('id'))
		{
			return Article::get('id');
		}

		if (isset(self::$current_article->id))
		{
			return self::$current_article->id;
		}

		if (isset(self::$current_article->link) && RL_RegEx::match('&(?:amp;)?id=([0-9]*)', self::$current_article->link, $match))
		{
			return $match['1'];
		}

		$input = JFactory::getApplication()->input;

		if ($type == 'joomla'
			&& in_array($input->get('option'), ['com_content', 'com_breezingforms'])
			&& $input->get('view') == 'article'
		)
		{
			return $input->getInt('id', 0);
		}


		return 0;
	}

	private static function getIgnores($item, $type = '')
	{
		$params = Params::get();

		$suffix = $type ? '_' . $type : '';

		$default_language = $params->{'ignore_language' . $suffix} != -1 ? $params->{'ignore_language' . $suffix} : $params->ignore_language;
		$default_state    = $params->{'ignore_state' . $suffix} != -1 ? $params->{'ignore_state' . $suffix} : $params->ignore_state;
		$default_access   = $params->{'ignore_access' . $suffix} != -1 ? $params->{'ignore_access' . $suffix} : $params->ignore_access;

		$ignore_language = isset($item->{'ignore_language' . $suffix}) ? $item->{'ignore_language' . $suffix} : $default_language;
		$ignore_state    = isset($item->{'ignore_state' . $suffix}) ? $item->{'ignore_state' . $suffix} : $default_state;
		$ignore_access   = isset($item->{'ignore_access' . $suffix}) ? $item->{'ignore_access' . $suffix} : $default_access;

		return [$ignore_language, $ignore_state, $ignore_access];
	}

	private static function convertTagToNewSyntax($string, $tag_type)
	{
		RL_PluginTag::protectSpecialChars($string);

		if (strpos($string, '|') == false && strpos($string, ':') == false)
		{
			RL_PluginTag::unprotectSpecialChars($string);

			return $string;
		}

		$params = Params::get();

		RL_PluginTag::protectSpecialChars($string);

		$sets = explode('|', $string);

		foreach ($sets as &$set)
		{
			if (strpos($set, ':') == false)
			{
				continue;
			}

			$parts = explode(':', $set);

			$id         = array_pop($parts);
			$attributes = [];
			$id_name    = 'id';

			foreach ($parts as $part)
			{
				switch (true)
				{
					case ($part == 'k2'):
						$attributes[] = 'k2="1"';
						break;

					case ($part == 'cat'):
						$id_name      = 'category';
						$attributes[] = 'is_category="1"';
						break;

					case ($part == 'tag'):
						$id_name      = 'tag';
						$attributes[] = 'is_tag="1"';
						break;

					case (is_numeric($part)):
					case (RL_RegEx::match('^([0-9]+)-([0-9]+)$', $part)):
						$attributes[] = 'limit="' . $part . '"';
						break;

					case ($tag_type == $params->article_tag):
						$id = $part . ':' . $id;
						break;

					default:
						$attributes[] = 'ordering="' . trim($part) . '"';
						break;
				}
			}

			array_unshift($attributes, $id_name . '="' . $id . '"');

			$set = implode(' ', $attributes);
		}

		$string = implode(' && ', $sets);

		return $string;
	}

	private static function addParams(&$article, $params)
	{
		if ( ! $params
			|| ( ! is_object($params) && ! is_array($params))
		)
		{
			return;
		}

		foreach ($params as $key => $val)
		{
			if (isset($article->{$key}))
			{
				continue;
			}

			$article->{$key} = $val;
		}
	}
}
