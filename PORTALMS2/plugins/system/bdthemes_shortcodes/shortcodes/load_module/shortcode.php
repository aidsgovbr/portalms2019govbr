<?php 

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_load_module extends Su_Shortcodes {

    function __construct() {
        parent::__construct();
    }
    public static function load_module($atts = null, $content = null) {
        $atts = su_shortcode_atts(array(
            'id'            => '',
            'scroll_reveal' => '',
            'class'         => ''
            ), $atts, 'load_module');

            $module_class = 0;
            $module_style = 'round';
            $module_id    = $atts['id'];
        if (is_numeric($module_id)) {
            return '<div'.su_scroll_reveal($atts).' class="su-load-module">'. su_load_module($module_id, $module_class, $module_style) . '</div>';
        } else {
            return su_alert_box(JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MODULE_ERROR'), 'warning');
        }
    }
}
