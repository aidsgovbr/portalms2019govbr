<?php
/**
* @subpackage Shortcode Ultimate
* @author BdThemes https://www.bdthemes.com
* @copyright Copyright (c) 2012 - 2016 BdThemes
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

if (class_exists('Su_Shortcode_exit_bar')) {
	SpAddonsConfig::addonConfig(
		array(
			'type'       => 'wrap',
			'category'   => 'Shortcode Ultimate',
			'addon_name' => 'su_exit_bar',
			'title'      => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_EB'),
			'desc'       => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_EB_DESC'),
	        'icon'       => JURI::root().'plugins/sppagebuilder/shortcode_ultimate/addons/su_exit_bar/element.svg',

			'attr'=>array(
				'general' => array(
	                'title' => array(
						'type'  => 'text',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE'), 
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE_DESC'),
	                ),
	                'width' => array(
						'type'  => 'text',
						'std'   => '1200px',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_WIDTH'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_WIDTH_DESC')
	                ),
	                'expiration_day' => array(
						'type'  => 'text',
						'std'   => '7',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_EXDAY'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_EXDAY_DESC'),
	                ),
	                'always_visible' => array(
						'type'  => 'checkbox',
						'std'   => '0',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_AV'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_AV_DESC')
	                ),
	                'auto' => array(
						'type'  => 'checkbox',
						'std'   => '0',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_EP_AUTO'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_EP_AUTO_DESC')
	                ),
	                'cycle' => array(
						'type'  => 'text',
						'std'   => '0',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CYCLE'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CYCLE_DESC')
	                ),
	                'content' => array(
						'type'  => 'editor',
						'std'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_EB_CONTENT'),
						'title' => 'Content',
	                ),
	                'class' => array(
						'type'  => 'text',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLASS'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLASS_DESC')
	                ),
				),
	            'style' => array(
					'background' => array(
						'type'  => 'color',
						'std'   => '#f44a4c',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BACKGROUND'), 
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BACKGROUND_DESC'),
	                ),
	                'color' => array(
						'type'  => 'color',
						'std'   => '#ffffff',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_COLOR'), 
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_COLOR_DESC')
	                ),
	                'title_color' => array(
						'type'  => 'color',
						'std'   => '#ffffff',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE_COLOR'), 
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE_COLOR_DESC')
	                ),
	            ),
			),
		)
	);
}