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

function load_post($atts = null) {

	$atts = su_shortcode_atts(array(
        'source'           => (isset($_REQUEST["source"]))?$_REQUEST["source"]:null,
        'limit'            => (isset($_REQUEST["show_more_item"]))? ($_REQUEST["show_more_item"] + 1 ):null,
        'layout'           => (isset($_REQUEST["layout"]))?$_REQUEST["layout"]:null,
        'order'            => (isset($_REQUEST["order"]))?$_REQUEST["order"]:null,
        'date'             => (isset($_REQUEST["date"]))?$_REQUEST["date"]:null,
        'category'         => (isset($_REQUEST["category"]))?$_REQUEST["category"]:null,
        'order_by'         => (isset($_REQUEST["order_by"]))?$_REQUEST["order_by"]:null,
        'thumb_resize'     => (isset($_REQUEST["thumb_resize"]))?$_REQUEST["thumb_resize"]:null,
        'thumb_width'      => (isset($_REQUEST["thumb_width"]))?$_REQUEST["thumb_width"]:null,
        'thumb_height'     => (isset($_REQUEST["thumb_height"]))?$_REQUEST["thumb_height"]:null,
        'show_thumb'       => (isset($_REQUEST["show_thumb"]))?$_REQUEST["show_thumb"]:null,
        'show_more_item'   => (isset($_REQUEST["show_more_item"]))?$_REQUEST["show_more_item"]:null,
        'intro_text_limit' => (isset($_REQUEST["intro_text_limit"]))?$_REQUEST["intro_text_limit"]:null,
        'offset'           => (isset($_REQUEST["offset"]))?$_REQUEST["offset"]:null
	    ), $atts);
	
    $slides     = (array) Su_Tools::get_slides($atts);
    $return     = array();
    $item_block = $atts["offset"];
    $block      = (isset($_REQUEST["numberOfClicks"]))? $_REQUEST["numberOfClicks"] : 1;

	if (preg_match('/k2-category/', $atts['source'])) {
	    $source = 'k2';
	} else {
	    $source = 'article';
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

        $category = su_title_class($slide['category']);
        $date = ($atts['date']) ? '<span class="cbp-l-grid-blog-date">' . JHTML::_('date', $slide['created'], JText::_('DATE_FORMAT_LC3')) . '</span>' : '';
        $show_category = ($atts['category']) ? '<span class="cpb-category">' . $slide['category'] . '</span>' : '';

        if (isset($slide['introtext'])) {
            if ($atts['intro_text_limit'] != 0) {
                $intro_text = '<div class="cbp-l-grid-blog-desc">'.su_char_limit($slide['introtext'], $atts['intro_text_limit']).'</div>';
            }
        }

	    $return[] = '
            <div class="cbp-item '.$category.'">';
                if (isset($thumb_url['url']) and $atts['show_thumb'] === 'yes') {
                    $return[] = '<a data-id="'.$slide['id'].'" href="'.$slide['link'].'" class="cbp-caption">
                                    <div class="cbp-caption-defaultWrap">';
                                        $return[] = '<img src="'. image_media($thumb_url['url']) .'" alt="'. $title .'">';
                                    $return[] = '</div>';
                                            $return[] = '<div class="cbp-caption-activeWrap">
                                                <div class="cbp-l-caption-alignCenter">
                                                    <div class="cbp-l-caption-body">
                                                        <div class="cbp-l-caption-text">'.JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_POST_GRID_VIEW_POST').'</div>
                                                    </div>
                                                </div>
                                            </div>';
                                    $return[] = '</a>';
                }
                $return[] = '<a href="'.$slide['link'].'" class="cbp-l-grid-blog-title">'.$title.'</a>
                <div class="su-pgrid-meta">
                    '.$date.'
                    '.$show_category.'
                </div>
                '.$intro_text.'

            </div>';

		$item_block++;
	}

	$return[] = '</div>';
        if($size > 0)
            $return[] = '<div class="cbp-loadMore-block'.($block+1).'"> </div>';

    return implode("\n", $return);

}

echo load_post();

die();

?>