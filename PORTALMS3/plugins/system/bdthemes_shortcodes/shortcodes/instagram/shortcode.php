<?php

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_instagram extends Su_Shortcodes {

    function __construct() {
        parent::__construct();
    }   
    public static function instagram($atts = null, $content = null) {
        $atts = su_shortcode_atts(array(
            'layout'          => '1',
            'instagram_id'    => '',
            'instagram_token' => '',
            'hash_tag'        => '',
            'limit'           => 10,
            'link_type'       => 'popup',
            'load_more'       => 'no',
            'column'          => 4,
            'medium'          => 3,
            'small'           => 2,
            'gap'             => 'yes',
            'scroll_reveal'   => '',
            'class'           => ''
        ), $atts, 'instagram');


        $id                      = uniqid('suig');
        $css                     = array();
        $js                      = array();
        $layout 			     = '';
        $atts['gap']             = ($atts['gap'] == "yes") ? 'su-has-gap' : '';
        $classes                 = array('su-instagram', $atts['gap'], su_ecssc($atts));
        $load_more               = ( $atts["load_more"] == 'no' ) ? false : true;
        $plugin                  = JPluginHelper::getPlugin('system', 'bdthemes_shortcodes');
        $params                  = new JRegistry($plugin->params);
        $atts['instagram_id']    = ($atts['instagram_id']) ? $atts['instagram_id'] : $params->get('instagram_id');
        $atts['instagram_token'] = ($atts['instagram_token']) ? $atts['instagram_token'] : $params->get('instagram_token');

        if ($atts['instagram_token']) {

            if ($atts['layout'] != 1) {
                $layout = 'trend'.($atts['layout'] - 1);
            } else {
                $layout = 'trend';
            }

            
            $ig_token = array(
                "instagramAccessToken"   => $atts['instagram_token']
            );

            if ($atts['hash_tag'] and $atts['instagram_token']) {
                $ig_setting = array(
                    'instagram_user_tagged_photos' => array(
                        array(
                            'url'     => "https://instagram.com/".rtrim($atts['instagram_id'], '/'),
                            'name'    => "Instagram Tagged Photos",
                            'hashtag' => $atts['hash_tag'],
                            'selected' => true
                        )
                    )
                );
            } else {
            	 $ig_setting = array(
                    'instagram_user_photos' => array(
                        array(
                            'name'    => "Instagram Tagged Photos",
                            'url'     => "https://instagram.com/".rtrim($atts['instagram_id'], '/'),
                            'selected' => true
                        )
                    )
                );
            }

            $settings = array(
                "skin"                   => $layout, 
                "displayType"            => $atts['link_type'],
                "maxResults"             => $atts['limit'],
                "maxContainerWidth"      =>  1200,
                "photoProtocol"          => "https:",
                "viewCountType"          => "comma",
                "loadMode"               => "loadmore",
                "hideLoadMore"           => $load_more,
                "showTextInsteadOfIcons" => true,
                "loadButtonSize"         => "small",
                "hideHeader"             => true,
                "hideNavigation"         => true,
                "thumbnailDescription"   => "fixed-2",
            );
            
            suAsset::addFile('css', 'magnific-popup.css');
            suAsset::addFile('js', 'magnific-popup.js'); 
            
            suAsset::addFile('css', 'photomax_trend.min.css');
            suAsset::addFile('css', 'instagram.css', __FUNCTION__);
            suAsset::addFile('js', 'jquery.photomax.min.js');
            

            $output = '
                    <script type="text/javascript">
                        jQuery(document).ready(function($) {
                            $("#'.$id.'").photomax(
                                '.json_encode(array_merge($ig_token, $ig_setting, $settings)).'
                            );
                        });
                    </script>
            ';


            $output .= '<div id="'.$id.'"'.su_scroll_reveal($atts).' class="su-instagram photomax '.su_acssc($classes).'"></div>';
        } else {
            $output = su_alert_box(JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_INSTAGRAM_NOT_WORK'), 'warning');
        }


        return $output;

    }
}