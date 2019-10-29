<?php

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_heading extends Su_Shortcodes {

  function __construct() {
    parent::__construct();
  }

  public static function heading( $atts = null, $content = null ) {
    $atts = su_shortcode_atts(array(
        'style'         => 'default',
        'size'          => '',
        'line_height'   => '',
        'align'         => 'center',
        'style_color'   => '',
        'margin'        => '',
        'width'         => '',
        'heading'       => 'h3',
        'color'         => '',
        'scroll_reveal' => '',
        'class'         => ''
    ), $atts, 'heading');

    $id = uniqid('suhead');
    $css = array();
    
    $width       = ($atts['width']) ? 'width: ' . intVal($atts['width']) . '%;' : '';
    $margin      = ($atts['margin']) ? 'margin-bottom: ' . intVal($atts['margin']) . 'px;' : '';
    $size        = ($atts['size']) ? 'font-size: ' . intVal($atts['size']) . 'px;' : '';
    $line_height = ($atts['line_height']) ? 'line-height: ' . intVal($atts['line_height']) . 'px;' : '';
    $color       = ($atts['color']) ? ' color: ' . $atts['color'] . ';' : '';

    if ( $atts['width'] or $atts['margin']) {
        $css[] = '#'.$id.'.su-heading {'.$width.$margin.'}';
    }

    if ($atts['size'] or $atts['color']) {
        $css[] = '#'.$id.'.su-heading .su-heading-inner {'.$size.$color.'}';
    }

    if ($atts['line_height']) {
        $css[] = '#'.$id.'.su-heading .su-heading-inner {'.$line_height.'}';
    }

    if ($atts['style_color']) {
        if ($atts['style'] == 1 or $atts['style'] == 2 or $atts['style'] == 3) {
            $css[] = '#'.$id.' .su-heading-inner:before {background: '.$atts['style_color'].'}';
        }
        if ($atts['style'] == 4) {
            $css[] = '#'.$id.' .su-heading-inner {border-bottom-color: '.$atts['style_color'].'}';
        }
        if ($atts['style'] == 5) {
            $css[] = '#'.$id.' .su-heading-inner:before, #'.$id.' .su-heading-inner:after { background-image: url("data:image/svg+xml;utf8,<svg xmlns=\'http://www.w3.org/2000/svg\' width=\'5\' height=\'10\' viewBox=\'0 0 5 10\'><line x1=\'-2\' y1=\'1\' x2=\'7\' y2=\'10\' stroke=\''.$atts['style_color'].'\' stroke-width=\'1\'/><line x1=\'-2\' y1=\'6\' x2=\'7\' y2=\'15\' stroke=\''.$atts['style_color'].'\' stroke-width=\'1\'/><line x1=\'-2\' y1=\'-4\' x2=\'7\' y2=\'5\' stroke=\''.$atts['style_color'].'\' stroke-width=\'1\'/></svg>");}';
        }
        if ($atts['style'] == 6) {
            $css[] = '#'.$id.' .su-heading-inner:before { background-image: url("data:image/svg+xml;utf8,<svg xmlns=\'http://www.w3.org/2000/svg\' width=\'11\' height=\'8\' viewBox=\'0 0 100 100\' xml:space=\'preserve\'><rect x=\'14.614\' y=\'14.824\' transform=\'matrix(0.7071 -0.7071 0.7071 0.7071 -20.8159 49.9564)\' fill=\''.$atts['style_color'].'\' width=\'70\' height=\'70\'/></svg>");}';
        }
        if ($atts['style'] == 7) {
            $css[] = '#'.$id.' .su-heading-inner:before { background-image: url("data:image/svg+xml;utf8,<svg xmlns=\'http://www.w3.org/2000/svg\' width=\'9\' height=\'6\' viewBox=\'0 0 100 100\' xml:space=\'preserve\'><circle fill=\''.$atts['style_color'].'\' cx=\'50\' cy=\'50\' r=\'50\'/></svg>");}';
        }
        if ($atts['style'] == 8) {
            $css[] = '#'.$id.' .su-heading-inner:before { background-image: url("data:image/svg+xml;utf8,<svg xmlns=\'http://www.w3.org/2000/svg\' width=\'122px\' height=\'12px\' viewBox=\'0 0 122 12\' enable-background=\'new 0 0 122 12\' xml:space=\'preserve\'><circle fill=\'transparent\' stroke=\''.su_color::darken($atts['style_color'], '10%').'\' stroke-width=\'2\' cx=\'61\' cy=\'6\' r=\'5\'/><rect y=\'5\' width=\'50\' height=\'1\' fill=\''.$atts['style_color'].'\' /><rect x=\'72\' y=\'5\' width=\'50\' height=\'1\' fill=\''.$atts['style_color'].'\'/></svg>");}';
        }
        if ($atts['style'] == 9) {
            $css[] = '#'.$id.' .su-heading-inner:before { background-image: url("data:image/svg+xml;utf8,<svg xmlns=\'http://www.w3.org/2000/svg\' x=\'0px\' y=\'0px\' viewBox=\'-244 391 122 12\' style=\'enable-background:new -244 391 122 12;\' xml:space=\'preserve\'><polygon points=\'-172.6,391 -173.8,391 -175.6,392.8 -183,400.2 -190.4,392.8 -192.2,391 -193.4,391 -244,391 -244,392.8 -192.9,392.8 -183,402.7 -173.1,392.8 -122,392.8 -122,391 \' fill=\''.$atts['style_color'].'\'/></svg>");}';
        }
        if ($atts['style'] == 10) {
            $css[] = '#'.$id.' .su-heading-inner:before {background: '.$atts['style_color'].'}';
            $css[] = '#'.$id.' .su-heading-inner:after {background: '.$atts['style_color'].'}';
        }
    }
    
    // Add CSS in head
    suAsset::addFile('css', 'heading.css', __FUNCTION__);
    suAsset::addString('css', implode("\n", $css));
    return '<div id="'.$id.'"'.su_scroll_reveal($atts).' class="su-heading su-heading-style-' . $atts['style'] . ' su-heading-align-' . $atts['align'] . su_ecssc($atts) . '"><'.$atts['heading'].' class="su-heading-inner">' . su_do_shortcode($content) . '</'.$atts['heading'].'></div>';
    }
}
