<?php
/**
* @subpackage Shortcode Ultimate
* @author BdThemes https://www.bdthemes.com
* @copyright Copyright (c) 2012 - 2016 BdThemes
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

if (class_exists('Su_Shortcode_livicon')) {
	SpAddonsConfig::addonConfig(
		array(
			'type'       => 'single',
			'category'   => 'Shortcode Ultimate',
			'addon_name' => 'su_livicon',
			'title'      => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LIVICON'),
			'desc'       => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LIVICON_DESC'),
	        'icon'       => JURI::root().'plugins/sppagebuilder/shortcode_ultimate/addons/su_livicon/element.svg',

			'attr'=>array(
				'general' => array(
					'icon' => array(
						'type'   => 'select',
						'values' => array_combine(Su_Data::livicons(), Su_Data::livicons()),
						'std'    => 'heart',
						'title'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON'),
						'desc'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_DESC'),
	                ),
	                'size' => array(
						'type'  => 'number',
						'std'   => 32,
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_SIZE'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_SIZE_DESC')
	                ),
	                'event_type' => array(
						'type'   => 'select',
						'std'    => 'hover',
						'title'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_EVENT_TYPE'),
						'desc'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_EVENT_TYPE_DESC'),
						'values' => array(
							'hover' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_HOVER'),
							'click' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLICK')
	                    ),
	                ),
	                'animate' => array(
						'type'  => 'checkbox',
						'std'   => '1',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ANIMATE'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ANIMATE_DESC'),
	                ),
	                'loop' => array(
						'type'  => 'checkbox',
						'std'   => '0',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LOOP'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LOOP_DESC')
	                ),
	                'parent' => array(
						'type'  => 'checkbox',
						'std'   => '0',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PARENT'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PARENT_DESC')
	                ),
	                'duration' => array(
						'type'  => 'number',
						'std'   => 600,
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DURATION'),
						'desc'  => 'You can set animation duration as (milliseconds) units from here.',
	                ),
	                'iteration' => array(
						'type'  => 'number',
						'std'   => 1,
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ITERATION'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ITERATION_DESC')
	                ),
	                'url' => array(
						'type'  => 'text',
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
	                'class' => array(
						'type'  => 'text',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLASS'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLASS_DESC')
	                ),
				),
	            'style' => array(
	                'background_color' => array(
						'type'  => 'color',
						'std'   => '#eeeeee',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BACKGROUND'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BACKGROUND_DESC'),
	                ),
	                'color' => array(
						'type'  => 'color',
						'std'   => '#666666',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_COLOR'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_COLOR_DESC'),
	                ),
	                'hover_color' => array(
						'type'  => 'color',
						'std'   => '#000000',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_HOVER_COLOR'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_HOVER_COLOR_DESC')
	                ),
	                'border' => array(
						'type'  => 'text',
						'std'   => '0px solid #444444',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BORDER'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BORDER_DESC')
	                ),
	                'radius' => array(
						'type'  => 'text',
						'std'   => '3px',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RADIUS'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RADIUS_DESC'),
	                ),
	                'padding' => array(
						'type'  => 'text',
						'std'   => '15px',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PADDING'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PADDING_DESC')  
	                ),
	                'margin' => array(
						'type'  => 'text',
						'std'   => '',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MARGIN'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MARGIN_DESC')
	                ),
	            ),
			),
		)
	);
}