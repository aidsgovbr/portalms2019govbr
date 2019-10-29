<?php 

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_table extends Su_Shortcodes {

    function __construct() {
        parent::__construct();
    }   
    public static function table($atts = null, $content = null) {
        $atts = su_shortcode_atts(array(
            'url'           => false,
            'scroll_reveal' => '',
            'class'         => ''
                ), $atts, 'table');
        $return = '<div'.su_scroll_reveal($atts).' class="su-table' . su_ecssc($atts) . '">';
        $return .= ( $atts['url'] ) ? su_parse_csv($atts['url']) : su_do_shortcode($content);
        $return .= '</div>';

        suAsset::addFile('css', 'table.css', __FUNCTION__);
        suAsset::addFile('js', 'table.js', __FUNCTION__);
        
        return $return;
    }
}
