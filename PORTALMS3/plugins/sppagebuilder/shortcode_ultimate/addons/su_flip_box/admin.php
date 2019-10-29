<?php
/**
* @subpackage Shortcode Ultimate
* @author BdThemes https://www.bdthemes.com
* @copyright Copyright (c) 2012 - 2016 BdThemes
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

if (class_exists('Su_Shortcode_flip_box')) {
    SpAddonsConfig::addonConfig(
    	array(
            'type'       => 'wrap',
            'category'   => 'Shortcode Ultimate',
            'addon_name' => 'su_flip_box',
            'title'      => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FLIP_BOX'),
            'desc'       => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FLIP_BOX_DESC'),
            'icon'       => JURI::root().'plugins/sppagebuilder/shortcode_ultimate/addons/su_flip_box/element.svg',

    		'attr'=>array(
                'general' => array(    
                    'animation_style' => array(
                        'type'   => 'select',
                        'std'    => 'horizontal_flip_left',
                        'title'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ANIMATION_STYLE'),
                        'desc'   => sprintf( '%s.', JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ANIMATION_STYLE_DESC') ),
                        'values' => array(
                            'horizontal_flip_left'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_HORIZONTAL_FLIP_LEFT'),
                            'horizontal_flip_right' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_HORIZONTAL_FLIP_RIGHT'),
                            'vertical_flip_top'     => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_VERTICAL_FLIP_TOP'),
                            'vertical_flip_bottom'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_VERTICAL_FLIP_BOTTOM'),
                            'flip_left'             => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FLIP_LEFT'),
                            'flip_right'            => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FLIP_RIGHT'),
                            'flip_top'              => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FLIP_TOP'),
                            'flip_bottom'           => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FLIP_BOTTOM')
                        ),
                    ),
                    'class' => array(
                        'type'  => 'text',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLASS'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLASS_DESC')
                    )
                ),
                'front' => array(
                    'ff_background' => array(
                        'type'  => 'color',
                        'std'   => '#ffffff',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BACKGROUND'), 
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BACKGROUND_DESC'),
                    ),
                    'ff_color' => array(
                        'type'  => 'color',
                        'std'   => '#444',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TEXT_COLOR'), 
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TEXT_COLOR_DESC')
                    ),
                    'ff_border' => array(
                        'type'  => 'text',
                        'std'   => '0 solid #eeeeee',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BORDER'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BORDER_DESC')
                    ),
                    'ff_shadow' => array(
                        'type'  => 'text',
                        'std'   => '0 0 0 #444444',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHADOW'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHADOW_DESC')
                    ),
                    'ff_text_align' => array(
                        'type'   => 'select',
                        'std'    => 'center',
                        'title'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ALIGN'),
                        'desc'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ALIGN_DESC'),
                        'values' => array(
                            'left'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LEFT'),
                            'center' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CENTER'),
                            'right'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RIGHT')
                        )
                    ),
                    'ff_padding' => array(
                        'type'  => 'text',
                        'std'   => '15px',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PADDING'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PADDING_DESC'),
                    ),
                    'ff_radius' => array(
                        'type'  => 'text',
                        'std'   => '0px',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RADIUS'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RADIUS_DESC')
                    ),
                    'ff_content' => array(
                        'type'  => 'editor',
                        'std'   => 'Front Box Content',
                        'title' => 'Content',
                    ),
                ),
                'back' => array(
                    'fb_background' => array(
                        'type'  => 'color',
                        'std'   => '#ffffff',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BACKGROUND'), 
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BACKGROUND_DESC'),
                    ),
                    'fb_color' => array(
                        'type'  => 'color',
                        'std'   => '#444',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TEXT_COLOR'), 
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TEXT_COLOR_DESC')
                    ),
                    'fb_border' => array(
                        'type'  => 'text',
                        'std'   => '0 solid #eeeeee',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BORDER'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BORDER_DESC')
                    ),
                    'fb_shadow' => array(
                        'type'  => 'text',
                        'std'   => '0 0 0 #444444',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHADOW'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHADOW_DESC')
                    ),
                    'fb_text_align' => array(
                        'type'   => 'select',
                        'std'    => 'center',
                        'title'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ALIGN'),
                        'desc'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ALIGN_DESC'),
                        'values' => array(
                            'left'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LEFT'),
                            'center' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CENTER'),
                            'right'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RIGHT')
                        )
                    ),
                    'fb_padding' => array(
                        'type'  => 'text',
                        'std'   => '15px',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PADDING'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PADDING_DESC'),
                    ),
                    'fb_radius' => array(
                        'type'  => 'text',
                        'std'   => '0px',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RADIUS'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RADIUS_DESC')
                    ),
                    'fb_content' => array(
                        'type'  => 'editor',
                        'std'   => 'Back Box Content',
                        'title' => 'Content',
                    ),
                ),
    		),
    	)
    );
}