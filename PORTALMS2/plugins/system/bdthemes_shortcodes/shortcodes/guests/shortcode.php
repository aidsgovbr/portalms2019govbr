<?php 

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_guests extends Su_Shortcodes {

    function __construct() {
        parent::__construct();
    }   
    public static function guests( $atts = null, $content = null ) {
        $atts = su_shortcode_atts( array( 'scroll_reveal' => '', 'class' => '' ), $atts, 'guests' );
        $guest = JFactory::getUser();
        $return = '';
        if ( $guest->guest && !is_null( $content ) ) {
            $return = '<div'.su_scroll_reveal($atts).' class="su-guests' . su_ecssc( $atts ) . '">' . su_do_shortcode( $content ) . '</div>';
        }
        return $return;
    }
}
