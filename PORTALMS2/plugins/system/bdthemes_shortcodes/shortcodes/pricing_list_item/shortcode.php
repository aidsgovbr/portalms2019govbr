<?php 

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_pricing_list_item extends Su_Shortcodes {

    function __construct() {
        parent::__construct();
    }   
    public static function pricing_list_item($atts = null, $content = null) {
        $atts = su_shortcode_atts(array(
            'id'            => uniqid('suibm_item_'),
            'title'             => 'Pricing Item Title',
            'price'             => '$29.99',
            'icon'              => '',
            'icon_size'        => '32',
            'icon_color'        => '#666666',
            'icon_bg'        => 'transparent',
            'icon_padding'        => '5px',
            'icon_margin'        => '0px 10px 0 0',
            'icon_shadow'        => 'small',
            'icon_radius'       => '0px',
            'scroll_reveal' => '',
            'class' => ''
        ), $atts, 'pricing_list_item');


        $output    = [];
        $css       = [];
        $id        = uniqid('suplitem_');
        $classes   = ['su-pricing-list-item', $atts['class']];
        $icon_class = ['su-pl-icon-wrap'];        
        $icon      = '';
        
        $icon_size   = ($atts['icon_size']) ? 'font-size:' . $atts['icon_size']. 'px;' : '';
        $icon_width   = ($atts['icon_size']) ? 'width:' . $atts['icon_size']. 'px;' : '';
        $icon_height   = ($atts['icon_size']) ? 'height:' . $atts['icon_size']. 'px;' : '';
        $icon_color   = ($atts['icon_color']) ? 'color:' . $atts['icon_color']. ';' : '';
        $icon_bg      = ($atts['icon_bg']) ? 'background:' . $atts['icon_bg']. ';' : '';
        $icon_padding = ($atts['icon_padding']) ? 'padding:' . $atts['icon_padding']. ';' : '';
        $icon_margin = ($atts['icon_margin']) ? 'margin:' . $atts['icon_margin']. ';' : '';
        $icon_radius = ($atts['icon_radius']) ? 'border-radius:' . $atts['icon_radius']. ';' : '';
        $icon_shadow = ($atts['icon_shadow']) ? 'box-shadow:' . $atts['icon_shadow']. ';' : '';
        $icon_shadow .= ($atts['icon_shadow']) ? '-webkit-box-shadow:' . $atts['icon_shadow']. ';' : '';
        $icon_shadow .= ($atts['icon_shadow']) ? '-moz-box-shadow:' . $atts['icon_shadow']. ';' : '';
        $icon_shadow .= ($atts['icon_shadow']) ? '-o-box-shadow:' . $atts['icon_shadow']. ';' : '';

        $css[] .= '#'.$id.' .su-pl-icon-wrap {'.$icon_bg.$icon_padding.$icon_margin.$icon_shadow.$icon_radius.'}';

        $css[] .= '#'.$id.' .su-pl-icon {'.$icon_height.$icon_width.'}';

        if (strpos($atts['icon'], 'licon:') !== false) {
            suAsset::addFile('css', 'linea.css');
            $icon = '<i class="su-pl-icon li li-' . trim(str_replace('licon:', '', $atts['icon'])) . '"></i>';
            if ($icon_color or $icon_size) {
                $css[] .= '#'.$id.' .su-pl-icon {'.$icon_color.$icon_size.'}';
            }
        } elseif (strpos($atts['icon'], 'icon:') !== false) {
            $icon = '<i class="su-pl-icon fa fa-' . trim(str_replace('icon:', '', $atts['icon'])) . '"></i>';
            if ($icon_color or $icon_size) {
                $css[] .= '#'.$id.' .su-pl-icon {'.$icon_color.$icon_size.'}';
            }
        } elseif($atts['icon']) {
            $icon = '<img class="su-pl-icon" src="'.image_media($atts['icon']).'" alt="" />';
            if ($atts['icon_size']) {
                $css[] .= '#'.$id.' .su-pl-icon {width:'.$atts['icon_size'].'px}';
            }
        }


        $output[] = '<li class="'.su_acssc($classes).'" '.su_scroll_reveal($atts).'>';
            $output[] = '<div id="'.$id.'" class="pricing-list-item-wrap" >';
                if ($icon !='') {
                    $output[] = '<div class="'.su_acssc($icon_class).'">';
                        $output[] = $icon;
                    $output[] = '</div>';
                }

                $output[] = '<div class="su-pricing-content">'
                . '<h4 class="pricing-title">'.$atts['title'].'</h4>'
                . ($content).
                '</div>';

                $output[] = '<div class="su-price"><strong>'.$atts['price'].'</strong></div>';
            $output[] = '</div>';
        $output[] = '</li>';

        suAsset::addString('css', implode("\n", $css));
        suAsset::addFile('css', 'pricing-list-item.css', __FUNCTION__);

        return implode("\n", $output);
        
        if (@$_REQUEST["action"] == 'su_generator_preview') {
            return su_alert_box(JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TAB_NOT_PREVIEW'), 'warning');
        }
    }
}
