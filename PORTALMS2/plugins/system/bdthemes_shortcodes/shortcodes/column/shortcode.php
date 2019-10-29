<?php 

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_column extends Su_Shortcodes {

    function __construct() {
        parent::__construct();
    }   
   
    public static function column($atts = null, $content = null) {
        $atts = su_shortcode_atts(array(
            'size'           => '1/1',
            'medium'         => '',
            'small'          => '',
            'visible'        => '', // large, medium, small
            'hidden'         => '', // large, medium, small
            'center'         => 'no',
            'last'           => '',
            'background'     => '',
            'color'          => '',
            'padding'        => '',
            'vertical_align' => 'top',
            'scroll_reveal'  => '',
            'class'          => ''
        ), $atts, 'column');

        $id             = uniqid('sucol');
        $css            = array();
        $classes        = array('su-column', su_ecssc($atts));
        $vertical_align = '';

        if ($atts['small']) {
            $classes[] = 'su-column-size-small-' . str_replace('/', '-', $atts['small']);
        } else {
            $classes[] = 'su-column-size-1-1';
        }
        if ($atts['medium']) {
            $classes[] = 'su-column-size-medium-' . str_replace('/', '-', $atts['medium']);
        }
        if ($atts['size'] and $atts['medium']) {
            $classes[] = 'su-column-size-large-' . str_replace('/', '-', $atts['size']);
        } else {
            $classes[] = 'su-column-size-medium-' . str_replace('/', '-', $atts['size']);
        }


        if ($atts['visible']) {
            $classes[] = 'su-visible-' . $atts['visible'];
        }
        if ($atts['hidden']) {
            $classes[] = 'su-hidden-' . $atts['hidden'];
        }

        if ($atts['vertical_align'] === 'middle') {
            $classes[] = 'su-vertical-align-middle';
        } elseif ($atts['vertical_align'] === 'bottom') {
            $classes[] = 'su-vertical-align-bottom';
        }

        if ($atts['last'] == 'yes' or $atts['last'] == '1')
            $classes[] = 'su-column-last';
        if ($atts['center'] === 'yes')
            $classes[] = 'su-column-centered';
        if ($atts['background']) { 
            $atts['background'] = 'background-color: '.$atts['background'].';';
        }
        if ($atts['color']) { 
            $atts['color'] = 'color: '.$atts['color'].';';
        }
        if ($atts['padding']) { 
            $atts['padding'] = 'padding: '.$atts['padding'].'px;';
        }
        if (($atts['background']) or ($atts['color'])) {
            $css[] = '#'.$id.'.su-column > .su-column-inner {'.$atts['background'].$atts['color'].$atts['padding'].'}';
        }


        suAsset::addFile('css', 'row-column.css');
        suAsset::addString('css', implode("\n", $css));

        return '<div id="'.$id.'"'.su_scroll_reveal($atts).' class="' . su_acssc($classes) . '"><div class="su-column-inner"><div class="su-column-content">' . su_do_shortcode($content) . '</div></div></div>';
    }

}
