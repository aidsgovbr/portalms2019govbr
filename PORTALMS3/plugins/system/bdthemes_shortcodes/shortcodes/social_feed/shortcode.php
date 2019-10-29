<?php 

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_social_feed extends Su_Shortcodes {

    function __construct() {
        parent::__construct();
    }
    
    public static function social_feed($atts = null, $content = null) {
        $atts = su_shortcode_atts(array(
            'width'           => 320,
            'height'          => 480,
            'active_tab'      => 'facebook',
            'order'           => '',
            'limit'           => 10,
            'position'        => 'default',
            'link_text'       => '',
            
            'facebook'        => 'yes',
            'facebook_id'     => '',
            'facebook_token'  => '',
            
            'instagram'       => 'yes',
            'instagram_id'    => '',
            'instagram_token' => '',
            
            'pinterest'       => 'yes',
            'pinterest_id'    => '',
            
            'twitter'         => 'yes',
            'twitter_id'      => '',
            'consumer_key'    => '',
            'consumer_secret' => '',
            
            'vkontakte'       => 'yes',
            'vkontakte_id'    => '',
            
            'scroll_reveal'   => '',
            'class'           => ''
        ), $atts, 'social_feed');

        // Initioal Variables
        $id         = uniqid('susf');
        $return     = array();
        $css        = array();
        $js         = array();
        $fb_setting = array();
        $ig_setting = array();
        $pt_setting = array();
        $tt_setting = array();
        $vk_setting = array();
        $lr_fixed   = '';
        $lr_class   = '';
        $available  = array();
        $plugin     = JPluginHelper::getPlugin('system', 'bdthemes_shortcodes');
        $params     = new JRegistry($plugin->params);

        // checking plugin setting params value if exist
        $atts['facebook_id']     = ($atts['facebook_id']) ? $atts['facebook_id'] : $params->get('facebook_id');
        $atts['facebook_token']  = ($atts['facebook_token']) ? $atts['facebook_token'] : $params->get('facebook_token');
        $atts['instagram_id']    = ($atts['instagram_id']) ? $atts['instagram_id'] : $params->get('instagram_id');
        $atts['instagram_token'] = ($atts['instagram_token']) ? $atts['instagram_token'] : $params->get('instagram_token');
        $atts['pinterest_id']    = ($atts['pinterest_id']) ? $atts['pinterest_id'] : $params->get('pinterest_id');
        $atts['twitter_id']      = ($atts['twitter_id']) ? $atts['twitter_id'] : $params->get('twitter_id');
        $atts['consumer_key']    = ($atts['consumer_key']) ? $atts['consumer_key'] : $params->get('twitter_consumer_key');
        $atts['consumer_secret'] = ($atts['consumer_secret']) ? $atts['consumer_secret'] : $params->get('twitter_consumer_secret');
        $atts['vkontakte_id']    = ($atts['vkontakte_id']) ? $atts['vkontakte_id'] : $params->get('vkontakte_id');

        $settings = array(
            'width'     => $atts['width'],
            'height'    => $atts['height']           
        );

        if ($atts['facebook_id'] and $atts['facebook_token']) {
            $fb_setting = array(
                'facebook' => array(
                    'account' => $atts['facebook_id'],
                    'token'   => $atts['facebook_token'],
                    'limit'   => $atts['limit'],
                    'disable' => array("thumbnail", "date", "name"),
                    'linkText'  => $atts['link_text']
                )
            );
            $available[] = ($atts['facebook'] === 'yes') ? 'facebook' : null;
        }

        if ($atts['twitter_id'] and $atts['consumer_key'] and $atts['consumer_secret']) {
            $tt_setting = array(
                'twitter' => array(
                    'account'         => $atts['twitter_id'],
                    'consumer_key'    => $atts['consumer_key'],
                    'consumer_secret' => $atts['consumer_secret'],
                    'limit'           => $atts['limit'],
                    'disable'         => array("thumbnail", "date", "name")
                )
            );
            $available[] = ($atts['twitter'] === 'yes') ? 'twitter' : null;
        }

        if ($atts['instagram_id'] and $atts['instagram_token']) {
            $ig_setting = array(
                'instagram' => array(
                    'account'      => $atts['instagram_id'],
                    'access_token' => $atts['instagram_token'],
                    'limit'        => $atts['limit'],
                    'disable'      => array("thumbnail", "date", "name")
                )
            );
            $available[] = ($atts['instagram'] === 'yes') ? 'instagram' : null;
        }

        if ($atts['vkontakte_id']) {
            $vk_setting = array(
                'vkontakte' => array(
                    'account' => $atts['vkontakte_id'],
                    'limit'   => $atts['limit'],
                    'disable' => array("thumbnail", "date", "name")
                )
            );
            $available[] = ($atts['vkontakte'] === 'yes') ? 'vkontakte' : null;
        }

        if ($atts['pinterest_id']) {
            $pt_setting = array(
                'pinterest' => array(
                    'account' => $atts['pinterest_id'],
                    'limit'   => $atts['limit'],
                    'disable' => array("thumbnail", "name")
                )
            );
            $available[] = ($atts['pinterest'] === 'yes') ? 'pinterest' : null;
        }

        $av_setting = array(
            'available' =>  ($atts['order']) ? array(strtolower($atts['order'])) : $available   
        );

        $at_setting = array(
            'enabled' =>  $atts['active_tab']  
        );

        if ($atts['position'] === 'left' or $atts['position'] === 'right') {
            $lr_fixed = 'jQuery("#'.$id.'").appendTo(document.body);';
            $lr_class = ' su-social-feed--' . $atts['position'];
        }
        
        $js[] = '   
                jQuery(document).ready(function($){
                    jQuery("#'.$id.'").socialTimeLine(
                        '.json_encode(array_merge($settings, $av_setting, $at_setting, $fb_setting, $tt_setting, $ig_setting, $vk_setting, $pt_setting)).'
                        );
                    '.$lr_fixed.'
                });

        ';

        

        suAsset::addFile('css', 'social-feed.css', __FUNCTION__);
        suAsset::addFile('js', 'moment.min.js', __FUNCTION__);
        suAsset::addFile('js', 'codebird.js', __FUNCTION__);
        suAsset::addFile('js', 'social-widgets.js', __FUNCTION__);

        // Add CSS in head
        suAsset::addString('js', implode("\n", $js));

        // Output HTML
        $return[] = '<div id="'.$id.'"'.su_scroll_reveal($atts).' class="su-social-feed' .$lr_class . su_ecssc($atts) . '"></div>';

        return implode("\n", $return);
    }

}
