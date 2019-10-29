<?php

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_icon_box_modern extends Su_Shortcodes {

    static $icon_box_modern      = array();
    static $super_tab_count = -1;

    function __construct() {
        parent::__construct();
    }   

    public static function icon_box_modern($atts = null, $content = null) {
        $atts = su_shortcode_atts(array(
            'id'            => uniqid('suibm_'),
            'column'         => '3',
            'style'         => '1',
            'scroll_reveal' => '',
            'class'         => ''
            ), $atts, 'icon_box_modern');

        $output           = array();
        $icon_box_modern       = array();
        $id               = $atts['id'];

        $classes = [ $atts['class'], 'icon-box-modern-wrap', 'style-'.$atts['style'] ];

        $output[] = '
            <div id="'.$id.'" '.su_scroll_reveal($atts).' class="'. su_acssc($classes) . '">
                <ul class="icon-box-modern child-width-1-'.$atts['column'].'">';       
        $output[] = has_child_shortcode($content, 's');
        $output[] = '</ul></div>';

        suAsset::addFile('css', 'icon-box-modern.css');
        return implode("\n", $output);
    }
}
