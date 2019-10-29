<?php

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_flip_front extends Su_Shortcodes {

    function __construct() {
        parent::__construct();
    }
    public static function flip_front($atts = null, $content = null) {
        $atts = su_shortcode_atts(array(
        'background' => '#ffffff',
        'color'      => '#444',
        'border'     => 'none',
        'shadow'     => 'none',
        'radius'     => '0px',
        'text_align' => 'center',
        'padding'     => '15px',
        'class'      => ''
            ), $atts, 'flip_front');    

        return '<div class="front-flip_box' . su_ecssc($atts) . '"
        style="background-color:' . $atts['background']. ';
        color:' . $atts['color'] .';
        border:' . $atts['border'] .';
        box-shadow:'.$atts['shadow'].';
        border-radius:'.$atts['radius'].';
        text-align:'.$atts['text_align'].';
        padding:'.$atts['padding'].';
        ">' . su_do_shortcode($content) . '</div>';
    }

}
