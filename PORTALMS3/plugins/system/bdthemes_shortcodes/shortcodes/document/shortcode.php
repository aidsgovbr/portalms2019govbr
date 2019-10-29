<?php 

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_document extends Su_Shortcodes {

    function __construct() {
        parent::__construct();
    }

    public static function document($atts = null, $content = null) {
        $atts = su_shortcode_atts(array(
            'url'        => '',
            'file'       => null, 
            'width'      => 600,
            'height'     => 600,
            'responsive' => 'yes',
            'scroll_reveal' => '',
            'class'      => ''
                ), $atts, 'document');
        if ($atts['file'] !== null)
            $atts['url'] = $atts['file'];
        suAsset::addFile('css', 'document.css', __FUNCTION__);
        return '<div'.su_scroll_reveal($atts).' class="su-document su-responsive-media-' . $atts['responsive'] . '"><iframe src="//docs.google.com/viewer?embedded=true&amp;url=' . image_media($atts['url']) . '" width="' . $atts['width'] . '" height="' . $atts['height'] . '" class="su-document' . su_ecssc($atts) . '"></iframe></div>';
    }
}
