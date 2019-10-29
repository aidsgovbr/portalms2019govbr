<?php 

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_image_zoom extends Su_Shortcodes {

    function __construct() {
        parent::__construct();
    }

    public static function image_zoom($atts = null, $content = null) {
        $atts = su_shortcode_atts(array(
            'image'         => 'http://lorempixel.com/400/300/food/',
            'large_image'   => '',
            'type'          => 'inner', // inner,standard,follow
            'smooth_move'   => 'yes',
            'preload'       => 'yes',
            'zoom_size'     => '120,80',
            'offset'        => '10,0',
            'position'      => 'right',
            'description'   => '',
            'width'         => '',
            'scroll_reveal' => '',
            'class'         => ''
        ), $atts, 'image_zoom');

        $id      = uniqid("suiz");
        $return  = array();
        $js      = array();
        $css     = array();

        $smooth_move = ($atts['smooth_move']==='yes') ? true : false;
        $preload = ($atts['preload']==='yes') ? true : false;
        $description = ($atts['description']) ? ', showDescription: true' : '';

        $js[] = 'jQuery(document).ready(function($) {';
            $js[] = '$("#'.$id.'_image").ImageZoom({type: "'.$atts['type'].'",smoothMove: "'.$smooth_move.'",preload: "'.$preload.'",zoomSize:['.$atts['zoom_size'].'],offset:['.$atts['offset'].'],position:"'.$atts['position'].'"'.$description.'})';
        $js[] = '});'."\n";

        if ($atts['width']) {
            $css[] = '#'.$id.'.su-image-zoom {max-width:'.$atts['width'].'px;}';
        }
        
        $large_image = ($atts['large_image']) ? ' data-largeimg="'.$atts['large_image'].'" ' : '';  

        if (image_media($atts['image'])) {

            $return[] = '<div id="'.$id.'"'.su_scroll_reveal($atts).' class="su-image-zoom '.su_ecssc($atts).'">';
                $return[] = '<img id="'.$id.'_image" src="'.image_media($atts['image']).'"'.$large_image.'alt="'.$atts['description'].'">';
            $return[] = '</div>';

            // Css Adding in Head
            suAsset::addString('css', implode("\n", $css));
            suAsset::addFile('css', 'imagezoom.css', __FUNCTION__);

            // JavaScipt additon in Head
            suAsset::addFile('js', 'jquery.imagezoom.min.js', __FUNCTION__);
            suAsset::addString('js', implode("\n", $js));
        } 
        else {
            return su_alert_box(JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_IMAGE_ZOOM_ERR'), 'warning');
        }
        return implode("\n", $return);
    }
}
