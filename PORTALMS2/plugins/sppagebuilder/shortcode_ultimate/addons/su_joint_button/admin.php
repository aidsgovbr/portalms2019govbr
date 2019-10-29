<?php
/**
* @subpackage Shortcode Ultimate
* @author BdThemes https://www.bdthemes.com
* @copyright Copyright (c) 2012 - 2016 BdThemes
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

if (class_exists('Su_Shortcode_joint_button')) {
    SpAddonsConfig::addonConfig(
    	array(
            'type'       => 'single',
            'category'   => 'Shortcode Ultimate',
            'addon_name' => 'su_joint_button',
            'title'      => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_JOINT_BUTTON'),
            'desc'       => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_JOINT_BUTTON_DESC'),
            'icon'       => JURI::root().'plugins/sppagebuilder/shortcode_ultimate/addons/su_joint_button/element.svg',

    		'attr'=>array(
    			'general' => array(
                    'left_btn_text' => array(
                        'type'  => 'text',
                        'std'   => 'Get Support',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LEFT_BTN_TEXT'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LEFT_BTN_TEXT_DESC'),
                    ),
                    'left_btn_url' => array(
                        'type'  => 'text',
                        'std'   => '#',
                        'title' => 'Left Button URL',
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_URL_DESC'),
                    ),
                    'left_btn_target' => array(
                        'type'   => 'select',
                        'std'    => 'blank',
                        'title'  => 'Left Button Target',
                        'desc'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TARGET_DESC'),
                        'values' => array(
                            'self'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SELF'),
                            'blank' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BLANK'),
                        ),                    
                    ),
                    'middle_txt' => array(
                        'type'  => 'text',
                        'std'   => 'Or',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MIDDLE_TEXT'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MIDDLE_TEXT_DESC'),
                    ),
                    'right_btn_text' => array(
                        'type'  => 'text',
                        'std'   => 'View Details',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RIGHT_BTN_TEXT'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RIGHT_BTN_TEXT_DESC'),
                    ),
                    'right_btn_url' => array(
                        'type'  => 'text',
                        'std'   => '#',
                        'title' => 'Right Button URL',
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_URL_DESC'),
                    ),
                    'right_btn_target' => array(
                        'type'   => 'select',
                        'std'    => 'blank',
                        'title'  => 'Right Button Target',
                        'desc'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TARGET_DESC'),
                        'values' => array(
                            'self'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SELF'),
                            'blank' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BLANK'),
                        ),                    
                    ),
                    'width' => array(
                        'type'  => 'text',
                        'std'   => '450px',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_WIDTH'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_WIDTH_DESC'),
                    ),
                    'align' => array(
                        'type'   => 'select',
                        'std'    => 'center',
                        'title'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ALIGN'),
                        'desc'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ALIGN_DESC'),
                        'values' => array(
                            'left'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LEFT'),
                            'right'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RIGHT'),
                            'center' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CENTER'),
                        ),
                    ),
                    'class' => array(
                        'type'  => 'text',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLASS'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLASS_DESC')
                    ),
                ),
                'icon' => array(
                    'left_btn_icon' => array(
                        'type'  => 'icon',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LEFT_BTN_ICON'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_DESC'),
                    ),
                    'right_btn_icon' => array(
                        'type'  => 'icon',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RIGHT_BTN_ICON'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_DESC'),
                    ),
                ),
                'style' => array(
                    'left_btn_bg' => array(
                        'type'  => 'color',
                        'std'   => '#666666',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LEFT_BTN_BG'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BACKGROUND_DESC'),
                    ),
                    'left_btn_hover_bg' => array(
                        'type'  => 'color',
                        'std'   => '#4d4d4d',
                        'title' => 'Left Button Hover Background',
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_HOVER_BACKGROUND_DESC'),
                    ),
                    'left_btn_color' => array(
                        'type'  => 'color',
                        'std'   => '#ffffff',
                        'title' => 'Left Button Color',
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_COLOR_DESC'),
                    ),
                    'right_btn_bg' => array(
                        'type'  => 'color',
                        'std'   => '#f57c00',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RIGHT_BTN_BG'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BACKGROUND_DESC'),
                    ),
                    'right_btn_hover_bg' => array(
                        'type'  => 'color',
                        'std'   => '#fa8d1d',
                        'title' => 'Right Button Hover Background',
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_HOVER_BACKGROUND_DESC'),
                    ),
                    'right_btn_color' => array(
                        'type'  => 'color',
                        'std'   => '#ffffff',
                        'title' => 'Right Button Color',
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_COLOR_DESC'),
                    ),
                    'radius' => array(
                        'type'  => 'text',
                        'std'   => '3px',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RADIUS'), 
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RADIUS_DESC'),
                    ),
                ),
    		),
    	)
    );
}