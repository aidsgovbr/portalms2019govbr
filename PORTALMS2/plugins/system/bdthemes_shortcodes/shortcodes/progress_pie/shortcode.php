<?php

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_progress_pie extends Su_Shortcodes {

    function __construct() {
        parent::__construct();
    }
    public static function progress_pie($atts = null, $content = null) {
        $atts = su_shortcode_atts(array(
            'id'            => uniqid('supp'),
            'percent'       => 75,
            'before'        => '',
            'text'          => '',
            'after'         => '',
            'step'          => 1,
            'line_width'    => 8,
            'text_size'     => '',
            'align'         => 'center',
            'bar_color'     => '',
            'fill_color'    => '',
            'text_color'    => '',
            'line_cap'      => 'round', //butt/square/round
            'dash_array'    => '', //5,5/20,10,5,5,5,10/10,10
            'duration'      => 2,
            'delay'         => 1,
            'scroll_reveal' => '',
            'class'         => ''
        ), $atts, 'progress_pie');

        $id         = $atts['id'];
        $css[]      = '';
        $js         = array();
        $classes    = array('su-progress-pie', 'su-pp-align-' . $atts['align'], 'su-pp-lc-'.$atts['line_cap'], su_ecssc($atts));
        $text_color = ($atts['text_color']) ? 'color:' . $atts['text_color']. ';' : '';        
        $text_size  = ($atts['text_size']) ? 'font-size:' . $atts['text_size']. ';' : '';
        $bar_color  = ($atts['bar_color']) ? 'stroke:' . $atts['bar_color'].';': '';      
        $dash_array = ($atts['dash_array']) ? 'stroke-dasharray:'.$atts['dash_array'].' !important;': '';      

        if (!$atts['text']) {
            $classes[] = 'su-pp-percent';
        }
        if ($atts['before'] !== '') {
            $atts['before'] = '<div class="su-progress-pie-before"> '.$atts['before'].'</div>';
        }
        if ($atts['text'] !== '') {
            $atts['text'] = '<div class="su-progress-pie-text"> '.$atts['text'].'</div>';
        }
        if ($atts['after'] !== '') {
            $atts['after'] = '<div class="su-progress-pie-after"> '.$atts['after'].'</div>';
        }  
        if ($bar_color or $dash_array) {
            $css[] = '#'.$id.' svg path { '.$bar_color.$dash_array.'}';
        }
        if ($atts['fill_color']) {
            $css[] = '#'.$id.' svg ellipse { stroke:' . $atts['fill_color'].' }';  
        }
        if ($text_color or $text_size) {
            $css[] = '#'.$id.' .su-progress-pie-text, #'.$id.' .su-progress-pie-number {'.$text_color.$text_size.'}';            
        }


        // Add CSS and JS in head
        suAsset::addString('css', implode("\n", $css));
        suAsset::addFile('css', 'progress-pie.css', __FUNCTION__);
        
        suAsset::addFile('js', 'jquery.appear.js');
        suAsset::addFile('js', 'jquery.asPieProgress.min.js', __FUNCTION__);
        suAsset::addString('js', implode("\n", $js));
        suAsset::addFile('js', 'progress-pie.js', __FUNCTION__);

        $return[] = '<div id="'.$id.'" class="'.su_acssc($classes).'" role="progressbar" data-goal="'.$atts['percent'].'" aria-valuemin="0" data-step="'.$atts['step'].'" data-speed="'.($atts['duration']*15).'" data-delay="'.($atts['delay']*1000).'" data-barsize="'.intval($atts['line_width']).'" aria-valuemax="100">';
        
            $return[] = '<div class="su-progress-pie-label">';
                $return[] = $atts['before'];

                if ($atts['text']) {
                    $return[] = $atts['text'];
                } else {
                    $return[] = '<div class="su-progress-pie-number"></div>';
                }

                $return[] = $atts['after'];

            $return[] ='</div>';        

        $return[] = '</div>';

        return implode("\n", $return);
    }
}
