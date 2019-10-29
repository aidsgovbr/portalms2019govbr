<?php
/**
* @subpackage Shortcode Ultimate
* @author BdThemes https://www.bdthemes.com
* @copyright Copyright (c) 2012 - 2016 BdThemes
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

if (class_exists('Su_Shortcode_flip_countdown')) {
	SpAddonsConfig::addonConfig(
		array(
			'type'       => 'wrap',
			'category'   => 'Shortcode Ultimate',
			'addon_name' => 'su_flip_countdown',
			'title'      => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FLIP_COUNTDOWN'),
			'desc'       => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FLIP_COUNTDOWN_DESC'),
	        'icon'       => JURI::root().'plugins/sppagebuilder/shortcode_ultimate/addons/su_flip_countdown/element.svg',

			'attr'       => array(
				'general'    => array(
					'datetime' => array(
						'type'  => 'text',
						'std'   => '2020-05-01T00:00:00',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DATETIME'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DATETIME_DESC'),
	                ),
	                'time_name' => array(
						'type'  => 'checkbox',
						'std'   => '1',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FCD_TIME_NAME'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FCD_TIME_NAME_DESC'),
	                ),
	                'prefix' => array(
						'type'  => 'text',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PREFIX'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PREFIX_DESC'),
	                ),
                    'suffix' => array(
						'type'  => 'text',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SUFFIX'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SUFFIX_DESC')
                    ),
	                'layout' => array(
						'type'   => 'select',
						'std'    => 'horizontal',
						'title'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FCD_LAYOUT'),
						'desc'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FCD_LAYOUT_DESC'),
						'values' => array(
							'vertical'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FCD_VERTICAL'),
							'horizontal' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_HORIZONTAL'),
	                    ),
	                ),
	                'class' => array(
						'type'  => 'text',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLASS'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLASS_DESC')
	                ),
				),
				'style' => array(
	                'count_size' => array(
						'type'   => 'select',
						'std'    => 'default',
						'title'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FCD_COUNT_SIZE'),
						'desc'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FCD_COUNT_SIZE_DESC'),
						'values' => array(
							'default' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DEFAULT'),
							'small'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SMALL'),
							'medium'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MEDIUM'),
							'large'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LARGE'),
	                    ),
	                ),
                    'count_color' => array(
						'type'   => 'select',
						'std'    => 'dark',
						'title'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FCD_COUNT_COLOR'),
						'desc'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FCD_COUNT_COLOR_DESC'),
						'values' => array(
							'dark'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DARK'),
							'light' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LIGHT'),
                        ),
                    ),
                    'text' => array(
						'type'   => 'select',
						'std'    => 'dark',
						'title'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FCD_TEXT'),
						'desc'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FCD_TEXT_DESC'),
						'values' => array(
							'dark'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DARK'),
							'light' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LIGHT'),
                        ),
                    ),
	                'align' => array(
						'type'   => 'select',
						'std'    => 'left',
						'title'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ALIGN'),
						'desc'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ALIGN_DESC'),
						'values' => array(
							'left'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LEFT'),
							'right'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RIGHT'),
							'center' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CENTER'),
	                    ),
	                ),
				),
			),
		)
	);
}