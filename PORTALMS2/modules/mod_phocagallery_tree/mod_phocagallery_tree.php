<?php
/*
 * @package Joomla 1.5
 * @copyright Copyright (C) 2005 Open Source Matters. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
 *
 * @module Phoca - Phoca Gallery Module
 * @copyright Copyright (C) Jan Pavelka www.phoca.cz
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @based on javascript: dTree 2.05 www.destroydrop.com/javascript/tree/
 * @copyright (c) 2002-2003 Geir Landr�
 */
defined('_JEXEC') or die('Restricted access');
if(!defined('DS')) define('DS', DIRECTORY_SEPARATOR);

if (!JComponentHelper::isEnabled('com_phocagallery', true)) {
	return JError::raiseError(JText::_('MOD_PHOCAGALLERY_TREE_PHOCA_GALLERY_ERROR'), JText::_('MOD_PHOCAGALLERY_TREE_PHOCA_GALLERY_IS_NOT_INSTALLED_ON_YOUR_SYSTEM'));
}
if (! class_exists('PhocaGalleryLoader')) {
    require_once( JPATH_ADMINISTRATOR.DS.'components'.DS.'com_phocagallery'.DS.'libraries'.DS.'loader.php');
}
phocagalleryimport('phocagallery.path.path');
phocagalleryimport('phocagallery.path.route');
phocagalleryimport('phocagallery.library.library');
phocagalleryimport('phocagallery.text.text');
phocagalleryimport('phocagallery.access.access');
phocagalleryimport('phocagallery.file.file');
phocagalleryimport('phocagallery.image.image');
phocagalleryimport('phocagallery.image.imagefront');
phocagalleryimport('phocagallery.render.renderfront');

$user 		= JFactory::getUser();
$db 		= JFactory::getDBO();
//$menu 		= JSite::getMenu();
$app 		= JFactory::getApplication();
$menu 		= $app->getMenu();
$document	= JFactory::getDocument();
		
// Start CSS
$document->addStyleSheet(JURI::base(true).'/modules/mod_phocagallery_tree/assets/dtree.css');
$document->addScript( JURI::base(true) . '/modules/mod_phocagallery_tree/assets/dtree.js' );

//Image Path
$imgPath = JURI::base(true) . '/modules/mod_phocagallery_tree/assets/';
//Unique id for more modules
$treeId = "d".uniqid( "tree_" );

// Current category info
$id 	= JRequest::getVar( 'id', 0, '', 'int' );
$option = JRequest::getVar( 'option', 0, '', 'string' );
$view 	= JRequest::getVar( 'view', 0, '', 'string' );

if ( $option == 'com_phocagallery' && $view == 'category' ) {
	$categoryId = $id; 
} else {
	$categoryId = 0;
}

$hide_categories = '';
if ($params->get( 'hide_categories' ) != '') {
	$hide_categories = $params->get( 'hide_categories' );
}

// PARAMS - Hide categories
$hideCat		= trim( $hide_categories );
$hideCatArray	= explode( ',', $hide_categories );
$hideCatSql		= '';
if (is_array($hideCatArray)) {
	foreach ($hideCatArray as $value) {
		$hideCatSql .= ' AND cc.id != '. (int) trim($value) .' ';
	}
}


// PARAMS - Access Category - display category in category list, which user cannot access
$display_access_category = $params->get( 'display_access_category',0 );

// ACCESS - Only registered or not registered
$hideCatAccessSql = '';
$user  = JFactory::getUser();
$aid = max ($user->getAuthorisedViewLevels());
if ($display_access_category == 0) {
 $hideCatAccessSql = ' AND cc.access <= '. $aid;
} 

// All categories -------------------------------------------------------
$query = 'SELECT cc.title AS text, cc.id AS id, cc.parent_id as parentid, cc.alias as alias, cc.access as access, cc.accessuserid as accessuserid'
		. ' FROM #__phocagallery_categories AS cc'
		. ' WHERE cc.published = 1'
		. ' AND cc.approved = 1'
		. $hideCatSql
		. $hideCatAccessSql
		. ' ORDER BY cc.ordering';
		
$db->setQuery( $query );
$categories = $db->loadObjectList();


$unSet = 0;
foreach ($categories as $key => $category) { 
	// USER RIGHT - ACCESS =======================================
	$rightDisplay	= 1;
	
	if (isset($categories[$key])) {
		//$rightDisplay = PhocaGalleryAccess::getUserRight( 'accessuserid', $categories[$key]->accessuserid, $categories[$key]->access, $user->get('aid', 0), $user->get('id', 0), $display_access_category);
		$rightDisplay = PhocaGalleryAccess::getUserRight( 'accessuserid', $categories[$key]->accessuserid, $categories[$key]->access, $user->getAuthorisedViewLevels(), $user->get('id', 0), $display_access_category);
	}
	//$user->authorisedLevels()
	if ($rightDisplay == 0) {
		unset($categories[$key]);
		$unSet = 1;
	}
	// ============================================================
}
if ($unSet == 1) {
	$categories = array_values($categories);
}	

// Categories tree
$tree = array();
$text = '';
$tree = categoryTreePGTM( $categories, $tree, 0, $text, $treeId );

// Create category tree
function categoryTreePGTM( $data, $tree, $id=0, $text='', $treeId ) {      
   foreach ( $data as $value ) {   
      if ($value->parentid == $id) {
         $link = JRoute::_(PhocaGalleryRoute::getCategoryRoute($value->id, $value->alias));
         $showText =  $text . ''.$treeId.'.add('.$value->id.','.$value->parentid.',\''.addslashes($value->text).'\',\''.$link.'\');'."\n";
         $tree[$value->id] = $showText;
         $tree = categoryTreePGTM($data, $tree, $value->id, '', $treeId);   
      }
   }
   return($tree);
}

// Categories (Head)
//$menu 			= JSite::getMenu();
$menu 		= $app->getMenu();
$itemsCategories	= $menu->getItems('link', 'index.php?option=com_phocagallery&view=categories');
$linkCategories 	= '';
if(isset($itemsCategories[0])) {
	$itemId = $itemsCategories[0]->id;
	$linkCategories = JRoute::_('index.php?option=com_phocagallery&view=categories&Itemid='.$itemId);
}

// Create javascript code	
$jsTree = '';
foreach($tree as $key => $value)
{
	$jsTree .= $value ;
}

//  Output
$output ='<div style="text-align:left;">';
$output.='<div class="dtree">';
$output.='<script type="text/javascript">'."\n";
$output.='<!--'."\n";
$output.=''."\n";
$output.=''.$treeId.' = new dTree2548(\''.$treeId.'\', \''.$imgPath.'\');'."\n";
$output.=''."\n";
$output.=''.$treeId.'.add(0,-1,\' '.JText::_( 'MOD_PHOCAGALLERY_TREE_GALLERIES' ).'\',\''.$linkCategories.'\');'."\n";
$output.=$jsTree;
$output.=''."\n";
$output.='document.write('.$treeId.');'."\n";
$output.=''.$treeId.'.openTo('. (int) $categoryId.',\'true\');'. "\n";
$output.=''."\n";
$output.='//-->'."\n";
$output.='</script>';
$output.='</div></div>';

require(JModuleHelper::getLayoutPath('mod_phocagallery_tree'));
?>