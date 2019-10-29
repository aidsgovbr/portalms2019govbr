<?php 

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_qrcode extends Su_Shortcodes {

    function __construct() {
        parent::__construct();
    }   
    public static function qrcode($atts = null, $content = null ) {
        $atts = su_shortcode_atts(array(
                'data'          => '',
                'title'         => '',
                'size'          => 200,
                'margin'        => 0,
                'align'         => 'none',
                'link'          => '',
                'target'        => 'blank',
                'color'         => '#000000',
                'background'    => '#ffffff',
                'scroll_reveal' => '',
                'class'      => ''
            ), $atts, 'qrcode' );

        if ( !$atts['data'] ) return 'QR code: ' .JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SPECIFY_DATA');

        $atts['title'] = esc_attr( $atts['title'] );

        $qrImg =  '<img src="https://api.qrserver.com/v1/create-qr-code/?data=' . urlencode( $atts['data'] ) . '&amp;size=' . $atts['size'] . 'x' . $atts['size'] . '&amp;format=png&amp;margin=' . $atts['margin'] . '&amp;color=' . su_color::hexToRgb($atts['color'], true, '-') . '&amp;bgcolor=' . su_color::hexToRgb($atts['background'], true, '-') . '" alt="' . $atts['title'] . '" />';

        if ($atts['link']) {
            if ( $atts['link'] ) $atts['class'] .= ' su-qrcode-clickable';
            $return = '<a href="' . $atts['link'] . '" target="_' . $atts['target'] . '" title="' . $atts['title'] . '">'.$qrImg.'</a>';
        }
        else {
            $return = $qrImg;
        }

        suAsset::addFile('css', 'qr-code.css', __FUNCTION__);

        return '<span'.su_scroll_reveal($atts).' class="su-qrcode su-qrcode-align-' . $atts['align'] . su_ecssc($atts) . '">'.$return.'</span>';
    }
}
