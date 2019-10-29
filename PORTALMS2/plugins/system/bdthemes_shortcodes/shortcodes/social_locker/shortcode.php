<?php

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_social_locker extends Su_Shortcodes {

    function __construct() { parent::__construct(); }

    public static function social_locker($atts = null, $content = null) {
        $atts = su_shortcode_atts(array(
            'id'                 => uniqid('suf'),
            'style'              => 'starter', //starter, secrets, dandyish, glass, flat
            'title'              => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SL_LOCKED'),
            'message'            => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SL_LOCKED_MSG'),
            'timer'              => 0,
            'close'              => 'no',
            'mobile'             => 'no',
            'demo_mode'          => 'no',
            'guest_only'         => 'no',
            'facebook'           => 'yes',
            'google_plus'        => 'yes',
            'twitter'            => 'yes',
            'linkedin'           => 'no',
            'twitter_follow'     => 'no',
            'overlap'            => 'full', // full, transparence, blurring
            'url'                => '',
            'button_mode'        => 'like',  // like, share
            'facebook_app_id'    => '',
            'scroll_reveal'      => '',
            'class'              => ''
                ), $atts, 'social_locker');
  
        $return                     = array();
        $current_url                = JURI::current();
        $active                     = 1;
        $button                     = array();
        $plugin                     = JPluginHelper::getPlugin('system', 'bdthemes_shortcodes');
        $params                     = new JRegistry($plugin->params);
        
        $atts['facebook_app_id']    = ($atts['facebook_app_id']) ? $atts['facebook_app_id'] : $params->get('facebook_app_id');
        
        if ($atts['facebook'] === 'yes') 
            $button[] = ($atts['button_mode'] === 'share') ? 'facebook-share' : 'facebook-like';
        if ($atts['google_plus'] === 'yes')
            $button[] = ($atts['button_mode'] === 'share') ? 'google-share' : 'google-plus';
        if ($atts['twitter'] === 'yes')
            $button[] = 'twitter-tweet';
        if ($atts['linkedin'] === 'yes')
            $button[] = 'linkedin-share';
        if ($atts['twitter_follow'] === 'yes')
            $button[] = 'twitter-follow';

        if ($atts['guest_only'] === 'yes') {
            $guest = JFactory::getUser();
            $active = (!$guest->guest) ? 0 : 1;    
        }
        $settings = array(
            'url' => ($atts['url']) ? urlencode($atts['url']) : urlencode($current_url),
            'theme' => $atts['style'],
            'text' => array(
                    'header' => $atts['title'],
                    'message' => $atts['message']
                    ),
            'locker' => array(
                    'close' => ($atts['close'] === 'yes') ? true : false,
                    'timer' => $atts['timer'],
                    'mobile' => ($atts['mobile'] === 'yes') ? true : false
                ),
            'overlap' => array(
                    'mode' => $atts['overlap'],
                    'intensity'=> 5
                ),
            'buttons' => array(
                    'order' => $button
                    ),
            'demo' => ($atts['demo_mode'] === 'yes') ? true : false
        );

        if ($atts['facebook_app_id']) {
            $fb_appid = array(
                'facebook' => array(
                    'appId' => $atts['facebook_app_id']
                )
            );
            $settings = array_merge($settings, $fb_appid);
        }

        $js = '
            jQuery(document).ready(function($) {
                "use strict";
                $("#'. $atts['id'] .'.su-social-lock").sociallocker(
                    '.json_encode($settings).'
                );
            });
        ';

        if ( $active && !is_null( $content ) ) {
            $return[] = '<div id="'. $atts['id'] . '"'.su_scroll_reveal($atts).' class="su-social-lock '.su_ecssc($atts). '">';
            $return[] = su_do_shortcode($content);
            $return[] = '</div>';
            
            suAsset::addFile('css', 'pandalocker.min.css', __FUNCTION__);
            suAsset::addFile('js', 'pandalocker.min.js', __FUNCTION__);
            suAsset::addString('js', $js);
        }
        else {
            $return[] = su_do_shortcode($content);
        }

        return implode("\n", $return);
    }   
}
