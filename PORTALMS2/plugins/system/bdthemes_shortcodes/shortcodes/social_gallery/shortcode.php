<?php

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined('_JEXEC') or die;

class Su_Shortcode_social_gallery extends Su_Shortcodes {

    function __construct() {
        parent::__construct();
    }

    public static function social_gallery($atts = null, $content = null) {

        $config = JFactory::getConfig();
        
        $atts = su_shortcode_atts(array(
            'link_type'           => 'popup', // link, popup
            
            'instagram_id'        => '',
            'instagram_name'      => 'Instagram Photos',
            'instagram_token'     => '',
            
            'facebook_album_url'  => 'https://www.facebook.com/media/set/?set=a.10153495891665541.1073741843.76810820540&type=3',
            'facebook_album_name' => "Facebook Album Photos",
            'facebook_token'      => '',
            
            'google_api'          => '',
            'google_user_url'     => 'https://plus.google.com/115903745545816833607',
            'google_user_name'    => 'Google User Photos',
            
            'limit'               => 15,
            'load_more'           => 'no',
            
            'header_title'        => $config->get( 'sitename' ), 
            'header_sub_title'    => "Your subtitle here", 
            'header_image'        => BDT_SU_IMG."bdthemes-logo-round.svg", 
            'header_bg_image'     => BDT_SU_IMG."fabric.png", 
            'header_link'         => "https://bdthemes.com", 
            'google_plus_link'    => "https://plus.google.com/+BdThemes", 
            'twitter_link'        => "http://twitter.com/bdthemescom", 
            'facebook_link'       => "http://facebook.com/bdthemes",  
            
            'scroll_reveal'       => '',
            'class'               => ''
        ), $atts, 'social_gallery');


        $id                      = uniqid('susg');
        $css                     = array();
        $js                      = array();
        $load_more               = ( $atts["load_more"] == 'no' ) ? false : true;
        $plugin                  = JPluginHelper::getPlugin('system', 'bdthemes_shortcodes');
        $params                  = new JRegistry($plugin->params);
        $atts['instagram_id']    = ($atts['instagram_id']) ? $atts['instagram_id'] : $params->get('instagram_id');
        $atts['instagram_token'] = ($atts['instagram_token']) ? $atts['instagram_token'] : $params->get('instagram_token');
        $atts['facebook_token']  = ($atts['facebook_token']) ? $atts['facebook_token'] : $params->get('facebook_token');
        $atts['google_api']      = ($atts['google_api']) ? $atts['google_api'] : $params->get('google_api');
        $ig_settings             = array();
        $gp_settings             = array();
        $fb_settings             = array();
        $global_settings         = array();
        $settings                = array();

        
        if (isset($atts['instagram_token'])) {
            $ig_settings = array(
                'instagramAccessToken'  => $atts['instagram_token'],
                'instagram_user_photos' => array (
                    array (
                        'url'      => 'https://www.instagram.com/'.$atts['instagram_id'],
                        'name'     => $atts['instagram_name'],
                        'selected' => true
                    )
                )
            );
        }

        if (isset($atts['google_api'])) {
            $gp_settings = array(
                'googleApiKey'       => $atts['google_api'],
                'google_user_photos' => array (
                    array (
                        'url'      => $atts['google_user_url'],
                        'name'     => $atts['google_user_name'],
                        'selected' => false
                    )
                )
            );
        }

        if (isset($atts['facebook_token'])) {
            $fb_settings = array(
                'facebookAccessToken'   => $atts['facebook_token'],
                'facebook_album_photos' => array (
                    array (
                        'url'      => $atts['facebook_album_url'],
                        'name'     => $atts['facebook_album_name'],
                        'selected' => false
                    )
                )
            );
        }

        $global_settings = array(
            'overlayType'            => "view", // view,link,view-link,stat-1,stat-2,desc,stat-1-desc,stat-2-desc,date,desc-date,none
            'displayType'            => $atts['link_type'],

            'maxResults'             => intval($atts['limit']),
            'maxContainerWidth'      => 1200,
            'photoProtocol'          => 'https',
            'alignPopupToTop'        =>  true,

            'hideLoadMore'           =>  $load_more,
            'hideHeader'             => false,
            'hideNavigation'         => false,

            'showTextInsteadOfIcons' => true,
            'loadButtonSize'         => "small",                          

            'thumbnailDescription'   => "max-2",

            'tabStyle'               => "block",

            'headerTitle'            => $atts['header_title'],
            'headerSubTitle'         => $atts['header_sub_title'],
            'headerImage'            => $atts['header_image'],
            'headerBackgroundImage'  => $atts['header_bg_image'],
            'headerLink'             => $atts['header_link'],
            'googlePlusLink'         => $atts['google_plus_link'],
            'twitterLink'            => $atts['twitter_link'],
            'facebookLink'           => $atts['facebook_link'],
        );


        $settings = array_merge($ig_settings, $gp_settings, $gp_settings, $fb_settings, $global_settings);


        $js[] = '
            jQuery(document).ready(function($) {
                $(".su-social_gallery").photomax('.json_encode($settings).');
            });
        ';
        
        suAsset::addString('js', implode("\n", $js));
        
        suAsset::addFile('css', 'magnific-popup.css');
        suAsset::addFile('js', 'magnific-popup.js'); 
        
        suAsset::addFile('css', 'photomax_trend.min.css');
        suAsset::addFile('css', 'instagram.css', __FUNCTION__);
        suAsset::addFile('js', 'jquery.photomax.min.js');

        return '<div class="su-social_gallery ' . su_ecssc($atts) . '"'.su_scroll_reveal($atts).'>' . su_do_shortcode($content) . '</div>';
    }
}