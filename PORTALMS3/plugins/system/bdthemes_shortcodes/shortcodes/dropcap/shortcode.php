<?php 

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_dropcap extends Su_Shortcodes {

    function __construct() {
        parent::__construct();
    }

   
    public static function dropcap($atts = null, $content = null) {
        $atts = su_shortcode_atts(array(
            'style' => 'default',
            'size'  => 3,
            'scroll_reveal' => '',
            'class' => ''
                ), $atts, 'dropcap');

        if ($atts['style']=='simple') {
            $em = ($atts['size'] * 0.5) + 2 . 'em';
        }else {
            $em = $atts['size'] * 0.5 . 'em';
        }
        suAsset::addFile('css', 'dropcap.css', __FUNCTION__);
        return '<span'.su_scroll_reveal($atts).' class="su-dropcap su-dropcap-style-' . $atts['style'] . su_ecssc($atts) . '" style="font-size:' . $em . '">' . su_do_shortcode($content) . '</span>';
    }
}
