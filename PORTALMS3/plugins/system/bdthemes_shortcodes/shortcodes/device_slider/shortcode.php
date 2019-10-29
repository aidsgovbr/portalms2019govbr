<?php

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_device_slider extends Su_Shortcodes {

    function __construct() {
        parent::__construct();
    }

    public static function device_slider($atts = null, $content = null) {
        $atts = su_shortcode_atts(array(
            'source'        => '',
            'limit'         => 5,
            'device'        => 'imac',
            'arrows'        => 'no',
            'pagination'    => 'no',
            'autoplay'      => 'yes',
            'autoheight'    => 'no',
            'delay'         => 4,
            'speed'         => 0.6,
            'hoverpause'    => 'yes',
            'lazyload'      => 'no',
            'loop'          => 'yes',
            'lightbox'      => 'no',
            'margin'        => 0,
            'scroll_reveal' => '',
            'class'         => ''
        ), $atts, 'device_slider');

        $id = uniqid('suds');
        $return = array();
        $classes = array('su-device-slider');

        if ($atts['lightbox']==='yes') {
            $classes[] = 'has-lightbox';
        }
        
        $slides = (array) Su_Tools::get_slides($atts);
        
        $device = file_exists(BDT_SU_ROOT.DIRECTORY_SEPARATOR.'shortcodes'.DIRECTORY_SEPARATOR.'device_slider'.DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.$atts['device'].'.png');


        if (count($slides)) {
            $return[] = '<div'.su_scroll_reveal($atts).' class="su-device-slider-wrapper su-device-'.$atts['device'].'">';

                $return[] = '<img class="su-device-slider-device" src="'.BDT_SU_URI.'/shortcodes/device_slider/images/'.$atts['device'].'.png" alt="'.$atts['device'].'">';
                
                $return[] = '<div id="'. $id .'" class="owl-carousel '. su_acssc($classes) .'" data-autoplay="' . $atts['autoplay'] .'" data-delay="' . $atts['delay'] . '" data-speed="' . $atts['speed'] . '" data-arrows="' . $atts['arrows'] .'" data-pagination="' . $atts['pagination'] . '" data-lazyload="' . $atts['lazyload'] . '" data-loop="' . $atts['loop'] . '" data-hoverpause="' . $atts['hoverpause'] . '">';
                    

                    $limit = 0;
                    foreach ($slides as $slide) {

                        if ($slide['image']) {
                            if ($limit++ == $atts['limit']) break;

                                if ($atts['device'] == 'imac' or $atts['device'] == 'macbook') {
                                    $image = su_image_resize($slide['image'], 944, 590);
                                } elseif ($atts['device'] == 'ipad') {
                                    $image = su_image_resize($slide['image'], 596, 771);
                                } elseif ($atts['device'] == 'iphone' or $atts['device'] == 'galaxys6') {
                                    $image = su_image_resize($slide['image'], 447, 762);
                                }

                                $return[] = '<div class="su-device-slide-item">';
                                    if ($atts['lightbox']==='yes') {
                                        $return[] = '
                                        <div class="su-device-links">
                                            <a class="su-lightbox-item" href="'. image_media($slide['image']) .'" title="'. strip_tags($slide['title']).'"><i class="fa fa-search"></i></a>
                                        </div>';
                                    }
                                    $return[] = '<img src="' . image_media($image['url']) . '" alt="' . esc_attr($slide['title']) . '" />';
                                $return[] = '</div>';
                        }
                    } 

                $return[] = '</div>';

            $return[] = '</div>';

            suAsset::addFile('css', 'owl.carousel.css');
            suAsset::addFile('css', 'device_slider.css', __FUNCTION__);
            suAsset::addFile('js', 'owl.carousel.min.js');
            suAsset::addFile('js', 'device_slider.js', __FUNCTION__);

            if ($atts['lightbox']==='yes') {
                suAsset::addFile('css', 'magnific-popup.css');
                suAsset::addFile('js', 'magnific-popup.js');
            }

            return implode('', $return);

        } else {
            return su_alert_box(JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DEVICE_SLIDER_ERROR'), 'warning');
        }
    }    
}
