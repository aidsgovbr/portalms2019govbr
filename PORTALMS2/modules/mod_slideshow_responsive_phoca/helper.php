<?php
/**
 * @package     Module
 * @subpackage  mod_slideshow_responsive_phoca
 * @copyright   Copyright (C) 2014 MS, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Tiago Garcia.
 */

// No direct access.
defined('_JEXEC') or die;

/**
 * Helper for mod_articles_reslider
 *
 * @package     Joomla.Site
 * @subpackage  mod_articles_reslider
 */

class modSlideshowResponsivePhoca {

	public static function getList(&$params){

		if(!defined('DS')) define('DS', DIRECTORY_SEPARATOR);

		if (!JComponentHelper::isEnabled('com_phocagallery', true)) {
			return JError::raiseError(JText::_('Phoca Gallery Error'), JText::_('Phoca Gallery is not installed on your system'));
		}

		if (! class_exists('PhocaGalleryLoader')) {
			require_once( JPATH_ADMINISTRATOR.DS.'components'.DS.'com_phocagallery'.DS.'libraries'.DS.'loader.php');
		}

		//imports
		phocagalleryimport('phocagallery.ordering.ordering');
		phocagalleryimport('phocagallery.path.route');
		phocagalleryimport('phocagallery.file.file');
		// phocagalleryimport('phocagallery.path.path');
		// phocagalleryimport('phocagallery.library.library');
		// phocagalleryimport('phocagallery.image.image');

		// globais
		$app = JFactory::getApplication();
		// $appParams = JFactory::getApplication()->getParams();
		$db = JFactory::getDBO();

		// modulo
		$category_id 				= $params->get( 'category_id' );
		$category_id 				= (int) $category_id[0];
		$limit_start 				= $params->get( 'limit_start', 0 );
		$limit_count 				= $params->get( 'limit_count', 1 );
		$image_ordering 			= $params->get( 'image_ordering');

		// exibe o titulo do artigo(item)
		$uselinks = $params->get('uselinks', 1);
		$item_title = $params->get('item_title', 1);


		// Traz id imagens e id categoria.
		$iOA = PhocaGalleryOrdering::getOrderingString($image_ordering);
		$imageOrdering = $iOA['output'];

		$query = 'SELECT cc.id AS idcat, a.id AS idimage, cc.description'
		.' FROM #__phocagallery_categories AS cc'
		.' LEFT JOIN #__phocagallery AS a ON a.catid = cc.id'
		.' WHERE a.published = 1'
		.' AND a.approved = 1'
		.' AND cc.published = 1'
		.' AND cc.approved = 0';
		$query .= ' AND cc.id IN ('. (int) $category_id .')';
		$query .= $imageOrdering
		.' LIMIT ' . $limit_start . ',' . $limit_count ;
		$db->setQuery($query);
		$images = $db->loadObjectList();

		if ($images) {

			foreach ($images as $valueImage) {
				$imageArray[] = $valueImage->idimage;
			}
			$imageIds = implode(',', $imageArray);

			$query = 'SELECT cc.id as catid, a.id, a.title, a.filename, a.description, a.extlink1, a.extlink2'
			. ' , cc.title AS categoria '
			. ' FROM #__phocagallery_categories AS cc'
			. ' LEFT JOIN #__phocagallery AS a ON a.catid = cc.id'
			. ' WHERE a.id in (' . $imageIds . ')'
			.$imageOrdering;

			$db->setQuery($query);
			$imagesArray = $db->loadObjectList();
		}else{
			return null;
		}


		if (!empty($imagesArray)){
			foreach ($imagesArray as &$item){

				// $item->slug = $item->id.':'.$item->alias;
				// $item->catslug = $item->catid.':'.$item->category_alias;

				//	Retrieve Content
				$linkcat = PhocaGalleryRoute::getCategoryRoute((int) $category_id);
				$item->category_route = $linkcat;

				// $category_desc = $images[0]->description;
				$item->description = preg_replace('/<p[^>]*>/', '', $item->description);
				$item->description = preg_replace('/<\/p>/', '', $item->description);

				$category_desc = $item->description;
				$item->category_desc = $category_desc;

				$item->introtext = $item->description;

				$images = JURI::base(true) . '/' . PhocaGalleryFile::getFileOriginal($item->filename, 1);

				// define se o link vem do artigo ou vem de um link externo.
				if ($uselinks == 1) {
					$link = modSlideshowResponsivePhoca::default_link($params, $item);
				}else{
					$link = '';
				}

				$images = "<img src='". htmlspecialchars($images)."' alt='".$item->title."' >";

				// Usar titulo no caption e links
				if($item_title && $uselinks ){
					$item->metadesc = "<p class='flex-caption'>".$item->title. "</p><li>" . $link . $images."</a></li>";
				}

				// Usar somente links sem caption titulo.
				if(!$item_title && $uselinks ){
					$item->metadesc = "<li>" . $link . $images."</a></li>";
				}

				// Usar somente caption titulo.
				if($item_title && !$uselinks ){
					$item->metadesc = "<li>". $images. "<p class='flex-caption'>".$item->title."</p></li>";
				}

				// usar somente imagem, sem caption, sem link.
				if(!$item_title && !$uselinks ){
					$item->metadesc = "<li>". $images."</li>";
				}
			}
		}
		// die;
		return $imagesArray;
	}

	public static function default_link(&$params, $item){

		if (isset($item->extlink1)) {
			$item->extlink1 = explode("|", $item->extlink1, 4);

			$link = $item->extlink1[0];
			$label = $item->extlink1[1];
			$target = $item->extlink1[2];
			$id = $item->extlink1[3];

			// Compute the correct link
			$link = '<a href="http://' . htmlspecialchars($link) .'" target="'.$target.'"  rel="nofollow" alt="'. $label . '">' ;

		}
		return $link;
	}
}
