<?php
/**
* @subpackage Shortcode Ultimate
* @author BdThemes https://www.bdthemes.com
* @copyright Copyright (c) 2012 - 2016 BdThemes
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

if (class_exists('Su_Shortcode_device_slider')) {
	SpAddonsConfig::addonConfig(
		array(
			'type'       => 'single',
			'category'   => 'Shortcode Ultimate',
			'addon_name' => 'su_device_slider',
			'title'      => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DEVICE_SLIDER'),
			'desc'       => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DEVICE_SLIDER_DESC'),
	        'icon'       => JURI::root().'plugins/sppagebuilder/shortcode_ultimate/addons/su_device_slider/element.svg',

			'attr'=>array(
				'general' => array(
					'source_type'  => array(
						'type'   => 'select',
						'values' => array(
							"category"    => "Joomla Category",
							"k2-category" => "K2 Category",
							"directory"   => "Directory Path",
							"media"       => "Media Library",
	                    ),
						'std'    => 'category',
						'title'  => 'Source Type',
						'desc'   => 'Select Source Type'
	                ),
	                'j_category'  => array(
						'type'     => 'select',
						'multiple' => 'multiple',
						'values'   => su_sp_category(),
						'title'    => 'Joomla Category',
						'desc'     => 'Select one more category',
						'depends'  => array(
							'source_type' => 'category',
						),
	                ),
	                'k2_category'  => array(
						'type'     => 'select',
						'multiple' => 'multiple',
						'values'   => su_sp_category('k2'),
						'title'    => 'K2 Category',
						'desc'     => 'Select one more category',
						'depends'  => array(
							'source_type' => 'k2-category',
						),
	                ),
	                'dir_path'  => array(
						'type'        => 'text',
						'title'       => 'Directory',
						'placeholder' => 'images/gallery',
						'desc'        => 'Type directory path',
						'depends'     => array(
							'source_type' => 'directory',
						),
	                ),
	                'med_library'  => array(
						'type'        => 'text',
						'title'       => 'Image URL',
						'placeholder' => 'images/01.jpg,images/02.jpg',
						'desc'        => 'Type image url. Use comma for saperating multiple image',
						'depends'     => array(
							'source_type' => 'media',
						),
	                ),
	                'limit' => array(
						'type' => 'number',
						'std'  => 5,
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LIMIT'),
						'desc' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LIMIT_DESC')
	                ),
	                'device' => array(
						'type'   => 'select',
						'std'    => 'imac',
						'title'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DEVICE'),
						'desc'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DEVICE_DESC'),
						'values' => array(
	                        'imac'     => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DEVICE_IMAC'),
	                        'macbook'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DEVICE_MACBOOK'),
	                        'ipad'     => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DEVICE_IPAD'),
	                        'iphone'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DEVICE_IPHONE'),
	                        'galaxys6' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DEVICE_GALAXYS6')
	                    ),
	                ),
	                'lightbox' => array(
						'type'  => 'checkbox',
						'std'   => '0',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LIGHTBOX'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LIGHTBOX_DESC')
	                ),
	                'arrows' => array(
						'type'  => 'checkbox',
						'std'   => '0',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ARROWS'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ARROWS_DESC')
	                ),                
	                'pagination' => array(
						'type'  => 'checkbox',
						'std'   => '0',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PAGINATION'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PAGINATION_DESC'),
	                ),
	                'autoplay' => array(
						'type'  => 'checkbox',
						'std'   => '1',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_AUTOPLAY'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_AUTOPLAY_DESC')
	                ),
	                'autoheight' => array(
						'type'  => 'checkbox',
						'std'   => '0',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_AUTOHEIGHT'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_AUTOHEIGHT_DESC')
	                ),
	                'hoverpause' => array(
						'type'  => 'checkbox',
						'std'   => '1',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_HOVERPAUSE'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_HOVERPAUSE_DESC'),
	                ),
	                'lazyload' => array(
						'type'  => 'checkbox',
						'std'   => '0',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LAZYLOAD'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LAZYLOAD_DESC')
	                ),
	                'loop' => array(
						'type'  => 'checkbox',
						'std'   => 'yes',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LOOP'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LOOP_DESC')
	                ),                
	                'speed' => array(
						'type'  => 'number',
						'std'   => 600,
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SPEED'), 
						'desc'  => 'Specify time (in milliseconds) that will be taken to complete animation effect',
	                ),
	                'delay' => array(
						'type'  => 'number',
						'std'   => 4000,
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DELAY'), 
						'desc'  => 'After mentioned time (in milliseconds) animation will start'
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
