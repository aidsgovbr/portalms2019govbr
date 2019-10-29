<?php

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_divider extends Su_Shortcodes {

    function __construct() {
        parent::__construct();
    }

    public static function divider($atts = null, $content = null) {
        $atts = su_shortcode_atts(array(
            'style'           => 1,
            'align'           => 'center',
            'icon'            => '',
            'icon_style'      => '1',
            'icon_color'      => '#b5b5b5',
            'icon_size'       => '16',
            'icon_align'      => 'center',
            'top'             => 'no',
            'color'           => '#EEEEEE',
            'width'           => 100,
            'force_fullwidth' => 'no',
            'margin_top'      => 10,
            'margin_bottom'   => 10,
            'margin_left'     => '',
            'margin_right'    => '',
            'visible'         => '', // large, medium, small
            'hidden'          => '', // large, medium, small
            'scroll_reveal'   => '',
            'class'           => ''
            ), $atts, 'divider');

            $id              = uniqid('sud');
            $classes         = array('su-divider', 'su-divider-style-'. $atts['style'], 'su-icon-style-'.$atts['icon_style'], 'su-divider-align-'.$atts['align'],  su_ecssc($atts));
            $top_link_margin = '';
            $margin          = '';
            $has_icon        = '';
            $icon            = '';
            $css             = array();

        if ($atts['icon']) {
            if (strpos($atts['icon'], 'licon:') !== false) {
                suAsset::addFile('css', 'linea.css');
                $icon  = '<i class="li li-' . trim(str_replace('licon:', '', $atts['icon'])) . '"></i>';
                $css[] = '#'.$id.'.su-divider > span {font-size:' . $atts['icon_size'] . 'px;border-color:'.$atts['color'].';}';
                $css[] = '#'.$id.'.su-divider i {color:' . $atts['icon_color'].';height:' . $atts['icon_size'].'px;width:' . $atts['icon_size'].'px;padding:' . round($atts['icon_size'] / 2) . 'px;}';
            }
            elseif (strpos($atts['icon'], 'icon:') !== false) {
                $icon  = '<i class="fa fa-' . trim(str_replace('icon:', '', $atts['icon'])) . '"></i>';
                $css[] = '#'.$id.'.su-divider > span {font-size:' . $atts['icon_size'] . 'px;border-color:'.$atts['color'].';}';
                $css[] = '#'.$id.'.su-divider i {color:' . $atts['icon_color'].';height:' . $atts['icon_size'].'px;width:' . $atts['icon_size'].'px;padding:' . round($atts['icon_size'] / 2) . 'px;}';
            }
            //  Icon and Image detect from icon
            elseif (strpos($atts['icon'], '/') !== false) {
                $icon  = '<img src="' . image_media($atts['icon']) .'" alt="" />';
                $css[] = '#'.$id.' img {width:' . $atts['icon_size'] . 'px;}';
            }

            if ($atts['top'] === 'yes') {
                $icon      = '<a data-uk-smooth-scroll href="#">' . $icon . '</a>';
                $classes[] = 'has-toplink';
            }
        }

        if ($atts['visible']) {
            $classes[] = 'su-visible-' . $atts['visible'];
        }
        if ($atts['hidden']) {
            $classes[] = 'su-hidden-' . $atts['hidden'];
        }

        if ($atts['force_fullwidth'] === 'yes') {
            $classes[] = 'su-divider-ffw';
        }

        if ($atts['style'] == 7) {
            $css[] = '#'.$id.'.su-divider-style-7 span.divider-left { background-image: -webkit-linear-gradient(45deg, '.$atts['color'].' 25%, transparent 25%, transparent 50%, '.$atts['color'].' 50%, '.$atts['color'].' 75%, transparent 75%, transparent);
            background-image: linear-gradient(45deg, '.$atts['color'].' 25%, transparent 25%, transparent 50%, '.$atts['color'].' 50%, '.$atts['color'].' 75%, transparent 75%, transparent);}';

            $css[] = '#'.$id.'.su-divider-style-7 span.divider-right {background-image: -webkit-linear-gradient(45deg, '.$atts['color'].' 25%, transparent 25%, transparent 50%, '.$atts['color'].' 50%, '.$atts['color'].' 75%, transparent 75%, transparent);
            background-image: linear-gradient(45deg, '.$atts['color'].' 25%, transparent 25%, transparent 50%, '.$atts['color'].' 50%, '.$atts['color'].' 75%, transparent 75%, transparent);}';
        }


        if (($atts['margin_top']) or ($atts['margin_right']) or ($atts['margin_bottom']) or ($atts['margin_left'])) {
            $margin  = 'margin: ';
            $margin .= ($atts['margin_top']) ? intval($atts['margin_top']).'px ' : '0 ';
            $margin .= ($atts['margin_right']) ? intval($atts['margin_right']) . 'px ' : 'auto ';
            $margin .= ($atts['margin_bottom']) ? intval($atts['margin_bottom']).'px ' : '0 ';
            $margin .= ($atts['margin_left']) ? intval($atts['margin_left']) . 'px;' : 'auto;';
        }

        // Get Css in $css variable
        $css[] = '#'.$id.'.su-divider { width:'. intval($atts['width']). '%;'.$margin.';text-align: '.$atts['icon_align'].';}';
        $css[] = '#'.$id.'.su-divider span:before, #'.$id.' span:after { border-color: '.$atts['color'].';}';
        $css[] = '#'.$id.'.su-icon-style-2 > span { background: '.$atts['color'].';border-radius: 50%;}';


        // Add CSS in head
        suAsset::addString('css', implode("\n", $css));
        suAsset::addFile('css', 'divider.css', __FUNCTION__);

        // Output HTML
        return '<div id="'.$id.'"'.su_scroll_reveal($atts).' class="'.su_acssc($classes).'">
            <span>
                <span class="divider-left"></span>
                   '. $icon .'
                <span class="divider-right"></span>
            </span>
        </div>';
    }
}
