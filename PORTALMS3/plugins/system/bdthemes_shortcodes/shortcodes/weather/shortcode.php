<?php

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_weather extends Su_Shortcodes {

    function __construct() {
        parent::__construct();
    } 
      
    public static function weather($atts = null, $content = null) {
        $atts = su_shortcode_atts(array(
            'location'      => 'Boston, MA', //city and region *required 
            'country'       => 'USA', //country *required 
            'city_only'     => 'no', //(true/false) if you want to display only city name
            'forecast'      => 4, //how many days you want forecast max 5
            'api'           => 'yahoo', //openweathermap or yahoo
            'apikey'        => '', //openweathermap or yahoo
            'view'          => 'full', //partial, full, simple, today or forecast
            'units'         => 'auto', //"metric" or "imperial" or "auto"
            'color'         => '#ffffff',
            'background'    => '#8DD438',
            'padding'       => '25px',
            'margin'        => '0px',
            'scroll_reveal' => '',
            'class'         => ''
            ), $atts, 'weather');

        $id = uniqid('suw');
        $classes = array('su-weather', su_ecssc($atts));

        $css = '
            #'.$id.' { background: '.$atts['background'].'; color: '.$atts['color'].'; margin: '.$atts['margin'].'; padding: '.$atts['padding'].'; }
        ';

        $api_key = ($atts['apikey']) ? 'apikey: '.$atts['apikey'] .',' : '';

        $js = '
            jQuery(document).ready(function() {
                //"use strict"
                var '.$id.' = jQuery("#'.$id.'").flatWeatherPlugin({
                  location: "'.$atts['location'].'",
                  country: "'.$atts['country'].'",        
                  api: "'.$atts['api'].'",
                  '.$api_key.'
                  view : "'.$atts['view'].'",
                  displayCityNameOnly : true,
                  forecast: '.$atts['forecast'].',
                  render: true,
                  loadingAnimation: true,
                  units : "'.$atts['units'].'"
                });

            });
        ';

        suAsset::addFile('css', 'flatWeatherPlugin.css', __FUNCTION__);
        suAsset::addFile('js', 'jquery.flatWeatherPlugin.min.js', __FUNCTION__);
        
        suAsset::addString('css', $css);
        suAsset::addString('js', $js);

        return '<div '.su_scroll_reveal($atts).' class="' . su_acssc($classes) . '" id="' . $id . '">
                    
                </div>';
    }
}