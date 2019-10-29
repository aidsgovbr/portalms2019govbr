<?php

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_icon_list_item extends Su_Shortcodes {

    function __construct() {
        parent::__construct();
    }

    public static function icon_list_item($atts = null, $content = null) {
        $atts = su_shortcode_atts(array(
            'title'           => 'Icon List Heading',
            'title_color'     => '',
            'title_size'      => '',
            'color'           => '',
            'icon_background' => 'transparent',
            'icon'            => 'icon: heart',
            'icon_color'      => '',
            'icon_size'       => 24,
            'icon_animation'  => '',
            'icon_border'     => '',
            'icon_shadow'     => '',
            'icon_radius'     => '',
            'icon_align'      => 'left',
            'icon_padding'    => '20px',
            'icon_gap'        => '',
            'connector'       => 'no',
            'url'             => '',
            'target'          => 'self',
            'linkto'          => 'title',
            'scroll_reveal'   => '',
            'class'           => ''
        ), $atts, 'icon_list_item');

        $id             = uniqid('suil');
        $css            = array();
        $has_connector  = '';
        $icon_animation = '';
        $shadow         = '';
        $icon           = '';
        $lang           = JFactory::getLanguage();
        
        if ($lang->isRTL()) {
            if ($atts['icon_align'] === 'left') {
                $atts['icon_align'] =  'right'; 
            } elseif ($atts['icon_align'] === 'right') {
                $atts['icon_align'] =  'left';
            }
        }

        $has_connector  = ($atts['connector'] == 'yes') ? ' has-connector ':'';
        $icon_animation = ($atts['icon_animation']) ? 'su-il-animation-'.$atts['icon_animation'].'' : '';
        $title_color    = ($atts['title_color']) ? 'color:' . $atts['title_color'] . ';' : '';
        $title_size     = ($atts['title_size']) ? 'font-size: '.$atts['title_size'].';' : ''; 
        $radius         = ($atts['icon_radius']) ? '-webkit-border-radius:' . $atts['icon_radius'] . '; border-radius:' . $atts['icon_radius'] . ';' : '';
        $shadow         = ($atts['icon_shadow']) ? '-webkit-box-shadow:' . $atts['icon_shadow'] . '; box-shadow:' . $atts['icon_shadow'] . ';' : '';
        $padding        = ($atts['icon_padding']) ? 'padding:' . $atts['icon_padding'] . ';' : ''; 
        $border         = ($atts['icon_border']) ? 'border:' . $atts['icon_border'] . ';' : '';
        $icon_color     = ($atts['icon_color']) ? 'color:' . $atts['icon_color'] . ';' : '';
        $icon_size      = ($atts['icon_size']) ? 'font-size: '.intval($atts['icon_size']).'px;' : '';

        $classes = array('su-icon-list', 'su-icon-align-'. $atts['icon_align'], $has_connector, $icon_animation, su_ecssc($atts));

        if (strpos($atts['icon'], 'licon:') !== false) {
            suAsset::addFile('css', 'linea.css');
            $icon = '<i class="list-img-icon li li-' . trim(str_replace('licon:', '', $atts['icon'])) . '"></i>';
            if ($icon_color or $icon_size) {
                $css[] .= '#'.$id.' .icon_list_icon .list-img-icon {'.$icon_color.$icon_size.'}';
            }
        } elseif (strpos($atts['icon'], 'icon:') !== false) {
            $icon = '<i class="list-img-icon fa fa-' . trim(str_replace('icon:', '', $atts['icon'])) . '"></i>';
            if ($icon_color or $icon_size) {
                $css[] .= '#'.$id.' .icon_list_icon .list-img-icon {'.$icon_color.$icon_size.'}';
            }
        } else {
            $icon = '<img class="list-img-icon" src="'.image_media($atts['icon']).'" style="width:'.$atts['icon_size'].'px" alt="" />';
        }

        if ($atts['icon_align'] == 'right') {
            if (($atts['icon_background']=='transparent' || $atts['icon_background']=='') and ($atts['icon_border']=='' || substr($atts['icon_border'],0,1) =='0')) {
                $description_margin = 'margin-right: '.(intval($atts['icon_size'])+20).'px;';
                $padding = 'padding: 0;';
            }
            else {
                $description_margin = 'margin-right: '.(intval($atts['icon_size'])+(intval($atts['icon_padding'])*2)+30+(intval($atts['icon_border'])*2)).'px;';
            }

            $description_margin = ($atts['icon_gap']) ? 'margin-right: '.intval($atts['icon_gap']).'px;' : $description_margin;

        } elseif ($atts['icon_align'] == 'top') {
           $description_margin = ($atts['icon_gap']) ? 'margin-top: '.intval($atts['icon_gap']).'px;' : '';
        } elseif ($atts['icon_align'] == 'title') {
           $description_margin = ($atts['icon_gap']) ? 'margin-left: '.intval($atts['icon_gap']).'px;' : '';
           $padding = 'padding: 0;';
        } elseif ($atts['icon_align'] == 'top_left') {
           $description_margin = ($atts['icon_gap']) ? 'margin-right: '.intval($atts['icon_gap']).'px;' : '';
           if (($atts['icon_background']=='transparent' || $atts['icon_background']=='') and ($atts['icon_border']=='' || substr($atts['icon_border'],0,1) =='0')) {
               $padding = 'padding: 0;';
           }
        } elseif ($atts['icon_align'] == 'top_right') {
           $description_margin = ($atts['icon_gap']) ? 'margin-right: '.intval($atts['icon_gap']).'px;' : '';
           if (($atts['icon_background']=='transparent' || $atts['icon_background']=='') and ($atts['icon_border']=='' || substr($atts['icon_border'],0,1) =='0')) {
               $padding = 'padding: 0;';
           }
        } else { 
            if (($atts['icon_background']=='transparent' || $atts['icon_background']=='') and ($atts['icon_border']=='' || substr($atts['icon_border'],0,1) =='0')) {
                $description_margin = 'margin-left: '.(intval($atts['icon_size'])+20).'px;';
                $padding = 'padding: 0;';
            }
            else {
                $description_margin = 'margin-left: '.(intval($atts['icon_size'])+(intval($atts['icon_padding'])*2)+30+(intval($atts['icon_border'])*2)).'px;'; 
            }
            $description_margin = ($atts['icon_gap']) ? 'margin-left: '.intval($atts['icon_gap']).'px;' : $description_margin;
        }

        if ($atts['icon_animation'] == 6) {
            $css[] = '#'.$id.'.su-il-animation-6 .icon_list_icon i:before { margin-right: -' . round(intval($atts['icon_size']) / 2) .'px;width: ' .intval($atts['icon_size']).'px;}';
        }

        $icon_list_connector = ($atts['connector']=="yes" and ($atts['icon_align'] == 'right' or $atts['icon_align'] == 'left')) ? 'icon_list_connector' : '' ;

        $css[] = '#'.$id.' .icon_list_icon { background:' . $atts['icon_background'] . '; font-size:' . intval($atts['icon_size']) . 'px; max-width:' . intval($atts['icon_size']) . 'px; height:' . intval($atts['icon_size']) . 'px;' .$border.$padding.$radius.$shadow.'}';
        $css[] = '#'.$id.' .icon_description { '.$description_margin.'}';
        $css[] = '#'.$id.' .su-il-link { text-decoration: none; color: inherit; }';

        if ($title_color or $title_size) {
            $css[] = '#'.$id.' .icon_description h3 {' .$title_color.$title_size.'}';
        }
        if ($atts['color']) {
            $css[] = '#'.$id.' .icon_description_text { color:' . $atts['color'] . ';}';
        }

        if ( ( $atts['url'] !='' ) and ( $atts['linkto'] ==='icon' ) ) {
            $icon = '<a href="'.$atts['url'].'" target="_'.$atts['target'].'" title="'.$atts['title'].'" class="su-il-link">'.$icon.'</a>';
        }
        
        $title = '<h3 class="icon_title">'.$atts['title'].'</h3>';
        if ( ( $atts['url'] !='' ) and ( $atts['linkto'] ==='title' ) ) {
            $title = '<a href="'.$atts['url'].'" target="_'.$atts['target'].'" title="'.$atts['title'].'" class="su-il-link">'.$title.'</a>';
        }
        
        $item = '<div class="icon_list_item">
                    <div class="icon_list_wrapper '. $icon_list_connector .'">
                        <div class="icon_list_icon">'
                            . $icon . '
                        </div>
                    </div>

                    <div class="icon_description">
                        '.$title.'
                        <div class="icon_description_text">'
                         . su_do_shortcode($content) .
                        '</div>
                    </div>
                    <div class="clearfix"></div>
                </div>';
        if ( ( $atts['url'] !='' ) and ( $atts['linkto'] ==='all' ) ) {
            $item = '<a href="'.$atts['url'].'" target="_'.$atts['target'].'" title="'.$atts['title'].'" class="su-il-link">'.$item.'</a>';
        }

        // Add CSS in head
        suAsset::addString('css', implode("\n", $css));
        suAsset::addFile('css', 'icon-list.css', __FUNCTION__);

        $return = '<div id="'.$id.'"'.su_scroll_reveal($atts).' class="'.su_acssc($classes).'">'.$item.'</div>';

        return $return;
    }

}
