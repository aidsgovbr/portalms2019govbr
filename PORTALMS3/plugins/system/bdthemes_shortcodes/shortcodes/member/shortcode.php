<?php 

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_member extends Su_Shortcodes {

    function __construct() {
        parent::__construct();
    }   
    public static function member($atts = null, $content = null) {
        $atts = su_shortcode_atts(array(
            'style'         => '1',
            'background'    => '',
            'color'         => '#333333',
            'shadow'        => '',
            'border'        => '1px solid #cccccc',
            'radius'        => '0',
            'text_align'    => 'left',
            'photo'         => BDT_SU_IMG.'sample/member.svg',
            'name'          => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_NAME_DEFAULT'),
            'role'          => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ROLE_DEFAULT'),
            'alt'           => '',
            'icon_1'        => '',
            'icon_1_url'    => '',
            'icon_1_color'  => '#444444',
            'icon_1_title'  => '',
            'icon_2'        => '',
            'icon_2_url'    => '',
            'icon_2_color'  => '#444444',
            'icon_2_title'  => '',
            'icon_3'        => '',
            'icon_3_url'    => '',
            'icon_3_color'  => '#444444',
            'icon_3_title'  => '',
            'icon_4'        => '',
            'icon_4_url'    => '',
            'icon_4_color'  => '#444444',
            'icon_4_title'  => '',
            'icon_5'        => '',
            'icon_5_url'    => '',
            'icon_5_color'  => '#444444',
            'icon_5_title'  => '',
            'icon_6'        => '',
            'icon_6_url'    => '',
            'icon_6_color'  => '#444444',
            'icon_6_title'  => '',
            'url'           => '',
            'scroll_reveal' => '',
            'class'         => ''
        ), $atts, 'member');
        
        $id = uniqid('sum');
        $icons = array();
        $show_icons = '';
        $css = array();
        $member_photo ='';
        $classes= array('su-member', 'su-member-style-'. $atts['style'], su_ecssc($atts), 'su-member-align-'.$atts['text_align']);

        $box_shadow = ($atts['shadow']) ? 'box-shadow:' . $atts['shadow'] . '; -webkit-box-shadow:' . $atts['shadow'] . ';' : '';
        $radius = ($atts['radius']) ? 'border-radius:' . $atts['radius'] . ';' : '';

        
        for ($i = 1; $i <= 6; $i++) {
            if (!$atts['icon_' . $i] || !$atts['icon_' . $i . '_url'])
                continue;
            if (strpos($atts['icon_' . $i], 'licon:') !== false) { 
                suAsset::addFile('css', 'linea.css');
                $icon = '<i class="li li-' . trim(str_replace('licon:', '', $atts['icon_' . $i])) . '" style="color:' . $atts['icon_' . $i . '_color'] . '"></i>';
            } elseif (strpos($atts['icon_' . $i], 'icon:') !== false) { 
                $icon = '<i class="fa fa-' . trim(str_replace('icon:', '', $atts['icon_' . $i])) . '" style="color:' . $atts['icon_' . $i . '_color'] . '"></i>';
            } else { 
                $icon = '<img src="' . image_media($atts['icon_' . $i]) . '" width="16" height="16" alt="'.$alt.'" />'; 
            }
            $icons[] = '<a href="' . $atts['icon_' . $i . '_url'] . '" title="' . $atts['icon_' . $i . '_title'] . '" class="su-memeber-icon su-m-' . trim(str_replace('icon:', '', $atts['icon_' . $i])) . '" target="_blank">' . $icon . '</a>';
        }

        if (count($icons)) {
            $show_icons = '<div class="su-member-icons"><div class="su-member-ic">' . implode('', $icons) . '</div>';

            $show_icons .=  ($atts['style'] == '5') ? '<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="52px" height="52px" viewBox="0 0 52 52" enable-background="new 0 0 52 52" xml:space="preserve"><path d="M51.673,0H0v51.5c0.244-5.359,3.805-10.412,7.752-13.003l36.169-23.74c4.264-2.799,7.761-8.663,7.752-14.297V0L51.673,0z"/></svg>' : '';

            $show_icons .= '</div>';
        }
        
        if ($atts['photo'] != '') {
            $multi_photo = array();
            $multi_photo = explode(',',$atts['photo'], 2);
            $alt = ( $atts['alt'] ) ? $atts['alt'] : $atts['name'];
            $member_photo = '<img src="' . image_media($multi_photo[0]) . '" alt="'.$alt.'" />';

           if(isset($multi_photo[1]) )
            $member_photo .= '<img src="' . image_media($multi_photo[1]) . '" alt="'.$alt.'"  />';
        }

        $title      = '<span class="su-member-name">' . $atts['name'] . '</span><span class="su-member-role">' . $atts['role'] . '</span>';
        $background = ($atts['background']) ? 'background-color:' . $atts['background'] . ';' : '';
        $border     = ($atts['border']) ? 'border:' . $atts['border'] . ';' : '';
        $color      = ($atts['color']) ? 'color:' . $atts['color'] . ';' : '';


        if ($color or $background or $border or $radius or $box_shadow) {
            $css[] = '#'.$id.'.su-member {' . $color . $background . $border . $radius . $box_shadow .'}';
        }

        $css[] = $atts['style'] == '5' ? '#'.$id.'.su-member-style-5 .su-member-icons {background-color:' . $atts['background'] . ';} #'.$id.'.su-member-style-5 .su-member-icons svg path {fill:' . $atts['background'] . ';} #'.$id.'.su-member-style-5 .su-member-icons a i:after {background-color:' . su_color::darken($atts['background'], '10%'). ';}' : '';
        
        if ($atts['style'] == 6) {
            if ($atts['background']) {
                $css[] = '#'.$id.'.su-member-style-6 .su-member-ic {background-color:' . su_color::darken($atts['background'], '10%'). ';}';
                $css[] = '#'.$id.'.su-member-style-6 .su-member-info {background-color:' . $atts['background'] . ';}';
            }
        }

        $click_able = $atts['url'] ? 'data-url="' . $atts['url'] . '"' : '';
        $click_able_class = $atts['url'] ? 'su-member-clickable' : '';

        $classes[] = $click_able_class;

        // Adding asset
        suAsset::addFile('css', 'member.css', __FUNCTION__);
        suAsset::addFile('js', 'member.js', __FUNCTION__);
        suAsset::addString('css', implode("\n", $css));

        // HTML Layout 
        $return = '<div id="'.$id.'"'.su_scroll_reveal($atts).' class="'.su_acssc($classes).'" '.$click_able.'>';
            $return .= '<div class="su-member-photo">';
                $return .= $member_photo;
                if ($atts['style'] == '2' or $atts['style'] == '4') { $return .= $show_icons; }
            $return .= '</div>';

            $return .= '<div class="su-member-info">';
                $return .= $title;
                $return .= ($content) ? '<div class="su-member-desc su-content-wrap">' . su_do_shortcode($content) . '</div>' : '';
                if ($atts['style'] == '7' or $atts['style'] == '8') { $return .= $show_icons; }
            $return .= '</div>';

            if ($atts['style'] != '2' and $atts['style'] != '4' and $atts['style'] != '7' and $atts['style'] != '8') { $return .= $show_icons; }

        $return .= '</div>';
        
        return $return;
    }
}
