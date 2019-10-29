<?php 

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_odometer extends Su_Shortcodes {

    function __construct() {
      parent::__construct();
    }

    public static function odometer($atts = null, $content = null) {
        $atts = su_shortcode_atts(array(
            'id'            => uniqid('suo_'),
            'align'         => 'top',
            'count_start'   => 1,
            'count_end'     => 5000,
            'count_color'   => '',
            'count_size'    => '32px',
            'text_color'    => '',
            'text_size'     => '14px',
            'icon'          => '',
            'icon_color'    => '',
            'icon_size'     => '24',
            'border'        => '',
            'padding'       => '',
            'background'    => '',
            'scroll_reveal' => '',
            'class'         => ''
            ), $atts);       

        $id     = $atts['id'];
        $output = [];
        $css    = [];

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

        $icon       = ($atts['icon']) ? '<div class="su-odometer-icon">'. $atts['icon'] .'</div>' : '';
        $icon_color = ($atts['icon_color']) ? 'color:' . $atts['icon_color'] . ';' : '';
        $icon_size  = ($atts['icon_size']) ? 'font-size: '.intval($atts['icon_size']).'px;' : 'font-size: '.$atts['count_size'].';';
        $border     = ($atts['border']) ? 'border:'.$atts['border'].';' : '';
        $background = ($atts['background']) ? 'background-color:'.$atts['background'].';' : '';
        $padding    = ($atts['padding']) ? 'padding:'.$atts['padding'].';' : '';
        $text_color = ($atts['text_color']) ? 'color:' . $atts['text_color'] . ';' : '';

        if ($border or $background or $padding) {
            $css[] = '#'.$id.'.su-odometer-wrapper {' .$background.$border.$padding.'}';
        }

        $css[] = '#'.$id.' .odometer { font-size: '.$atts['count_size'].';}';
        $css[] = '#'.$id.' .odometer { color: '.$atts['count_color'].';}';
        $css[] = '#'.$id.' .su-odometer-text {'. $text_color .' font-size: '.$atts['text_size'].';}';
        $css[] = '#'.$id.' .su-odometer-icon i {' . $icon_color .$icon_size .'}';

        suAsset::addString('css', implode("\n", $css));
        suAsset::addFile('js', 'odometer.js', __FUNCTION__);
        suAsset::addFile('css', 'odometer.css', __FUNCTION__);

        $output[] = '<div id="'. $id .'"'.su_scroll_reveal($atts).' class="su-odometer-wrapper clearfix su-odometer-'.$atts['align'].'">';
            $output[] = $icon;
            $output[] = '<div class="su-odometer-desc">';
                $output[] = '<div id="'. $id .'" class="odometer">'.$atts['count_start'].'</div>';
                $output[] = '<div class="su-odometer-text">'. su_do_shortcode($content) .'</div>';
            $output[] = '</div>';
        $output[] = '</div>';

        $output[] = '<script>
                      setTimeout(function(){
                        jQuery("#'. $id .' .odometer").html('.$atts['count_end'].');
                      }, 1000);
                    </script>';

        return implode("\n", $output);
    }
}
