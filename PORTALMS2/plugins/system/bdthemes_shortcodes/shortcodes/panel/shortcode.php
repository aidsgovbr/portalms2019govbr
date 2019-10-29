<?php 

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_panel extends Su_Shortcodes {

    function __construct() {
        parent::__construct();
    }   
    public static function panel($atts = null, $content = null) {
        $atts = su_shortcode_atts(array(
            'background'       => '',
            'hover_background' => '',
            'color'            => '',
            'hover_color'      => '',
            'shadow'           => '',
            'padding'          => '',
            'margin'           => '',
            'border'           => '',
            'radius'           => '',
            'icon'             => '',
            'icon_color'       => '',
            'text_align'       => 'left',
            'url'              => '',
            'target'           => 'self',
            'scroll_reveal'    => '',
            'class'            => ''
        ), $atts, 'panel');

        $id      = uniqid('supnl');
        $padding = '';
        $margin  = '';
        $css     = array();
        $classes = array('su-panel', su_ecssc($atts));
        $icon    = '';
        
        if ($atts['url']) {
            $classes[] = 'su-panel-clickable';
            suAsset::addFile('js', 'panel.js', __FUNCTION__);
        }
        if ($atts['padding'] != '' and !intval($atts['padding'])) {
            $padding = 'padding:'.$atts['padding'].'px;';
        } elseif ($atts['padding'] != '') {
            $padding = 'padding:'.$atts['padding'].';';
        }
        if ($atts['margin'] != '') {
            $margin = 'margin:'.$atts['margin'].';';
        }
        if ($atts['icon']) {
            $classes[] = 'su-panel-has-icon';
        }


        // Image Icon
        if (strpos($atts['icon'], '/') !== false) {
            $icon = '<img class="su-panel-image" src="' . image_media($atts['icon']) . '" alt="" />';
        }
        // Line Icon
        elseif (strpos($atts['icon'], 'licon:') !== false) {
            suAsset::addFile('css', 'linea.css');
            $icon = '<i class="su-panel-icon li li-' . trim(str_replace('licon:', '', $atts['icon'])) . '"></i>';
        }
        // Font-Awesome icon
        elseif (strpos($atts['icon'], 'icon:') !== false) {
            $icon = '<i class="su-panel-icon fa fa-' . trim(str_replace('icon:', '', $atts['icon'])) . '"></i>';
        }

        if (strpos($atts['icon'], '/') !== false) {
            $css[] = '#'.$id.'.su-panel img.su-panel-icon {color: '.$atts['icon_color'].'}';
        } 
        elseif (strpos($atts['icon'], 'icon:') !== false) {
            $css[] = '#'.$id.'.su-panel i.su-panel-icon {color: '.$atts['icon_color'].'}';
        }


        $radius           = ($atts['radius']) ? '-webkit-border-radius:' . $atts['radius'] . ';border-radius:' . $atts['radius'] . ';' : '';
        $border           = ($atts['border'] != '') ? 'border:' . $atts['border'] . ';' : '';
        $shadow           = ($atts['shadow'] != '') ? '-webkit-box-shadow:' . $atts['shadow'] . ';box-shadow:' . $atts['shadow'] . ';' : '';
        $background       = ($atts['background'] != '') ? 'background-color:' . $atts['background'] . ';' : '';
        $color            = ($atts['color'] != '') ? 'color:' . $atts['color'] . ';' : '';
        $hover_background = ($atts['hover_background'] != '') ? 'background-color:' . $atts['hover_background'] . ';' : '';
        $hover_color      = ($atts['hover_color'] != '') ? 'color:' . $atts['hover_color'] . ';' : '';
        $classes[]        = ($atts['text_align']) ? 'sup-align-' . $atts['text_align'] : '';

        if ($radius or $border or $shadow or $background or $color) 
            $css[] = '#'.$id.'.su-panel { '.$background. $color. $border . $shadow . $radius. $margin. '}';

        if ($hover_background or $hover_color) 
            $css[] = '#'.$id.'.su-panel:hover { '.$hover_background. $hover_color. '}';

        if ($atts['padding'] != '')
            $css[] = '#'.$id.'.su-panel .su-panel-content { '.$padding.'}';

        suAsset::addFile('css', 'panel.css', __FUNCTION__);
        suAsset::addString('css', implode("\n", $css));
        
        $return = '<div id="'.$id.'"'.su_scroll_reveal($atts).' class="' . su_acssc($classes) . '" data-url="' . $atts['url'] . '" data-target="' . $atts['target'] . '"><div class="su-panel-content su-content-wrap">' . su_do_shortcode($content) .'</div>'. $icon .'</div>';
        return $return;
    }
}
