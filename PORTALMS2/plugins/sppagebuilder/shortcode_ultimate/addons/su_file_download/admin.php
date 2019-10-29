<?php
/**
* @subpackage Shortcode Ultimate
* @author BdThemes https://www.bdthemes.com
* @copyright Copyright (c) 2012 - 2016 BdThemes
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

if (class_exists('Su_Shortcode_file_download')) {
	SpAddonsConfig::addonConfig(
		array(
			'type'       => 'single',
			'category'   => 'Shortcode Ultimate',
			'addon_name' => 'su_file_download',
			'title'      => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FILE_DOWNLOAD'),
			'desc'       => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FILE_DOWNLOAD_DESC'),
	        'icon'       => JURI::root().'plugins/sppagebuilder/shortcode_ultimate/addons/su_file_download/element.svg',

			'attr'       => array(
				'general'    => array(
					'id' => array(
						'type'  => 'text',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ID'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ID_DESC')
	                ),
	                'url' => array(
						'type'        => 'text',
						'placeholder' => 'images/sample_file.pdf',
						'title'       => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FILE'),
						'desc'        => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FILE_DESC'),
	                ),
	                'show_title' => array(
						'type'  => 'checkbox',
						'std'   => '1',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHOW_TITLE'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHOW_TITLE_DESC'),
	                ),
	                'custom_title' => array(
						'type'  => 'text',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CUSTOM_TITLE'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CUSTOM_TITLE_DESC')
	                ),
	                'save_as' => array(
						'type'  => 'text',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SAVE_AS'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SAVE_AS_DESC')
	                ),
	                'icon' => array(
						'type'  => 'icon',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_DESC')
	                ),
	                'show_count' => array(
						'type'  => 'checkbox',
						'std'   => '1',
						'title' => JTEXT::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHOW_COUNT'),
						'desc'  => JTEXT::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHOW_COUNT_DESC'),
	                ),
	                'show_like_count' => array(
						'type'  => 'checkbox',
						'std'   => '1',
						'title' => JTEXT::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHOW_LIKE_COUNT'),
						'desc'  => JTEXT::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHOW_LIKE_COUNT_DESC')
	                ),
	                'show_download_count' => array(
						'type'  => 'checkbox',
						'std'   => '1',
						'title' => JTEXT::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHOW_DOWNLOAD_COUNT'),
						'desc'  => JTEXT::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHOW_DOWNLOAD_COUNT_DESC')
	                ),
	                'show_file_size' => array(
						'type'  => 'checkbox',
						'std'   => '1',
						'title' => JTEXT::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHOW_FILE_SIZE'),
						'desc'  => JTEXT::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHOW_FILE_SIZE_DESC')
	                ),
	                'resumable' => array(
						'type'  => 'checkbox',
						'std'   => '1',
						'title' => JTEXT::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RESUMABLE'),
						'desc'  => JTEXT::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RESUMABLE_DESC'),
	                ),                        
	                'download_speed' => array(
						'type'  => 'number',
						'std'   => 500,
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DOWNLOAD_SPEED'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DOWNLOAD_SPEED_DESC')
	                ),
	                'button_text' => array(
						'type'  => 'text',
						'std'   => 'Download Now',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FILE_BUTTON_TEXT'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FILE_BUTTON_TEXT_DESC'),
	                ),
	                'button_class' => array(
						'type'  => 'text',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BUTTON_CLASS'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BUTTON_CLASS_DESC')
	                ),
	                'class' => array(
						'type'  => 'text',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLASS'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLASS_DESC')
	                ),
				),
	            'style' => array(
	                'button_color' => array(
						'type'  => 'color',
						'std'   => '#f5f5f5',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FILE_BUTTON_COLOR'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FILE_BUTTON_COLOR_DESC')
	                ),
	                'button_hover_color' => array(
						'type'  => 'color',
						'std'   => '#ffffff',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FILE_BUTTON_HOVER_COLOR'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FILE_BUTTON_HOVER_COLOR_DESC')
	                ),
	                'button_background' => array(
						'type'  => 'color',
						'std'   => '#ff6a56',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BUTTON_BACKGROUND'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BUTTON_BACKGROUND_DESC'),
	                ),
	                'button_hover_background' => array(
						'type'  => 'color',
						'std'   => '#ff543d',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BUTTON_HOVER_BACKGROUND'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BUTTON_HOVER_BACKGROUND_DESC')
	                ),
	            ),
			),
		)
	);
}
