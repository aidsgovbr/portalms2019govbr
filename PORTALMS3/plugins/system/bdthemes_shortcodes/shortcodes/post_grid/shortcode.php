<?php

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_post_grid extends Su_Shortcodes {

    function __construct() {
        parent::__construct();
    }

    public static function post_grid($atts = null, $content = null) {
        $atts = su_shortcode_atts(array(
            'source'                => '',
            'limit'                 => 12,
            'layout'                => 'grid',
            'show_more'             => 'no',
            'intro_text_limit'      => 105,
            'show_more_item'        => 4,
            'show_more_action'      => 'click',
            'order'                 => 'created',
            'order_by'              => 'desc',
            'loading_animation'     => 'sequentially',
            'filter_animation'      => 'rotateSides',
            'caption_style'         => 'overlayBottomPush',
            'horizontal_gap'        => 35,
            'vertical_gap'          => 15,
            'filter'                => 'yes',
            'filter_style'          => 2,
            'filter_deeplink'       => 'no',
            'filter_align'          => '',
            'filter_counter'        => 'yes',
            'category'              => 'yes',
            'date'                  => 'yes',
            'large'                 => 4,
            'medium'                => 3,
            'small'                 => 1,
            'show_thumb'            => 'yes',
            'thumb_resize'          => 'yes',
            'include_article_image' => 'yes',
            'thumb_width'           => 640,
            'thumb_height'          => 480,
            'show_search'           => 'no',
            'scroll_reveal'         => '',
            'class'                 => ''
        ), $atts, 'post_grid');

        $slides                  = (array) Su_Tools::get_slides($atts);
        $id                      = uniqid('supg');
        $intro_text              = '';
        $title                   = '';    
        $return                  = array();
        $atts['filter_deeplink'] = ($atts['filter_deeplink'] === 'yes') ? 'true' : 'false';
        $filter_align            = ($atts['filter_align']) ? 'su-post-grid-filter-align-'.$atts['filter_align'] : '';
        $filter_counter          = '';
        $lang                    = JFactory::getLanguage(); 
        $lang->load('plg_system_bdthemes_shortcodes', JPATH_ADMINISTRATOR);


        if ($atts['layout'] === 'mosaic') {
            $layout = ' data-layout="mosaic"';
        }elseif ($atts['layout'] === 'masonry') {
            $layout = ' data-layout="grid"';
        }elseif ($atts['layout'] === 'slider') {
            $layout = ' data-layout="slider"';
        }else {
            $layout = ' data-layout="grid"';
        }

        if ($atts['filter_counter'] == 'yes') {
            if ($atts['filter_style'] == 1 ) {
                $filter_counter = ' (<div class="cbp-filter-counter"></div> '.JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_POST_GRID_ITEMS').')';
            } elseif ($atts['filter_style'] == 3 ) {
                $filter_counter = ' (<div class="cbp-filter-counter"></div>)';
            } else {
                $filter_counter = '<div class="cbp-filter-counter"></div>';
            }  
        }

        $thumb_resize_check = ($atts['thumb_resize'] === 'yes' and ($atts['layout'] != 'mosaic' or $atts['layout'] != 'masonry')) ? true : false;

        if (count($slides)) {

            suAsset::addFile('css', 'cubeportfolio.min.css');
            suAsset::addFile('js', 'cubeportfolio.min.js');

            $return[] = '<div id="' . $id . '" class="su-post-grid '.su_ecssc($atts). $filter_align .'" data-pgid="' . $id . '"'.$layout.' data-loading_animation="'.$atts['loading_animation'].'" data-filter_animation="'.$atts['filter_animation'].'" data-caption_style="'.$atts['caption_style'].'" data-horizontal_gap="'.intval($atts['horizontal_gap']).'" data-vertical_gap="'.intval($atts['vertical_gap']).'" data-large="'.$atts['large'].'" data-medium="'.$atts['medium'].'" data-small="'.$atts['small'].'" data-filter_deeplink="'.$atts['filter_deeplink'].'" data-loadmoreaction="'.$atts['show_more_action'].'"'.su_scroll_reveal($atts).'>';
                
                    if ($atts['filter'] !== 'no' && $atts['filter_style'] == 1) {
                        $return[] = '<div id="' . $id . '_filter" class="cbp-l-filters-dropdown">
                            <div class="cbp-l-filters-dropdownWrap">
                                <div class="cbp-l-filters-dropdownHeader">'.JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_POST_GRID_SORT').'</div>
                                <div class="cbp-l-filters-dropdownList">
                                    <div data-filter="*" class="cbp-filter-item-active cbp-filter-item">
                                        '.JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ALL_ITEMS').$filter_counter.'
                                    </div>';
                                    $category = array();
                                    foreach ((array) $slides as $slide) {
                                        if (in_array($slide['category'], $category) ) {
                                            continue;
                                        }
                                        $category[] = $slide['category'];
                                        $return[] = '<div class="cbp-filter-item" data-filter=".' . su_title_class($slide['category']).'">'.$slide['category'].' (<div class="cbp-filter-counter"></div> '.JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_POST_GRID_ITEMS').')</div>';
                                    } 
                                $return[] ='</div>
                            </div>
                        </div>';
                    } 

                    if ($atts['filter'] !== 'no' and ($atts['filter_style'] != 1) and ($atts['layout'] != 'slider')) {
                        
                        if ($atts['filter_style'] == 2) {
                            $filter_style = 'cbp-l-filters-button';
                        } elseif ($atts['filter_style'] == 3) {
                            $filter_style = 'cbp-l-filters-alignLeft';
                        } elseif ($atts['filter_style'] == 4) {
                            $filter_style = 'cbp-l-filters-alignCenter';
                        } elseif ($atts['filter_style'] == 5) {
                            $filter_style = 'cbp-l-filters-alignRight';
                        } elseif ($atts['filter_style'] == 6) {
                            $filter_style = 'cbp-l-filters-buttonCenter';
                        } elseif ($atts['filter_style'] == 7) {
                            $filter_style = 'cbp-l-filters-work';
                        } elseif ($atts['filter_style'] == 8) {
                            $filter_style = 'cbp-l-filters-list';
                        } elseif ($atts['filter_style'] == 9) {
                            $filter_style = 'cbp-l-filters-text new_filter';
                        }

                        $return[] = '<div id="' . $id . '_filter" class="'.$filter_style.'">
                                <div data-filter="*" class="cbp-filter-item-active cbp-filter-item">
                                    '.JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ALL_ITEMS').$filter_counter.'
                                </div>';
                                $category = array();
                                foreach ((array) $slides as $slide) {
                                    if (in_array($slide['category'], $category) ) {
                                        continue;
                                    }
                                    $category[] = $slide['category'];
                                    $return[] = '<div class="cbp-filter-item" data-filter=".' . su_title_class($slide['category']).'">'.$slide['category'].$filter_counter.'</div>';
                                }

                                if ($atts['show_search'] === 'yes') {
                                    $return[] ='<div class="cbp-search cbp-l-filters-right">
                                                    <input id="'.$id. '_search" type="text" placeholder="'.JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_POST_GRID_SEARCH').'" data-search="" class="cbp-search-input">
                                                    <div class="cbp-search-icon"></div>
                                                    <div class="cbp-search-nothing">'.JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_NO_SEARCH_RESULT').' <i>{{query}}</i></div>
                                                </div>';
                                } 
                            

                        $return[] ='
                        </div>';
                    }

            $return[] = '<div id="' . $id . '_container" class="cbp-l-grid-gallery">';

            $limit = 1;
            foreach ((array) $slides as $slide) {
                
                $thumb_url = su_image_resize($slide['image'], $atts['thumb_width'], $atts['thumb_height'], $thumb_resize_check, 95);  
                
                // Title condition 
                if($slide['title'])
                    $title = stripslashes($slide['title']);                

                $category = su_title_class($slide['category']);
                $date = ($atts['date'] === 'yes') ? '<span class="cbp-l-grid-blog-date">' . JHTML::_('date', $slide['created'], JText::_('DATE_FORMAT_LC3')) . '</span>' : '';
                $show_category = ($atts['category'] === 'yes') ? '<span class="cpb-category">' . $slide['category'] . '</span>' : '';

                if (isset($slide['introtext'])) {
                    if ($atts['intro_text_limit'] != 0) {
                        $intro_text = '<div class="cbp-l-grid-blog-desc">'.su_char_limit($slide['introtext'], $atts['intro_text_limit']).'</div>';
                    }
                }

                $return[] = '
                    <div class="cbp-item '.$category.'">';
                        if (isset($thumb_url['url']) and $atts['show_thumb'] === 'yes') {
                            $return[] = '<a data-id="'.$slide['id'].'" href="'.$slide['link'].'" class="cbp-caption su-blog-img">
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

                if ($limit++ == $atts['limit']) break;
            }
            $return[] = '</div><div class="clearfix"></div>';

            if ($atts['show_more']==='yes' and ($atts['layout'] != 'slider')) {
                $return[] ='<div id="' . $id . '_btn" class="cbp-l-loadMore-button">
                                <a data-id="'.$id.'" href="'.JRoute::_('index.php?option=com_bdthemes_shortcodes&amp;view=post&amp;layout=default').'" class="cbp-l-loadMore-link" rel="nofollow">
                                    <span class="cbp-l-loadMore-defaultText">'.JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHOW_MORE').'</span>
                                    <span class="cbp-l-loadMore-loadingText">'.JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LOADING').'</span>
                                    <span class="cbp-l-loadMore-noMoreLoading">'.JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_NO_MORE_ITEMS').'</span>
                                </a>
                                <script type="text/javascript">
                                   var tdata = tdata || [];
                                    tdata["'.$id.'"] = '.  json_encode($atts).';
                                    tdata["'.$id.'"]["offset"] ='.$atts["limit"].'   
                                </script>
                            </div>';
                suAsset::addFile('js', 'cbploadmore.js');
            } 
            $return[] = '</div>';

            
            suAsset::addFile('css', 'post_grid.css', __FUNCTION__);
            suAsset::addFile('js', 'post_grid.js', __FUNCTION__);

            return implode('', $return);
        }
        else{
            return su_alert_box(JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_POST_GRID_ERROR'), 'warning');
        }
    }   
}
