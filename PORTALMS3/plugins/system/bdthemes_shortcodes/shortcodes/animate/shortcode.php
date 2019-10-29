<?php

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_animate extends Su_Shortcodes {

    function __construct() {
        parent::__construct();
    }

    public static function animate($atts = null, $content = null) {
        $atts = su_shortcode_atts(array(
            'type'     => 'bounceIn',
            'duration' => 1,
            'delay'    => 0,
            'inline'   => 'no',
            'class'    => ''
        ), $atts, 'animate');

        $id = uniqid('sua');

        $inline = ( $atts['inline'] === 'yes' ) ? ' display: inline-block;' : '';
        $style = array(
            'duration' => array(),
            'delay'    => array()
        );

        // CSS Prefix manage
        foreach (array('-webkit-', '-moz-', '-ms-', '-o-', '') as $vendor) {
            $style['duration'][] = $vendor . 'animation-duration:' . $atts['duration'] . 's';
            $style['delay'][]    = $vendor . 'animation-delay:' . $atts['delay'] . 's';
        }

        // Get Css in $css variable
        $css = '#'.$id.' {visibility:hidden;' .$inline . implode(';', $style['duration']) . ';' . implode(';', $style['delay']) .'}';
        
        // Add CSS in head
        suAsset::addString('css', $css);

        // Add CSS file in head
        suAsset::addFile('css', 'animate.css');
        suAsset::addFile('js', 'jquery.appear.js');
        suAsset::addFile('js', 'animate.js', __FUNCTION__);

        // Output HTML
        $output = '<div id="'. $id .'" class="su-animate ' .su_ecssc($atts) . '" data-animation="'. $atts['type'] .'">'. su_do_shortcode($content) .'</div>';
        return $output;
    }
}
