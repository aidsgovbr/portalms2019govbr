<?php

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_post_slider extends Su_Shortcodes {

    function __construct() {
        parent::__construct();
    }

    public static function post_slider($atts = null, $content = null) {
        $return = '';
        $atts = su_shortcode_atts(array(
            'style'            => 'light',
            'source'           => '',
            'limit'            => 5,
            'order'            => 'created',
            'order_by'         => 'desc',
            'title'            => 'yes',
            'title_link'       => 'yes',
            'intro_text'       => 'yes',
            'intro_text_limit' => '200',
            'arrows'           => 'yes',
            'pagination'       => 'no',
            'autoplay'         => 'no',
            'delay'            => 4,
            'date'             => 'yes',
            'category'         => 'yes',
            'speed'            => 0.35,
            'hoverpause'       => 'no',
            'lazyload'         => 'no',
            'loop'             => 'yes',
            'scroll_reveal'    => '',
            'class'            => ''
        ), $atts, 'post_slider');

        $id         = uniqid('sups');
        $title      = "";
        $image      = "";
        $intro_text = '';
        $date       = '';
        $lang       = JFactory::getLanguage();
        $lang       = ($lang->isRTL()) ? 'true' : 'false';
        $slides     = (array) Su_Tools::get_slides($atts);


        if ( count($slides) ) {            
            $source = explode(":", $atts['source']);

            $return[] = '<div id="' . $id . '"'.su_scroll_reveal($atts).' class="su-post-slider su-post-slider-style-' . $atts['style'] . ' su-post-slider-title-' . $atts['title'] . ' '. su_ecssc($atts). '" data-autoplay="' . $atts['autoplay'] .'" data-delay="' . $atts['delay'] . '" data-speed="' . $atts['speed'] . '" data-arrows="' . $atts['arrows'] .'" data-pagination="' . $atts['pagination'] . '" data-lazyload="' . $atts['lazyload'] . '" data-hoverpause="' . $atts['hoverpause'] . '" data-items="1" data-medium="1" data-small="1" data-loop="' . $atts['loop'] . '" data-rtl="' . $lang . '" >';
            $return[] = '<div class="owl-carousel su-post-slider-slides">';
            $limit = 1;

            foreach ((array) $slides as $slide) {

               
                $image_url = su_image_resize($slide['image'], 360, 200, true, 95);
                
                if($atts['title'] == 'yes' && $slide['title'] ) {
                    $title = stripslashes($slide['title']);
                    if ($atts['title_link'] == "yes") {
                        $title = '<a href="'.$slide['link'].'">'.$title.'</a>';
                    }
                    $title = '<h3 class="su-post-slider-slide-title">' . $title . '</h3>';
                }
                if($atts['date'] === 'yes') {
                    $day = JHTML::_('date', $slide['created'], JText::_('d'));
                    $day = '<span>'.$day.'</span>';
                    $date = JHTML::_('date', $slide['created'], '/ '.JText::_('F Y'));
                    $date = '<div class="su-cdate">'.$day.$date.'</div>';
                }
                if ($atts['intro_text'] === 'yes' and isset($slide['introtext'])) {

                    $intro_text = $slide['introtext'];

                    if ($atts['intro_text_limit']) {
                        $intro_text = su_char_limit($intro_text, $atts['intro_text_limit']);
                    }

                    $intro_text =  '<div class="su-post-slider-item-text">'.su_do_shortcode($intro_text).'</div>
                                    <a class="post-slider-view-more" href="'.$slide['link'].'">'.JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_POST_SLIDER_MORE').' <i class="fa fa-arrow-circle-right"></i></a>';
                }
                if($atts['category'] === 'yes') {
                    $category = '<div class="post-slider-category">'.$slide['category'].'</div>';
                }
                $return[] = '<div class="su-post-slider-slide">';

                    if ( isset($image_url) ) {
                        $return[] = '<div class="su-post-slider-image">';

                            $return[] = '<a href="'.$slide['link'].'"><img src="' . image_media($image_url['url']) . '" alt="' . strip_tags($title) . '" /></a>';
                        $return[] = '</div>';
                    }
                $return[] = '<div class="su-post-slider-caption">'.$date .'<div class="su-cmeta">' . $title. '</div>' .$intro_text.$category.'</div>';
                $return[] = '</div>';
                if ($limit++ == $atts['limit']) break;
            }
            $return[] = '</div>';
            $return[] = '</div>';
            suAsset::addFile('css', 'magnific-popup.css');
            suAsset::addFile('js', 'magnific-popup.js');
            suAsset::addFile('css', 'owl.carousel.css');
            suAsset::addFile('js', 'owl.carousel.min.js');
            suAsset::addFile('css', 'post_slider.css', __FUNCTION__);
            suAsset::addFile('js', 'post_slider.js', __FUNCTION__);
        }
        else {
            return su_alert_box(JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_POST_SLIDER_INF'), 'warning');
        }
        return implode("", $return);
    }
}
