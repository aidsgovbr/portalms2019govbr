<?php

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_custom_carousel extends Su_Shortcodes {

    function __construct() {
        parent::__construct();
    }

    public static function custom_carousel($atts = null, $content = null) {
        $atts = su_shortcode_atts(array(
            'style'          => '1',
            'large'          => 5,
            'medium'         => 3,
            'small'          => 1,
            'background'     => '',
            'color'          => '',
            'padding'        => '',
            'margin'         => 10,
            'border'         => '',
            'scroll'         => 1,
            'arrows'         => 'yes',
            'pagination'     => 'yes',
            'autoplay'       => 'yes',
            'delay'          => 4,
            'speed'          => 0.35,
            'hoverpause'     => 'no',
            'center_zoom'    => 'no',
            'lazyload'       => 'no',
            'loop'           => 'yes',
            'scroll_reveal'  => '',
            'class'          => ''
        ), $atts, 'custom_carousel');

        $id         = uniqid('succ');
        $css        = array();
        $lang       = JFactory::getLanguage();
        $lang       = ($lang->isRTL()) ? 'true' : 'false';
        $color      = ($atts['color']) ? 'color:' . $atts['color'] . ';' : '';
        $background = ($atts['background']) ? 'background:' . $atts['background'] . ';' : '';
        $padding    = ($atts['padding']) ? 'padding:' . $atts['padding'] . ';' : '';
        $border     = ($atts['border']) ? 'border:' . $atts['border'] . ';' : '';

        if ($background or $color or $padding or $border) 
            $css[] = '#'.$id.' .su-custom-carousel-item {' .$background. $color. $padding. $border .'}';

        suAsset::addFile('css', 'owl.carousel.css');
        suAsset::addFile('css', 'custom_carousel.css', __FUNCTION__);
        suAsset::addString('css', implode("\n", $css));

        suAsset::addFile('js', 'owl.carousel.min.js');
        suAsset::addFile('js', 'custom_carousel.js', __FUNCTION__);
        
        $return[] = '<div id="' . $id . '" '.su_scroll_reveal($atts).' class="su-custom-carousel su-custom-carousel-style'.$atts['style'].''. su_ecssc($atts). '" data-autoplay="' . $atts['autoplay'] .'" data-delay="' . $atts['delay'] . '" data-speed="' . $atts['speed'] . '" data-arrows="' . $atts['arrows'] .'" data-pagination="' . $atts['pagination'] . '" data-lazyload="' . $atts['lazyload'] . '" data-hoverpause="' . $atts['hoverpause'] . '" data-large="' . $atts['large'] . '" data-medium="' . $atts['medium'] . '" data-small="' . $atts['small'] . '" data-margin="' . $atts['margin'] . '" data-scroll="' . $atts['scroll'] . '" data-center="' . $atts['center_zoom'] . '" data-loop="' . $atts['loop'] . '" data-rtl="' . $lang . '" >';
        $return[] = '<div class="owl-carousel su-custom-carousel-slides">';
            $return[] = su_do_shortcode($content);
            $return[] = '</div>';
        $return[] = '</div>';
        return implode("\n", $return);
    }    
}
