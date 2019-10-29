<?php 

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_dummy_image extends Su_Shortcodes {

    function __construct() {
        parent::__construct();
    }

    public static function dummy_image($atts = null, $content = null) {
        $atts = su_shortcode_atts(array(
            'width'  => 500,
            'height' => 300,
            'theme'  => 'any',
            'scroll_reveal' => '',
            'class'  => ''
                ), $atts, 'dummy_image');
        $url = 'http://lorempixel.com/' . $atts['width'] . '/' . $atts['height'] . '/';
        if ($atts['theme'] !== 'any')
            $url .= $atts['theme'] . '/' . rand(0, 10) . '/';
        return '<img'.su_scroll_reveal($atts).' src="' . $url . '" alt="' .JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DUMMY_IMAGE') . '" width="' . $atts['width'] . '" height="' . $atts['height'] . '" class="su-dummy-image' . su_ecssc($atts) . '" />';
    }
}
