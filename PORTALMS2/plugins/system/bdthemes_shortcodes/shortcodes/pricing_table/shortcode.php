<?php

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_pricing_table extends Su_Shortcodes {



    function __construct() {
        parent::__construct();
    }   
    public static function pricing_table($atts = null, $content = null) {
        $atts = su_shortcode_atts(array(
        'style'         => 1,
        'scroll_reveal' => '',
        'class'         => ''
            ), $atts, 'pricing_table');

        su_do_shortcode($content);

        $plans = array();
        $count = count( Su_Shortcode_plan::$plans );
        if ( !$count ) return JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PRICING_TABLE_HELP');

        foreach ( Su_Shortcode_plan::$plans as $plan ) {
            $plans[] = Su_Shortcode_plan::_plan( $plan['atts'], $plan['content'] );
        }

        Su_Shortcode_plan::$plans = array();

        return '<div'.su_scroll_reveal($atts).' class="su-pricing-table su-clearfix su-pricing-style-'.$atts['style'].' su-pricing-table-size-' . $count . su_ecssc( $atts ) . '">' . implode( '', $plans ) . '</div>';
    }
}
