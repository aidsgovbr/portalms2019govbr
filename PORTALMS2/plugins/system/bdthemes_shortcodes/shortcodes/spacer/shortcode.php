<?php

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_spacer extends Su_Shortcodes {

    function __construct() {
        parent::__construct();
    }   
    public static function spacer($atts = null, $content = null) {
        $atts = su_shortcode_atts(array(
            'size'   => '',
            'medium' => '',
            'small'  => '',
            'class'  => ''
        ), $atts, 'spacer');

        $class   = uniqid('sus');
        $classes = array('su-spacer', $class, su_ecssc($atts));
        $css     = array();

        if ($atts['size'] != '') {
            $atts['size'] = (is_numeric($atts['size'])) ? $atts['size'] .'px' : $atts['size'];
            $css[]        = '.'.$class.'.su-spacer{height:'.$atts['size'].';}';
        }
        if ($atts['medium'] != '') {
            $atts['medium'] = (is_numeric($atts['medium'])) ? $atts['medium'] .'px' : $atts['medium'];
            $css[]          = '@media only screen and (min-width: 768px) and (max-width: 960px) {.'.$class.'.su-spacer {height:'.$atts['medium'].';}}';
        }
        if ($atts['small'] != '') {
            $atts['small'] = (is_numeric($atts['small'])) ? $atts['small'] .'px' : $atts['small'];
            $css[]         = '@media (max-width: 767px) {.'.$class.'.su-spacer {height:'.$atts['small'].';}}';
        }

        suAsset::addString('css', implode("\n", $css));
        suAsset::addFile('css', 'spacer.css', __FUNCTION__);
        
        return '<div class="'.su_acssc($classes).'"></div>';
    }
}
