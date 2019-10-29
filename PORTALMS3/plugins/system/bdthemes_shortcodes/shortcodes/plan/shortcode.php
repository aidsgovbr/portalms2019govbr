<?php 

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_plan extends Su_Shortcodes {
    static $plans = array();
    static $count_plans = 0;

    function __construct() {
        parent::__construct();
    }
    public static function _plan($atts = null, $content = null) {
        $atts = su_shortcode_atts(array(
            'name'                 => 'Standard',
            'price'                => '19.99',
            'old_price'            => '',
            'before'               => '$',
            'after'                => '',
            'period'               => 'per month',
            'featured'             => 'no',
            'icon'                 => '',
            'icon_color'           => '#666666',
            'btn_url'              => '#',
            'btn_target'           => 'self',
            'btn_text'             => 'Sign up Now',
            'btn_color'            => '#ffffff',
            'btn_background'       => '#4FC1E9',
            'btn_background_hover' => '#1AA0D1',
            'badge'                => '',
            'badge_background'     => '#999999',
            'background'           => '#FFFFFF',
            'color'                => '#444444',
            'class'                => ''
        ), $atts, 'plan');

        $id = uniqid('plan_');
        $css = array();
        $icon = '';
        $badge = '';

        if ($atts['icon']) {
            $icon .= '<div class="su-plan-icon">';
                if (strpos($atts['icon'], '/') !== false) {
                    $icon .= '<img src="' . image_media($atts['icon']) . '" alt="" width="' . $atts['size'] . '" height="' . $atts['size'] . '" />';
                }
                // Line Icon
                elseif (strpos($atts['icon'], 'licon:') !== false) {
                    suAsset::addFile('css', 'linea.css');
                    $licon = str_replace('licon:', '', $atts['icon']);
                    $icon .= '<i class="li li-' . trim($licon) . '"></i>';
                    $css[] = '#'.$id . ' .su-plan-icon i { color:' . $atts['icon_color'] . '}';
                }
                // Font-Awesome icon
                elseif (strpos($atts['icon'], 'icon:') !== false) {
                    $ficon = str_replace('icon:', '', $atts['icon']);
                    $icon .= '<i class="fa fa-' . trim($ficon) . '"></i>';
                    $css[] = '#'.$id . ' .su-plan-icon i { color:' . $atts['icon_color'] . '}';
                }
            $icon .= '</div>';
        }

        if ($atts['before'])
            $atts['before'] = '<span class="su-plan-price-before">' . $atts['before'] . '</span>';
        if ($atts['after'])
            $atts['after']  = '<span class="su-plan-price-after">' . $atts['after'] . '</span>';
        if ($atts['period'])
            $atts['period'] = '<div class="su-plan-period">' . $atts['period'] . '</div>';
        if ($atts['featured'] === 'yes')
            $atts['class'] .= ' su-plan-featured';
        if ($atts['badge']) {
            $badge = '<div class="su-plan-badge">' . $atts['badge'] . '</div>';
        }
        if ($atts['old_price']) {
            $old_price = '<div class="su-plan-old-price">' . $atts['before'] . '<span class="su-plan-price-value">' . $atts['old_price'] . '</span>' . $atts['after'] . '</div>';
        }else {
            $old_price = '';
        }        


        $content = trim(strip_tags(su_do_shortcode($content), '<br><ul><li><a><b><strong><i><em><span>'));

        $button = ( $atts['btn_text'] && $atts['btn_url'] ) ? '<a href="' . $atts['btn_url'] . '" class="su-plan-button" target="_' . $atts['btn_target'] . '">' . $atts['btn_text'] . '</a>' : '';

        $footer = ( $button ) ? '<div class="su-plan-footer">' . $button . '</div>' : '';

        $head_style = ($atts['background']) ? 'background-color:' . su_color::darken($atts['background'],'10%') : '';

        $css[] = '#'.$id.' { background-color:' . $atts['background'] . ';}';
        $css[] = '#'.$id.' .su-plan-head { border-bottom-color: '.su_color::lighten($atts['color'], '10%').';color:' . $atts['color'] . ';}';
        $css[] = '#'.$id.' .su-plan-badge { border-color: '.su_color::darken($atts['badge_background'], '10%').';background-color: '.$atts['badge_background'].' }';
        $css[] = '#'.$id.' .su-plan-name { color: '.$atts['color'].';}';
        $css[] = '#'.$id.' .su-plan-button { background-color: '.$atts['btn_background'].'; color:' . $atts['btn_color'] . ';}';
        $css[] = '#'.$id.' .su-plan-button:hover { background-color: '.$atts['btn_background_hover'].';}';
        $css[] = '#'.$id.' .su-plan-footer { border-top-color: '.su_color::lighten($atts['background'],'10%').';background-color:' . $atts['background'] . '; color:' . $atts['btn_background'] . ';}';

        $css[] = '.su-pricing-table.su-pricing-style-4 #'.$id.' { box-shadow: 0px -5px 0px '.$atts['btn_background'].';}';


        suAsset::addString('css', implode("\n", $css));
        suAsset::addFile('css', 'pricing-table.css', 'plan');


        $return = '<div id="'.$id.'" class="su-plan' . su_ecssc($atts) . '">';
            $return .= '<div class="su-plan-head">';
                $return .= $badge;
                $return .= '<div class="su-plan-name">' . $atts['name'] . '</div>';
                $return .= '<div class="su-plan-price">';
                    $return .= $old_price;
                    $return .= $atts['before'] . '<span class="su-plan-price-value">' . $atts['price'] . '</span>' . $atts['after'];
                $return .= '</div>';
                $return .= $atts['period'] . $icon;
            $return .= '</div>';
            $return .= '<div class="su-plan-options">' . $content . '</div>';
            $return .= $footer;
        $return .= '</div>';

        return $return;
    }


    public static function plan($atts = null, $content = null) {

        $return = self::_plan($atts, $content);
        $plans = self::$plans;
        $x = self::$count_plans;
        $plans[$x] = array('atts' => $atts, 'content' => $content);
        self::$plans = $plans;
        self::$count_plans ++;
        return $return;
    }

}
