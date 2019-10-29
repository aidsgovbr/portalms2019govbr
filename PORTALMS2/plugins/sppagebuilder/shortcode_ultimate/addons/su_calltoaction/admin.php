<?php
/**
* @subpackage Shortcode Ultimate
* @author BdThemes https://www.bdthemes.com
* @copyright Copyright (c) 2012 - 2016 BdThemes
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

if (class_exists('Su_Shortcode_calltoaction')) {
    SpAddonsConfig::addonConfig(
    	array(
            'type'       => 'wrap',
            'category'   => 'Shortcode Ultimate',
            'addon_name' => 'su_calltoaction',
            'title'      => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CALLTOACTION'),
            'desc'       => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CALLTOACTION_DESC'),
            'icon'       => JURI::root().'plugins/sppagebuilder/shortcode_ultimate/addons/su_calltoaction/element.svg',
    		'attr'=>array(
    			'general' => array(
    				'align' => array(
                        'type' => 'select',
                        'values' => array(
                            'left'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LEFT'),
                            'right'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RIGHT'),
                            'center' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CENTER')
                        ),
                        'std'   => 'left',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ALIGN'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ALIGN_DESC')
                    ),
                    'title' => array(
                        'type'  => 'text',
                        'std'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CA_TITLE'),
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE_DESC'),
                    ),
                    'button_text' => array(
                        'type'  => 'text',
                        'std'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CA_BTN_TXT'),
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BUTTON_TEXT'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BUTTON_TEXT_DESC'),
                    ),
                    'button_link' => array(
                        'type'  => 'text',
                        'std'   => '#',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BUTTON_LINK'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BUTTON_LINK_DESC'),
                        
                    ),
                    'target' => array(
                        'type'   => 'select',
                        'values' => array(
                            'self'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SELF'),
                            'blank' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BLANK')
                        ),
                        'std'   => 'self',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TARGET'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TARGET_DESC')
                    ),
                    'class' => array(
                        'type'  => 'text',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLASS'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLASS_DESC')
                    ),
                    'content'=>array(
                        'type'  => 'editor',
                        'title' => 'Content',
                        'std'   => 'Lorem ipsum dolor sit amet consectetuer adipiscing elit.',
                    ),
    			),
                "style" => array(
                    'title_color' => array(
                        'type'  => 'color',
                        'std'   => '#333333',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE_COLOR'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE_COLOR_DESC')
                    ),
                    'button_background' => array(
                        'type'  => 'color',
                        'std'   => '#444444',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BUTTON_BACKGROUND'), 
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BUTTON_BACKGROUND_DESC')
                    ),
                    'button_background_hover' => array(
                        'type'  => 'color',
                        'title' => 'Button Hover Background', 
                        'desc'  => 'Select button background on hover'
                    ),
                    'button_radius' => array(
                        'type'  => 'text',
                        'std'   => '2px',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BUTTON_RADIUS'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BUTTON_RADIUS_DESC')
                    ),
                ),
    		),
    	)
    );
}