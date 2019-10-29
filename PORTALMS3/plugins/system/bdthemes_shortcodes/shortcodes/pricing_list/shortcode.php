<?php

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_pricing_list extends Su_Shortcodes {

    static $pricing_list      = array();
    static $super_tab_count = -1;

    function __construct() {
        parent::__construct();
    }   

    public static function pricing_list($atts = null, $content = null) {
        $atts = su_shortcode_atts(array(
            'id'            => uniqid('suibm_'),
            'style'         => 'default',   // default, striped 
            'space'         => '10',
            'scroll_reveal' => '',
            'class'         => ''
            ), $atts, 'pricing_list');

        $output           = array();
        $pricing_list       = array();
        $id               = $atts['id'];
        $css       = [];

        $css[] = '#'.$id.' .pricing-list li:nth-child(n+2) { margin-top: '.$atts['space'].'px;}';
        $css[] = '#'.$id.'.style-default .pricing-list li:nth-child(n+2) { padding-top: '.$atts['space'].'px;}';

        $space = ($atts['space'] != 'no') ? ' uk-list-large' : '';

        $classes = ['su-pricing-list', $atts['class'],'style-'.$atts['style'] ];

        $output[] = '
            <div id="'.$id.'" '.su_scroll_reveal($atts).' class="'. su_acssc($classes) . '">
                <ul class="pricing-list">';       
        $output[] = has_child_shortcode($content, 's');
        $output[] = '</ul></div>';

        suAsset::addString('css', implode("\n", $css));
        return implode("\n", $output);
    }
}
