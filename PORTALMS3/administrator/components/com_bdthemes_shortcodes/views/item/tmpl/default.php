<?php

/**
 * BDThemes Shortcodes Component
 * @package     Shortcode Ultimate Joomla 3.0
 * @subpackage  BDThemes Schortcodes
 * @copyright Copyright (C) 2011-2014 BDThemes Ltd. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-3.0.html GNU/GPL
 * @author BDThemes
 * @author url http://bdthemes.com
 */

defined('_JEXEC') or die;

require_once BDT_SU_CONFIG . '/inc/tools.php';

function load_item($atts = null) {

	$atts = su_shortcode_atts(array(
	    'source'                => (isset($_REQUEST["source"]))?$_REQUEST["source"]:null,
	    'layout'                => (isset($_REQUEST["layout"]))?$_REQUEST["layout"]:null,
	    'item_link'             => (isset($_REQUEST["item_link"]))?$_REQUEST["item_link"]:null,
	    'limit'                 => (isset($_REQUEST["show_more_item"]))? ($_REQUEST["show_more_item"] + 1 ):null,
	    'order'                 => (isset($_REQUEST["order"]))?$_REQUEST["order"]:null,
	    'order_by'              => (isset($_REQUEST["order_by"]))?$_REQUEST["order_by"]:null,
	    'thumb_resize'          => (isset($_REQUEST["thumb_resize"]))?$_REQUEST["thumb_resize"]:null,
	    'thumb_width'           => (isset($_REQUEST["thumb_width"]))?$_REQUEST["thumb_width"]:null,
	    'thumb_height'          => (isset($_REQUEST["thumb_height"]))?$_REQUEST["thumb_height"]:null,
	    'show_more_item'		=> (isset($_REQUEST["show_more_item"]))?$_REQUEST["show_more_item"]:null,
	    'include_article_image' => (isset($_REQUEST["include_article_image"]))?$_REQUEST["include_article_image"]:null,
		'popup_image'           => (isset($_REQUEST["popup_image"]))?$_REQUEST["popup_image"]:null,
		'popup_category' 		=> (isset($_REQUEST["popup_category"]))?$_REQUEST["popup_category"]:null,
		'popup_date' 		    => (isset($_REQUEST["popup_date"]))?$_REQUEST["popup_date"]:null,
		'popup_detail_button'   => (isset($_REQUEST["popup_detail_button"]))?$_REQUEST["popup_detail_button"]:null,
	    'offset'				=> (isset($_REQUEST["offset"]))?$_REQUEST["offset"]:null
	    ), $atts);
	
	$slides     = (array) Su_Tools::get_slides($atts);
	$return     = array();
	$item_block = $atts["offset"];
        /** 12/11 */
	$block  = (isset($_REQUEST["numberOfClicks"]))? $_REQUEST["numberOfClicks"] : 1;
        /** end 12/11 */
	if (preg_match('/k2-category/', $atts['source'])) {
	    $source = 'k2';
	} else {
	    $source = 'article';
	}

	if ($atts['item_link'] === 'inline') {
        $item_link_class = 'cbp-singlePageInline';
        $page = 'data-url="'.JRoute::_('index.php?option=com_bdthemes_shortcodes&amp;view=item&amp;layout=inline').'"';
    } elseif ($atts['item_link'] === 'single') {
        $item_link_class = 'cbp-singlePage';
        $page = 'data-url="'.JRoute::_('index.php?option=com_bdthemes_shortcodes&amp;view=item&amp;layout=single').'"';
    } elseif ($atts['item_link'] === 'link') {
        $item_link_class = 'cbp-linkPage';
        $page = '';
    } else {
        $item_link_class = 'cbp-linkNoPage';
        $page = '';
    }

	$thumb_resize_check = ($atts['thumb_resize'] === 'yes' and ($atts['layout'] != 'mosaic' or $atts['layout'] != 'masonry')) ? true : false;
	$return[]           = '<div class="cbp-loadMore-block'.$block.'">';
	$size               =    sizeof($slides);
	$limit              = $atts["limit"];

	foreach ((array) $slides as $slide) {
            if($limit-- == 1){
                break;
            }
            $size--;
	    $thumb_url = su_image_resize($slide['image'], $atts['thumb_width'], $atts['thumb_height'], $thumb_resize_check, 95);

	    // Title condition 
	    if($slide['title'])
	        $title = stripslashes($slide['title']);                

		$category  = su_title_class($slide['category']);
		$item_link = ($atts['item_link'] != 'no') ? JRoute::_($slide['link']) : 'javascript:void(0);';

//	    if($item_block%$atts['show_more_item']==0) {
//	    	$return[] = $item_block > 0 ? "</div>" : ""; // close div if it's not the first
//	    	$block++;
//	    }

	   $return[] = '<div class="cbp-item '.$category.'">
                        <a data-id="'.$slide['id'].'" data-source = "'.$source.'" data-include_article_image = "'.$atts['include_article_image'].'" data-popup_image = "'.$atts['popup_image'].'" data-popup_category = "'.$atts['popup_category'].'" data-popup_date = "'.$atts['popup_date'].'" href="'.$item_link.'" '.$page.'  class="cbp-caption '.$item_link_class.'" data-title="'.$title.' // '.$slide['category'].'">
                           <div class="cbp-caption-defaultWrap">';
                               if (isset($thumb_url['url'])) {
                                   $return[] = '<img src="'. image_media($thumb_url['url']) .'" alt="'. $title .'" width="'. $atts['thumb_width'] .'" height="'. $atts['thumb_height'] .'">';
                               } else {
                                   $return[] = '<img src="'. image_media(BDT_SU_IMG.'no-image.svg') .'" alt="'. $title .'">';
                               }
       			$return[] = '</div>
                           <div class="cbp-caption-activeWrap">
                               <div class="cbp-l-caption-alignLeft">
                                   <div class="cbp-l-caption-body">
                                       <div class="cbp-l-caption-title">'. $title .'</div>
                                       <div class="cbp-l-caption-desc">'.$slide['category'].'</div>
                                   </div>
                               </div>
                           </div>
                       </a>
                   </div>';

		$item_block++;
                
	}
    $return[] = '</div>';
    if($size > 0)
        $return[] = '<div class="cbp-loadMore-block'.($block+1).'"> </div>';

	return implode("\n", $return);
}

echo load_item();

die();

?>