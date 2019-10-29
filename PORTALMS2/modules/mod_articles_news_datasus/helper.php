<?php
/**
 * @package     Datasus
 * @subpackage  mod_articles_news_datasus
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

require_once JPATH_SITE . '/components/com_content/helpers/route.php';

JModelLegacy::addIncludePath(JPATH_SITE . '/components/com_content/models', 'ContentModel');

/**
 * Helper for mod_articles_news_datasus
 *
 * @package     Datasus
 * @subpackage  mod_articles_news_datasus
 *
 * @since       1.6.0
 */
class ModArticlesNewsDatasusHelper
{
	/**
	 * Get a list of the latest articles from the article model
	 *
	 * @param   JRegistry  &$params  object holding the models parameters
	 *
	 * @return  mixed
	 */
	public static function getList(&$params)
	{
		$app = JFactory::getApplication();

		// Get an instance of the generic articles model
		$model = JModelLegacy::getInstance('Articles', 'ContentModel', array('ignore_request' => true));

		// Set application parameters in model
		$appParams = JFactory::getApplication()->getParams();
		$model->setState('params', $appParams);

		// Set the filters based on the module params
		$model->setState('list.start', 0);
		$qtde = $params->get('count') + $params->get('artigoinicial');
		$model->setState('list.limit', (int) $qtde);

		$model->setState('filter.published', 1);

		$model->setState('list.select', 'a.fulltext, a.id, a.title, a.alias, a.introtext, a.state, a.catid, a.created, a.xreference, a.created_by, a.created_by_alias,' .
			' a.modified, a.modified_by, a.publish_up, a.publish_down, a.images, a.urls, a.attribs, a.metadata, a.metakey, a.metadesc, a.access,' .
			' a.hits, a.featured' );

		// Access filter
		$access = !JComponentHelper::getParams('com_content')->get('show_noauth');
		$authorised = JAccess::getAuthorisedViewLevels(JFactory::getUser()->get('id'));
		$model->setState('filter.access', $access);

		//setando apenas artigos em destaque
		$model->setState('filter.featured', 'only');


		// Category filter
		$model->setState('filter.category_id', $params->get('catid', array()));

		// Filter by language
		$model->setState('filter.language', $app->getLanguageFilter());

		//Ordenando pelos artigos em destaque
		$model->setState('filter.frontpage', true);

		// Set ordering
		$ordering = $params->get('ordering', 'fp.ordering');

		//ordenando pelos destaques
		$model->setState('list.ordering', 'fp.ordering');

		if (trim($ordering) == 'rand()')
		{
			$model->setState('list.direction', '');
		}
		else
		{
			// $model->setState('list.direction', 'ASC');
		}

		// Retrieve Content
		$items = $model->getItems();

		foreach ($items as &$item)
		{
			$item->readmore = strlen(trim($item->fulltext));
			$item->slug = $item->id . ':' . $item->alias;
			$item->catslug = $item->catid . ':' . $item->category_alias;

			if ($access || in_array($item->access, $authorised))
			{
				// We know that user has the privilege to view the article
				$item->link = JRoute::_(ContentHelperRoute::getArticleRoute($item->slug, $item->catid));
				$item->linkText = JText::_('MOD_ARTICLES_NEWS_DATASUS_READMORE');
			}
			else
			{
				$item->link = JRoute::_('index.php?option=com_users&view=login');
				$item->linkText = JText::_('MOD_ARTICLES_NEWS_DATASUS_READMORE_REGISTER');
			}

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

	function clearImage(&$text)
	{
		$pattern = array('/<img[^>]*>/');
		$text = preg_replace($pattern,"",$text);
	}


	function simplify($text)
	{
		$text = strip_tags($text);

		if(strlen($text) > 80 ){
			// $text = trim( substr($text, 0, 80) ) . "...";
			$ultimo_espaco = strrpos(substr($text, 0, 90), ' ');
			// echo $ultimo_espaco;
			// Corta o $texto até a posição localizada
			$text = trim(substr($text, 0, $ultimo_espaco)).' ...';
		}

		return $text;
	}


	function getImageSrc($item)
	{

		$src = "";

		$json_images = get_object_vars(json_decode($item->images));

		if(isset($json_images['image_intro']) && $json_images['image_intro'])
			$src = $json_images['image_intro'];

		if(!$src)
		{
			$pattern = '/<img[^>]*>/';
			$isMatch = preg_match($pattern,$item->introtext, $matches);
			if($isMatch)
				$src = $matches[0];
			else
				$src =  JUri::base() . 'modules/mod_articles_news_datasus/img/logo-sus.jpg';
		}

		return $src;

	}

}
