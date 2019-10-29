<?php

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_showcase extends Su_Shortcodes {

    function __construct() {
        parent::__construct();
    }

    public static function showcase($atts = null, $content = null) {
        $atts = su_shortcode_atts(array(
            'source'                => '',
            'limit'                 => 12,
            'show_more'             => 'no',
            'layout'                => 'grid',
            'show_more_item'        => 4,
            'show_more_action'      => 'click', // click, auto
            'item_link'             => 'inline', // inline, single, link, no
            'order'                 => 'created',
            'order_by'              => 'desc',
            'loading_animation'     => 'default',
            'filter_animation'      => 'rotateSides',
            'caption_style'         => 'overlayBottomPush',
            'horizontal_gap'        => 10,
            'vertical_gap'          => 10,
            'filter'                => 'yes',
            'filter_style'          => 1,
            'filter_deeplink'       => 'no',
            'filter_align'          => '',
            'filter_counter'        => 'yes',
            'page_deeplink'         => 'no',
            'popup_position'        => 'below',
            'popup_category'        => 'yes',
            'popup_date'            => 'yes',
            'popup_image'           => 'yes',
            'popup_detail_button'   => 'yes',
            'include_article_image' => 'no',
            'large'                 => 4,
            'medium'                => 3,
            'small'                 => 1,
            'thumb_resize'          => 'yes',
            'thumb_width'           => 640,
            'thumb_height'          => 480,
            'scroll_reveal'         => '',
            'class'                 => ''
        ), $atts, 'showcase');

        $slides                  = (array) Su_Tools::get_slides($atts);
        $id                      = uniqid('susc');
        $intro_text              = '';
        $title                   = '';    
        $return                  = array();
        $atts['filter_deeplink'] = ($atts['filter_deeplink'] === 'yes') ? 'true' : 'false';
        $atts['page_deeplink']   = ($atts['page_deeplink'] === 'yes') ? 'true' : 'false';
        $lang                    = JFactory::getLanguage();
        $filter_align            = ($atts['filter_align']) ? 'su-showcase-filter-align-'.$atts['filter_align'] : '';
        $filter_counter          = '';
        $lang->load('plg_system_bdthemes_shortcodes', JPATH_ADMINISTRATOR);

        if ($atts['layout'] === 'mosaic') {
            $layout = ' data-layout="mosaic"';
        } elseif ($atts['layout'] === 'masonry') {
            $layout = ' data-layout="grid"';
        } elseif ($atts['layout'] === 'slider') {
            $layout = ' data-layout="slider"';
        } else {
            $layout = ' data-layout="grid"';
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

        $thumb_resize_check = ($atts['thumb_resize'] === 'yes' and $atts['layout'] != 'masonry') ? true : false;

        if ($atts['filter_counter'] == 'yes') {
            if ($atts['filter_style'] == 1 ) {
                $filter_counter = ' (<div class="cbp-filter-counter"></div> '.JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHOWCASE_ITEMS').')';
            } elseif ($atts['filter_style'] == 3 or $atts['filter_style'] == 8 ) {
                $filter_counter = ' (<div class="cbp-filter-counter"></div>)';
            } else {
                $filter_counter = '<div class="cbp-filter-counter"></div>';
            }
            
        }

        if (preg_match('/k2-category/', $atts['source'])) {
            $source = 'k2';
        } else {
            $source = 'article';
        }

        if ( count($slides) ) {
            
            suAsset::addFile('css', 'cubeportfolio.min.css');
            suAsset::addFile('js', 'cubeportfolio.min.js');
            

            $return[] = '<div id="' . $id . '"'.su_scroll_reveal($atts).' class="su-showcase '.su_ecssc($atts). $filter_align .'" data-scid="' . $id . '"'.$layout.' data-loading_animation="'.$atts['loading_animation'].'" data-filter_animation="'.$atts['filter_animation'].'" data-caption_style="'.$atts['caption_style'].'" data-horizontal_gap="'.intval($atts['horizontal_gap']).'" data-vertical_gap="'.intval($atts['vertical_gap']).'" data-popup_position="'.$atts['popup_position'].'" data-large="'.$atts['large'].'" data-medium="'.$atts['medium'].'" data-small="'.$atts['small'].'" data-filter_deeplink="'.$atts['filter_deeplink'].'" data-page_deeplink="'.$atts['page_deeplink'].'" data-loadmoreaction="'.$atts['show_more_action'].'" >';
                
                    if ($atts['filter'] !== 'no' and $atts['filter_style'] == 1 and ($atts['layout'] != 'slider')) {
                        $return[] = '<div id="' . $id . '_filter" class="cbp-l-filters-dropdown">
                            <div class="cbp-l-filters-dropdownWrap">
                                <div class="cbp-l-filters-dropdownHeader">'.JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHOWCASE_SORT').'</div>
                                <div class="cbp-l-filters-dropdownList">
                                    <div data-filter="*" class="cbp-filter-item-active cbp-filter-item">
                                        '.JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ALL_ITEMS').$filter_counter.'
                                    </div>';
                                    $category = array();
                                    if ($atts['show_more']==='yes'){
                                        $cats = Su_Tools::getSlidesCats($atts);
                                        foreach ((array) $cats as $cat) {
                                            if($cat->count == 0) continue;
                                            $category[] = $cat;
                                            $return[] =  '<div class="cbp-filter-item" data-filter=".'  . su_title_class($cat->category_title).'">'.$cat->category_title.' (<div class="cbp-filter-counter"></div> '.JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHOWCASE_ITEMS').')</div>';
                                        } 
                                    }else{
                                        foreach ((array) $slides as $slide) {
                                            if (in_array($slide['category'], $category) ) {
                                                continue;
                                            }
                                            $category[] = $slide['category'];
                                            $return[] = '<div class="cbp-filter-item" data-filter=".' . su_title_class($slide['category']).'">'.$slide['category'].' (<div class="cbp-filter-counter"></div> '.JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHOWCASE_ITEMS').')</div>';
                                        } 
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
                                 if ($atts['show_more']==='yes'){
                                        $cats = Su_Tools::getSlidesCats($atts);
                                        foreach ((array) $cats as $cat) {
                                            if($cat->count == 0) continue;
                                            $category[] = $cat;
                                            $return[] =  '<div class="cbp-filter-item" data-filter=".'  . su_title_class($cat->category_title).'">'.$cat->category_title.$filter_counter.'</div>';
                                        } 
                                    }else{
                                       
                                         foreach ((array) $slides as $slide) {
                                            if (in_array($slide['category'], $category) ) {
                                                continue;
                                            }
                                            $category[] = $slide['category'];
                                            $return[] = '<div class="cbp-filter-item" data-filter=".' . su_title_class($slide['category']).'">'.$slide['category'].$filter_counter.'</div>';
                                        } 
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
                $item_link = ($atts['item_link'] != 'no') ? JRoute::_($slide['link']) : 'javascript:void(0);';
                
                $return[] = '
                    <div class="cbp-item '.$category.'">
                         <a data-id="'.$slide['id'].'" data-source = "'.$source.'" data-include_article_image = "'.$atts['include_article_image'].'" data-popup_image = "'.$atts['popup_image'].'" data-popup_category = "'.$atts['popup_category'].'" data-popup_date = "'.$atts['popup_date'].'" data-popup_detail_button = "'.$atts['popup_detail_button'].'" href="'.$item_link.'" '.$page.' class="cbp-caption '.$item_link_class.'" data-title="'.$title.' // '.$slide['category'].'">
                            <div class="cbp-caption-defaultWrap">';
                                if (isset($thumb_url['url'])) {
                                    $return[] = '<img src="'. image_media($thumb_url['url']) .'" alt="'. $title .'">';
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
                if ($limit++ == $atts['limit']) break;
            }
            $return[] = '</div><div class="clearfix"></div>';

            if ($atts['show_more']==='yes' and ($atts['layout'] != 'slider')) {
                $return[] ='<div id="' . $id . '_btn" class="cbp-l-loadMore-button">
                                <a data-id="'.$id.'" href="'.JRoute::_('index.php?option=com_bdthemes_shortcodes&amp;view=item&amp;layout=default').'" class="cbp-l-loadMore-link" rel="nofollow">
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
            
            suAsset::addFile('css', 'showcase.css', __FUNCTION__);
            suAsset::addFile('js', 'showcase.js', __FUNCTION__);

            return implode('', $return);
        }
        else
            return su_alert_box(JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHOWCASE_ERROR'), 'warning');
    }   
}