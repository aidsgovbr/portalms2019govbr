<?php

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_carousel extends Su_Shortcodes {

    function __construct() {
        parent::__construct();
    }

    public static function carousel($atts = null, $content = null) {
        $return = '';
        $atts = su_shortcode_atts(array(
            'style'            => '1',
            'source'           => '',
            'limit'            => 5,
            'order'            => 'created',
            'order_by'         => 'desc',
            'items'            => 4, // will be predicated in next version.
            'large'            => 4,
            'medium'           => 3,
            'small'            => 1,
            'image'            => 'yes',
            'quality'          => 95,
            'title'            => 'yes',
            'title_link'       => 'yes',
            'title_limit'      => '',
            'intro_text'       => 'yes',
            'intro_text_limit' => '60',
            'background'       => '',
            'color'            => '',
            'title_color'      => '',
            'date'             => 'no',
            'category'         => 'no',
            'image_width'      => 360,
            'image_height'     => 320,
            'thumb_resize'     => 'yes',
            'show_link'        => 'yes',
            'show_zoom'        => 'yes',
            'margin'           => 10,
            'scroll'           => 1,
            'arrows'           => 'no',
            'arrow_position'   => 'default',
            'pagination'       => 'yes',
            'autoplay'         => 'yes',
            'delay'            => 4,
            'speed'            => 0.35,
            'hoverpause'       => 'no',
            'lazyload'         => 'no',
            'loop'             => 'yes',
            'scroll_reveal'    => '',
            'class'            => ''
        ), $atts, 'carousel');

        $id         = uniqid('suc');
        $title      = "";
        $image      = "";
        $intro_text = '';
        $css[]      = '';
        $background = '';
        $color      = '';
        $date       = '';
        $category   = '';
        $lang       = JFactory::getLanguage();
        $lang       = ($lang->isRTL()) ? 'true' : 'false';
        $slides     = (array) Su_Tools::get_slides($atts);
        $zoom_link_icon = '';
        $atts['items'] = ($atts['large'] != 4) ? $atts['large'] : $atts['items'];

        $css[] = '#'.$id.'.su-carousel-style-3 .su-carousel-caption:after {border-bottom-color: '.$atts['background'].';}';
        
        if (($atts['background']) or ($atts['color'])) {
            $background = ($atts['background']) ? 'background-color:'.$atts['background'].';' : '';
            $color      = ($atts['color']) ? 'color:'.$atts['color'].';' : '';
            $css[]      = '#'.$id.' .su-carousel-slide {' . $background . $color .'}';            
        }

        $thumb_resize_check = ($atts['thumb_resize'] === 'yes') ? true : false;

        if ($atts['title_color']) {
            $css[] = '#'.$id.' .su-carousel-slide .su-carousel-slide-title a {color: '.$atts['title_color'].';}';
            $css[] = '#'.$id.' .su-carousel-slide .su-carousel-slide-title a:hover {color: '.su_color::lighten($atts['title_color'],'10%').';}';
        }

        if (count($slides) and ($atts['title'] == 'yes' or $atts['image']  == 'yes' or  $atts['intro_text'] === 'yes')) {

            
            $source = explode(":", $atts['source']);

            if ($source[0] == 'media'){
                $atts['class'] .= ' su-carousel-media';
            }

            $return[] = '<div id="' . $id . '"'.su_scroll_reveal($atts).' class="su-carousel su-carousel-style-'.$atts['style'].' su-carousel-title-' . $atts['title'] .' arrow-'. $atts['arrow_position'].' '. su_ecssc($atts). '" data-autoplay="' . $atts['autoplay'] .'" data-delay="' . $atts['delay'] . '" data-speed="' . $atts['speed'] . '" data-arrows="' . $atts['arrows'] .'" data-pagination="' . $atts['pagination'] . '" data-lazyload="' . $atts['lazyload'] . '" data-hoverpause="' . $atts['hoverpause'] . '" data-items="' . $atts['items'] . '" data-medium="' . $atts['medium'] . '" data-small="' . $atts['small'] . '" data-margin="' . $atts['margin'] . '" data-scroll="' . $atts['scroll'] . '" data-loop="' . $atts['loop'] . '" data-rtl="' . $lang . '" >';
            $return[] = '<div class="owl-carousel su-carousel-slides">';
            $limit = 1;

            foreach ((array) $slides as $slide) {

                $image_url = su_image_resize($slide['image'], $atts['image_width'], $atts['image_height'], $thumb_resize_check, $atts['quality']);
                
                if($atts['title'] == 'yes' && $slide['title'] ) {

                    $title = stripslashes($slide['title']);

                    if ($atts['title_limit']) {
                        $title = su_char_limit($title, $atts['title_limit']);
                    }

                    if ($atts['title_link'] == "yes") {
                        $title = '<a href="'.$slide['link'].'">'.$title.'</a>';
                    }
                    $title = '<h3 class="su-carousel-slide-title">' . $title . '</h3>';
                }

                if ($atts['show_zoom']==='yes' or $atts['show_link']==='yes') {
                    $zoom_link_icon = '<div class="suc-link-wrap">';
                        $zoom_link_icon .= '<div class="suc-link-center">';
                            $zoom_link_icon .= '<div class="suc-link-inner">';
                                if ($atts['show_zoom']==='yes') {
                                    $zoom_link_icon .= '<a href="'.image_media($slide['image']).'" class="su-lightbox-item suc-zoom" title="'. $slide['title'].'"></a>';
                                }
                                if ($atts['show_link']==='yes' and $source[0] !== 'media' and $source[0] !== 'directory') {
                                    $zoom_link_icon .= '<a href="'.$slide['link'].'" class="suc-link" title="'. $slide['title'] .'"></a>';
                                }
                            $zoom_link_icon .= '</div>';
                        $zoom_link_icon .= '</div>';
                    $zoom_link_icon .= '</div>';
                }


                if($atts['date'] === 'yes') {
                    $date = JHTML::_('date', $slide['created'], JText::_('DATE_FORMAT_LC3'));
                    $date = '<div class="su-cdate">'.$date.'</div>';
                }

                if($atts['category'] === 'yes') {
                    $category = '<div class="su-ccategory">'.$slide['category'].'</div>';
                }           

                if ($atts['intro_text'] === 'yes' and isset($slide['introtext'])) {

                    $intro_text = $slide['introtext'];

                    if ($atts['intro_text_limit']) {
                        $intro_text = su_char_limit($intro_text, $atts['intro_text_limit']);
                    }

                    $intro_text =  '<div class="su-carousel-item-text">'.su_do_shortcode($intro_text).'</div>';
                }
                
                $return[] = '<div class="su-carousel-slide">';

                    if (isset($image_url) && $atts['image']  == 'yes') {
                        $return[] = '<div class="su-carousel-image">';

                            if (isset($image_url)) {
                                $return[] = $zoom_link_icon;
                            }

                            $return[] = '<img src="' . image_media($image_url['url']) . '" alt="' . strip_tags($title) . '" />';

                        $return[] = '</div>';
                    }

                    if (($title) or ($intro_text)) {
                        $return[] = '<div class="su-carousel-caption">'.$title .'<div class="su-cmeta">' . $date. $category. '</div>' .$intro_text.'</div>';
                    }
                $return[] = '</div>';
                if ($limit++ == $atts['limit']) break;
            }
            $return[] = '</div>';
            $return[] = '</div>';
            suAsset::addString('css', implode("\n", $css));
            suAsset::addFile('css', 'magnific-popup.css');
            suAsset::addFile('js', 'magnific-popup.js');
            suAsset::addFile('css', 'owl.carousel.css');
            suAsset::addFile('js', 'owl.carousel.min.js');
            suAsset::addFile('css', 'carousel.css', __FUNCTION__);
            suAsset::addFile('js', 'carousel.js', __FUNCTION__);
        }
        else {
            return su_alert_box(JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CAROUSEL_INF'), 'warning');
        }
        return implode("", $return);
    }
}
