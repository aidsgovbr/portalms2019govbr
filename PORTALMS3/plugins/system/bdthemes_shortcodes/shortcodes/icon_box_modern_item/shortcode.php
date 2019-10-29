<?php 

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_icon_box_modern_item extends Su_Shortcodes {

    function __construct() {
        parent::__construct();
    }   
    public static function icon_box_modern_item($atts = null, $content = null) {
        $atts = su_shortcode_atts(array(
            'id'            => uniqid('suibm_item_'),
            'title'             => 'Icon List Modern Heading',
            'subtitle'          => 'Subtitle goes here',
            'icon'              => 'icon: heart',
            'icon_color'        => '#666666',
            'icon_size'        => '32',
            'title_color'       => '#666666',
            'subtitle_color'    => '#b5b5b5',
            'background'        => '#f9f5f3',
            'color'             => '#444444',
            'scroll_reveal' => '',
            'class' => ''
            ), $atts, 'icon_box_modern_item');


        $output            = [];
        $css                = [];
        $id               = $atts['id'];
        $css_class         = ['skew-bg'];

        $classes           = ['icon-box-modern-item', $atts['class'] ];

        $icon_color        = ($atts['icon_color']) ? 'color:' . $atts['icon_color'] . ';' : '';
        $icon_size        = ($atts['icon_size']) ? 'font-size:' . $atts['icon_size'] . ';' : '';
        $title_color       = ($atts['title_color']) ? 'color:' . $atts['title_color'] . ';' : '';
        $subtitle_color    = ($atts['subtitle_color']) ? 'color:' . $atts['subtitle_color'] . ';' : '';
        $background = ($atts['background']) ? 'background:' . $atts['background']. ';' : '';


        if (strpos($atts['icon'], 'licon:') !== false) {
            suAsset::addFile('css', 'linea.css');
            $icon = '<i class="list-img-icon li li-' . trim(str_replace('licon:', '', $atts['icon'])) . '"></i>';
            if ($icon_color or $icon_size) {
                $css[] .= '#'.$id.' .icon-wrap i {'.$icon_color.$icon_size.'}';
            }
        } elseif (strpos($atts['icon'], 'icon:') !== false) {
            $icon = '<i class="list-img-icon fa fa-' . trim(str_replace('icon:', '', $atts['icon'])) . '"></i>';
            if ($icon_color or $icon_size) {
                $css[] .= '#'.$id.' .icon-wrap i {'.$icon_color.$icon_size.'}';
            }
        } else {
            $icon = '<img class="list-img-icon" src="'.image_media($atts['icon']).'" alt="" />';
            if ($atts['icon_size']) {
                $css[] .= '#'.$id.' .icon-wrap img {width:'.$atts['icon_size'].'px}';
            }
        }

        $css[] .= '#'.$id.' .description {color:'.$atts['color'].';}';
        $css[] .= '#'.$id.' .skew-bg {'.$background.'}';
        $css[] .= '#'.$id.' .su-content-title-big {'.$title_color.'}';
        $css[] .= '#'.$id.' .su-content-subtitle {'.$subtitle_color.'}';

        $output[] = '<li id="'.$id.'" '.su_scroll_reveal($atts).'>
                        <div class="su-ibm '. su_acssc($classes) . '">
                            <span class="'.su_acssc($css_class).'"></span>
                            <div class="head-container">
                                <div class="icon-wrap">
                                    '.$icon.'
                                </div>
                                <div class="title-wrap">
                                    <div class="su-content-title-big">'.$atts['title'].'</div>
                                    <div class="su-content-subtitle block-subtitle">'.$atts['subtitle'].'</div>
                                </div>
                            </div>
                            <div class="description">' . su_do_shortcode($content) . '</div>
                        </div>
                    </li>';


        suAsset::addString('css', implode("\n", $css));
        suAsset::addFile('css', 'icon-box-modern-item.css', __FUNCTION__);

        return implode("\n", $output);
        
        if (@$_REQUEST["action"] == 'su_generator_preview') {
            return su_alert_box(JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TAB_NOT_PREVIEW'), 'warning');
        }
    }
}
