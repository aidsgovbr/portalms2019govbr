<?php 

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_shadow extends Su_Shortcodes {

    function __construct() {
        parent::__construct();
    }   
    public static function shadow($atts = null, $content = null) {
        $atts = su_shortcode_atts(array(
            'style'  => 'default',
            'inline' => 'no',
            'class'  => ''
                ), $atts, 'shadow');
        suAsset::addFile('css', 'shadow.css', __FUNCTION__);
        return '<div class="su-shadow-wrap su-content-wrap su-shadow-inline-' . $atts['inline'] . su_ecssc($atts) . '"><div class="su-shadow su-shadow-style-' . $atts['style'] . '">' . su_do_shortcode($content) . '</div></div>';
    }
}
