<?php 

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_highlight extends Su_Shortcodes {

    function __construct() {
        parent::__construct();
    }
    public static function highlight($atts = null, $content = null) {
        $atts = su_shortcode_atts(array(
            'background'    => '#ddff99',
            'bg'            => null, 
            'color'         => '#000000',
            'scroll_reveal' => '',
            'class'         => ''
                ), $atts, 'highlight');
        if ($atts['bg'] !== null)
            $atts['background'] = $atts['bg'];
        suAsset::addFile('css', 'highlight.css', __FUNCTION__);
        return '<span '.su_scroll_reveal($atts).'class="su-highlight' . su_ecssc($atts) . '" style="background:' . $atts['background'] . ';color:' . $atts['color'] . '">&nbsp;' . su_do_shortcode($content) . '&nbsp;</span>';
    }
}
