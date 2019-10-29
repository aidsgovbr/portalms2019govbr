<?php 

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_photo_panel extends Su_Shortcodes {

    function __construct() {
        parent::__construct();
    }

    public static function photo_panel($atts = null, $content = null) {
        $atts = su_shortcode_atts(array(
            'background'    => '#ffffff',
            'color'         => '#333333',
            'shadow'        => '0 1px 2px #eeeeee',
            'border'        => '1px solid #cccccc',
            'radius'        => '0',
            'text_align'    => 'left',
            'photo'         => 'http://lorempixel.com/400/300/food/' . rand(0, 10) . '/',
            'alt'           => '',
            'url'           => '',
            'scroll_reveal' => '',
            'class'         => ''
        ), $atts, 'photo_panel');
        
        if ($atts['url']) {
            $atts['class'] .= ' su-panel-clickable';
            suAsset::addFile('js', 'photo-panel.js', __FUNCTION__);
        }

        suAsset::addFile('css', 'photo-panel.css', __FUNCTION__);
        $image_radius = $atts['radius'] - $atts['border'];
        $return = '<div'.su_scroll_reveal($atts).' class="su-photo-panel' . su_ecssc($atts) . '" data-url="' . $atts['url'] . '" style="background-color:' . $atts['background'] . ';color:' . $atts['color'] . ';border-radius:' . $atts['radius'] . 'px;-moz-border-radius:' . $atts['radius'] . 'px;-webkit-border-radius:' . $atts['radius'] . 'px;box-shadow:' . $atts['shadow'] . ';-moz-box-shadow:' . $atts['shadow'] . ';-webkit-box-shadow:' . $atts['shadow'] . ';border:' . $atts['border'] . '"><div class="su-photo-panel-head"><img src="' . image_media($atts['photo']) . '" alt="'.$atts['alt'].'" style="-webkit-border-top-left-radius:' . $image_radius . 'px;-webkit-border-top-right-radius:' . $image_radius . 'px;-moz-border-radius-topleft:' . $image_radius . 'px;-moz-border-radius-topright:' . $image_radius . 'px;border-top-left-radius:' . $image_radius . 'px;border-top-right-radius:' . $image_radius . 'px;" /></div><div class="su-photo-panel-content su-content-wrap" style="text-align:' . $atts['text_align'] . '">' . su_do_shortcode($content) . '</div></div>';
        return $return;
    }
}
