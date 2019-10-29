<?php 

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_user_content_config extends Su_Data {

    function __construct() {
        parent::__construct();
    }
    static function get_config() {

        return array(
            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_USER_CONTENT'),
            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_USER_CONTENT_DESC'),
            'content' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_USER_CONTENT_CONTENT'),
            'icon'    => 'lock',
            'type'    => 'wrap',
            'group'   => 'other',
            'atts'    => array(
                'message' => array(
                    'default' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_USER_CONTENT_MESSAGE'),
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MESSAGE'), 
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MESSAGE_DESC')
                ),
                'color' => array(
                    'type'    => 'color',
                    'default' => '#ffcc00',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BOX_COLOR'), 
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BOX_COLOR_DESC')
                ),
                'login_text' => array(
                    'default' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LOGIN'),
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LOGIN_LINK_TEXT'), 
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LOGIN_LINK_TEXT_DESC'),
                    'child'		=> array(
                    	'login_url' => array(
                    	    'default' => 'index.php?option=com_users&view=login',
                    	    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LOGIN_LINK_URL'), 
                    	    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LOGIN_LINK_URL_DESC')
                    	)
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
        );
    }

}
