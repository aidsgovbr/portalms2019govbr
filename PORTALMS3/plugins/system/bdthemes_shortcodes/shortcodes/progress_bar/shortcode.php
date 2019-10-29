<?php

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_progress_bar extends Su_Shortcodes {

    function __construct() {
        parent::__construct();
    }
    public static function progress_bar($atts = null, $content = null) {
        $atts = su_shortcode_atts(array(
            'style'         => '1',
            'percent'       => 75,
            'show_percent'  => 'yes',
            'text'          => '',
            'bar_color'     => '',
            'fill_color'    => '',
            'text_color'    => '',
            'animation'     => 'easeInOutExpo',
            'duration'      => 1.5,
            'delay'         => 0.3,
            'scroll_reveal' => '',
            'class'         => ''
        ), $atts, 'progress_bar');

        $id = uniqid('suc');
        $css = array();

        $classes = array('su-progress-bar', 'su-progress-bar-style-' . $atts['style'], su_ecssc($atts));
        if ($atts['bar_color']) {
            $css[] = '#'.$id.'.su-progress-bar { background-color:' . $atts['bar_color'] . '; border-color:' . su_color::darken($atts['bar_color'], '10%') . ';'.'}';
        }
        if (($atts['fill_color']) or ($atts['text_color'])) {
            $fill_color = ($atts['fill_color']) ? 'background-color:' . $atts['fill_color'] . ';' : '';
            $text_color = ($atts['text_color']) ? 'color:' . $atts['text_color'] . ';' : '';
            $css[] = '#'.$id.'.su-progress-bar > span {'.$fill_color. $text_color . '}';
            if ($atts['style'] == 3) {
                $css[] = '#'.$id.'.su-progress-bar > span > span {'. $text_color . '}';
                
            }           
        }
        $text = ($atts['text']) ? '<span class="su-pb-text">' . $atts['text'] . '</span>' : '';
        $show_percent = ($atts['show_percent'] !== 'no') ? '<span class="su-pb-percent">'. $atts['percent'] . '%</span>' : '';

        // Add CSS and JS in head
        suAsset::addFile('css', 'progress-bar.css', __FUNCTION__);
        suAsset::addFile('js', 'jquery.easing.js');
        suAsset::addFile('js', 'jquery.appear.js');
        suAsset::addFile('js', 'progress-bar.js', __FUNCTION__);
        suAsset::addString('css', implode("\n", $css));

        $return = '<div id="'.$id.'"'.su_scroll_reveal($atts).' class="'.su_acssc($classes).'"><span class="su-pb-fill" data-percent="' . $atts['percent'] . '" data-animation="' . $atts['animation'] . '" data-duration="' . $atts['duration'] . '" data-delay="' . $atts['delay'] . '">'.$text.$show_percent.'</span></div>';
        return $return;
    }
}