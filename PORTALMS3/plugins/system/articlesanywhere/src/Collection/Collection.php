<?php
/**
 * @package         Articles Anywhere
 * @version         7.5.1
 * 
 * @author          Peter van Westen <info@regularlabs.com>
 * @link            http://www.regularlabs.com
 * @copyright       Copyright © 2018 Regular Labs All Rights Reserved
 * @license         http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */

namespace RegularLabs\Plugin\System\ArticlesAnywhere\Collection;

use RegularLabs\Library\DB as RL_DB;
use RegularLabs\Plugin\System\ArticlesAnywhere\Config;
use RegularLabs\Plugin\System\ArticlesAnywhere\Factory;
use RegularLabs\Plugin\System\ArticlesAnywhere\Output\Output;

defined('_JEXEC') or die;

class Collection extends CollectionObject
{
	protected $items;
	protected $categories;
	protected $tags;
	protected $fields;
	protected $custom_fields;

	public function __construct(Config $config)
	{
		parent::__construct($config);

		$this->items  = Factory::getFilter('Items', $config);
		$this->fields = Factory::getFilter('Fields', $config);
	}

	public function get($default = '')
	{
		$ids = $this->getIds();

		if (empty($ids))
		{
			return $default;
		}

		// Now get Item data for found ids
		$items = $this->getData($ids);

		$items = array_map(function ($item) {
			return new Item($this->config, $item);
		}, $items);

		return $this->getOutput($items, count($ids));
	}

	protected function getOutput($items, $total_before_limit)
	{
		return (new Output($this->config))->get($items, $total_before_limit);
	}

	protected function getIds()
	{
		$filters = $this->config->getFilters();

		if (empty($filters))
		{
			return [];
		}

		$query = $this->getIdsQuery();

		return DB::getResults($query, 'loadColumn');
	}

	protected function getIdsQuery()
	{
		$query = $this->db->getQuery(true)
			->select($this->db->quoteName('items.id'))
			->from($this->config->getTableItems('items'))
			->group($this->db->quoteName('items.id'));

		$this->items->set($query);
		$this->fields->set($query);

		$this->setIgnores($query);

		return $query;
	}

	protected function getData($ids)
	{
		$query = $this->getDataQuery($ids);

		if ( ! $query)
		{
			return [];
		}

		return DB::getResults($query,
			'loadObjectList',
			[],
			$this->config->getData('limit'),
			$this->config->getData('offset')
		);
	}

	protected function getDataQuery($ids = [])
	{
		if (empty($ids))
		{
			return false;
		}

		$selects = $this->config->getSelects();

		$query = $this->db->getQuery(true)
			->select('items.*')
			->from($this->config->getTableItems('items'))
			->where($this->db->quoteName('items.id') . RL_DB::in($ids));

		if ($selects['categories'])
		{
			$query->select([
				$this->config->getId('categories', 'category_id', 'categories'),
				$this->config->getTitle('categories', 'category_title', 'categories'),
				$this->config->getAlias('categories', 'category_alias', 'categories'),
				$this->config->get('description', 'category_description', 'categories', 'description'),
				$this->db->quoteName('categories.params', 'category_params'),
				//$this->db->quoteName('categories.metadata', 'category_metadata'),
			])
				->join('LEFT', $this->config->getTableCategories('categories')
					. ' ON ' . $this->db->quoteName('categories.id') . ' = ' . $this->db->quoteName('items.catid'));
		}

		if ($selects['users'])
		{
			$query->select([
				$this->db->quoteName('user.id', 'author_id'),
				$this->db->quoteName('user.name', 'author_name'),
				$this->db->quoteName('user.username', 'author_username'),
			])
				->join('LEFT', $this->db->quoteName('#__users', 'user')
					. ' ON ' . $this->db->quoteName('user.id') . ' = ' . $this->db->quoteName('items.created_by'));
		}

		if ($selects['modifiers'])
		{
			$query->select([
				$this->db->quoteName('modifier.id', 'modifier_id'),
				$this->db->quoteName('modifier.name', 'modifier_name'),
				$this->db->quoteName('modifier.username', 'modifier_username'),
			])
				->join('LEFT', $this->db->quoteName('#__users', 'modifier')
					. ' ON ' . $this->db->quoteName('modifier.id') . ' = ' . $this->db->quoteName('items.modified_by'));
		}


		return $query;
	}
}
