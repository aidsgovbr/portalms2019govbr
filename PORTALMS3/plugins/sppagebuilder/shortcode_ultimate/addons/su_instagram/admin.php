<?php
/**
* @subpackage Shortcode Ultimate
* @author BdThemes https://www.bdthemes.com
* @copyright Copyright (c) 2012 - 2016 BdThemes
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

if (class_exists('Su_Shortcode_instagram')) {
	SpAddonsConfig::addonConfig(
		array(
			'type'       => 'single',
			'category'   => 'Shortcode Ultimate',
			'addon_name' => 'su_instagram',
			'title'      => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_INSTAGRAM'),
			'desc'       => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_INSTAGRAM_DESC'),
	        'icon'       => JURI::root().'plugins/sppagebuilder/shortcode_ultimate/addons/su_instagram/element.svg',

			'attr'=>array(
				'general' => array(
					'layout' => array(
						'type'   => 'select',
						'title'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LINK_TYPE'),
						'desc'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LINK_TYPE_DESC'),
						'values' => array(
							''  => 'Default',
							'1' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE1'),
							'2' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE2'),
							'3' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE3'),
							'4' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE4'),
							'5' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE5'),
	                    ),
	                ),
	                'instagram_id' => array(
						'type'  => 'text',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_USER'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_USER_DESC'),
	                ),
	                'hash_tag' => array(
						'type'  => 'text',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_HASH_TAG'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_HASH_TAG_DESC')
	                ),
	                'instagram_token' => array(
						'type'  => 'text',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_INSTAGRAM_ACCESS_TOKEN'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_INSTAGRAM_ACCESS_TOKEN_DESC'),
	                ),
	                'limit' => array(
						'type'  => 'number',
						'std'   => 10,
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