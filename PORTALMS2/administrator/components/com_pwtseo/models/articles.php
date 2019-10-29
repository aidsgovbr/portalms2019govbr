<?php
/**
 * @package    Pwtseo
 *
 * @author     Perfect Web Team <extensions@perfectwebteam.com>
 * @copyright  Copyright (C) 2016 - 2018 Perfect Web Team. All rights reserved.
 * @license    GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 * @link       https://extensions.perfectwebteam.com
 */

defined('_JEXEC') or die;

class PWTSEOModelArticles extends JModelList
{
	/**
	 * Constructor.
	 *
	 * @param   array $config An optional associative array of configuration settings.
	 *
	 * @see     JModelLegacy
	 * @since   1.0
	 */
	public function __construct($config = array())
	{
		if (empty($config['filter_fields']))
		{
			$config['filter_fields'] = array(
				'article.ordering',
				'article.state',
				'article.featured',
				'article.title',
				'article.access',
				'article.created_by',
				'article.created',
				'article.publish_up',
				'article.publish_down',
				'article.hits',
				'seo.pwtseo_score',
				'seo.focus_word',
				'published',
				'category_id',
				'access',
				'author_id',
				'language',
				'tag'
			);
		}

		parent::__construct($config);
	}

	/**
	 * Method to auto-populate the model state.
	 *
	 * @return  JDatabaseQuery
	 *
	 * @since   1.0
	 */
	protected function getListQuery()
	{
		$db    = $this->getDbo();
		$query = $db->getQuery(true);

		$query
			->select(
				$this->getState(
					'list.select',
					$db->quoteName(
						array(
							'article.id',
							'article.title',
							'article.publish_up',
							'article.publish_down',
							'article.modified',
							'article.checked_out',
							'article.checked_out_time',
							'article.alias',
							'article.state',
							'category.title',
							'seo.focus_word',
							'seo.pwtseo_score',
							'seo.flag_outdated'
						),
						array(
							'id',
							'title',
							'publish_up',
							'publish_down',
							'modified',
							'checked_out',
							'checked_out_time',
							'alias',
							'state',
							'cat_title',
							'focus_word',
							'pwtseo_score',
							'flag_outdated'
						)
					)
				)
			)
			->from($db->quoteName('#__content', 'article'))
			->leftJoin($db->quoteName('#__plg_pwtseo', 'seo') . ' ON seo.context_id = article.id')
			->leftJoin($db->quoteName('#__categories', 'category') . ' ON category.id = article.catid');

		$search = $this->getState('filter.search');

		if (!empty($search))
		{
			if (stripos($search, 'id:') === 0)
			{
				$query->where('article.id = ' . (int) substr($search, 3));
			}
			else
			{
				$search = $db->quote('%' . $db->escape($search, true) . '%');
				$query->where('article.title LIKE ' . $search . ' OR seo.focus_word LIKE ' . $search);
			}
		}

		if ($access = $this->getState('filter.access'))
		{
			$query->where('article.access = ' . (int) $access);
		}

		$published = $this->getState('filter.published');

		if (is_numeric($published))
		{
			$query->where('article.state = ' . (int) $published);
		}
		elseif ($published === '')
		{
			$query->where('(article.state = 0 OR article.state = 1)');
		}

		$categoryId = $this->getState('filter.category_id');

		if (is_numeric($categoryId))
		{
			$query->where('article.catid = ' . (int) $categoryId);
		}
		elseif (is_array($categoryId))
		{
			$query->where('article.catid IN (' . implode(',', ArrayHelper::toInteger($categoryId)) . ')');
		}

		$authorId = $this->getState('filter.author_id');

		if (is_numeric($authorId))
		{
			$type = $this->getState('filter.author_id.include', true) ? '= ' : '<>';
			$query->where('article.created_by ' . $type . (int) $authorId);
		}

		$tagId = $this->getState('filter.tag');

		if (is_numeric($tagId))
		{
			$query->where($db->quoteName('tagmap.tag_id') . ' = ' . (int) $tagId)
				->join(
					'LEFT',
					$db->quoteName('#__contentitem_tag_map', 'tagmap')
					. ' ON ' . $db->quoteName('tagmap.content_item_id') . ' = ' . $db->quoteName('article.id')
					. ' AND ' . $db->quoteName('tagmap.type_alias') . ' = ' . $db->quote('com_content.article')
				);
		}

		$orderCol  = $this->getState('list.ordering', 'article.publish_up');
		$orderDirn = $this->getState('list.direction', 'DESC');

		$query->order($db->escape($orderCol . ' ' . $orderDirn));

		return $query;
	}

	/**
	 * Method to auto-populate the model state.
	 *
	 * @param   string $ordering  An optional ordering field.
	 * @param   string $direction An optional direction (asc|desc).
	 *
	 * @return  void
	 *
	 * @since   1.0
	 */
	protected function populateState($ordering = null, $direction = null)
	{
		$search = $this->getUserStateFromRequest($this->context . '.filter.search', 'filter_search');
		$this->setState('filter.search', $search);

		$access = $this->getUserStateFromRequest($this->context . '.filter.access', 'filter_access');
		$this->setState('filter.access', $access);

		$authorId = $this->getUserStateFromRequest($this->context . '.filter.author_id', 'filter_author_id');
		$this->setState('filter.author_id', $authorId);

		$published = $this->getUserStateFromRequest($this->context . '.filter.published', 'filter_published', '');
		$this->setState('filter.published', $published);

		$categoryId = $this->getUserStateFromRequest($this->context . '.filter.category_id', 'filter_category_id');
		$this->setState('filter.category_id', $categoryId);

		$language = $this->getUserStateFromRequest($this->context . '.filter.language', 'filter_language', '');
		$this->setState('filter.language', $language);

		$tag = $this->getUserStateFromRequest($this->context . '.filter.tag', 'filter_tag', '');
		$this->setState('filter.tag', $tag);

		parent::populateState($ordering, $direction);
	}
}
