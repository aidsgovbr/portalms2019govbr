<?php

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_content_slider extends Su_Shortcodes {

    function __construct() {
        parent::__construct();
    }

    public static function content_slider($atts = null, $content = null) {
        $atts = su_shortcode_atts(array(
            'style'          => 'default',
            'transitionin'   => 'fadeIn',
            'transitionout'  => 'fadeOut',
            'arrows'         => 'yes',
            'arrow_position' => 'arrow-default',
            'pagination'     => 'no',
            'autoplay'       => 'yes',
            'autoheight'     => 'no',
            'delay'          => 4,
            'speed'          => 0.6,
            'hoverpause'     => 'no',
            'lazyload'       => 'no',
            'loop'           => 'yes',
            'margin'         => 10,
            'scroll_reveal'  => '',
            'class'          => ''
        ), $atts, 'content_slider');

        $id = uniqid('sucs');
        $classes = array('owl-carousel', 'su-content-slider', 'su-content-slider-style-' . $atts['style'], $atts['arrow_position'], su_ecssc($atts));
        $output = array();


        if ($atts['transitionin'] === 'slide' or $atts['transitionout'] === 'slide') {
            $atts['transitionin'] = $atts['transitionout']= 'false';
        } else {
            suAsset::addFile('css', 'animate.css');
        }

        $output[] = '<div id="'. $id .'" class="' . su_acssc($classes) . '" '.su_scroll_reveal($atts).' data-transitionin="' . $atts['transitionin'] . '" data-transitionout="' . $atts['transitionout'] . '" data-autoplay="' . $atts['autoplay'] .'" data-autoheight="' . $atts['autoheight'] .'" data-delay="' . $atts['delay'] . '" data-speed="' . $atts['speed'] . '" data-margin="' . $atts['margin'] . '" data-arrows="' . $atts['arrows'] .'" data-pagination="' . $atts['pagination'] . '" data-lazyload="' . $atts['lazyload'] . '" data-loop="' . $atts['loop'] . '" data-hoverpause="' . $atts['hoverpause'] . '">';
        $output[] = su_do_shortcode($content);
        $output[] = '</div>';

        suAsset::addFile('css', 'owl.carousel.css');
        suAsset::addFile('css', 'content_slider.css', __FUNCTION__);
        suAsset::addFile('js', 'owl.carousel.min.js');
        suAsset::addFile('js', 'content_slider.js', __FUNCTION__);

        return implode("\n", $output);
    }    
}
