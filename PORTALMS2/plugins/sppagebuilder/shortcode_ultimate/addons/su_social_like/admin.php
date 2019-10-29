<?php
/**
* @subpackage Shortcode Ultimate
* @author BdThemes https://www.bdthemes.com
* @copyright Copyright (c) 2012 - 2016 BdThemes
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

if (class_exists('Su_Shortcode_social_like')) {
	SpAddonsConfig::addonConfig(
		array(
			'type'       => 'single',
			'category'   => 'Shortcode Ultimate',
			'addon_name' => 'su_social_like',
			'title'      => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SC_SOCIAL_LIKE'),
			'desc'       => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SC_SOCIAL_LIKE_DESC'),
	        'icon'       => JURI::root().'plugins/sppagebuilder/shortcode_ultimate/addons/su_social_like/element.svg',

			'attr'=>array(
				'general' => array(
					'button' => array(
						'type'   => 'select',
						'std'    => 'google',
						'title'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SL_BUTTON'),
						'desc'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SL_BUTTON_DESC'),
						'values' => array(
							'facebook' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FACEBOOK'),
							'linkedin' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LINKEDIN'),
							'twitter'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TWITTER'),
							'google'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_GOOGLE'),
							'vk'       => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SL_VK')
	                    ),
	                ),
	                'button_animation' => array(
						'type'   => 'select',
						'std'    => 'to_left',
						'title'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ANIMATION'),
						'desc'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ANIMATION_DESC'),
						'values' => array(
							'to_left'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TO_LEFT'),
							'to_top'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TO_TOP'),
							'to_bottom' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TO_BOTTOM'),
							'to_right'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TO_RIGHT')
	                    ),
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