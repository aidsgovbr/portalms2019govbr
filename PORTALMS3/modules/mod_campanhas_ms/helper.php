<?php
/**
 * @package     campanhas_ms
 * @subpackage  mod_campanhas_ms
 *
 * @copyright   Copyright (C) 2013 TiagoGarcia, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access.
defined('_JEXEC') or die;
require_once JPATH_SITE . '/components/com_content/helpers/route.php';

JModelLegacy::addIncludePath(JPATH_SITE . '/components/com_content/models', 'ContentModel');
/**
 * CampanhasMs module helper.
 *
 * @package     Shortner
 * @subpackage  mod_campanhasms
 * @since       3.0.3
 */
abstract class ModCampanhas_msHelper
{
	/**
	 * Get a list of the CampanhasMs items.
	 *
	 * @param   JRegistry  &$params  The module options.
	 *
	 * @return  array
	 *
	 * @since   3.0.3
	 */
	public static function getList(& $params)
	{
		$app = JFactory::getApplication();

		// Get an instance of the generic articles model
		$model = JModelLegacy::getInstance('Articles', 'ContentModel', array('ignore_request' => true));

		// Set application parameters in model
		$appParams = JFactory::getApplication()->getParams();
		$model->setState('params', $appParams);

		// Set the filters based on the module params
		$model->setState('list.start', 0);
		$qtde = $params->get('qtde');
		$model->setState('list.limit', (int) $qtde);

		$model->setState('filter.published', 1);

		$model->setState('list.select', 'a.fulltext, a.id, a.title, a.alias, a.introtext, a.state, a.catid, a.created, a.xreference, a.created_by, a.created_by_alias,' .
			' a.modified, a.modified_by, a.publish_up, a.publish_down, a.images, a.urls, a.attribs, a.metadata, a.metakey, a.metadesc, a.access,' .
			' a.hits, a.featured' );
		// var_dump($model); die;
		//setando apenas artigos em destaque
		$model->setState('filter.featured', 'only');
		// Category filter
		$model->setState('filter.category_id', $params->get('category_id', array()));

		//Ordenando pelos artigos em destaque
		$model->setState('filter.frontpage', true);

		// Set ordering
		$ordering = $params->get('ordering', 'fp.ordering');

		//ordenando pelos destaques
		$model->setState('list.ordering', 'fp.ordering');

		$items = $model->getItems();
		foreach ($items as &$item)
		{
			$item->readmore = strlen(trim($item->fulltext));
			$item->slug = $item->id . ':' . $item->alias;
			$item->catslug = $item->catid . ':' . $item->category_alias;

				// We know that user has the privilege to view the article
				$item->link = JRoute::_(ContentHelperRoute::getArticleRoute($item->slug, $item->catid));
				$item->linkText = JText::_('MOD_ARTICLES_NEWS_DATASUS_READMORE');

			$item->introtext = JHtml::_('content.prepare', $item->introtext, '', 'mod_articles_news_datasus.content');

			// New
			if (!$params->get('image'))
			{
				$item->introtext = preg_replace('/<img[^>]*>/', '', $item->introtext);
			}
			// $item->introtext =
			$results = $app->triggerEvent('onContentAfterDisplay', array('com_content.article', &$item, &$params, 1));
			$item->afterDisplayTitle = trim(implode("\n", $results));

			$results = $app->triggerEvent('onContentBeforeDisplay', array('com_content.article', &$item, &$params, 1));
			$item->beforeDisplayContent = trim(implode("\n", $results));
		}

		return $items;
	}
}
