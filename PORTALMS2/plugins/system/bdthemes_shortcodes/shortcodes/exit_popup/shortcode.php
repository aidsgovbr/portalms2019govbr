<?php

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_exit_popup extends Su_Shortcodes {

    function __construct() {
        parent::__construct();
    }

    //exit_popup
    public static function exit_popup( $atts = null, $content = null ) {
        $atts = su_shortcode_atts( array(
            'background'         => '',
            'color'              => '',
            'text_align'         => '',
            'border'             => '',
            'shadow'             => '',
            'radius'             => '',
            'padding'            => '',
            'width'              => '',
            'height'             => '',
            'overlay_background' => '',
            'expiration_day'     => '7',
            'hide_close'         => 'no',
            'always_visible'     => 'no',
            'cycle'              => '0',
            'auto'               => 'no',
            'class'              => ''
        ), $atts, 'exit_popup' );

        if (@$_REQUEST["action"] == 'su_generator_preview') {
            return su_alert_box(JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_EP_NOT_WORKING'));
        }
        
        $id         = uniqid('suep_');
        $css        = array();
        $js         = array();
        $height     = ($atts['height']) ? 'height: '.intval($atts['height']) . 'px;': '';
        $width      = ($atts['width']) ? 'width: '.intval($atts['width']) . 'px;' : '';
        $output     = array();
        
        $background = ($atts['background']) ? 'background-color: '.$atts['background'].';' : '';
        $obg        = ($atts['overlay_background']) ? 'background-color: '.$atts['overlay_background'].';' : '';
        $color      = ($atts['color']) ? 'color: '.$atts['color'].';' : '';
        $text_align = ($atts['text_align']) ? 'text-align: '.$atts['text_align'].';' : '';
        $border     = ($atts['border']) ? 'border: '.$atts['border'].';' : '';
        $radius     = ($atts['radius']) ? 'border-radius: '.$atts['radius'].';' : '';
        $shadow     = ($atts['shadow']) ? 'box-shadow: '.$atts['shadow'].';' : '';
        $padding    = ($atts['padding']) ? 'padding: '.$atts['padding'].';' : '';

        if ($obg)
            $css[] = '#'.$id.' .su-ep-container {'.$obg.'}';
        if ($background or $border or $radius or $shadow or $height or $width)
            $css[] = '#'.$id.' .su-ep-content {'.$background.$border.$radius.$shadow.$height.$width.'}';
        if ($padding or $text_align or $color)
            $css[] = '#'.$id.' .su-ep-content .su-ep-inner {'.$padding.$text_align.$color.'}';

        $atts['always_visible'] = ($atts['always_visible'] === 'yes')?'true':'false';
        $atts['auto'] = ($atts['auto'] === 'yes')?'true':'false';

        $js[] = "
                jQuery(document).ready(function($) {
                    'use strict';

                    $('#".$id." .su-ep-container').firstTime({
                        name: 'su-ep-container',
                        stepClass: 'su-ep-content',
                        closeClass: 'ep-close',
                        onPageExit: true,
                        alwaysVisible: ".$atts['always_visible'].",
                        expirationDays: ".$atts['expiration_day'].",
                        cycle: ".$atts['cycle'].",
                        auto: ".$atts['auto']."
                    });

                    $('#".$id."').appendTo(document.body);
                });           
        ";
        
        suAsset::addString('css', implode('', $css));
        suAsset::addFile('js', 'jquery.firsttime.min.js');
        suAsset::addString('js', implode('', $js));
        
        $output[] ='<div class="su-ep" id="'.$id.'" data-expireday="'.$atts['expiration_day'].'" data-alwaysvisible="'.$atts['always_visible'].'" data-cycle="'.$atts['cycle'].'" data-auto="'.$atts['auto'].'">';
        $output[] =     '<div class="su-ep-container">
                            <div class="su-ep-content">
                                <div class="su-ep-inner">';
        $output[] =                 su_do_shortcode( $content );                        
        $output[] =             '</div>';

        if ($atts['hide_close']!='yes') { // Close button show/hide
        $output[] =             '<div class="ep-close">×</div>';
        }

        $output[] =         '</div>
                        </div>
                    </div>';     

        return implode('', $output);
    }
}
