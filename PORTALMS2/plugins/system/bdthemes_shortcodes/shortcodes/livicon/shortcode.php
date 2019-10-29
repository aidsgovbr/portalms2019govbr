<?php

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_livicon extends Su_Shortcodes {
    function __construct() {
        parent::__construct();
    }
    public static function livicon($atts = null, $content = null) {
        $atts = su_shortcode_atts(array(
            'icon'             => 'heart',
            'size'             => 32,
            'color'            => '#666666',
            'original_color'   => 'false',
            'hover_color'      => '#000000',
            'background_color' => '#eeeeee',
            'padding'          => '15px',
            'radius'           => '3px',
            'border'           => 'none',
            'margin'           => '',
            'event_type'       => 'hover',
            'animate'          => 'yes',
            'loop'             => 'no',
            'parent'           => 'no',
            'morph_duration'   => 0.6,
            'duration'         => 0.6,
            'iteration'        => 1,
            'url'              => '',
            'target'           => 'self',
            'scroll_reveal'    => '',
            'class'            => ''
        ), $atts, 'livicon');
        $id = uniqid('sulic_');
        $css[] = '';

        $atts['animate'] = ($atts['animate'] === 'yes') ?  'true' : 'false';
        $atts['loop'] = ($atts['loop'] === 'yes') ?  'true' : 'false';
        $atts['parent'] = ($atts['parent'] === 'yes') ?  'true' : 'false';
        $atts['morph_duration'] = $atts['morph_duration'] * 1000;
        $atts['duration'] = $atts['duration'] * 1000;

        $margin = ($atts['margin']) ? 'margin:' . $atts['margin'] .';': '';
        $padding = ($atts['padding']) ? 'padding:' . $atts['padding'] .';': '';
        $background_color = ($atts['background_color']) ? 'background-color:' . $atts['background_color'] .';': '';
        $border = ($atts['border']) ? 'border:' . $atts['border'] .';': '';
        $radius = ($atts['radius']) ? 'border-radius:' . $atts['radius'] .';': '';

        if ( $margin or $padding or $background_color or $radius or $border) {
            $css[] = '#'.$id.'.su-livicon { '.$margin.$padding.$background_color.$border.$radius.'}';
        }

        if ($atts['url']) {
            $return = '<a id="'.$id.'" '.su_scroll_reveal($atts).' href="' . $atts['url'] . '" class="su-livicon ' . su_ecssc($atts) . '" target="_' . $atts['target'] . '"><span class="livicon" data-name="'.$atts['icon'].'" data-size="'.intval($atts['size']).'" data-color="'.$atts['color'].'" data-hovercolor="'.$atts['hover_color'].'" data-animate="'.$atts['animate'].'" data-loop="'.$atts['loop'].'" data-iteration="'.$atts['iteration'].'" data-duration="'.$atts['duration'].'" data-eventtype="'.$atts['event_type'].'" data-onparent="'.$atts['parent'].'"></span>' . su_do_shortcode($content) . '</a>';
        } else {
            $return = '<span id="'.$id.'" '.su_scroll_reveal($atts).' class="su-livicon' . su_ecssc($atts) . ' livicon" data-name="'.$atts['icon'].'" data-size="'.intval($atts['size']).'" data-color="'.$atts['color'].'" data-hovercolor="'.$atts['hover_color'].'" data-animate="'.$atts['animate'].'" data-loop="'.$atts['loop'].'" data-iteration="'.$atts['iteration'].'" data-duration="'.$atts['duration'].'" data-eventtype="'.$atts['event_type'].'" data-onparent="'.$atts['parent'].'"></span>'. su_do_shortcode($content);
        }
        
        // Asset added
        suAsset::addFile('css', 'livicon.css', __FUNCTION__);
        suAsset::addString('css', implode("\n", $css));
        suAsset::addFile('js', 'raphael.min.js', __FUNCTION__);
        suAsset::addFile('js', 'livicons.min.js', __FUNCTION__);

        return $return;
    }

}
