<?php 

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_twitter extends Su_Shortcodes {

    function __construct() {
        parent::__construct();
    }
    
    public static function twitter($atts = null, $content = null) {
        $atts = su_shortcode_atts(array(
            'source'          => 'user', // user / search
            'search'          => 'envato',
            'style'           => 'default',
            'transitionin'    => 'slide',
            'transitionout'   => 'slide',
            'twitter_id'      => '',
            'consumer_key'    => '',
            'consumer_secret' => '',
            'access_token'    => '',
            'access_secret'   => '',
            'link_title'      => 'yes',
            'twitter_color'   => '#444',
            'display_name'    => 'yes',
            'date'            => 'yes',
            'limit'           => 5,
            'large'           => 1,
            'medium'          => 1,
            'small'           => 1,
            'font_size'       => '',
            'profile_image'   => 'yes',
            'arrows'          => 'no',
            'arrow_position'  => 'default',
            'pagination'      => 'yes',
            'autoplay'        => 'yes',
            'delay'           => 4,
            'speed'           => 0.4,
            'loop'            => 'yes',
            'margin'          => 35,
            'padding'         => '',
            'scroll_reveal'   => '',
            'class'           => ''
        ), $atts, 'twitter');

        // Initioal Variables
        $id     = uniqid('sut');
        $return = array();
        $css    = array();
        //$js     = array();
        $plugin = JPluginHelper::getPlugin('system', 'bdthemes_shortcodes');
        $params = new JRegistry($plugin->params);
        $lang   = JFactory::getLanguage();
        $lang   = ($lang->isRTL()) ? 'true' : 'false';

        if (!$atts['twitter_id'] and !$atts['consumer_key'] and !$atts['consumer_secret'] and !$atts['access_token'] and !$atts['access_secret']) {
            $atts['twitter_id']      = $params->get('twitter_id');
            $atts['consumer_key']    = $params->get('twitter_consumer_key');
            $atts['consumer_secret'] = $params->get('twitter_consumer_secret');
            $atts['access_token']    = $params->get('twitter_access_token');
            $atts['access_secret']   = $params->get('twitter_access_secret');
        }

        if ($atts['transitionin'] === 'slide' or $atts['transitionout'] === 'slide') {
            $atts['transitionin'] = $atts['transitionout']= 'false';
        } else {
            suAsset::addFile('css', 'animate.css');
        }

        // Include the helper file
        require_once dirname(__FILE__).'/helper.php';

        // if cURL is disabled, then extension cannot work
        if(!is_callable('curl_init')){
            $data = false;
            $curlDisabled = true;
        }
        else {
            $model = new Su_Shortcode_twitter_Helper();
            $data = $model->getData($atts);
        }

        $font_size = ($atts['font_size']) ? 'font-size:' . $atts['font_size'] . ';' : '';
        $padding = ($atts['padding']) ? ' padding:' . $atts['padding'] . ';' : '';

        // Get Css in $css variable
        if ($atts['font_size'] or $atts['padding']) {
            $css[] = '#'.$id.'.su-twitter .su-twitter-item {'.$font_size.$padding .'}';
        }

        
        //$js[] = '';

        suAsset::addFile('css', 'owl.carousel.css');
        suAsset::addFile('js', 'owl.carousel.min.js');

        suAsset::addFile('css', 'twitter.css', __FUNCTION__);
        suAsset::addFile('js', 'twitter.js', __FUNCTION__);
        
        // Add CSS in head
        suAsset::addString('css', implode("\n", $css));
        //suAsset::addString('js', implode("\n", $js));

        // Output HTML
        $return[] = '<div id="'.$id.'"'.su_scroll_reveal($atts).' class="su-twitter su-twitter-style-' . $atts['style'] . su_ecssc($atts) . ' arrow-'. $atts['arrow_position'].'" data-autoplay="' . $atts['autoplay'] .'" data-delay="' . $atts['delay'] . '" data-speed="' . $atts['speed'] . '" data-loop="' . $atts['loop'] . '" data-arrows="' . $atts['arrows'] .'" data-pagination="' . $atts['pagination'] . '" data-transitionin="' . $atts['transitionin'] . '" data-transitionout="' . $atts['transitionout'] . '" data-margin="' . $atts['margin'] . '" data-large="' . $atts['large'] . '" data-medium="' . $atts['medium'] . '" data-small="' . $atts['small'] . '" data-rtl="' . $lang . '" >';


            $return[] = '<div class="owl-carousel su-twitter-slides">';
                foreach($data->tweets as $key => $tweet) {
                    $return[] = '<div class="su-twitter-item">';
                        if ($atts['profile_image'] == 'yes' and isset($tweet->profileImage)) {
                            $return[] = '<a class="su-twitter-icon" href="https://twitter.com/intent/user?screen_name='.$tweet->screenName .'" target="_blank">
                                            <img src="'.$tweet->profileImage .'" alt="'.$tweet->screenName .'" />
                                        </a><div class="su-clearfix"></div>';
                        } elseif ($atts['profile_image'] != 'yes' and !isset($tweet->profileImage)) {
                            $return[] = '<div class="su-twitter-icon"><i class="fa fa-twitter"></i></div>';
                        }

                        $return[] = $tweet->text;

                        if ($atts['date'] == 'yes') {
                            $return[] = '<a class="su-twitter-date" href="https://twitter.com/'.$tweet->screenName .'/statuses/'.$tweet->id .'" target="_blank">'.$tweet->time .'</a>';
                        }
                    $return[] = '</div>';
                }
            $return[] = '</div>';
                    
        $return[] = '</div>';

        return implode("\n", $return);
    }

}
