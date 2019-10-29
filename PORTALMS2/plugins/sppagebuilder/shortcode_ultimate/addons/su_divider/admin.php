<?php
/**
* @subpackage Shortcode Ultimate
* @author BdThemes https://www.bdthemes.com
* @copyright Copyright (c) 2012 - 2016 BdThemes
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

if (class_exists('Su_Shortcode_divider')) {
    SpAddonsConfig::addonConfig(
    	array(
            'type'       => 'single',
            'category'   => 'Shortcode Ultimate',
            'addon_name' => 'su_divider',
            'title'      => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DIVIDER'),
            'desc'       => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DIVIDER_DESC'),
            'icon'       => JURI::root().'plugins/sppagebuilder/shortcode_ultimate/addons/su_divider/element.svg',

    		'attr'=>array(
    			'general' => array(
                    'width' => array(
                        'type'  => 'number',
                        'std'   => 100,
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DIVIDER_WIDTH'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DIVIDER_WIDTH_DESC'),
                    ),
                    'force_fullwidth' => array(
                        'type'  => 'checkbox',
                        'std'   => '0',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DIVIDER_FFWIDTH'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DIVIDER_FFWIDTH_DESC')
                    ),
                    'align' => array(
                        'type'   => 'select',
                        'std'    => 'center',
                        'title'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DIVIDER_ALIGN'),
                        'desc'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DIVIDER_ALIGN_DESC'),
                        'values' => array(
                            'left'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LEFT'),
                            'right'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RIGHT'),
                            'center' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CENTER')
                        ),
                    ),
                    'center' => array(
                        'type'  => 'checkbox',
                        'std'   => '0',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CENTER'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CENTER_DESC')
                    ),
                    'top' => array(
                        'type'  => 'checkbox',
                        'std'   => '0',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHOW_TOP_LINK'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHOW_TOP_LINK_DESC')
                    ),
                    'visible' => array(
                        'title'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_VISIBLE'),
                        'desc'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_VISIBLE_DESC'),
                        'type'   => 'select',
                        'std'    => 'default',
                        'values' => array(
                            'default' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DEFAULT'),
                            'large'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LARGE'),
                            'medium'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MEDIUM'),
                            'small'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SMALL')                        
                        ),
                    ),
                    'hidden' => array(
                        'title'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_HIDDEN'),
                        'desc'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_HIDDEN_DESC'),
                        'type'   => 'select',
                        'std'    => 'default',
                        'values' => array(
                            'default' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DEFAULT'),
                            'large'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LARGE'),
                            'medium'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MEDIUM'),
                            'small'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SMALL')                        
                        )
                    ),
                    'class' => array(
                        'type'  => 'text',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLASS'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLASS_DESC')
                    ),
                ),
                'icon' => array(
                    'icon' => array(
                        'type'  => 'icon',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_DESC')
                    ),
                    'icon_style' => array(
                        'type'   => 'select',
                        'std'    => '1',
                        'title'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_STYLE'),
                        'desc'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE_DESC'),
                        'values' => array(
                            '1' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DEFAULT'),
                            '2' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BACKGROUND'),
                            '3' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BORDER')
                        ),
                    ),
                    'icon_align' => array(
                        'type'   => 'select',
                        'std'    => 'center',
                        'title'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_ALIGN'),
                        'desc'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_ALIGN_DESC'),
                        'values' => array(
                            'left'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LEFT'),
                            'right'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RIGHT'),
                            'center' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CENTER')
                        ),
                    ),
                    'icon_size' => array(
                        'type'  => 'number',
                        'std'   => 16,
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_SIZE'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_SIZE_DESC')
                    ),
                    'icon_color' => array(
                        'type'  => 'color',
                        'std'   => '#444',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_COLOR'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_COLOR_DESC')
                    ),
                ),
                'style' => array(
                    'style' => array(
                        'type'   => 'select',
                        'std'    => '1',
                        'title'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE'),
                        'desc'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE_DESC'),
                        'values' => array(
                            '1' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SINGLE_LINE'),
                            '2' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DOUBLE_LINE'),
                            '3' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SINGLE_DASHED'),
                            '4' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DOUBLE_DASHED'),
                            '5' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SINGLE_DOTTED'),
                            '6' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DOUBLE_DOTTED'),
                            '7' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STRIPED')
                        ),
                    ),
                    'color' => array(
                        'type'  => 'color',
                        'std'   => '#c5c5c5',
                        'title' => 'Divider Color',
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_COLOR_DESC')
                    ),
                ),
    		),
    	)
    );
}