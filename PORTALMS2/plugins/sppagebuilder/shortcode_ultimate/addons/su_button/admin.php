<?php
/**
* @subpackage Shortcode Ultimate
* @author BdThemes https://www.bdthemes.com
* @copyright Copyright (c) 2012 - 2016 BdThemes
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

if (class_exists('Su_Shortcode_button')) {
    SpAddonsConfig::addonConfig(
    	array(
            'type'       => 'wrap',
            'category'   => 'Shortcode Ultimate',
            'addon_name' => 'su_button',
            'title'      => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BUTTON'),
            'desc'       => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BUTTON_DESC'),
            'icon'       => JURI::root().'plugins/sppagebuilder/shortcode_ultimate/addons/su_button/element.svg',

    		'attr'=>array(
    			'general' => array(
                    'url' => array(
                        'type'  => 'text',
                        'std'   => '#',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_URL'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_URL_DESC'),
                    ),
                    'target' => array(
                        'type'   => 'select',
                        'std'    => 'self',
                        'title'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TARGET'),
                        'desc'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TARGET_DESC'),
                        'values' => array(
                            'self'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SELF'),
                            'blank' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BLANK')
                        ),                    
                    ),
                    'size' => array(
                        'type'  => 'number',
                        'std'   => 3,
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SIZE'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SIZE_DESC')
                    ),
                    'wide' => array(
                        'type'  => 'checkbox',
                        'std'   => '0',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_WIDE'), 
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_WIDE_DESC'),
                    ),
                    'center' => array(
                        'type'  => 'checkbox',
                        'std'   => '0',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CENTER'), 
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CENTER_DESC')
                    ),
                    'radius' => array(
                        'type'  => 'text',
                        'std'   => '3px',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RADIUS'), 
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RADIUS_DESC')
                    ),
                    'desc' => array(
                        'type'  => 'text',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DESCRIPTION'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DESCRIPTION_DESC'),
                    ),
                    'onclick' => array(
                        'type'  => 'text',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ONCLICK'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ONCLICK_DESC')
                    ),
                    'class' => array(
                        'type'  => 'text',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLASS'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLASS_DESC')
                    ),
                    'content' => array(
                        'type'  => 'editor',
                        'std'   => 'Button text',
                        'title' => 'Content',
                    ),
                ),
                'icon' => array(
                    'icon' => array(
                        'type'  => 'icon',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_DESC'),
                    ),
                    'icon_color' => array(
                        'type'  => 'color',
                        'std'   => '#FFFFFF',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_COLOR'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_COLOR_DESC')
                    ),
                ),
                'style' => array(
                    'style' => array(
                        'type'   => 'select',
                        'std'    => 'default',
                        'title'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE'), 
                        'desc'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE_DESC'),
                        'values' => array(
                            'default' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DEFAULT'),
                            'soft'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SOFT'),
                            'glass'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_GLASS'),
                            'bubbles' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BUBBLES'),
                            'noise'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_NOISE'),
                            'stroked' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STROKED'),
                            'border'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BORDER'),
                            '3d'      => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_3D')
                        ),
                    ),
                    'color' => array(
                        'type'  => 'color',
                        'std'   => '#FFFFFF',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_COLOR'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_COLOR_DESC'),
                    ),
                    'background' => array(
                        'type'  => 'color',
                        'std'   => '#2D89EF',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BACKGROUND'), 
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BACKGROUND_DESC')
                    ),
                    'background_hover' => array(
                        'type'  => 'color',
                        'std'   => '#2D89EF',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_HOVER_BACKGROUND'), 
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_HOVER_BACKGROUND_DESC')
                    ),
                    'padding' => array(
                        'type'  => 'text',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PADDING'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PADDING_DESC'),
                    ),
                     'margin' => array(
                         'type'  => 'text',
                         'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MARGIN'),
                         'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MARGIN_DESC')
                     ),
                ),
    		),
    	)
    );
}