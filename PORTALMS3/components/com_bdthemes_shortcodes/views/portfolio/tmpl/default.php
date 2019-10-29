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

function portfolio_item($atts = null) {

    $atts = su_shortcode_atts(array(
        'source'                => (isset($_REQUEST["source"]))?$_REQUEST["source"]:null,
        'style'                 => (isset($_REQUEST["style"]))?$_REQUEST["style"]:null,
        'layout'                => (isset($_REQUEST["layout"]))?$_REQUEST["layout"]:null,
        'limit'                 => (isset($_REQUEST["show_more_item"]))? ($_REQUEST["show_more_item"] + 1 ):null,
        'order'                 => (isset($_REQUEST["order"]))?$_REQUEST["order"]:null,
        'order_by'              => (isset($_REQUEST["order_by"]))?$_REQUEST["order_by"]:null,
        'thumb_resize'          => (isset($_REQUEST["thumb_resize"]))?$_REQUEST["thumb_resize"]:null,
        'thumb_width'           => (isset($_REQUEST["thumb_width"]))?$_REQUEST["thumb_width"]:null,
        'thumb_height'          => (isset($_REQUEST["thumb_height"]))?$_REQUEST["thumb_height"]:null,
        'show_more_item'        => (isset($_REQUEST["show_more_item"]))?$_REQUEST["show_more_item"]:null,
        'show_zoom'             => (isset($_REQUEST["show_zoom"]))?$_REQUEST["show_zoom"]:null,
        'show_link'             => (isset($_REQUEST["show_link"]))?$_REQUEST["show_link"]:null,
        'include_article_image' => (isset($_REQUEST["include_article_image"]))?$_REQUEST["include_article_image"]:null,
        'offset'                => (isset($_REQUEST["offset"]))?$_REQUEST["offset"]:null
        ), $atts);
    
    $slides             = (array) Su_Tools::get_slides($atts);
    $return             = array();
    $item_block         = $atts["offset"];
    $block              = (isset($_REQUEST["numberOfClicks"]))? $_REQUEST["numberOfClicks"] : 1;
    $zoom_link_icon     = '';
    
    $thumb_resize_check = ($atts['thumb_resize'] === 'yes' and ($atts['layout'] != 'mosaic' or $atts['layout'] != 'masonry')) ? true : false;
    $size               =    sizeof($slides);
    $limit              = $atts["limit"];
        
        $return[] = '<div class="cbp-loadMore-block'.$block.'">';
    foreach ((array) $slides as $slide) {
            if($limit-- == 1){
                break;
            }
            $size--;
        // Title condition 
        if($slide['title'])
            $title = stripslashes($slide['title']);                

        $category = su_title_class($slide['category']);
        $item_link = JRoute::_($slide['link']);

        if ($atts['show_zoom']==='yes' or $atts['show_link']==='yes') {
            $zoom_link_icon = '<div class="sup-link-wrap">';
            if ($atts['show_zoom']==='yes') {
                $zoom_link_icon .= '<a href="'.image_media($slide['image']).'" class="su-lightbox-item sup-zoom" title="'. $title .'"></a>';
            }
            if ($atts['show_link']==='yes') {
                $zoom_link_icon .= '<a href="'.$item_link.'" class="sup-link" title="'. $title .'"></a>';
            }
            $zoom_link_icon .= '</div>';
        }

        if ($atts['style'] === '3') {
            $return[] = '<div class="cbp-item '.$category.'">
                <div class="cbp-caption">
                    <div class="sup-img-wrap">';
                        $return[] = su_portfolio_image($atts, $slide);
                $return[] = '</div>
                <div class="cbp-caption-activeWrap">
                    <div class="sup-desc-wrap">
                        <div class="sup-desc-inner">
                            <div class="sup-meta-wrap">
                                <a href="'.$item_link.'" class="sup-title"><h4>'. $title .'</h4></a>
                                <div class="sup-meta">'.$slide['category'].'</div>
                            </div>';
                            $return[] = $zoom_link_icon;
                        $return[] = '</div>
                    </div>
                </div>
                </div>
            </div>';
        }
        elseif ($atts['style'] === '9' || $atts['style'] === '10') {                  
            $return[] = '<div class="cbp-item '.$category.'">
                    <div class="sup-img-wrap">';
                        $return[] = su_portfolio_image($atts, $slide);
                        $return[] = $zoom_link_icon;
                $return[] = '</div>
                <div class="sup-desc-wrap">
                    <a href="'.$item_link.'" class="sup-title" rel="nofollow"><h4>'. $title .'</h4></a>
                    <div class="sup-meta">'.$slide['category'].'</div>
                </div>
            </div>';
        }
        elseif ($atts['style'] === '4' || $atts['style'] === '5' || $atts['style'] === '7') {
            $return[] = '<div class="cbp-item '.$category.'">
                <div class="cbp-caption">
                    <div class="sup-img-wrap">';
                        $return[] = su_portfolio_image($atts, $slide);
                $return[] = '</div>
                <div class="cbp-caption-activeWrap">
                    <div class="sup-desc-wrap">
                        <div class="sup-desc-inner">';
                            $return[] = $zoom_link_icon;
    
                            $return[] = '<div class="sup-meta-wrap">
                                <a href="'.$item_link.'" class="sup-title"><h4>'. $title .'</h4></a>
                                <div class="sup-meta">'.$slide['category'].'</div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>';
        }
        else {                  
            $return[] = '<div class="cbp-item '.$category.'">
                <div class="cbp-caption">
                    <div class="sup-img-wrap">';
                        $return[] = su_portfolio_image($atts, $slide);
                $return[] = '</div>

                    <div class="cbp-caption-activeWrap">
                        <div class="cbp-l-caption-alignCenter">
                            <div class="cbp-l-caption-body">';
                                $return[] = $zoom_link_icon;
                            $return[] = ' </div>
                        </div>
                    </div>
                </div>
                <div class="sup-meta-wrap">
                    <a href="'.$item_link.'" class="sup-title"><h4>'. $title .'</h4></a>
                    <div class="sup-meta">'.$slide['category'].'</div>
                </div>
            </div>';
        }

        $item_block++;
    }
        $return[] = '</div>';
        if($size > 0)
            $return[] = '<div class="cbp-loadMore-block'.($block+1).'"> </div>';

    return implode("\n", $return);
}

echo portfolio_item();

die();

?>

