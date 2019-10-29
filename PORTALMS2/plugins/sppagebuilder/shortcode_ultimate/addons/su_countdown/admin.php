<?php
/**
* @subpackage Shortcode Ultimate
* @author BdThemes https://www.bdthemes.com
* @copyright Copyright (c) 2012 - 2016 BdThemes
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

if (class_exists('Su_Shortcode_countdown')) {
	SpAddonsConfig::addonConfig(
		array(
			'type'       => 'wrap',
			'category'   => 'Shortcode Ultimate',
			'addon_name' => 'su_countdown',
			'title'      => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_COUNTDOWN'),
			'desc'       => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_COUNTDOWN_DESC'),
	        'icon'       => JURI::root().'plugins/sppagebuilder/shortcode_ultimate/addons/su_countdown/element.svg',

			'attr'       => array(
				'general'    => array(
					'count_date' => array(
						'type'  => 'text',
						'std'   => '2020/12/25',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CD_DATE'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CD_DATE_DESC'),
	                ),
	                'count_time' => array(
						'type'  => 'text',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CD_TIME'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CD_TIME_DESC')
	                ),                
	                'align' => array(
						'type'   => 'select',
						'std'    => 'left',
						'title'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_COUNTDOWN_ALIGN'),
						'desc'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_COUNTDOWN_ALIGN_DESC'),
						'values' => array(
							'left'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LEFT'),
							'right'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RIGHT'),
							'center' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CENTER')
	                    )
	                ),
	                'count_size' => array(
						'type'  => 'number',
						'std'   => 32,
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CD_COUNT_SIZE'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CD_COUNT_SIZE_DESC')
	                ),                
	                'text_align' => array(
						'type'   => 'select',
						'std'    => 'right',
						'title'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_COUNTDOWN_TEXT_ALIGN'),
						'desc'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_COUNTDOWN_TEXT_ALIGN_DESC'),
						'values' => array(
							'right'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_COUNTDOWN_TEXT_ALIGN_DEFAULT'),
							'bottom' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_COUNTDOWN_TEXT_ALIGN_BOTTOM')
	                    ),
	                ),
	                'text_size' => array(
						'type'  => 'number',
						'std'   => 14,
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CD_TEXT_SIZE'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CD_TEXT_SIZE_DESC')
	                ),   
	                'divider' => array(
						'type'   => 'select',
						'std'    => 'none',
						'title'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_COUNTDOWN_DIVIDER'),
						'desc'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_COUNTDOWN_DIVIDER_DESC'),
						'values' => array(
							'none'            => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_COUNTDOWN_DIVIDER_NO_DIVIDER'),
							'spacer'          => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_COUNTDOWN_DIVIDER_SPACER'),
							'dot'             => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_COUNTDOWN_DIVIDER_DOT'),
							'comma'           => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_COUNTDOWN_DIVIDER_COMMA'),
							'colon'           => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_COUNTDOWN_DIVIDER_COLON'),
							'vertical_line'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_COUNTDOWN_DIVIDER_VERTICAL_LINE'),
							'horizontal_line' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_COUNTDOWN_DIVIDER_HORIZONTAL_LINE')
	                    ),
	                ),
	                'class' => array(
						'type'  => 'text',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLASS'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLASS_DESC')
	                ),
	                'content' => array(
						'type'  => 'editor',
						'std'   => 'This offer has expired!',
						'title' => 'Content',
	                ),
				),
				'style' => array(
	                'count_color' => array(
						'type'  => 'color',
						'std'   => '#666666',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CD_COLOR'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CD_COLOR_DESC'),
	                ),
	                'divider_color' => array(
						'type'  => 'color',
						'std'   => 'rgba(100,100,100,.1)',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CD_DIVIDER_COLOR'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CD_DIVIDER_COLOR_DESC')
	                ),
				),
			),
		)
	);
}