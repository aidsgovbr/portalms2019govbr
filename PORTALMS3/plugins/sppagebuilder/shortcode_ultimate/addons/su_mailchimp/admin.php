<?php
/**
* @subpackage Shortcode Ultimate
* @author BdThemes https://www.bdthemes.com
* @copyright Copyright (c) 2012 - 2016 BdThemes
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

if (class_exists('Su_Shortcode_mailchimp')) {

	$plugin     = JPluginHelper::getPlugin('system', 'bdthemes_shortcodes');
	$params     = new JRegistry($plugin->params);

	$mailchimp_api = ( $params->get('mailchimp_key') ) ? $params->get('mailchimp_key') : '';
	$mail_lists    = array();

	if ( ! empty ( $mailchimp_api ) ) {
	  if ( ! class_exists( 'MCAPI' ) ) {
	      include_once( dirname(__FILE__) . '/MCAPI.class.php' );
	  }
	  $api_key = $mailchimp_api;
	  $mcapi   = new MCAPI( $api_key );
	  $lists   = $mcapi->lists();
	}

	if ( isset( $lists['data'] ) && is_array( $lists['data'] ) ) {
	  foreach ( $lists['data'] as $key => $value ) {
	      $mail_lists[$value['id']] = $value['name'];
	  }
	}

	SpAddonsConfig::addonConfig(
		array(
			'type'       => 'single',
			'category'   => 'Shortcode Ultimate',
			'addon_name' => 'su_mailchimp',
			'title'      => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MAILCHIMP'),
			'desc'       => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MAILCHIMP_DESC'),
	        'icon'       => JURI::root().'plugins/sppagebuilder/shortcode_ultimate/addons/su_mailchimp/element.svg',

			'attr'=>array(
				'general' => array(
					'email_list' => array(
						'type'   => 'select',
						'title'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_EMAIL_LIST'),
						'desc'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_EMAIL_LIST_DESC'),
						'values' => $mail_lists
	                ),
	                'before_text' => array(
						'type'  => 'text',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MAILCHIMP_BEFORE_TEXT'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MAILCHIMP_BEFORE_TEXT_DESC'),
	                ),
	                'after_text' => array(
						'type'  => 'text',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MAILCHIMP_AFTER_TEXT'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MAILCHIMP_AFTER_TEXT_DESC')
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