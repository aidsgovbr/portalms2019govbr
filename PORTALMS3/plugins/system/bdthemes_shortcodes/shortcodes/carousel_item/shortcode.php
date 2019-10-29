<?php 

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_carousel_item extends Su_Shortcodes {

    function __construct() {
        parent::__construct();
    }

  
    public static function carousel_item($atts = null, $content = null) {
        $atts = su_shortcode_atts(array(
            'class' => ''
                ), $atts, 'carousel_item');
        return '<div class="su-custom-carousel-item su-clearfix su-custom-carousel-wrap' . su_ecssc($atts) . '">' . su_do_shortcode($content) . '</div>';
    }
}
