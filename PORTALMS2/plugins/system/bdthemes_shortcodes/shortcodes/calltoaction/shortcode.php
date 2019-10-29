<?php 

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_calltoaction extends Su_Shortcodes {

    function __construct() {
      parent::__construct();
    }
    public static function calltoaction($atts = null, $content = null) {
        $atts = su_shortcode_atts(array(
            'title'                   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CA_TITLE'),
            'title_color'             => '',
            'button_text'             => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CA_BTN_TXT'),
            'align'                   => 'left',
            'button_link'             => '#',
            'target'                  => 'self',
            'background'              => '',
            'color'                   => '',
            'button_color'            => '',
            'button_background'       => '',
            'button_background_hover' => '',
            'radius'                  => '',
            'button_radius'           => '',
            'scroll_reveal'           => '',
            'class'                   => ''
        ), $atts, 'calltoaction');

        $id            = uniqid('suca_');
        $css           = array();
        $return        = array();
        $padding       = '';
        $title         = ($atts['title']) ? "<h3>" . $atts['title'] . "</h3>" : '';
        $target        = ($atts['target'] === 'yes' || $atts['target'] === 'blank') ? ' target="_blank"' : 'target="_self"';
        $btn_bg        = ($atts['button_background']) ? 'background-color:' . $atts['button_background'].';' : '';
        $btn_hbg       = ($atts['button_background_hover']) ? 'background-color: '.$atts['button_background_hover'].';' : 'background-color: '.su_color::darken($atts['button_background'], '7%').';';
        $background    = ($atts['background']) ? 'background-color:' . $atts['background'].';' : '';
        $color         = ($atts['color']) ? 'color:' . $atts['color'].';' : '';
        $title_color   = ($atts['title_color']) ? 'color:' . $atts['title_color'].';' : '';
        $button_color  = ($atts['button_color']) ? 'color:' . $atts['button_color'].';' : '';
        $radius        = ($atts['radius']) ? 'border-radius:' . $atts['radius'].';' : '';
        $button_radius = ($atts['button_radius']) ? 'border-radius:' . $atts['button_radius'].';' : '';

        if (intval($atts['radius']) > 40 && intval($atts['button_radius']) > 40) {
            $padding = "padding: 20px 20px 40px;";
        }
        if ($padding or $background or $radius) {
            $css[] = '#'.$id.' {'.$padding.$background.$radius.'}';
        }
        if ($button_color or $btn_bg or $button_radius) {
            $css[] = '#'.$id.' a.cta-dbtn {'.$button_color.$btn_bg.$button_radius.'}';
        }
        if ($btn_hbg) {
            $css[] = '#'.$id.' a.cta-dbtn:hover { '.$btn_hbg .'}';
        }
        if ($title_color) {
            $css[] = '#'.$id.' .cta-content > h3 {'.$title_color.'}';
        }
        if ($color) {
            $css[] = '#'.$id.' .cta-content .su-ca-dtxt { '.$color.'}';
        }


        suAsset::addString('css', implode("\n", $css));
        suAsset::addFile('css', 'call-to-action.css', __FUNCTION__);

        $return[] = '<div id="'.$id.'"'.su_scroll_reveal($atts).' class="su-call-to-action'.su_ecssc($atts).' cta-align-'. $atts['align'] .'">';
            // $return[] = '<a class="cta-dbtn su-ca-hp" '.$target . ' href="' . $atts['button_link'] . '">'. $atts['button_text'] . '</a>';
            $return[] = '<div class="cta-content">' . $title .'<div class="su-ca-dtxt">'. su_do_shortcode($content) .   '</div></div>';        
                $return[] = '<a class="cta-dbtn su-ca-vp" '. $target .' href="' . $atts['button_link'] . '">' . $atts['button_text'] . '</a>';
            $return[] = '<div class="clear">';
            $return[] = '</div>';
        $return[] = '</div>';

        return implode("\n", $return);
    }
}
