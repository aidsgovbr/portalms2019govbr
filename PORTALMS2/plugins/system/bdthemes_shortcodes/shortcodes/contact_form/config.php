<?php 

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_contact_form_config extends Su_Data {

    function __construct() {
        parent::__construct();
    }
    
    static function get_config() {

        return array(
            'name'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CONTACT_FORM'),
            'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CONTACT_FORM_DESC'),
            'icon'  => 'envelope',
            'type'  => 'single',
            'group' => 'content',
            'atts'  => array(
                'email' => array(
                    'default' => '',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CONTACT_FORM_EMAIL'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CONTACT_FORM_EMAIL_DESC')
                ),
                'subject' => array(
                    'type'    => 'bool',
                    'default' => 'yes',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CONTACT_FORM_SUBJECT'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CONTACT_FORM_SUBJECT_DESC'),
                    'child'   => array(
                        'name' => array(
                            'type'    => 'bool',
                            'default' => 'yes',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CONTACT_FORM_NAME'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CONTACT_FORM_NAME_DESC')
                        ),
                        'label' => array(
                            'type'    => 'bool',
                            'default' => 'yes',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CONTACT_FORM_LBL_SHOW'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CONTACT_FORM_LBL_SHOW_DESC')
                        ),
                        'reset' => array(
                            'type'    => 'bool',
                            'default' => 'no',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CONTACT_FORM_RESET'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CONTACT_FORM_RESET_DESC')
                        )
                    )
                ),                
                'textarea_height' => array(
                    'default' => '120',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CONTACT_FORM_TEXTAREA_HEIGHT'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CONTACT_FORM_TEXTAREA_HEIGHT_DESC')                           
                ),
                'margin' => array(
                    'default' => '20px',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MARGIN'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MARGIN_DESC')                           
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
            )
        );
    }

}
