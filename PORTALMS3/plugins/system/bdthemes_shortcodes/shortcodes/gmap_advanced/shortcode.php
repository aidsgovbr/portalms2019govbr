<?php

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_gmap_advanced extends Su_Shortcodes {

    function __construct() {
        parent::__construct();
    }
    public static function gmap_advanced($atts = null, $content = null) {
        $atts = su_shortcode_atts(array(
            'id'                  => uniqid('su_gma'),
            'width'               => 'auto',
            'height'              => 400,
            'border'              => '',
            'lat'                 => '24.824874',
            'lng'                 => '89.382629',
            'zoom'                => '16',  
            'zoom_on_scroll'      => 'no',
            'pan_control'         => 'yes',
            'street_view_control' => 'no',
            'location_marker'     => 'yes',
            'title'               => '',
            'address'             => 'We are Located Here',
            'custom_marker'       => '',
            'zoom_control'        => 'yes',
            'map_as_background'   => 'no',
            'map_type'            => '', // Depricated
            'style'               => '', 
            'scroll_reveal'       => '',
            'api_key'             => '',
            'class'               => ''
                ), $atts, 'gmap');

        if (@$_REQUEST["action"] == 'su_generator_preview') {
            return su_alert_box(JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_GMAPA_NOT_WORKING'));
        }

        $id                      = $atts['id'];
        $css                     = array();
        $mapl_marker             = '';                                                                                     
        $zoom_ctrl               = ($atts['zoom_control']=='yes') ? 'true' : 'false';
        $strv_ctrl               = ($atts['street_view_control']=='yes') ? 'true' : 'false';
        $zoom_on_scrl            = ($atts['zoom_on_scroll']=='yes') ? 'true' : 'false';
        $mapa_bg                 = ($atts['map_as_background']=='yes')? 'map-as-background' : '';
        $width                   = ($atts['width'] !== 'auto') ? 'max-width:'.intval($atts['width']).'px;' : '';
        $height                  = ($atts['height']) ? 'height:'.intval($atts['height']).'px;' : '';
        $border                  = ($atts['border']) ? 'border:'.$atts['border'].';' : '';
        $classes                 = array('su-gmapa', su_ecssc($atts), $mapa_bg);
        $atts['style']           = ($atts['style']) ? $atts['style'] : $atts['map_type']; // Depcricated
        $atts['location_marker'] = ($atts['location_marker']) ? $atts['location_marker'] : $atts['map_location_marker']; // Depcricated
        $style                   = ($atts['style'] != 'default') ? 'mapType: "'. $atts['style'].'",' : '';
        $lats                    = explode("|", $atts['lat']);
        $lngs                    = explode("|", $atts['lng']);

        $plugin     = JPluginHelper::getPlugin('system', 'bdthemes_shortcodes');
        $params     = new JRegistry($plugin->params);

        $gmap_api_key = ($atts['api_key']) ? '?key='.$atts['api_key'] : '?key='.$params->get('gmap_api_key');

        if($atts['location_marker']=='yes') {
            $addresses     = explode("|", $atts['address']);
            $titles        = explode("|", $atts['title']);
            $custom_marker = ($atts['custom_marker']) ? ', icon:"'. image_media($atts['custom_marker']) .'"' : '';

            foreach ($lats as $key => $lat) {
                $address      = (@$addresses[$key]) ? ', infoWindow: { content: "'.$addresses[$key].'" }' : '';
                $title        = (@$titles[$key]) ? ', title: "'.$titles[$key].'"' : '';
                $mapl_marker .= 'map.addMarker({ lat: '.$lat.', lng: '.$lngs[$key].$title.$custom_marker.$address .'});'."\n";
            }
        }

        if ($width or $height or $border) {
            $css[] = '#'.$id . '{'.$width.$height.$border.'}';
        }   
        
        JFactory::getDocument()->addScript('https://maps.googleapis.com/maps/api/js'.$gmap_api_key);

        suAsset::addFile('js', 'gmap-styles.js', __FUNCTION__);
        suAsset::addFile('js', 'gmaps.js', __FUNCTION__);
        suAsset::addFile('js', 'gmap_advanced.js', __FUNCTION__);
        suAsset::addFile('css', 'gmap_advanced.css', __FUNCTION__);
        suAsset::addString('css', implode("\n", $css));

        $script = '
            jQuery(document).ready(function(){
                var map;
                map = new GMaps({
                    el: "#'.$id.'",
                    lat: '. $lats[0].',
                    lng: '. $lngs[0].',
                    zoomControl : '. $zoom_ctrl.',
                    '.$style.'
                    mapTypeControl: false,
                    zoom: '. $atts['zoom'].',
                    streetViewControl: '.$strv_ctrl.',
                    scrollwheel: '.$zoom_on_scrl.'
                });
                '.$mapl_marker.'
            });';
        
        suAsset::addString('js', $script);

        return '<div id="'.$id.'" '.su_scroll_reveal($atts).' class="'.su_acssc($classes).'"></div>';
    }
}
