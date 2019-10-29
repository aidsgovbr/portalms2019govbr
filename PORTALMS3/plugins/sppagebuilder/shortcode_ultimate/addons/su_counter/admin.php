<?php
/**
* @subpackage Shortcode Ultimate
* @author BdThemes https://www.bdthemes.com
* @copyright Copyright (c) 2012 - 2016 BdThemes
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

if (class_exists('Su_Shortcode_counter')) {
	SpAddonsConfig::addonConfig(
		array(
			'type'       => 'wrap',
			'category'   => 'Shortcode Ultimate',
			'addon_name' => 'su_counter',
			'title'      => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_COUNTER'),
			'desc'       => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_COUNTER_DESC'),
	        'icon'       => JURI::root().'plugins/sppagebuilder/shortcode_ultimate/addons/su_counter/element.svg',

			'attr'=>array(
				'general' => array(
					'count_start' => array(
						'type'  => 'number',
						'std'   => 1,
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_COUNT_START'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_COUNT_START_DESC'),
	            	),
	                'count_end' => array(
						'type'  => 'number',
						'std'   => 5000,
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_COUNT_END'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_COUNT_END_DESC')
	                ),
	                'counter_speed' => array(
						'type'  => 'number',
						'std'   => 5000,
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_COUNTER_SPEED'),
						'desc'  => 'Counting will finish in specified time (in milliseconds)'
	                ),   
	                'separator' => array(
						'type'  => 'checkbox',
						'std'   => '0',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SEPARATOR'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SEPARATOR_DESC')
	                ),
	                'prefix' => array(
						'type'  => 'text',
						'std'   => '',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PREFIX'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PREFIX_DESC'),
	                ),
	                'suffix' => array(
						'type'  => 'text',
						'std'   => '',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SUFFIX'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SUFFIX_DESC')
	                ),
	                'align' => array(
						'type'   => 'select',
						'std'    => 'top',
						'title'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ALIGN'),
						'desc'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ALIGN_DESC'),
						'values' => array(
	                        'top'     => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TOP'),
	                        'left'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LEFT'),
	                        'right'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RIGHT')
	                    )
	                ),
	                'count_size' => array(
						'type'  => 'text',
						'std'   => '32px',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_COUNT_SIZE'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_COUNT_SIZE_DESC')
	                ),
	                'text_size' => array(
						'type'  => 'text',
						'std'   => '14px',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_COUNTER_TEXT_SIZE'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_COUNTER_TEXT_SIZE_DESC')
	                ),
	                'class' => array(
						'type'  => 'text',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLASS'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLASS_DESC')
	                ),
	                'content' => array(
						'type'  => 'editor',
						'std'   => 'Counter content',
						'title' => 'Content',
	                ),
				),
				'icon' => array(
	                'icon' => array(
						'type'  => 'icon',
						'std'   => '',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_DESC'),
	                ),
	                'icon_size' => array(
						'type'  => 'number',
						'std'   => '24',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_SIZE'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_SIZE_DESC'),
	                ),
	                'icon_color' => array(
						'type'  => 'color',
						'std'   => '#444',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_COLOR'), 
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_COLOR_DESC')
	                ),
	            ),
				'style' => array(
	                'count_color' => array(
						'type'  => 'color',
						'std'   => '#444444',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_COUNT_COLOR'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_COUNT_COLOR_DESC'),
	                ),
	            ),
			),
		)
	);
}