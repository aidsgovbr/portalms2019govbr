<?php

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_modal extends Su_Shortcodes {

    function __construct() {
        parent::__construct();
    }

    //modal
    public static function modal( $atts = null, $content = null ) {
        $atts = su_shortcode_atts( array(
                'effect'             => 1,
                'button_text'        => 'Open Modal',
                'button_class'       => '',
                'close_button'       => '',
                'title'              => 'Modal Title',
                'title_background'   => 'rgba(0,0,0,0.1)',
                'title_color'        => '#222222',
                'background'         => '#ffffff',
                'color'              => '#666666',
                'border'             => 'none',
                'shadow'             => '0 0 0 #000000',
                'width'              => '',
                'height'             => '',
                'overlay_background' => 'rgba(0,0,0,0.4)',
                'scroll_reveal'      => '',
                'class'              => ''
            ), $atts, 'modal' );
        
        $id = uniqid('sum_');
        $css = array();
        $height = ($atts['height']) ? 'height: '.$atts['height'] . ';': '';
        $width = ($atts['width']) ? 'width: '.$atts['width'] . ';' : '';




        $css[] = '#'.$id.' .su-modal-content-wrapper { background: '.$atts['background'].'; color: '.$atts['color'].'; border: '.$atts['border'].'; box-shadow: '.$atts['shadow'].';'.$height.$width.'}';
        $css[] = '#'.$id.' .su-modal-title-wrapper { background: '.$atts['title_background'].';}';
        $css[] = '#'.$id.' .su-modal-title-wrapper h3 { color: '.$atts['title_color'].';}';

        $overlay_style = 'style=" background-color: '.$atts['overlay_background'].';"';
        $close_button = ($atts['close_button'] === 'yes') ? '<a href="javascript:void(0);" class="su-modal-close"><i class="fa fa-remove"></i></a>' : '';
        
        suAsset::addString('css', implode('', $css));
        suAsset::addFile('css', 'modal.css', __FUNCTION__);
        suAsset::addFile('js', 'modal.js', __FUNCTION__);

        $return = '<a href="javascript:void(0);"'.su_scroll_reveal($atts).' class="su-modal-trigger '.$atts['button_class'].'" data-modal="'.$id.'">'.$atts['button_text'].'</a>';
        $return .= '<div class="su-modal-wrapper">';
        $return .='<div class="su-modal su-modal-effect-'.$atts['effect'].'" id="'.$id.'">
                    <div class="su-modal-content-wrapper">';
                $return .= '<div class="su-modal-title-wrapper">';
                    $return .= '<h3>'.$atts['title'].'</h3>';
                    $return .= $close_button;
                $return .= '</div>';
                $return .= '<div class="su-content">';
                    $return .= su_do_shortcode( $content );
                $return .= '</div>
            </div>
        </div>
        <div class="su-modal-overlay" '.$overlay_style.'></div>';  
        $return .= '</div>';     

        return $return;
    }
}
