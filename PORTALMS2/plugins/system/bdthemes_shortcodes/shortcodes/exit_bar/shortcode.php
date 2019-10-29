<?php

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_exit_bar extends Su_Shortcodes {

    function __construct() {
        parent::__construct();
    }

    //exit_bar
    public static function exit_bar( $atts = null, $content = null ) {
        $atts = su_shortcode_atts( array(
            'background'         => '',
            'color'              => '',
            'text_align'         => '',
            'title'              => '',
            'title_color'        => '',
            'padding'            => '',
            'width'              => '',
            'expiration_day'     => '7',
            'hide_close'         => 'no',
            'always_visible'     => 'no',
            'cycle'              => '0',
            'auto'               => 'no',
            'class'              => ''
        ), $atts, 'exit_bar' );

        if (@$_REQUEST["action"] == 'su_generator_preview') {
            return su_alert_box(JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_EB_NOT_WORKING'));
        }
        
        $id     = uniqid('sueb_');
        $css    = array();
        $js     = array();
        $width  = ($atts['width']) ? 'max-width: '.intval($atts['width']) . 'px;' : '';
        $return = array();
        $lang   = JFactory::getLanguage(); 
        $lang->load('plg_system_bdthemes_shortcodes', JPATH_ADMINISTRATOR);
        
        $background = ($atts['background']) ? 'background-color: '.$atts['background'].';' : '';
        $color      = ($atts['color']) ? 'color: '.$atts['color'].';' : '';
        $text_align = ($atts['text_align']) ? 'text-align: '.$atts['text_align'].';' : '';
        $padding    = ($atts['padding']) ? 'padding: '.$atts['padding'].';' : '';
        $title_color      = ($atts['title_color']) ? 'color: '.$atts['title_color'].';' : '';

        if ($background)
            $css[] = '#'.$id.'.su-eb {'.$background.'}';

        if ($width or $color or $text_align)
            $css[] = '#'.$id.' .su-eb-container {'.$width.$color.$text_align.'}';

        if ($padding)
            $css[] = '#'.$id.' .su-eb-content {'.$padding.'}';

        if ($title_color) {
            $css[] = '#'.$id.' .su-eb-content .su-eb-title {'.$title_color.'}';
        } else {
            $css[] = '#'.$id.' .su-eb-content .su-eb-title {'.$color.'}';
        }
        
        $close_tt = ($atts['always_visible'] === 'yes') ? '' : ' title="'.JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_EB_CLS_MESSAGE').'"';

        $atts['always_visible'] = ($atts['always_visible'] === 'yes')?'true':'false';
        $atts['auto'] = ($atts['auto'] === 'yes')?'true':'false';

        $js[] = "
                jQuery(document).ready(function($) {
                    'use strict';

                    $('#".$id.".su-eb').firstTime({
                        name: 'su-eb',
                        closeClass: 'eb-close',
                        onPageExit: true,
                        alwaysVisible: ".$atts['always_visible'].",
                        expirationDays: ".$atts['expiration_day'].",
                        cycle: ".$atts['cycle'].",
                        auto: ".$atts['auto'].",
                        showStartFunction: function() {
                            $('body').addClass('su-eb-stoped');
                        },
                        showFunction: function() {
                            $('body').addClass('su-eb-stoped');
                        },
                        hideStartFunction: function() {
                            $('body').removeClass('su-eb-stoped');
                        },
                        hideFunction: function() {
                            $('body').removeClass('su-eb-stoped');
                        }
                    });

                    $('#".$id."').prependTo(document.body);
                });           
        ";
        
        suAsset::addFile('css', 'exit-bar.css', __FUNCTION__);
        suAsset::addFile('js', 'jquery.firsttime.min.js');
        
        suAsset::addString('css', implode('', $css));
        suAsset::addString('js', implode('', $js));
        
        $return[] ='<div class="su-eb" id="'.$id.'" data-expireday="'.$atts['expiration_day'].'" data-alwaysvisible="'.$atts['always_visible'].'" data-cycle="'.$atts['cycle'].'" data-auto="'.$atts['auto'].'">';
        $return[] =     '<div class="su-eb-container">
                            <div class="su-eb-content">';
        if ($atts['title']) {
            $return[] =          '<h1 class="su-eb-title">';                        
            $return[] =             $atts['title'];                        
            $return[] =          '</h1>';                           
        }

        $return[] =                 su_do_shortcode( $content );

        if ($atts['hide_close']!='yes') { // Close button show/hide
            $return[] =         '<div class="eb-close"'.$close_tt.'><span class="eb-close-icon"></span></div>';
        }

        $return[] =         '</div>
                        </div>
                    </div>';     

        return implode('', $return);
    }
}
