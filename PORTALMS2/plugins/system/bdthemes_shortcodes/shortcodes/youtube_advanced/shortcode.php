<?php

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_youtube_advanced extends Su_Shortcodes {

    function __construct() {
        parent::__construct();
    }   
  

    public static function youtube_advanced($atts = null, $content = null) {

        $return = array();
        $params = array();
        $atts = su_shortcode_atts(array(
                'url'            => false,
                'playlist'       => '',
                'width'          => 600,
                'height'         => 400,
                'responsive'     => 'yes',
                'autohide'       => 'alt',
                'autoplay'       => 'no',
                'controls'       => 'yes',
                'loop'           => 'no',
                'fs'             => 'yes',
                'modestbranding' => 'no',
                'rel'            => 'yes',
                'theme'          => 'dark',
                'wmode'          => '',
                'showinfo'       => 'yes',
                'scroll_reveal'  => '',
                'class'          => ''
            ), $atts, 'youtube_advanced' );

        if (!$atts['url'])
            return su_alert_box(JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_YOUTUBE_CU'), 'warning');

        $atts['url'] = su_scattr($atts['url']);
        $id = (preg_match( '%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $atts['url'], $match ) ) ? $match[1] : false;
        
        if (!$id)
            return su_alert_box(JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_YOUTUBE_CI'), 'warning');

        if ($atts['playlist']) {
            $playlist = 'playlist='.$atts['playlist'].'&';
        }
        else {
            $playlist = (preg_match('%(?:list=([a-zA-Z0-9-_]+))%i', $atts['url'], $listid)) ? 'list='. $listid[1] .'&' : ''; 
        }


        // Prepare params
        foreach (array('autohide', 'autoplay', 'controls', 'fs', 'loop', 'modestbranding', 'rel', 'showinfo', 'theme', 'wmode' ) as $param ) 
            $params[$param] = str_replace( array( 'no', 'yes', 'alt' ), array( '0', '1', '2' ), $atts[$param] );

        // Correct loop
        if ($params['loop'] === '1' && $atts['playlist'] === '' ) $params['playlist'] = $id;

        // Prepare protocol
        $protocol = ( preg_match( '/^(https?:\\/\\/)/i', $atts['url'], $match ) ) ? $match[1] : "http://";



        // Prepare player parameters
        $params = http_build_query( $params );

        $attributes = 'width="' . $atts['width'] . '" height="' . $atts['height'] . '" allowfullscreen';
        $url = $protocol . 'www.youtube.com/embed/' . $id . '?' .$playlist. $params;

        // Create player
        $return[] = '<div'.su_scroll_reveal($atts).' class="su-youtube su-responsive-media-' . $atts['responsive'] . su_ecssc( $atts ) . '">';
        $return[] = jHtml::iframe($url, 'su-youtube-advanced', $attributes);
        $return[] = '</div>';

        suAsset::addFile('css', 'youtube_advanced.css', __FUNCTION__);

        return implode('', $return);
    }
}
