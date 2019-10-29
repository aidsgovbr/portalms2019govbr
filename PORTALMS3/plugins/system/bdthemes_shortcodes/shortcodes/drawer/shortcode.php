<?php

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined('_JEXEC') or die;

class Su_Shortcode_drawer extends Su_Shortcodes {

    function __construct() {
        parent::__construct();
    }

    public static function drawer($atts = null, $content = null) {
        
        $atts = su_shortcode_atts(array(
            'id'               => uniqid('sud'),
            'open_title'       => 'Reveal it',
            'close_title'      => 'Close me',
            'open_icon'        => '',
            'close_icon'       => '',
            'title_background' => '',
            'title_color'      => '',
            'background'       => '',
            'color'            => '',
            'padding'          => '',
            'animation'        => 'easeOutExpo',
            'duration'         => '400',
            'scroll_reveal'    => '',
            'class'            => ''
    	), $atts, 'drawer');

        $output     = array();
        $css        = array();
        $open_icon  = '';
        $close_icon = '';
        $id         = $atts['id'];

        // Prepare icon
        if ($atts['open_icon']) {
            if (strpos($atts['open_icon'], 'licon:') !== false) {
                suAsset::addFile('css', 'linea.css');
                $open_icon = '<i class="li li-' . trim(str_replace('licon:', '', $atts['open_icon'])) . '"></i>';   
            } elseif (strpos($atts['open_icon'], 'icon:') !== false) {
                $open_icon = '<i class="fa fa-' . trim(str_replace('icon:', '', $atts['open_icon'])) . '"></i>';   
            } else {
                $open_icon = '<img src="' . image_media($atts['open_icon']) . '" alt="' . esc_attr($atts['open_title']) . '"/>';
            }
        }

        // Prepare icon
        if ($atts['close_icon']) {
            if (strpos($atts['close_icon'], 'licon:') !== false) {
                suAsset::addFile('css', 'linea.css');
                $close_icon = '<i class="li li-' . trim(str_replace('licon:', '', $atts['close_icon'])) . '"></i>';   
            } elseif (strpos($atts['close_icon'], 'icon:') !== false) {
                $close_icon = '<i class="fa fa-' . trim(str_replace('icon:', '', $atts['close_icon'])) . '"></i>';   
            } else {
                $close_icon = '<img src="' . image_media($atts['close_icon']) . '" alt="' . esc_attr($atts['close_title']) . '"/>';
            }
        }

        $css[] = ($atts['title_background']) ? '#'.$id.' .su-drawer-toggle {background: '.$atts['title_background'].'}' : '';
        $css[] = ($atts['title_color']) ? '#'.$id.' .su-drawer-toggle {color: '.$atts['title_color'].'}' : '';
        $css[] = ($atts['background']) ? '#'.$id.' .su-drawer-content {background: '.$atts['background'].'}' : '';
        $css[] = ($atts['color']) ? '#'.$id.' .su-drawer-content {color: '.$atts['color'].'}' : '';
        $css[] = ($atts['padding']) ? '#'.$id.' .su-drawer-content {padding: '.$atts['padding'].'}' : '';

        if ($content) {
            $output[] = '<div id="'.$id.'" class="su-drawer' . su_ecssc($atts) . '"'.su_scroll_reveal($atts).' data-animation="'.$atts['animation'].'" data-duration="'.$atts['duration'].'">';
                $output[] = '<div class="su-drawer-toggle">';
                    $output[] = '<span class="sud-open-title">'.$open_icon.su_scattr($atts['open_title']).'</span>';
                    $output[] = '<span class="sud-close-title sud-hide">'.$close_icon.su_scattr($atts['close_title']).'</span>';
                $output[] = '</div>';
                $output[] = '<div class="su-drawer-content">';
                    $output[] = su_do_shortcode($content);
                $output[] = '</div>';
            $output[] = '</div>';
        } else {
            return su_alert_box(JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DRAWER_ERROR'), 'warning');
        }


        suAsset::addString('css', implode("\n", $css));
        suAsset::addFile('css', 'drawer.css', __FUNCTION__);
        suAsset::addFile('js', 'jquery.easing.js');
        suAsset::addFile('js', 'drawer.js', __FUNCTION__);

        return implode("\n", $output);
    }
}