<?php
/**
* @subpackage Shortcode Ultimate
* @author BdThemes https://www.bdthemes.com
* @copyright Copyright (c) 2012 - 2016 BdThemes
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

if (class_exists('Su_Shortcode_social_share')) {
	SpAddonsConfig::addonConfig(
		array(
			'type'       => 'single',
			'category'   => 'Shortcode Ultimate',
			'addon_name' => 'su_social_share',
			'title'      => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SC_SOCIAL_SHARE'),
			'desc'       => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SC_SOCIAL_SHARE_DESC'),
	        'icon'       => JURI::root().'plugins/sppagebuilder/shortcode_ultimate/addons/su_social_share/element.svg',

			'attr'=>array(
				'general' => array(
					'facebook' => array(
						'type'  => 'checkbox',
						'std'   => '1',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SL_SHARE_BUTTON_FACEBOOK'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SL_SHARE_BUTTON_FACEBOOK_DESC'),
	                ),
	                'twitter' => array(
						'type'  => 'checkbox',
						'std'   => '1',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SL_SHARE_BUTTON_TWITTER'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SL_SHARE_BUTTON_TWITTER_DESC')
	                ),
	                'googleplus' => array(
						'type'  => 'checkbox',
						'std'   => '1',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SL_SHARE_BUTTON_GOOGLE_PLUS'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SL_SHARE_BUTTON_GOOGLE_PLUS_DESC')
	                ),
	                'vk' => array(
						'type'  => 'checkbox',
						'std'   => '0',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SL_SHARE_BUTTON_VK'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SL_SHARE_BUTTON_VK_DESC')
	                ),
	                'linkedin' => array(
						'type'  => 'checkbox',
						'std'   => '0',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SL_SHARE_BUTTON_LINKEDIN'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SL_SHARE_BUTTON_LINKEDIN_DESC'),
	                ),
	                'pinterest' => array(
						'type'  => 'checkbox',
						'std'   => '0',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SL_SHARE_BUTTON_PINTEREST'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SL_SHARE_BUTTON_PINTEREST_DESC')
	                ),
	                'tumblr' => array(
						'type'  => 'checkbox',
						'std'   => '0',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SL_SHARE_BUTTON_TUMBLR'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SL_SHARE_BUTTON_TUMBLR_DESC')
	                ),
	                'pocket' => array(
						'type'  => 'checkbox',
						'std'   => '0',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SL_SHARE_BUTTON_POCKET'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SL_SHARE_BUTTON_POCKET_DESC')
	                ),
	                'ok' => array(
						'type'  => 'checkbox',
						'std'   => '0',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SL_SHARE_BUTTON_OK'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SL_SHARE_BUTTON_OK_DESC')
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