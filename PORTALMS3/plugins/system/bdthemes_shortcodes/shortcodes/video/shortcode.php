<?php

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_video extends Su_Shortcodes {

    function __construct() {
        parent::__construct();
    } 
      
    public static function video($atts = null, $content = null) {
        $atts = su_shortcode_atts(array(
            'style'         => 'dark',
            'url'           => false,
            'poster'        => false,
            'title'         => '',
            'width'         => 600,
            'height'        => 300,
            'controls'      => 'yes',
            'autoplay'      => 'no',
            'volume'        => 50,
            'loop'          => 'no',
            'scroll_reveal' => '',
            'class'         => ''
                ), $atts, 'video');

        $atts['url'] = su_scattr($atts['url']);
        $id = uniqid('su_video_player_');

        if (!$atts['url']) return su_alert_box(JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_VIDEO_CU'), 'warning');

        $classes = array('su-video', 'jPlayer-'.$atts['style'], 'su-video-controls-' . $atts['controls'], su_ecssc($atts), 'jPlayer');

        $title = ( $atts['title'] ) ? '<div class="jplayer-title">' . $atts['title'] . '</div>' : '';
        suAsset::addFile('css', 'jplayer.skin.css');
        suAsset::addFile('js', 'jplayer.js');
        suAsset::addFile('js', 'video.js', __FUNCTION__);

        return '<div id="' . $id . '_container"'.su_scroll_reveal($atts).' class="'.su_acssc($classes).'" data-id="' . $id . '" data-video="'.image_media($atts['url']) . '" data-poster="' . image_media($atts['poster']) . '" data-volume="' . $atts['volume'] . '" data-title="' . $atts['title'] . '" data-swf="' . (BDT_SU_URI . '/other/jplayer.swf') . '" data-autoplay="' . $atts['autoplay'] . '" data-loop="' . $atts['loop'] . '">
                    <div class="playerScreen">
                        <div id="' . $id . '" class="jPlayer-container"></div>'.$title.'
                        <a tabindex="1" href="#" class="video-play"><div class="play-icon"><i class="fa fa-play-circle-o"></i></div></a>
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
                        <div class="controlset right">
                            <a href="#" tabindex="1" class="fullscreen smooth"><i class="fa fa-expand"></i></a>
                            <a href="#" tabindex="1" class="smallscreen smooth"><i class="fa fa-compress"></i></a>
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
    }
}
