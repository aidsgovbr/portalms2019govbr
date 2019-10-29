<?php
/**
* @subpackage Shortcode Ultimate
* @author BdThemes https://www.bdthemes.com
* @copyright Copyright (c) 2012 - 2016 BdThemes
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

if (class_exists('Su_Shortcode_flyout')) {
    SpAddonsConfig::addonConfig(
    	array(
            'type'       => 'wrap',
            'category'   => 'Shortcode Ultimate',
            'addon_name' => 'su_flyout',
            'title'      => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FLYOUT'),
            'desc'       => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FLYOUT_DESC'),
            'icon'       => JURI::root().'plugins/sppagebuilder/shortcode_ultimate/addons/su_flyout/element.svg',

    		'attr'=>array(
    			'general' => array(
                    'dimension' => array(
                        'type'   => 'select',
                        'std'    => '250x250',
                        'title'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DIMENSION'),
                        'desc'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DIMENSION_DESC'),
                        'values' => array(
                            '234x60'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DIMENSION_23460'),
                            '468x60'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DIMENSION_46860'),
                            '728x90'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DIMENSION_72890'),
                            '120x240' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DIMENSION_120240'),
                            '120x600' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DIMENSION_120600'),
                            '160x600' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DIMENSION_160600'),
                            '300x600' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DIMENSION_300600'),
                            '88x31'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DIMENSION_8831'),
                            '300x250' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DIMENSION_300250'),
                            '336x280' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DIMENSION_336280'),
                            '125x125' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DIMENSION_125125'),
                            '200x200' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DIMENSION_200200'),
                            '250x250' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DIMENSION_250250')
                        ),
                    ),
                    'position' => array(
                        'type'   => 'select',
                        'std'    => 'bottom-left',
                        'title'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_POSITION'),
                        'desc'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_POSITION_DESC'),
                        'values' => array(
                            'top-left'      => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TOP_LEFT'),
                            'top-middle'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TOP_MIDDLE'),
                            'top-right'     => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TOP_RIGHT'),
                            'bottom-left'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BOTTOM_LEFT'),
                            'bottom-middle' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BOTTOM_MIDDLE'),
                            'bottom-right'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BOTTOM_RIGHT'),
                            'center'        => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CENTER')
                        )
                    ),
                    'offset' => array(
                        'type'  => 'text',
                        'std'   => '0px, 0px',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_OFFSET'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_OFFSET_DESC')
                    ),
                    'transition_in' => array(
                        'type'   => 'select',
                        'std'    => 'fadeIn',
                        'title'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TRANSITION_IN'),
                        'desc'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TRANSITION_IN_DESC'),
                        'values' => array_combine( Su_Data::animations_in(), Su_Data::animations_in() ),
                    ),
                    'transition_out' => array(
                        'type'   => 'select',
                        'std'    => 'fadeOut',
                        'title'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TRANSITION_OUT'),
                        'desc'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TRANSITION_OUT_DESC'),
                        'values' => array_combine( Su_Data::animations_out(), Su_Data::animations_out() ),
                    ),
                    'show_close' => array(
                        'type'  => 'checkbox',
                        'std'   => '1',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHOW_CLOSE'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHOW_CLOSE_DESC'),
                    ),
                    'adblock_notice' => array(
                        'type'  => 'checkbox',
                        'std'   => '0',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ADBLOCK_NOTICE'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ADBLOCK_NOTICE_DESC')
                    ),
                    'class' => array(
                        'type'  => 'text',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLASS'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLASS_DESC')
                    ),
                    'content' => array(
                        'type'  => 'editor',
                        'title' => 'Content',
                        'desc'  => 'Flyout content'
                    ),
                ),
                'style' => array(
                    'style' => array(
                        'type'   => 'select',
                        'std'    => 'shadow',
                        'title'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE'),
                        'desc'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE_DESC'),
                        'values' => array(
                            'shadow'      => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHADOW'),
                            'border'      => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BORDER'),
                            'transparent' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TRANSPARENT')
                        )
                    ),
                    'close_style' => array(
                        'type'    => 'select',
                        'std'     => 'circle-1',
                        'title'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLOSE_BTN_STYLE'),
                        'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLOSE_BTN_STYLE_DESC'),
                        'depends' => array(
                            'show_close' => '1',
                        ),
                        'values' => array(
                            'circle-1' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CIRCLE_1'),
                            'circle-2' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CIRCLE_2'),
                            'labeled'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LABELED'),
                            'text'     => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TEXT')
                        )
                    ),
                ),
    		),
    	)
    );
}