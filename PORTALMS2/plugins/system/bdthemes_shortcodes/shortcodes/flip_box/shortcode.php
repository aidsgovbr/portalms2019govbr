<?php 

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_flip_box extends Su_Shortcodes {

    function __construct() {
        parent::__construct();
    }

    public static function flip_box( $atts = null, $content = null ) {
        $atts = su_shortcode_atts( array(
            'animation_style' => 'horizontal_flip_left',
            'scroll_reveal'   => '',
            'class'           => ''
          ), $atts, 'flip_box' );

        suAsset::addFile('css', 'flip-box.css', __FUNCTION__);
        $return = '
        <div'.su_scroll_reveal($atts).' class="flip-box-wrap' . $atts['class'] . '"><div class="su-flip-box '.$atts['animation_style'].'">
            '.su_do_shortcode($content).'<div style="clear:both;height:0"></div>
        </div></div>';
        return $return;
    }

}
