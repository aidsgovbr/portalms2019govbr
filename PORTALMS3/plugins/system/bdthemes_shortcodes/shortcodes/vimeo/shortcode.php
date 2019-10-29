<?php

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_vimeo extends Su_Shortcodes {

    function __construct() {
        parent::__construct();
    }   
    public static function vimeo($atts = null, $content = null) {

        $return = array();
        $atts = su_shortcode_atts(array(
            'url'           => false,
            'width'         => 600,
            'height'        => 400,
            'loop'          => 'no',
            'autoplay'      => 'no',
            'responsive'    => 'yes',
            'scroll_reveal' => '',
            'class'         => ''
        ), $atts, 'vimeo');

        if (!$atts['url'])
            return su_alert_box(JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_VIMEO_CU'), 'warning');
        $atts['url'] = su_scattr($atts['url']);
        $id = ( preg_match('~(?:<iframe [^>]*src=")?(?:https?:\/\/(?:[\w]+\.)*vimeo\.com(?:[\/\w]*\/videos?)?\/([0-9]+)[^\s]*)"?(?:[^>]*></iframe>)?(?:<p>.*</p>)?~ix', $atts['url'], $match) ) ? $match[1] : false;
        if (!$id)
            return su_alert_box(JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_VIMEO_CI'), 'warning');

        $autoplay = ( $atts['autoplay'] === 'yes' ) ? '&amp;autoplay=1' : '';
        $loop = ( $atts['loop'] === 'yes' ) ? '&amp;loop=1' : '';
       
        $return[] = '<div'.su_scroll_reveal($atts).' class="su-vimeo su-responsive-media-' . $atts['responsive'] . su_ecssc( $atts ) . '">';
        $return[] = '<iframe width="' . $atts['width'] . '" height="' . $atts['height'] . '" src="//player.vimeo.com/video/' . $id . '?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff' . $autoplay . $loop . '" allowfullscreen></iframe>';
        $return[] = '</div>';

        suAsset::addFile('css', 'vimeo.css', __FUNCTION__);

        return implode('', $return);
    }
}
