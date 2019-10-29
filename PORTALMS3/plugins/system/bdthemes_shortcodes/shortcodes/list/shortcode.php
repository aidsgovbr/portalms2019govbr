<?php

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_list extends Su_Shortcodes {

    function __construct() {
      parent::__construct();
    }
    public static function su_list($atts = null, $content = null) {
        $atts = su_shortcode_atts(array(
            'icon'          => 'icon: star',
            'icon_color'    => '#333333',
            'style'         => 'default',
            'scroll_reveal' => '',
            'class'         => ''
                ), $atts, 'list');

        $id = uniqid('sul_');
        $css = array();


        if (strpos($atts['icon'], '/') !== false) {
            $atts['icon'] = '<img src="' . image_media($atts['icon']) . '" alt="" width="' . $atts['size'] . '" height="' . $atts['size'] . '" />';
            $css[] = '#'.$id.'.su-list img { color:' . $atts['icon_color'] . '; }';
        }
        // Line Icon
        elseif (strpos($atts['icon'], 'licon:') !== false) {
            suAsset::addFile('css', 'linea.css');
            $atts['icon'] = '<i class="li li-' . trim(str_replace('licon:', '', $atts['icon'])) . '"></i>';
            $css[] = '#'.$id.'.su-list i { color:' . $atts['icon_color'] . '; }';
        }
        // Font-Awesome icon
        elseif (strpos($atts['icon'], 'icon:') !== false) {
            $atts['icon'] = '<i class="fa fa-' . trim(str_replace('icon:', '', $atts['icon'])) . '"></i>';
            $css[] = '#'.$id.'.su-list i { color:' . $atts['icon_color'] . '; }';
        }

        suAsset::addFile('css', 'list.css', 'list');
        suAsset::addString('css', implode("\n", $css));

        return '<div id="'.$id.'" '.su_scroll_reveal($atts).' class="su-list su-list-style-' . $atts['style'] . su_ecssc($atts) . '">' . str_replace('<li>', '<li>' . $atts['icon'] . ' ', has_child_shortcode($content, 'l')) . '</div>';
    }
}
