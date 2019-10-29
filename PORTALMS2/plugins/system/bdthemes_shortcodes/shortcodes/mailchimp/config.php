<?php 

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_mailchimp_config extends Su_Data {

    function __construct() {
        parent::__construct();
    }
    
    static function get_config() {

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

        return array(            
            'name'     => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MAILCHIMP'),
            'desc'     => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MAILCHIMP_DESC'),
            'icon'  => 'envelope',
            'type'  => 'single',
            'group' => 'other',
            'badge' => 'NEW',
            'atts'     => array(
                'email_list' => array(
                    'type'    => 'select',
                    'default' => '',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_EMAIL_LIST'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_EMAIL_LIST_DESC'),
                    'values'  => $mail_lists
                ),
                'before_text' => array(
                    'default' => '',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MAILCHIMP_BEFORE_TEXT'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MAILCHIMP_BEFORE_TEXT_DESC'),
                    'child'   => array(
                        'after_text' => array(
                            'default' => '',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MAILCHIMP_AFTER_TEXT'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MAILCHIMP_AFTER_TEXT_DESC')
                        ),
                    )
                ),
                'scroll_reveal' => array(
                    'default' => '',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SCROLL_REVEAL'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SCROLL_REVEAL_DESC')
                ),
                'class' => array(
                    'default' => '',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLASS'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLASS_DESC')
                )
            ),
            'content' => ''
        );
    }

}
