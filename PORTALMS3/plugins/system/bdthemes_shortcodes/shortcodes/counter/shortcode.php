<?php 

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_counter extends Su_Shortcodes {

    function __construct() {
      parent::__construct();
    }

    public static function counter($atts = null, $content = null) {
        $atts = su_shortcode_atts(array(
            'id'                       => uniqid('suc'),
            'align'                    => 'top',
            'count_start'              => 1,
            'count_end'                => 5000,
            'counter_refresh_interval' => 50,
            'counter_speed'            => 5,
            'separator'                => 'no',
            'decimal'                  => 'no',
            'prefix'                   => '',
            'suffix'                   => '',
            'count_color'              => '',
            'count_size'               => '32px',
            'text_color'               => '',
            'text_size'                => '14px',
            'icon'                     => '',
            'icon_color'               => '',
            'icon_size'                => '24',
            'border'                   => '',
            'padding'                  => '',
            'background'               => '',
            'scroll_reveal'            => '',
            'class'                    => ''
            ), $atts);       

        $id     = $atts['id'];
        $css    = [];
        $output = [];

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

        $icon       = ($atts['icon']) ? '<div class="su-counter-icon">'. $atts['icon'] .'</div>' : '';
        $border     = ($atts['border']) ? 'border:'.$atts['border'].';' : '';
        $background = ($atts['background']) ? 'background-color:'.$atts['background'].';' : '';
        $padding    = ($atts['padding']) ? 'padding:'.$atts['padding'].';' : '';

        if ($border or $background or $padding) {
            $css[] = '#'.$id.' {' .$background.$border.$padding.'}';
        }

        $count_color = ($atts['count_color']) ? 'color:' . $atts['count_color'] . ';' : '';
        $text_color  = ($atts['text_color']) ? 'color:' . $atts['text_color'] . ';' : '';
        $icon_color  = ($atts['icon_color']) ? 'color:' . $atts['icon_color'] . ';' : '';
        $icon_size   = ($atts['icon_size']) ? 'font-size: '.intval($atts['icon_size']).'px;' : 'font-size: '.$atts['count_size'].';';

        $css[] = '#'.$id.' .su-counter-number { font-size: '.$atts['count_size'].'; '. $count_color .' }';
        $css[] = '#'.$id.' .su-counter-text {'. $text_color .' font-size: '.$atts['text_size'].';}';
        $css[] = '#'.$id.' .su-counter-icon i {' . $icon_color .$icon_size .'}';

        suAsset::addString('css', implode("\n", $css));
        suAsset::addFile('js', 'jquery.appear.js');
        suAsset::addFile('js', 'countUp.js', __FUNCTION__);
        suAsset::addFile('css', 'counter.css', __FUNCTION__);

        $output[] = '<div id="'. $id .'"'.su_scroll_reveal($atts).' class="su-counter-wrapper clearfix su-counter-'.$atts['align'].' '. su_ecssc($atts) . '" data-id="'.$id.'" data-from="'.$atts['count_start'].'" data-to="'.$atts['count_end'].'" data-speed="'.$atts['counter_speed'].'" data-separator="'.$atts['separator'].'" data-prefix="'.$atts['prefix'].'" data-suffix="'.$atts['suffix'].'">';
        $output[] = $icon;
        $output[] = '<div class="su-counter-desc">
                <div id="'. $id .'_count"  class="su-counter-number">
                </div>
                <div class="su-counter-text">'. su_do_shortcode($content) .'</div>                
            </div>
        </div>';

        return implode("\n", $output);
    }
}
