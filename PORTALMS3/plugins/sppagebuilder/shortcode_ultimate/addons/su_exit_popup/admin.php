<?php
/**
* @subpackage Shortcode Ultimate
* @author BdThemes https://www.bdthemes.com
* @copyright Copyright (c) 2012 - 2016 BdThemes
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

if (class_exists('Su_Shortcode_exit_popup')) {
	SpAddonsConfig::addonConfig(
		array(
			'type'       => 'wrap',
			'category'   => 'Shortcode Ultimate',
			'addon_name' => 'su_exit_popup',
			'title'      => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_EP'),
			'desc'       => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_EP_DESC'),
	        'icon'       => JURI::root().'plugins/sppagebuilder/shortcode_ultimate/addons/su_exit_popup/element.svg',

			'attr'=>array(
				'general' => array(
	                'height' => array(
						'type'  => 'text',
						'std'   => '300px',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_HEIGHT'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_HEIGHT_DESC'),
	                ),
	                'width' => array(
						'type'  => 'text',
						'std'   => '590px',
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
						'std'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_EP_CONTENT'),
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
						'std'   => '#ffffff',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BACKGROUND'), 
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BACKGROUND_DESC'),
	                ),
	                'color' => array(
						'type'  => 'color',
						'std'   => '#444444',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_COLOR'), 
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_COLOR_DESC')
	                ),
	                'border' => array(
						'type'  => 'text',
						'std'   => '0 solid #cccccc',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BORDER'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BORDER_DESC')
	                ),
	                'radius' => array(
						'type'  => 'text',
						'std'   => '0',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RADIUS'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RADIUS_DESC')
	                ),
	                'shadow' => array(
						'type'  => 'text',
						'std'   => '0 0 0 #000000',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHADOW'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHADOW_DESC')
	                ),
	                'overlay_background' => array(
						'type'  => 'color',
						'std'   => 'rgba(0,0,0,0.75)',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_OBG'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_OBG_DESC')
	                ),
	            ),
			),
		)
	);
}