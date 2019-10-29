<?php 

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_dummy_text extends Su_Shortcodes {

    function __construct() {
        parent::__construct();
    }

    public static function dummy_text($atts = null, $content = null) {
        $atts = su_shortcode_atts(array(
            'amount' => 1,
            'what'   => 'paras',
            'cache'  => 'yes',
            'scroll_reveal' => '',
            'class'  => ''
            ), $atts, 'dummy_text');

        $xml = simplexml_load_file('http://www.lipsum.com/feed/xml?amount=' . $atts['amount'] . '&what=' . $atts['what'] . '&start=0');
        $return = '<div'.su_scroll_reveal($atts).' class="su-dummy-text' . su_ecssc($atts) . '"><p>' . str_replace("\n", "</p><p>", $xml->lipsum) . '</p></div>';
        return $return;
    }
}
