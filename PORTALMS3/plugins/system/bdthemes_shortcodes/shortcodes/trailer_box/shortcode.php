<?php 

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_trailer_box extends Su_Shortcodes {

    function __construct() {
        parent::__construct();
    }

    public static function trailer_box( $atts = null, $content = null ) {
        $atts = su_shortcode_atts(array(
            'style'             => 1,
            'title'             => 'Trailer Box Title',
            'title_color'       => '',
            'title_font_weight' => 'bold',
            'title_size'        => '',
            'image'             => BDT_SU_URI.'/images/no-image.jpg',
            'url'               => '#',
            'target'            => 'self',
            'color'             => '',
            'background'        => '',
            'opacity'           => '1',
            'hover_opacity'     => '0.7',
            'radius'            => '',
            'align'             => '',
            'scroll_reveal'     => '',
            'class'             => ''
        ), $atts, 'trailer_box');
        
        $id            = uniqid('sutb');
        $css           = array();
        $return        = array();
        $border_radius = ($atts['radius']) ? 'overflow: hidden; -webkit-border-radius:' .$atts['radius'].'; border-radius:' .$atts['radius'].';' : '';
        $background    = ($atts['background']) ? 'background:' . $atts['background'] .';' : '';

        $css[] = ($atts['color']) ? '#'.$id.' .su-trailer-box-content { color: '.$atts['color'].';}' : '';
        $css[] = ($atts['title_color']) ? '#'.$id.' .su-trailer-box-title { color: '.$atts['title_color'].';}' : '';

        if ($border_radius or $background) {
        $css[] = '#'.$id.' {'.$border_radius.$background.'}';
        }

        $css[] = ($atts['title_size']) ? '#'.$id.' .su-trailer-box-title {font-size: '.$atts['title_size'].';line-height: '.$atts['title_size'].';}' : '';
        $css[] = ($atts['align']) ? '#'.$id.' .su-trailer-box-desc {text-align: '.$atts['align'].';}' : '';

        // Add CSS and JS in head
        suAsset::addString('css', implode("\n", $css));
        suAsset::addFile('css', 'trailer_box.css', __FUNCTION__);
        suAsset::addFile('js', 'trailer_box.js', __FUNCTION__);

        $return[] = '<div id="'.$id.'"'.su_scroll_reveal($atts).' class="su-trailer-box su-trailer-box-style' . $atts['style'] . su_ecssc($atts).'" data-opacity="' . $atts['opacity'] .'" data-hover-opacity="' . $atts['hover_opacity'] . '">
                    <img class="su-trailer-box-img" src="' . image_media($atts['image']) . '" alt="'.$atts['title'].'">
                    <div class="su-trailer-box-desc">';
                    if ($atts['title'] != '') {
                        $return[] = '<h2 class="su-trailer-box-title">' . $atts['title'] . '</h2>';
                    }         
        $return[] = '<div class="su-trailer-box-content">' . su_do_shortcode($content) . '</div>
                    </div>
                    <a class="su-trailer-box-link" href="' . $atts['url'] . '" target="_'.$atts['target'].'"></a>
                </div>';

        return implode("\n", $return);
    }

}
