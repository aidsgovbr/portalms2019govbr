<?php
/**
* @subpackage Shortcode Ultimate
* @author BdThemes https://www.bdthemes.com
* @copyright Copyright (c) 2012 - 2016 BdThemes
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

if (class_exists('Su_Shortcode_social_feed')) {
	SpAddonsConfig::addonConfig(
		array(
			'type'       => 'single',
			'category'   => 'Shortcode Ultimate',
			'addon_name' => 'su_social_feed',
			'title'      => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SOCIAL_FEED'),
			'desc'       => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SOCIAL_FEED_DESC'),
	        'icon'       => JURI::root().'plugins/sppagebuilder/shortcode_ultimate/addons/su_social_feed/element.svg',

			'attr'=>array(
				'general' => array(
					'width' => array(
						'type'  => 'text',
						'std'   => '320',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_WIDTH'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_WIDTH_DESC'),
	                ),
					'height' => array(
						'type'  => 'text',
						'std'   => '480',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_HEIGHT'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_HEIGHT_DESC')
	                ),
	                'facebook' => array(
						'type'  => 'checkbox',
						'std'   => '1',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHOW_FACEBOOK'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHOW_FACEBOOK_DESC'),
	                ),
	                'twitter' => array(
						'type'  => 'checkbox',
						'std'   => '1',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHOW_TWITTER'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHOW_TWITTER_DESC')
	                ),
	                'instagram' => array(
						'type'  => 'checkbox',
						'std'   => '1',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHOW_INSTAGRAM'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHOW_INSTAGRAM_DESC')
	                ),
	                'vkontakte' => array(
						'type'  => 'checkbox',
						'std'   => '1',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHOW_VKONTAKTE'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHOW_VKONTAKTE_DESC')
	                ),
	                'pinterest' => array(
						'type'  => 'checkbox',
						'std'   => '1',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHOW_PINTEREST'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHOW_PINTEREST_DESC')
	                ),
	                'order' => array(
						'type'  => 'text',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SOCIAL_FEED_ORDER'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SOCIAL_FEED_ORDER_DESC'),
	                ),
	                'active_tab' => array(
						'type'   => 'select',
						'std'    => 'facebook',
						'title'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ACTIVE_TAB'),
						'desc'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ACTIVE_TAB_DESC'),
						'values' => array(
							'facebook'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FACEBOOK'),
							'twitter'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TWITTER'),
							'instagram' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_INSTAGRAM'),
							'vkontakte' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_VKONTAKTE'),
							'pinterest' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PINTEREST')
	                    ),
	                ),
	                'limit' => array(
						'type'  => 'number',
						'std'   => 10,
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LIMIT'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LIMIT_DESC')
	                ),
	                'position' => array(
						'type'   => 'select',
						'std'    => 'default',
						'title'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_POSITION'),
						'desc'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_POSITION_DESC'),
						'values' => array(
							'default' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DEFAULT'),
							'left'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LEFT'),
							'right'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RIGHT')
	                    ),
	                ),
	                'link_text' => array(
						'type'  => 'text',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LINK_TEXT'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LINK_TEXT_DESC')
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