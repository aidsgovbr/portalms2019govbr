<?php 

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_add_code extends Su_Shortcodes {

    function __construct() {
        parent::__construct();
    }
    
    public static function add_code($atts = null, $content = null) {
        $atts = su_shortcode_atts(array(
            'type'       => 'css',
            'url' => ''
        ), $atts, 'add_code');

        if (@$_REQUEST["action"] == 'su_generator_preview') {
            return JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ADD_CODE_ERROR');
        }  

        if ($content != NULL && $content != '') {
            suAsset::addString($atts['type'], $content);
        }

        if ($atts['url'] != '' && $atts['type'] == 'css') {
            JFactory::getDocument()->addStyleSheet($atts['url']);
        } elseif ($atts['url'] != '' && $atts['type'] == 'js') {
            JFactory::getDocument()->addScript($atts['url']);
        } 
        return false;
    }

}
