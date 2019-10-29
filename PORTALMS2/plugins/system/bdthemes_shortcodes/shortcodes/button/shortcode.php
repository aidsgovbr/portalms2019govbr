<?php

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_button extends Su_Shortcodes {

    function __construct() {
        parent::__construct();
    }
    public static function button($atts = null, $content = null) {
        $atts = su_shortcode_atts(array(
            'id'               => '',
            'style'            => 'default',
            'url'              => '#',
            'target'           => 'self',
            'color'            => '#FFFFFF',
            'background'       => '#2D89EF',
            'background_hover' => '',
            'size'             => 3,
            'wide'             => 'no',
            'center'           => 'no',
            'radius'           => '3px',
            'icon'             => false,
            'icon_color'       => '#FFFFFF',
            'desc'             => '',
            'onclick'          => '',
            'rel'              => '',
            'title'            => '',
            'padding'          => '',
            'margin'           => '',
            'scroll_reveal'    => '',
            'class'            => ''
        ), $atts, 'button');

        // Initioal Variables
        $id = ( $atts['id'] ) ? $atts['id'] : uniqid('subtn_');
        $css = array();
        $js = array();
        $borderBtn = '';
        $borderBtnHover = '';

        // Prepare vars
        $before = $after = '';

        // Common styles for button
        $btn_size = round(( $atts['size'] + 7 ) * 1.25);

        // Background hover check
        if ($atts['background_hover']) {
          $bg_hover = $atts['background_hover'];
        } elseif ($atts['background'] != 'transparent') {
          $bg_hover = su_color::lighten($atts['background']);
        } else {
            $bg_hover = '';
        }

        $lineheight = ( $atts['icon'] ) ? 'line-height:' . round($btn_size * 1.5) . 'px;' : 'line-height:' . round($btn_size * 2) . 'px;';
        if ($atts['padding']) {
            $padding = 'padding: '.$atts['padding'].';';
        } else {
            $padding = ($atts['icon']) ? 'padding: ' . round(( $atts['size'] ) / 2 + 4) . 'px ' . round($atts['size'] * 2 + 10) . 'px;' : 'padding: ' . '4px ' . round($atts['size'] * 2 + 10) . 'px;';
        }
        $radius = ($atts['radius']) ? '-webkit-border-radius: '. $atts['radius'].'; border-radius: '. $atts['radius'].';' : '';
        $margin = ($atts['margin']) ? 'margin: '.$atts['margin'].';':'';

        if ($atts['style'] === 'border') {
            $borderBtn = 'border-color: '.$atts['color'].';';
            $borderBtnHover = 'border-color: '.su_color::lighten($atts['color']).';';
        }

        // CSS rules for <a> tag
        $css[] = 'a#'.$id.' { color: '. $atts['color'] . '; background-color: ' .$atts['background']. ';' . $radius. $borderBtn.$margin. '}';
        $css[] = 'a#'.$id.' span { font-size: '. $btn_size . 'px;' .$radius.$lineheight.$padding . '}';

        if ($bg_hover) {
            $css[] = 'a#'.$id.':hover { background-color: ' .$bg_hover. ';}';
        } elseif ($atts['style'] === 'border') {
            $css[] = 'a#'.$id.':hover {' .$borderBtnHover. '}';
        }
        
        if ($atts['desc']) {
            $css[] = 'a#'.$id.' small {padding-bottom:'. round(( $atts['size'] ) / 2 + 4) . 'px;color: '. $atts['color'] . ';}';
        }
        if ($atts['style'] === '3d') {
            $css[] = 'a#'.$id.'.su-button-style-3d { box-shadow: 0 '.round($atts['size']).'px 0 '.su_color::darken($atts['background'], '6%').'; }';
            $css[] = 'a#'.$id.'.su-button-style-3d:active { box-shadow: 0 1px 0 '.su_color::darken($atts['background'], '8%').'; top: '.round($atts['size'] - 1).'px }';
        }


        // Prepare button classes
        $classes = array('su-button', 'su-button-style-' . $atts['style']);

        // Additional classes
        if ($atts['class'])
          $classes[] = $atts['class']; 

        // Wide class
        if ($atts['wide'] === 'yes')
          $classes[] = 'su-button-wide';

        // Prepare icon
        if ($atts['icon']) {
            if (strpos($atts['icon'], 'licon:') !== false) {
                suAsset::addFile('css', 'linea.css');
                $icon = '<i class="li li-' . trim(str_replace('licon:', '', $atts['icon'])) . '"></i>';   
                $css[] = 'a#'.$id.' i {font-size:' . $btn_size . 'px; color:' . $atts['icon_color'].'}';
            } elseif (strpos($atts['icon'], 'icon:') !== false) {
                $icon = '<i class="fa fa-' . trim(str_replace('icon:', '', $atts['icon'])) . '"></i>';   
                $css[] = 'a#'.$id.' i {font-size:' . $btn_size . 'px; color:' . $atts['icon_color'].'}';
            } else {
                $icon = '<img src="' . image_media($atts['icon']) . '" alt="' . esc_attr($content) . '"/>';
                $css[] = 'a#'.$id.' img {width:'. round($btn_size * 1.5) . 'px; height:'. round($btn_size * 1.5) . 'px;}';
            }
        }
        else
          $icon = '';


        // Prepare <small> with description
        $desc = ( $atts['desc'] ) ? '<small>' . su_scattr($atts['desc']) . '</small>' : '';

        // Wrap with div if button centered
        if ($atts['center'] === 'yes') {
          $before .= '<div class="su-button-center">';
          $after  .= '</div>';
        }

        // Replace icon marker in content,
        // add float-icon class to rearrange margins
        if (strpos($content, '%icon%') !== false) {
          $content   = str_replace('%icon%', $icon, $content);
          $classes[] = 'su-button-float-icon';
        }
        
        // Button text has no icon marker, append icon to begin of the text
        else
          $content = $icon . ' ' . $content;
        // Prepare onclick action
        $atts['onclick'] = ( $atts['onclick'] ) ? ' onClick="' . $atts['onclick'] . '"' : '';

        // Prepare rel attribute
        $atts['rel'] = ( $atts['rel'] ) ? ' rel="' . $atts['rel'] . '"' : '';
        // Prepare title attribute
        $atts['title'] = ( $atts['title'] ) ? ' title="' . $atts['title'] . '"' : '';

        // put css in head  
        suAsset::addFile('css', 'button.css', __FUNCTION__);
        suAsset::addString('css', implode("\n", $css));

        return $before . '<a id="'.$id.'" href="' . su_scattr($atts['url']) . '"'.su_scroll_reveal($atts).' class="' . su_acssc($classes) . '" target="_' . $atts['target'] . '"' . $atts['onclick'] . $atts['rel'] . $atts['title'] . '><span>' . su_do_shortcode(stripcslashes($content)) . $desc . '</span></a>' . $after;
    } 
}
