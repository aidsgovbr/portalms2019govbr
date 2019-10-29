<?php
/**
* @subpackage Shortcode Ultimate
* @author BdThemes https://www.bdthemes.com
* @copyright Copyright (c) 2012 - 2016 BdThemes
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

if (class_exists('Su_Shortcode_youtube_advanced')) {
	SpAddonsConfig::addonConfig(
		array(
			'type'       => 'single',
			'category'   => 'Shortcode Ultimate',
			'addon_name' => 'su_youtube_advanced',
			'title'      => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_YOUTUBE_ADVANCED'),
			'desc'       => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_YOUTUBE_ADVANCED_DESC'),
	        'icon'       => JURI::root().'plugins/sppagebuilder/shortcode_ultimate/addons/su_youtube_advanced/element.svg',

			'attr'=>array(
				'general' => array(
					'url' => array(
						'type'  => 'text',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_URL'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_YOUTUBE_URL_DESC')
	                ),
	                'playlist' => array(
						'type'  => 'text',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PLAYLIST'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PLAYLIST_DESC')
	                ),
	                'width' => array(
						'type'  => 'number',
						'std'   => 600,
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_WIDTH'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PLAYER_WIDTH_DESC'),
	                ),
	            	'height' => array(
						'type'  => 'number',
						'std'   => 400,
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_HEIGHT'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PLAYER_HEIGHT_DESC')
	            	),
	                'controls' => array(
						'type'   => 'select',
						'std'    => 'yes',
						'title'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CONTROLS'),
						'desc'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CONTROLS_DESC'),
						'values' => array(
							'no'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CONTROLS_NO'),
							'yes' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CONTROLS_YES'),
							'alt' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CONTROLS_ALT')
	                    ),
	                ),
	            	'autohide' => array(
						'type'   => 'select',
						'std'    => 'alt',
						'title'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_AUTOHIDE'),
						'desc'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_AUTOHIDE_DESC'),
						'values' => array(
							'no'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_AUTOHIDE_NO'),
							'yes' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_AUTOHIDE_YES'),
							'alt' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_AUTOHIDE_ALT')
	            	    ),
	                ),
	                'showinfo' => array(
						'type'  => 'checkbox',
						'std'   => '1',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHOWINFO'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHOWINFO_DESC'),
	                ),
	            	'responsive' => array(
						'type'  => 'checkbox',
						'std'   => '1',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RESPONSIVE'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RESPONSIVE_DESC'),
	            	),
	            	'autoplay' => array(
						'type'  => 'checkbox',
						'std'   => '0',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_AUTOPLAY'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_AUTOPLAY_DESC')
	                ),
	                'loop' => array(
						'type'  => 'checkbox',
						'std'   => '0',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LOOP'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LOOP_DESC'),
	                ),
	            	'rel' => array(
						'type'  => 'checkbox',
						'std'   => '1',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_REL'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_REL_DESC')
	            	),
	            	'fs' => array(
						'type'  => 'checkbox',
						'std'   => '1',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FS'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FS_DESC')
	                ),
	                'modestbranding' => array(
						'type'  => 'checkbox',
						'std'   => '0',
						'title' => 'modestbranding',
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MODESTBRANDING_DESC'),
	                ),
	            	'theme' => array(
						'type'   => 'select',
						'std'    => 'dark',
						'title'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_THEME'),
						'desc'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_THEME_DESC'),
						'values' => array(
							'dark'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DARK'),
							'light' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LIGHT')
	            	    ),
	                ),
	                'wmode' => array(
						'type'  => 'text',
						'title' => JText::_('WMode'),
						'desc'  => JText::_('Here you can specify wmode value for the embed URL. <br> Example values: <b%value>transparent</b>, <b%value>opaque</b>')
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