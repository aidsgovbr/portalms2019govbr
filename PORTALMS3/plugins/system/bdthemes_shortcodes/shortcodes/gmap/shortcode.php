<?php

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_gmap extends Su_Shortcodes {

    function __construct() {
        parent::__construct();
    }
    public static function gmap($atts = null, $content = null) {
        $atts = su_shortcode_atts(array(
            'width'         => '100%',
            'height'        => '400',
            'responsive'    => 'yes',
            'address'       => 'BdThemes Ltd, Bogra, Bangladesh',
            'scroll_reveal' => '',
            'class'         => ''
        ), $atts, 'gmap');

        // Prepare protocol
        $protocol = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') ? "https://" : "http://";
        $responsive = ($atts['responsive'] == 'yes') ? ' su-responsive-frame' : '';

        if ($atts['responsive'] == 'yes') {
            suAsset::addFile('js', 'fitframe.min.js');
        }

        return '<div'.su_scroll_reveal($atts).' class="su-gmap' .$responsive. su_ecssc($atts) . '"><iframe class="js-reframe" width="' . $atts['width'] . '" height="' . $atts['height'] . '" src="' . $protocol . 'maps.google.com/maps?q=' . urlencode(su_scattr($atts['address'])) . '&amp;output=embed"></iframe></div>';
    }

}
