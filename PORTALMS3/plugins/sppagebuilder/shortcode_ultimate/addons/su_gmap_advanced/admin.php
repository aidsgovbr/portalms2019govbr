<?php
/**
* @subpackage Shortcode Ultimate
* @author BdThemes https://www.bdthemes.com
* @copyright Copyright (c) 2012 - 2016 BdThemes
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

if (class_exists('Su_Shortcode_gmap_advanced')) {
	SpAddonsConfig::addonConfig(
		array(
			'type'       => 'single',
			'category'   => 'Shortcode Ultimate',
			'addon_name' => 'su_gmap_advanced',
			'title'      => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_GMAPA'),
			'desc'       => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_GMAPA_DESC'),
	        'icon'       => JURI::root().'plugins/sppagebuilder/shortcode_ultimate/addons/su_gmap_advanced/element.svg',

			'attr'=>array(
				'general' => array(
	                'lat' => array(
						'type'  => 'text',
						'std'   => '24.8248746',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_GMAP_LAT'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_GMAP_LAT_DESC'),
	                ),
	                'lng' => array(
						'type'  => 'text',
						'std'   => '89.3826299',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_GMAP_LNG'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_GMAP_LNG_DESC')
	                ),
	                'width' => array(
						'type'  => 'number',
						'title' => 'Custom Width',
						'desc'  => "You can set google map width from here. It's set only pixel value, <strong>pass empty for full width</strong>",
	                ),
	                'height' => array(
						'type'  => 'number',
						'std'   => 400,
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_HEIGHT'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MAP_HEIGHT_DESC')
	                ),
	                'zoom_control_style' => array(
						'type'   => 'select',
						'std'    => 'SMALL',
						'title'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MAP_ZOOM_CONTROL_STYLE'),
						'desc'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MAP_ZOOM_CONTROL_STYLE_DESC'),
						'values' => array(
							'SMALL' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MAP_ZOOM_CONTROL_SMALL'),
							'LARGE' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MAP_ZOOM_CONTROL_LARGE')
	                    ),
	                ),
	                'zoom_control' => array(
						'type'  => 'checkbox',
						'std'   => '1',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ZOOM_CONRTOL'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ZOOM_CONRTOL_DESC')
	                ),
	                'zoom' => array(
						'type'  => 'number',
						'std'   => 16,
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MAP_ZOOM'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MAP_ZOOM_DESC')
	                ),   
	                'street_view_control' => array(
						'type'  => 'checkbox',
						'std'   => 'no',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STREET_VIEW_CONTROL'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STREET_VIEW_CONTROL_DESC')
	                ),
	                'location_marker' => array(
						'type'  => 'checkbox',
						'std'   => '1',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LOCATION_MARKER'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LOCATION_MARKER_DESC'),
	                ),
	                'custom_marker' => array(
						'type'  => 'text',
						'type'  => 'media',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CUSTOM_MARKER'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CUSTOM_MARKER_DESC')
	                ),
	                'address' => array(
						'type'  => 'text',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ADDRESS'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ADDRESS_DESC')
	                ),
	                'responsive' => array(
						'type'  => 'checkbox',
						'std'   => '1',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RESPONSIVE'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RESPONSIVE_DESC')
	                ),
	                'class' => array(
						'type'  => 'text',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLASS'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLASS_DESC')
	                ),
				),
	            'style' => array(
					'style' => array(
						'type'   => 'select',
						'std'    => 'default',
						'title'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE'),
						'desc'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE_DESC'),
						'values' => array(
							'default'     => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DEFAULT'),
							'map_style_1' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_GMAPA_SUBTLE_GRAYSCALE'),
							'map_style_2' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_GMAPA_TURQUOISE_WATER'),
							'map_style_3' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_GMAPA_BLUE_CYAN'),
							'map_style_4' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_GMAPA_PROPIA_EFFECT'),
							'map_style_5' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_GMAPA_MIDNIGHT_COMMANDER'),
							'map_style_6' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_GMAPA_LUNAR_LANDSCAPE'),
							'map_style_7' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_GMAPA_MIKIWAT'),
							'map_style_8' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_GMAPA_ULTRA_LIGHT'),
							'map_style_9' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_GMAPA_FLAT_PALE')
	                    ),
	                ),
	            ),
			),
		)
	);
}