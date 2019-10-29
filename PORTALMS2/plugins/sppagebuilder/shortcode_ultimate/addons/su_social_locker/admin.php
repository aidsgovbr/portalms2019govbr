<?php
/**
* @subpackage Shortcode Ultimate
* @author BdThemes https://www.bdthemes.com
* @copyright Copyright (c) 2012 - 2016 BdThemes
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

if (class_exists('Su_Shortcode_social_locker')) {
	SpAddonsConfig::addonConfig(
		array(
			'type'       => 'wrap',
			'category'   => 'Shortcode Ultimate',
			'addon_name' => 'su_social_locker',
			'title'      => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SOCIAL_LOCKER'),
			'desc'       => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SOCIAL_LOCKER_DESC'),
	        'icon'       => JURI::root().'plugins/sppagebuilder/shortcode_ultimate/addons/su_social_locker/element.svg',

			'attr'=>array(
				'general' => array(
	                'overlap'=>array(
						'title'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SL_OVERLAP'),
						'desc'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SL_OVERLAP_DESC'),
						'type'   => 'select',
						'std'    => 'full',
						'values' => array(
							'full'         => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SL_FULL'), 
							'transparence' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SL_TRANSPARENT'), 
							'blurring'     => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SL_BLURRING')
	                    )
	                ),
	                'title' => array( 
						'type'  => 'text',
						'std'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SL_LOCKED'),
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SL_TITLE'), 
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SL_TITLE_DESC'),
	                ),
	                'message' => array( 
						'type'  => 'text',
						'std'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SL_LOCKED_MSG'),
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SL_MESSAGE'), 
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SL_MESSAGE_DESC')
	                ),
	                'timer' => array(
						'type'  => 'number',
						'std'   => 0,
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SL_TIMER'), 
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SL_TIMER_DESC')
	                ),
	                'close' => array(
						'type'  => 'checkbox',
						'std'   => '0',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SL_CLOSE'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SL_CLOSE_DESC'),
	                ),
	                'mobile' => array(
						'type'  => 'checkbox',
						'std'   => '0',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SL_MOBILE'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SL_MOBILE_DESC')
	                ),
	                'demo_mode' => array(
						'type'  => 'checkbox',
						'std'   => '0',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SL_DEMO_MODE'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SL_DEMO_MODE_DESC')
	                ),
	                'guest_only' => array(
						'type'  => 'checkbox',
						'std'   => '0',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SL_GUEST_ONLY'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SL_GUEST_ONLY_DESC')
	                ),
	                'facebook' => array(
						'type'  => 'checkbox',
						'std'   => '1',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SL_FACEBOOK'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SL_FACEBOOK_DESC'),
	                ),
	                'google_plus' => array(
						'type'  => 'checkbox',
						'std'   => '1',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SL_GOOGLE_PLUS'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SL_GOOGLE_PLUS_DESC')
	                ),
	                'twitter' => array(
						'type'  => 'checkbox',
						'std'   => '1',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SL_TWITTER'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SL_TWITTER_DESC')
	                ),
	                'url' => array(
						'type'  => 'text',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SL_URL'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SL_URL_DESC')
	                ),
	                'class' => array(
						'type'  => 'text',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLASS'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLASS_DESC')
	                ),
	                'content' => array(
						'type'  => 'editor',
						'title' => 'Content',
						'std'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SL_CONTENT'),
	                ),
				),
	            'style' => array(
					'style' => array(
						'type'   => 'select',
						'std'    => 'starter',
						'title'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE'),
						'desc'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE_DESC'),
						'values' => array(
							'starter' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SL_STARTER'),
							'secrets' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SL_SECRETS'),
							'glass'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SL_GLASS'),
							'flat'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SL_FLAT')
	                     ),
	                ),
	            ),
			),
		)
	);
}