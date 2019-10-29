<?php 

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_frame extends Su_Shortcodes {

    function __construct() {
        parent::__construct();
    }
    public static function frame($atts = null, $content = null) {
        $atts = su_shortcode_atts(array(
            'style'         => 'default',
            'align'         => 'left',
            'scroll_reveal' => '',
            'class'         => ''
                ), $atts, 'frame');
        suAsset::addFile('css', 'frame.css', __FUNCTION__);
        suAsset::addFile('js', 'frame.js', __FUNCTION__);
        return '<span'.su_scroll_reveal($atts).' class="su-frame su-frame-align-' . $atts['align'] . ' su-frame-style-' . $atts['style'] . su_ecssc($atts) . '"><span class="su-frame-inner">' . su_do_shortcode($content) . '</span></span><div class="clear clearfix"></div>';
    }
}
