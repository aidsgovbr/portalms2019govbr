<?php 

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_splash extends Su_Shortcodes {

    function __construct() {
        parent::__construct();
    }   
    public static function splash($atts = null, $content = null) {
        $atts = su_shortcode_atts(array(
            'style'   => 'dark',
            'width'   => 480,
            'padding' => '',
            'opacity' => 80,
            'onclick' => 'close-bg',
            'url'     => 'http://www.bdthemes.com',
            'delay'   => 0,
            'esc'     => 'yes',
            'close'   => 'yes',
            'class'   => ''
        ), $atts, 'splash');
        $id = uniqid('suss_');
        $css = array();
        $atts['opacity'] = (!is_numeric($atts['opacity']) || $atts['opacity'] > 100 || $atts['opacity'] < 0 ) ? 0.8 : $atts['opacity'] / 100;

        if (@$_REQUEST["action"] == 'su_generator_preview') {
            return su_alert_box(JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_NOT_WORK_IN_GENERATOR'), 'warning');
        }

        if ($atts['padding']) {
            $css[] = '#'.$id.'.su-splash-screen {padding:'.$atts['padding'].';}';
        }

        suAsset::addString('css', implode('', $css));
        suAsset::addFile('css', 'magnific-popup.css');
        suAsset::addFile('css', 'splash.css', __FUNCTION__);
        suAsset::addFile('js', 'magnific-popup.js');
        suAsset::addFile('js', 'splash.js', __FUNCTION__);
        return '<div class="su-splash" data-esc="' . $atts['esc'] . '" data-close="' . $atts['close'] . '" data-onclick="' . $atts['onclick'] . '" data-url="' . $atts['url'] . '" data-opacity="' . (string) $atts['opacity'] . '" data-width="' . $atts['width'] . '" data-style="su-splash-style-' . $atts['style'] . '" data-delay="' . (string) $atts['delay'] . '"><div id="'.$id.'" class="su-splash-screen su-content-wrap' . su_ecssc($atts) . '">' . su_do_shortcode($content) . '</div></div>';
    }
}
