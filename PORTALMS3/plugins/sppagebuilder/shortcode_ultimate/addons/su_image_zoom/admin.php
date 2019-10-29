<?php
/**
* @subpackage Shortcode Ultimate
* @author BdThemes https://www.bdthemes.com
* @copyright Copyright (c) 2012 - 2016 BdThemes
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

if (class_exists('Su_Shortcode_image_zoom')) {
	SpAddonsConfig::addonConfig(
		array(
			'type'       => 'single',
			'category'   => 'Shortcode Ultimate',
			'addon_name' => 'su_image_zoom',
			'title'      => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_IMAGE_ZOOM'),
			'desc'       => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_IMAGE_ZOOM_DESC'),
	        'icon'       => JURI::root().'plugins/sppagebuilder/shortcode_ultimate/addons/su_image_zoom/element.svg',

			'attr'=>array(
				'general' => array(
					'image' => array(
						'type'  => 'media',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PHOTO'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PHOTO_DESC')
	                ), 
	                'iz_type' => array(
						'type'   => 'select',
						'std'    => 'inner',
						'title'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TYPE'),
						'desc'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TYPE_DESC'),
						'values' => array(
							'inner'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_INNER'),
							'standard' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STANDARD'),
							'follow'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FOLLOW')
	                    )
	                ), 
	                'smooth_move' => array(
						'type'  => 'checkbox',
						'std'   => '1',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SMOOTH_MOVE'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SMOOTH_MOVE_DESC')
	                ), 
	                'preload' => array(
						'type'  => 'checkbox',
						'std'   => '1',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PRELOAD'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PRELOAD_DESC')
	                ), 
	                'zoom_size' => array(
						'type'  => 'text',
						'std'   => '400,400',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ZOOM_SIZE'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ZOOM_SIZE_DESC')
	                ), 
	                'offset' => array(
						'type'  => 'text',
						'std'   => '10,0',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_OFFSET'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_OFFSET_DESC')
	                ), 
	                'position' => array(
						'type'   => 'select',
						'std'    => 'right',
						'title'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_POSITION'),
						'desc'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_POSITION_DESC'),
						'values' => array(
							'right' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RIGHT'),
							'left'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LEFT')
	                    )
	                ), 
	                'description' => array(
						'type'  => 'checkbox',
						'std'   => '0',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DESCRIPTION'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DESCRIPTION_DESC')
	                ),
	                'width' => array(
						'type'  => 'number',
						'std'   => 0,
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_WIDTH'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_WIDTH_DESC')
	                ),
	                'class' => array(
						'type'  => 'text',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLASS'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLASS_DESC')
	                )
				),
			),
		)
	);
}