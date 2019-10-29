<?php 

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_social_share_config extends Su_Data {

    function __construct() {
        parent::__construct();
    }
    static function get_config() {

        return array(
            'name'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SC_SOCIAL_SHARE'),
            'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SC_SOCIAL_SHARE_DESC'),
            'type'  => 'single',
            'group' => 'content',
            'icon'  => 'share-alt',
            'atts'  => array(
                'facebook' => array(
                    'type'    => 'bool',
                    'default' => 'yes',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SL_SHARE_BUTTON_FACEBOOK'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SL_SHARE_BUTTON_FACEBOOK_DESC'),
                    'child'     => array(
                        'twitter' => array(
                            'type'    => 'bool',
                            'default' => 'yes',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SL_SHARE_BUTTON_TWITTER'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SL_SHARE_BUTTON_TWITTER_DESC')
                        ),
                        'googleplus' => array(
                            'type'    => 'bool',
                            'default' => 'yes',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SL_SHARE_BUTTON_GOOGLE_PLUS'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SL_SHARE_BUTTON_GOOGLE_PLUS_DESC')
                        ),
                        'vk' => array(
                            'type'    => 'bool',
                            'default' => 'no',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SL_SHARE_BUTTON_VK'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SL_SHARE_BUTTON_VK_DESC')
                        )
                    )
                ),
                'linkedin' => array(
                    'type'    => 'bool',
                    'default' => 'no',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SL_SHARE_BUTTON_LINKEDIN'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SL_SHARE_BUTTON_LINKEDIN_DESC'),
                    'child'     => array(
                        'pinterest' => array(
                            'type'    => 'bool',
                            'default' => 'no',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SL_SHARE_BUTTON_PINTEREST'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SL_SHARE_BUTTON_PINTEREST_DESC')
                        ),
                        'telegram' => array(
                            'type'    => 'bool',
                            'default' => 'no',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SL_SHARE_BUTTON_TELEGRAM'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SL_SHARE_BUTTON_TELEGRAM_DESC')
                        ),
                        'tumblr' => array(
                            'type'    => 'bool',
                            'default' => 'no',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SL_SHARE_BUTTON_TUMBLR'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SL_SHARE_BUTTON_TUMBLR_DESC')
                        ),
                        'pocket' => array(
                            'type'    => 'bool',
                            'default' => 'no',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SL_SHARE_BUTTON_POCKET'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SL_SHARE_BUTTON_POCKET_DESC')
                        )
                    )
                ),
                'ok' => array(
                    'type'    => 'bool',
                    'default' => 'no',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SL_SHARE_BUTTON_OK'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SL_SHARE_BUTTON_OK_DESC')
                ),
                'scroll_reveal' => array(
                    'default' => '',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SCROLL_REVEAL'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SCROLL_REVEAL_DESC')
                ),
                'class' => array(
                    'default' => '',
                    'name' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLASS'),
                    'desc' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLASS_DESC')
                )
            ) 
        );
    }
}
