<?php 

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_switcher_item extends Su_Shortcodes {

    function __construct() {
        parent::__construct();
    }   
    public static function switcher_item($atts = null, $content = null) {
        $atts = su_shortcode_atts(array(
            'title'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SWITCHER_ITEM_TITLE'),
            'icon'     => '',
            'padding'  => '50px 20px',
            'margin'   => '30px 0 0 0',
            'class'    => ''
        ), $atts, 'switcher_item');

        if ($atts['icon']) {
            $atts['icon'] = su_get_icon($atts['icon']);
        }
        else {
            $atts['icon'] = '<i class="fa noicon"></i>';
        }

        $x = Su_Shortcode_switcher::$switcher_item_count;

        Su_Shortcode_switcher::$switcher[$x] = array(
            'title'            => $atts['title'],
            'icon'             => $atts['icon'],
            'padding'          => $atts['padding'],
            'margin'           => $atts['margin'],
            'content'          => su_do_shortcode($content),
            'class'            => $atts['class']
        );

        Su_Shortcode_switcher::$switcher_item_count++;

        if (@$_REQUEST["action"] == 'su_generator_preview') {
            return su_alert_box(JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SWITCH_NOT_PREVIEW'), 'warning');
        }
    }
}
