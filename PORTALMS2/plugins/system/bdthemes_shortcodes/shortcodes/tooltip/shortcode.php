<?php

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_tooltip extends Su_Shortcodes {

    function __construct() {
        parent::__construct();
    }
       
    public static function tooltip($atts = null, $content = null) {
        $atts = su_shortcode_atts(array(
            'style'    => 'yellow',
            'position' => 'top',
            'shadow'   => 'no',
            'rounded'  => 'no',
            'size'     => 'default',
            'title'    => '',
            'text'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CONTENT_DEFAULT'),
            'behavior' => 'hover',
            'close'    => 'no',
            'class'    => ''
                ), $atts, 'tooltip');
        $atts['style'] = ( in_array($atts['style'], array('light', 'dark', 'green', 'red', 'blue', 'youtube', 'tipsy', 'bootstrap', 'jtools', 'tipped', 'cluetip')) ) ? $atts['style'] : 'plain';
        $atts['position'] = str_replace(array('top', 'right', 'bottom', 'left'), array('north', 'east', 'south', 'west'), $atts['position']);
        $position = array(
            'my' => str_replace(array('north', 'east', 'south', 'west'), array('bottom center', 'center left', 'top center', 'center right'), $atts['position']),
            'at' => str_replace(array('north', 'east', 'south', 'west'), array('top center', 'center right', 'bottom center', 'center left'), $atts['position'])
        );
        $classes = array('su-qtip qtip-' . $atts['style']);
        $classes[] = 'su-qtip-size-' . $atts['size'];
        if ($atts['shadow'] === 'yes')
            $classes[] = 'qtip-shadow';
        if ($atts['rounded'] === 'yes')
            $classes[] = 'qtip-rounded';

        suAsset::addFile('css', 'qtip.css', __FUNCTION__);
        suAsset::addFile('css', 'tooltip.css', __FUNCTION__);
        suAsset::addFile('js', 'qtip.js', __FUNCTION__);
        suAsset::addFile('js', 'tooltip.js', __FUNCTION__);

        return '<span class="su-tooltip' . su_ecssc($atts) . '" data-close="' . $atts['close'] . '" data-behavior="' . $atts['behavior'] . '" data-my="' . $position['my'] . '" data-at="' . $position['at'] . '" data-classes="' . implode(' ', $classes) . '" data-title="' . $atts['title'] .
        '" title="' . ( $atts['text'] ) . '">' . su_do_shortcode($content) . '</span>';
    }
}
