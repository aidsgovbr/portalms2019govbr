<?php

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_icon extends Su_Shortcodes {
    function __construct() {
        parent::__construct();
    }
    public static function icon($atts = null, $content = null) {
        $atts = su_shortcode_atts(array(
            'icon'          => 'icon: heart',
            'background'    => '',
            'color'         => '',
            'size'          => '',
            'padding'       => '',
            'radius'        => '',
            'square_size'   => 'yes',
            'border'        => '',
            'margin'        => '',
            'url'           => '',
            'target'        => 'blank',
            'scroll_reveal' => '',
            'class'         => ''
                ), $atts, 'icon');

        $id            = uniqid('suico_');
        $css           = array();
        $atts['size']  = intval($atts['size']);
        $square_size   = ($atts['square_size'] === 'no') ? '' : ' square-size';
        $background    = ($atts['background']) ? 'background-color:' . $atts['background'] .';' : '';
        $color         = ($atts['color']) ? 'color:' . $atts['color'] .';' : '';
        $border        = ($atts['border']) ? 'border:' . $atts['border'] .';' : '';
        $border_radius = ($atts['radius']) ? '-webkit-border-radius:' . $atts['radius'] . ';border-radius:' . $atts['radius'] .';' : '';
        $padding       = ($atts['padding']) ? 'padding:' . $atts['padding'] .';' : '';
        $icon_size     = ($atts['size']) ? 'font-size:' . intval($atts['size']) . 'px;line-height:' . intval($atts['size']) . 'px;' : ''; 
        $img_icon_size = ($atts['size']) ? 'width:' . intval($atts['size']) . 'px;height:' . intval($atts['size']) . 'px;' : '';

        if ($atts['margin']) {
            $css[] = '#'.$id.'.su-icon{ margin:' . $atts['margin'] .'}';
        }
        if (strpos($atts['icon'], '/') !== false) {
            $css[] = '#'.$id.'.su-icon img { '.$img_icon_size.$background.$color.$border.$border_radius.$padding.'}';
        } 
        elseif(strpos($atts['icon'], 'icon:') !== false) {
            $css[] = '#'.$id.'.su-icon i { '.$icon_size.$background.$color.$border.$border_radius.$padding.'}';
        }

        // Image Icon
        if (strpos($atts['icon'], '/') !== false) {
            $atts['icon'] = '<img src="' . image_media($atts['icon']) . '" alt="" width="' . $atts['size'] . '" height="' . $atts['size'] . '" />';
        }
        // Line Icon
        elseif (strpos($atts['icon'], 'licon:') !== false) {
            suAsset::addFile('css', 'linea.css');
            $atts['icon'] = '<i class="li li-' . trim(str_replace('licon:', '', $atts['icon'])) . '"></i>';
        }
        // Font-Awesome icon
        elseif (strpos($atts['icon'], 'icon:') !== false) {
            $atts['icon'] = '<i class="fa fa-' . trim(str_replace('icon:', '', $atts['icon'])) . '"></i>';
        }

        // Prepare text
        if ($content)
            $content = '<span class="su-icon-text">' . $content . '</span>';

        if (!$atts['url']) {
            $icon = '<span id="'.$id.'"'.su_scroll_reveal($atts).' class="su-icon' .$square_size. su_ecssc($atts) . '">' . $atts['icon'] . su_do_shortcode($content) . '</span>';
        } else {
            $icon = '<a id="'.$id.'" href="' . $atts['url'] . '"'.su_scroll_reveal($atts).' class="su-icon' .$square_size. su_ecssc($atts) . '" target="_' . $atts['target'] . '">' . $atts['icon'] . su_do_shortcode($content) . '</a>';
        }
        
        // Asset added
        suAsset::addFile('css', 'icon.css', __FUNCTION__);
        suAsset::addString('css', implode("\n", $css));

        return $icon;
    }

}
