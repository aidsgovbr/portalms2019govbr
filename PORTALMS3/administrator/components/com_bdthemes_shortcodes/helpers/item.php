<?php

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

/**
 * BDThemes Shortcode Ultimate 
 *
 * @package     Shortcode Ultimate Joomla 3.0
 * @subpackage  BDThemes Schortcodes
 * @copyright Copyright (C) 2011-2014 BDThemes Ltd. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-3.0.html GNU/GPL
 * @author BDThemes
 * @author url http://bdthemes.com
 *
 */
 
class bdthemes_shortcodesHelperItem {

	function getCatTitle($catid) {
		// import com_content route helper
		require_once (JPATH_SITE.DIRECTORY_SEPARATOR.'components'.DIRECTORY_SEPARATOR.'com_content'.DIRECTORY_SEPARATOR.'helpers'.DIRECTORY_SEPARATOR.'route.php');
		jimport('joomla.filesystem.file');
		// prepare an array
		$results = array();
		// generate the query
		$database = JFactory::getDBO();

		// SQL query for slides
		$cat_query = '
		SELECT 
			`c`.`id` AS `id`,
			`c`.`title` AS `title`
		FROM 
			#__categories AS `c` 
		WHERE 
			`c`.`id` IN ('.$catid.')
		;';

		// running query
		$database->setQuery($cat_query);
		// if results exists
		if( $datas = $database->loadObjectList() ) {
			// parsing data
			foreach($datas as $item) {

				// array with prepared image
			 	$results[$item->id] = array(
					'id' => $item->id,
					'title' => $item->title
				);
			}
		}
		// return the results
		return $results;
	}
    
	// getData function
	function getData($id) {
		// import com_content route helper
		require_once (JPATH_SITE.DIRECTORY_SEPARATOR.'components'.DIRECTORY_SEPARATOR.'com_content'.DIRECTORY_SEPARATOR.'helpers'.DIRECTORY_SEPARATOR.'route.php');
		jimport('joomla.filesystem.file');
		// prepare an array
		$results = array();
		// generate the query
		$database = JFactory::getDBO();
		// SQL query for slides
		$query = '
		SELECT 
			`c`.`id` AS `id`,
			`c`.`catid` AS `cid`,
			`c`.`hits` AS `hits`,
			`c`.`images` AS `images`,
			`c`.`state` AS `state`,
			`c`.`title` AS `title`,
			`c`.`created` AS `created`,
			`c`.`introtext` AS `introtext` 
		FROM 
			#__content AS `c` 
		WHERE 
			`c`.`id` IN ('.$id.')
		;';



		// running query
		$database->setQuery($query);
		// if results exists
		if( $datas = $database->loadObjectList() ) {
			// parsing data
			foreach($datas as $item) {

				//$item->image = json_decode($item->images, true)['image_intro'];
				$images  = json_decode($item->images);

				if (isset($images->image_fulltext)) {
					$images = htmlspecialchars($images->image_fulltext);
				} else {
					$images = '';
				}
				
				if ($item->state == 1) {
					$cat1 = bdthemes_shortcodesHelperItem::getCatTitle($item->cid);
					$cat = $cat1[$item->cid]['title'];
					// array with prepared image
				 	$results[$item->id] = array(
						'id'        => $item->id,
						'cid'       => $item->cid,
						'category'  => $cat,
						'hits'      => $item->hits,
						'image'     => $images,
						'title'     => $item->title,
						'introtext' => $item->introtext,
						'created'   => $item->created,
						'link'      => JRoute::_(ContentHelperRoute::getArticleRoute($item->id, $item->cid))
					);
				} else {
					return false;
				}
			}
		}
		// return the results
		return $results;
	}
    
	function getk2CatTitle($catid) {
    	//
    	jimport('joomla.filesystem.file');
    	require_once (JPATH_SITE.DIRECTORY_SEPARATOR.'components'.DIRECTORY_SEPARATOR.'com_k2'.DIRECTORY_SEPARATOR.'helpers'.DIRECTORY_SEPARATOR.'route.php');
		// prepare an array
		$results = array();
		// generate the query
		$database = JFactory::getDBO();
		// SQL query for slides
		$query = '
		SELECT 
			`c`.`id` AS `id`,
			`c`.`name` AS `name`,
			`c`.`published` AS `published`
		FROM 
			#__k2_categories AS `c`
		WHERE 
			`c`.`id` IN ('.$catid.')
		;';

		// running query
		$database->setQuery($query);
		// if results exists
		if( $datas = $database->loadObjectList() ) {
			// parsing data
			foreach($datas as $item) {

				// array with prepared image
			 	$results[$item->id] = array(
					'id'        => $item->id,
					'title'     => $item->name,
					'published' => $item->published,
				);
			}
		}
		// return the results
		return $results;
	}//end getItems
    
	function getDataK2($id) {
    	//
    	jimport('joomla.filesystem.file');
    	require_once (JPATH_SITE.DIRECTORY_SEPARATOR.'components'.DIRECTORY_SEPARATOR.'com_k2'.DIRECTORY_SEPARATOR.'helpers'.DIRECTORY_SEPARATOR.'route.php');
		// prepare an array
		$results = array();
		// generate the query
		$database = JFactory::getDBO();
		// SQL query for slides
		$query = '
		SELECT 
			`c`.`id` AS `id`,
			`c`.`catid` AS `cid`,
			`c`.`created_by` AS `created_by`,
			`c`.`title` AS `title`,
			`c`.`hits` AS `hits`,
			`c`.`published` AS `published`,
			`c`.`created` AS `created`,
			`c`.`introtext` AS `introtext`,
			`c`.`fulltext` AS `fulltext`,
			`c`.alias AS `alias`,
			`cats`.alias AS `cat_alias`
		FROM 
			#__k2_items AS `c` 
			LEFT JOIN 
					#__k2_categories AS `cats`
					ON cats.id = `c`.`id` 
		WHERE 
			`c`.`id` IN ('.$id.')
		;';



		// running query
		$database->setQuery($query);
		// if results exists
		if( $datas = $database->loadObjectList() ) {
			// parsing data
			foreach($datas as $item) {


				if (JFile::exists(JPATH_SITE.DIRECTORY_SEPARATOR.'media'.DIRECTORY_SEPARATOR.'k2'.DIRECTORY_SEPARATOR.'items'.DIRECTORY_SEPARATOR.'cache'.DIRECTORY_SEPARATOR.md5("Image".$item->id).'_XL.jpg'))
				{
					$item->image_large = JURI::base().'media/k2/items/cache/'.md5("Image".$item->id).'_XL.jpg';
				} else {
					$item->image_large = '';
				}
				
				// array with prepared image
				if ($item->published == 1) {
					$cat1 = bdthemes_shortcodesHelperItem::getk2CatTitle($item->cid);
					$cat = $cat1[$item->cid]['title'];
				 	$results[$item->id] = array(
						'id'         => $item->id,
						'cid'        => $item->cid,
						'created_by' => $item->created_by,
						'category'   => $cat,
						'hits'       => $item->hits,
						'image'      => $item->image_large,
						'title'      => $item->title,
						'introtext'  => $item->introtext,
						'fulltext'   => $item->fulltext,
						'created'    => $item->created,
						'link'       => JRoute::_(K2HelperRoute::getItemRoute($item->id.':'.urlencode($item->alias), $item->cid.':'.urlencode($item->cat_alias)))
					);
				} else {
					return false;
				}
			}
		}
		// return the results
		return $results;
	}//end getItems

} // END

?>