<?php

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_super_tabs extends Su_Shortcodes {

    static $super_tabs      = array();
    static $super_tab_count = -1;

    function __construct() {
        parent::__construct();
    }   

    public static function super_tabs($atts = null, $content = null) {
        $atts = su_shortcode_atts(array(
            'id'            => uniqid('sust'),
            'style'         => '',
            'style_color'   => '#4FC1E9',
            'animation'     => 'fade',
            'active'        => 1,
            'vertical'      => 'no',
            'position'      => 'top',
            'align'         => 'center',
            'speed'         => 800,
            'deeplink'      => 'no',
            'scroll_reveal' => '',
            'class'         => ''
            ), $atts, 'super_tabs');

        $output           = array();
        $super_tabs       = array();
        $css              = array();
        $id               = $atts['id'];
        $style            = ($atts['style'] !=='') ? 'rt01'.$atts['style'] : '';
        $atts['position'] = ($atts['position'] ==='bottom') ? 'end' : 'begin';

        if ($atts['align'] ==='left') {
            $atts['align'] = 'begin';
        }elseif ($atts['align'] ==='right') {
            $atts['align'] = 'end';
        }


        if ($atts['style_color']) {
            if ($style ==='rt01flat' or $style ==='rt01flatbox' or $style ==='rt01round') {
                $css[] = '#'.$id.' .rt01pagitem.rt01cur {background: '.$atts['style_color'].'}';
                $css[] = '#'.$id.' .rt01pag.rt01tabs {border-color: '.$atts['style_color'].'}';
                $css[] = '#'.$id.' .rt01pagitem.rt01cur {border-color: '.$atts['style_color'].'}';
            }
            if ($style ==='rt01flatbox') {
                $css[] = '#'.$id.'.rt01pag-ver.rt01pag-begin .rt01viewport {border-left-color: '.$atts['style_color'].'}';
                $css[] = '#'.$id.'.rt01pag-ver.rt01pag-end .rt01viewport {border-right-color: '.$atts['style_color'].'}';
            }
            if ($style ==='rt01outline' or $style ==='rt01underline') {
                $css[] = '#'.$id.' .rt01pagitem.rt01cur:before {background: '.$atts['style_color'].'}';
                $css[] = '#'.$id.' .rt01pagitem.rt01cur:after {background: '.$atts['style_color'].'}';
                $css[] = '#'.$id.' .rt01pagitem.rt01cur {border-color: '.$atts['style_color'].'}';
            }
        }

        //if ( is_array( self::$super_tabs ) ) {
            $atts['vertical'] = ( $atts['vertical'] === 'yes' ) ? 'ver' : 'hor';
            $atts['deeplink'] = ( $atts['deeplink'] === 'yes' ) ? true : false;
            $settings = array(
                'fx'            => 'cssOne',
                'cssOne'        => $atts['animation'],
                'speed'         => $atts['speed'],
                'idBegin'       => $atts['active']-1,
                'isDeeplinking' => $atts['deeplink'],
                'pag'     => array(
                    'align'     => $atts['align'],
                    'direction' => $atts['vertical'],
                    'position'  => $atts['position'],
                )
            );
            $output[] = '<div id="'.$id.'" '.su_scroll_reveal($atts).' class="su-super-tabs rt01 '.$style.'"  data-tabs='.json_encode($settings).'>';

            $output[] =  su_do_shortcode($content);

            $output[] = '</div>';
        //}

        // self::$super_tabs = array();
        // self::$super_tab_count = 0;
        suAsset::addString('css', implode("\n", $css));
        suAsset::addFile('css', 'rubytabs.css');
        suAsset::addFile('js', 'rubytabs.js');
        suAsset::addFile('js', 'rubyanimate.js');
        return implode("\n", $output);
    }
}
