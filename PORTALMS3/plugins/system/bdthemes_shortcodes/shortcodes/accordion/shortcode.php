<?php

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined('_JEXEC') or die;

class Su_Shortcode_accordion extends Su_Shortcodes {

    function __construct() {
        parent::__construct();
    }

    public static function accordion($atts = null, $content = null) {
        
        $atts = su_shortcode_atts(array(
				'scroll_reveal' => '',
				'class'         => ''
        		), $atts, 'accordion');

        return '<div class="su-accordion' . su_ecssc($atts) . '"'.su_scroll_reveal($atts).'>' . su_do_shortcode($content) . '</div>';
    }
}