<?php 

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_content_slide extends Su_Shortcodes {

    function __construct() {
        parent::__construct();
    }

  
    public static function content_slide($atts = null, $content = null) {
        $atts = su_shortcode_atts(array(
            'class' => ''
                ), $atts, 'content_slide');
        return '<div class="su-content-slide su-clearfix su-content-wrap' . su_ecssc($atts) . '">' . su_do_shortcode($content) . '</div>';
    }
}
