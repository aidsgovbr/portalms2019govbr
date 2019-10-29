<?php

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_screenr extends Su_Shortcodes {

    function __construct() {
        parent::__construct();
    }   

    public static function screenr($atts = null, $content = null) {

        $return = array();
        $atts = su_shortcode_atts(array(
            'url'           => false,
            'width'         => 600,
            'height'        => 400,
            'responsive'    => 'yes',
            'scroll_reveal' => '',
            'class'         => ''
                ), $atts, 'screenr');
        if (!$atts['url'])
            return su_alert_box(JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SCREENR_CU'), 'warning');
        $atts['url'] = su_scattr($atts['url']);
        $id = ( preg_match('~(?:<iframe [^>]*src=")?(?:https?:\/\/(?:[\w]+\.)*screenr\.com(?:[\/\w]*\/videos?)?\/([a-zA-Z0-9]+)[^\s]*)"?(?:[^>]*></iframe>)?(?:<p>.*</p>)?~ix', $atts['url'], $match) ) ? $match[1] : false;

        if (!$id)
            return su_alert_box(JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SCREENR_CI'), 'warning');

        $return[] = '<div'.su_scroll_reveal($atts).' class="su-screenr su-responsive-media-' . $atts['responsive'] . su_ecssc($atts) . '">';
        $return[] = '<iframe width="' . $atts['width'] . '" height="' . $atts['height'] .
                '" src="http://screenr.com/embed/' . $id . '" allowfullscreen></iframe>';
        $return[] = '</div>';
        suAsset::addFile('css', 'screenr.css', __FUNCTION__);


        return implode('', $return);
    }
}
