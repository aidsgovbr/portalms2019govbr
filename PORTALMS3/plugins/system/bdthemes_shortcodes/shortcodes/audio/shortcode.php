<?php

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_audio extends Su_Shortcodes {

    function __construct() {
        parent::__construct();
    }

    public static function audio($atts = null, $content = null) {
        $atts = su_shortcode_atts(array(
            'id'            => uniqid('suap'),
            'style'         => 'dark',
            'url'           => false,
            'width'         => '100%',
            'title'         => '',
            'autoplay'      => 'no',
            'volume'        => 50,
            'loop'          => 'no',
            'scroll_reveal' => '',
            'class'         => ''
        ), $atts, 'audio');

        // Audio URL check
        if (!$atts['url'])
            return su_alert_box(JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_AUDIO_CU'), 'warning');
        
        $atts['url'] = su_scattr($atts['url']);

       
        $width = ( $atts['width'] !== 'auto' ) ? 'max-width:' . $atts['width'] : '';

        // Add CSS file in head
        suAsset::addFile('css', 'jplayer.skin.css');
        suAsset::addFile('js', 'jplayer.js');
        suAsset::addFile('js', 'audio.js', __FUNCTION__);  

        // Output HTML
        $output = '<div id="' . $atts['id'] . '_container"'.su_scroll_reveal($atts).' class="su-audio' . su_ecssc($atts) . ' jPlayer audioPlayer jPlayer-'.$atts['style'].'" data-id="' . $atts['id'] . '" data-audio="'.image_media($atts['url']) . '" data-swf="' . BDT_SU_URI . '/other/jplayer.swf'. '" data-title="' . $atts['title'] . '" data-autoplay="' . $atts['autoplay'] . '" data-volume="' . $atts['volume'] . '" data-loop="' . $atts['loop'] . '">
                        <div class="playerScreen">
                            <div id="' . $atts['id'] . '" class="jPlayer-container"></div>
                        </div>
                        <div class="controls">
                            <div class="controlset left">
                                <a tabindex="1" href="#" class="play smooth"><i class="fa fa-play"></i></a>
                                <a tabindex="1" href="#" class="pause smooth"><i class="fa fa-pause"></i></a>
                            </div>
                            <div class="controlset right-volume">
                                <a tabindex="1" href="#" class="mute smooth"><i class="fa fa-volume-up"></i></a>
                                <a tabindex="1" href="#" class="unmute smooth"><i class="fa fa-volume-off"></i></a>
                            </div>
                            <div class="volumeblock">
                                <div class="volume-control"><div class="volume-value"></div></div>
                            </div>
                            <div class="jpprogress-block">
                                <div class="timer current"></div>
                                <div class="timer duration"></div>
                                <div class="jpprogress">
                                    <div class="seekBar">
                                        <div class="playBar"></div>
                                    </div>
                                </div>
                            </div>
         
                        </div>
                    </div>';

        return $output;
    }
}
