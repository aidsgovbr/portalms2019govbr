<?php
/**
* @subpackage Shortcode Ultimate
* @author BdThemes https://www.bdthemes.com
* @copyright Copyright (c) 2012 - 2016 BdThemes
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

if (class_exists('Su_Shortcode_flipbook')) {
	SpAddonsConfig::addonConfig(
		array(
			'type'       => 'single',
			'category'   => 'Shortcode Ultimate',
			'addon_name' => 'su_flipbook',
			'title'      => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FLIPBOOK'),
			'desc'       => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FLIPBOOK_DESC'),
	        'icon'       => JURI::root().'plugins/sppagebuilder/shortcode_ultimate/addons/su_flipbook/element.svg',

			'attr'=>array(
				'general' => array(
					'fb_type' => array(
						'title'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TYPE'),
						'type'   => 'select',
						'std'    => 'frame',
						'desc'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TYPE_DESC'),
						'values' => array(
	                        'thumbnail' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_THUMBNAIL'),
	                        'link'      => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LINK'),
	                        'frame'     => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FRAME'),
	                    ),
	                ),
	                'src' => array(
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SOURCE'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FLIPBOOK_SOURCE_DESC'),
						'type'  => 'text',
						'std'   => 'https://mozilla.github.io/pdf.js/web/compressed.tracemonkey-pldi-09.pdf',
	                ),
	                'thumbnail' => array(
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FLIPBOOK_THUMBNAIL_SOURCE'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FLIPBOOK_THUMBNAIL_SOURCE_DESC'),
						'type'  => 'media',
						'std'   => 'plugins/system/bdthemes_shortcodes/images/pdf-thumb.svg',
	                ),
	                'title' => array(
						'type'  => 'text',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE_DESC')
	                ),
	                'tags' => array(
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TAGS'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FLIPBOOK_TAGS_DESC'),
						'type'  => 'text',
	                ),
	                'webgl' => array(
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_WEBGL'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FLIPBOOK_WEBGL_DESC'),
						'type'  => 'checkbox',
						'std'   => '0',
	                ),
	                'height' => array(
						'type'  => 'number',
						'std'   => 750,
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_HEIGHT'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_HEIGHT_DESC')
	                ),
	                'duration' => array(
						'type'  => 'number',
						'std'   => 800,
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DURATION'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DURATION_DESC')
	                ),
	                'downloadable' => array(
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DOWNLOADABLE'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FLIPBOOK_DOWNLOADABLE_DESC'),
						'type'  => 'checkbox',
						'std'   => '1',
	                ),
	                'sound' => array(
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SOUND'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FLIPBOOK_SOUND_DESC'),
						'type'  => 'checkbox',
						'std'   => '1',
	                ),
	                'mouse_scroll' => array(
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MOUSE_SCROLL'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FLIPBOOK_MOUSE_SCROLL'),
						'type'  => 'checkbox',
						'std'   => '0',
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