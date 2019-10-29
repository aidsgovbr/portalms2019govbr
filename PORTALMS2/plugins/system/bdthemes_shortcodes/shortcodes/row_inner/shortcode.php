<?php 

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_row_inner extends Su_Shortcodes {

    function __construct() {
        parent::__construct();
    }   
    public static function row_inner($atts = null, $content = null) {
        $atts = su_shortcode_atts(array(
            'gutter'              => '',
            'divider'             => 'no',
            'divider_color'       => '',
            'column_margin_small' => 'yes',
            'margin_top'          => 'no',
            'equal_height'        => 'no',
            'scroll_reveal'       => '',
            'class'               => ''
        ), $atts);

        $id                  = uniqid('surow');
        $divider             = ($atts['divider'] === 'yes') ? 'has-divider' : '' ;
        $margin_top          = ($atts['margin_top'] === 'yes') ? 'margin-top-yes' : '' ;
        $column_margin_small = ($atts['column_margin_small'] === 'yes') ? 'su-clmms-yes' : '' ;
        $gutter              = ($atts['gutter']) ? 'su-gutter-'.$atts['gutter'] : '' ;
        $classes             = array('su-row', $margin_top, $column_margin_small, $divider, $gutter, su_ecssc($atts));

        // Equal height matching script for better equal height ouput
        if ($atts['equal_height'] === 'yes') {
            $classes[] = 'su-match-height';
            suAsset::addFile('js', 'jquery.matchHeight.min.js');

            $js = 'jQuery(document).ready(function($) {
                        \'use strict\';
                        $("#'.$id.' .su-column > .su-column-inner").matchHeight();
                    });';
            suAsset::addString('js', $js);
        }
        
        return '<div id="'.$id.'"'.su_scroll_reveal($atts).' class="'.su_acssc($classes).'">' . su_do_shortcode($content) . '</div>';
    }
}
