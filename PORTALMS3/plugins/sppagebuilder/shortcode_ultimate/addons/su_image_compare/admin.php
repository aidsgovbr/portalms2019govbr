<?php
/**
* @subpackage Shortcode Ultimate
* @author BdThemes https://www.bdthemes.com
* @copyright Copyright (c) 2012 - 2016 BdThemes
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

if (class_exists('Su_Shortcode_image_compare')) {
	SpAddonsConfig::addonConfig(
		array(
			'type'       => 'single',
			'category'   => 'Shortcode Ultimate',
			'addon_name' => 'su_image_compare',
			'title'      => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_IMAGE_COMPARE'),
			'desc'       => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_IMAGE_COMPARE_DESC'),
	        'icon'       => JURI::root().'plugins/sppagebuilder/shortcode_ultimate/addons/su_image_compare/element.svg',

			'attr'=>array(
				'general' => array(
					'before_image' => array(
						'type'  => 'media',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BEFORE_IMAGE'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BEFORE_IMAGE_DESC')
	                ), 
	                'after_image' => array(
						'type'  => 'media',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_AFTER_IMAGE'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_AFTER_IMAGE_DESC')
	                ), 
	                'before_text' => array(
						'type'  => 'text',
						'std'   => 'Original',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_IC_BEFORE_TEXT'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_IC_BEFORE_TEXT_DESC')
	                ), 
	                'after_text' => array(
						'type'  => 'text',
						'std'   => 'Modified',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_IC_AFTER_TEXT'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_IC_AFTER_TEXT_DESC')
	                ), 
	                'orientation' => array(
						'type'   => 'select',
						'std'    => 'horizontal',
						'title'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ORIENTATION'),
						'desc'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ORIENTATION_DESC'),
						'values' => array(
							'horizontal' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_IC_HORIZONTAL'),
							'vertical'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_IC_VERTICAL')
	                    ),
	                ),
	                'slide_on' => array(
						'type'   => 'select',
						'std'    => 'click',
						'title'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_IC_SLIDE_ON'),
						'desc'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_IC_SLIDE_ON_DESC'),
						'values' => array(
							'click' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_IC_CLICK'),
							'hover' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_IC_HOVER')
	                    ),
	                ),
	                'width' => array(
						'type'  => 'number',
						'std'   => 600,
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_WIDTH'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_WIDTH_DESC'),
	                ),
	                'height' => array(
						'type'  => 'number',
						'std'   => 350,
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_HEIGHT'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_HEIGHT_DESC')
	                ),
	                'border' => array(
						'type'  => 'checkbox',
						'std'   => '1',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BORDER'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_IC_BORDER_DESC'),
	                ),
	                'arrows' => array(
						'type'  => 'checkbox',
						'std'   => '1',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ARROWS'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_IC_ARROWS_DESC')
	                ),
	                'class' => array(
						'type'  => 'text',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLASS'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLASS_DESC')
	                ),
				),
			),
		)
	);
}