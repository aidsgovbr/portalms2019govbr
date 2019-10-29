<?php
/**
* @subpackage Shortcode Ultimate
* @author BdThemes https://www.bdthemes.com
* @copyright Copyright (c) 2012 - 2016 BdThemes
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

if (class_exists('Su_Shortcode_contact_form')) {
	SpAddonsConfig::addonConfig(
		array(
			'type'       => 'single',
			'category'   => 'Shortcode Ultimate',
			'addon_name' => 'su_contact_form',
			'title'      => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CONTACT_FORM'),
			'desc'       => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CONTACT_FORM_DESC'),
	        'icon'       => JURI::root().'plugins/sppagebuilder/shortcode_ultimate/addons/su_contact_form/element.svg',

			'attr'=>array(
				'general' => array(
					'email' => array(
						'type'  => 'text',
						'std'   => '',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CONTACT_FORM_EMAIL'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CONTACT_FORM_EMAIL_DESC')
	                ),
	                'subject' => array(
						'type'  => 'checkbox',
						'std'   => '1',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CONTACT_FORM_SUBJECT'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CONTACT_FORM_SUBJECT_DESC'),
	                ),
		            'name' => array(
						'type'  => 'checkbox',
						'std'   => '1',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CONTACT_FORM_NAME'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CONTACT_FORM_NAME_DESC')
		            ),
		            'label' => array(
						'type'  => 'checkbox',
						'std'   => '1',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CONTACT_FORM_LBL_SHOW'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CONTACT_FORM_LBL_SHOW_DESC')
		            ),
		            'reset' => array(
						'type'  => 'checkbox',
						'std'   => '0',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CONTACT_FORM_RESET'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CONTACT_FORM_RESET_DESC')
	                ),                
	                'textarea_height' => array(
						'type'  => 'text',
						'std'   => '120',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CONTACT_FORM_TEXTAREA_HEIGHT'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CONTACT_FORM_TEXTAREA_HEIGHT_DESC')                           
	                ),                
	                'submit_button_text' => array(
						'type'  => 'text',
						'std'   => '',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BUTTON_TEXT'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BUTTON_TEXT_DESC')                           
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