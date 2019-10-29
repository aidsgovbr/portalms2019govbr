<?php
/**
* @subpackage Shortcode Ultimate
* @author BdThemes https://www.bdthemes.com
* @copyright Copyright (c) 2012 - 2016 BdThemes
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

if (class_exists('Su_Shortcode_social_gallery')) {
	SpAddonsConfig::addonConfig(
		array(
			'type'       => 'single',
			'category'   => 'Shortcode Ultimate',
			'addon_name' => 'su_social_gallery',
			'title'      => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SOCIAL_GALLERY'),
			'desc'       => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SOCIAL_GALLERY_DESC'),
	        'icon'       => JURI::root().'plugins/sppagebuilder/shortcode_ultimate/addons/su_social_gallery/element.svg',

			'attr'=>array(
				'general' => array(
					'instagram_name' => array(
						'type'  => 'text',
						'std'   => 'Instagram Photos',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_INSTAGRAM_NAME'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_INSTAGRAM_NAME_DESC')
	                ),
	                'facebook_album_url' => array(
						'type'  => 'text',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FACEBOOK_ALBUM_URL'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FACEBOOK_ALBUM_URL_DESC'),
	                ),
	                'facebook_album_name' => array(
						'type'  => 'text',
						'std'   => 'Facebook Album Photos',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FACEBOOK_ALBUM_NAME'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FACEBOOK_ALBUM_NAME_DESC')
	                ),
	                'google_user_url' => array(
						'type'  => 'text',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_GOOGLE_USER_URL'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_GOOGLE_USER_URL_DESC'),
	                ),
	                'google_user_name' => array(
						'type'  => 'text',
						'std'   => 'Google User Photos',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_GOOGLE_USER_NAME'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_GOOGLE_USER_NAME_DESC')
	                ),
	                'header_title' => array(
						'type'  => 'text',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_HEADER_TITLE'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_HEADER_TITLE_DESC'),
	                ),
	                'header_sub_title' => array(
						'type'  => 'text',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_HEADER_SUB_TITLE'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_HEADER_SUB_TITLE_DESC')
	                ),
	                'header_image' => array(
						'type'  => 'media',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_HEADER_IMAGE'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_HEADER_IMAGE_DESC'),
	                ),
	                'header_bg_image' => array(
						'type'  => 'media',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_HEADER_BG_IMAGE'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_HEADER_BG_IMAGE_DESC')
	                ),
	                'header_link' => array(
						'type'  => 'text',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_HEADER_LINK'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_HEADER_LINK_DESC'),
	                ),
	                'google_plus_link' => array(
						'type'  => 'text',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_GOOGLE_PLUS_LINK'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_GOOGLE_PLUS_LINK_DESC')
	                ),
	                'twitter_link' => array(
						'type'  => 'text',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TWITTER_LINK'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TWITTER_LINK_DESC'),
	                ),
	                'facebook_link' => array(
						'type'  => 'text',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FACEBOOK_LINK'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FACEBOOK_LINK_DESC')
	                ),
	                'limit' => array(
						'type'  => 'number',
						'std'   => 15,
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ITEM_LIMIT'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ITEM_LIMIT_DESC')
	                ),
	                'link_type' => array(
						'std'    => 'popup',
						'type'   => 'select',
						'title'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LINK_TYPE'),
						'desc'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LINK_TYPE_DESC'),
						'values' => array(
							'no'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_NO'),
							'popup' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_POPUP'),
							'link'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LINK')
	                    ),
	                ),
	                'load_more' => array(
						'type'  => 'checkbox',
						'std'   => '0',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_HIDE_LOAD_MORE'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_HIDE_LOAD_MORE_DESC')
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