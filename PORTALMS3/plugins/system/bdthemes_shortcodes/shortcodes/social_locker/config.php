<?php 

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_social_locker_config extends Su_Data {

    function __construct() {
        parent::__construct();
    }
    static function get_config() {

        return array(
            'name'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SOCIAL_LOCKER'),
            'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SOCIAL_LOCKER_DESC'),
            'icon'  => 'lock',
            'type'  => 'wrap',
            'group' => 'content',
            'content' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SL_CONTENT'),
            'badge'   => 'UPDATE',
            'atts'  => array(
                'style' => array(
                    'type'     => 'select',
                        'values'   => array(
                            'starter'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SL_STARTER'),
                            'secrets'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SL_SECRETS'),
                            'glass'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SL_GLASS'),
                            'flat'     => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SL_FLAT')
                         ),
                    'default' => 'starter',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE_DESC'),
                    'child' => array(
                        'overlap'=>array(
                            'name' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SL_OVERLAP'),
                            'desc' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SL_OVERLAP_DESC'),
                            'type' => 'select',
                            'default' => 'full',
                            'values'=> array(
                                'full'         => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SL_FULL'), 
                                'transparence' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SL_TRANSPARENT'), 
                                'blurring'     => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SL_BLURRING')
                            )
                        )
                    )
                ),
                'title' => array(
                    'default' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SL_LOCKED'),
                    'name' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SL_TITLE'), 
                    'desc' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SL_TITLE_DESC'),
                    'child'   => array(
                        'message' => array(
                            'default' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SL_LOCKED_MSG'),
                            'name' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SL_MESSAGE'), 
                            'desc' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SL_MESSAGE_DESC')
                        )
                    )
                ),
                'timer' => array(
                    'type'    => 'slider',
                    'min'     => 0,
                    'max'     => 1000,
                    'step'    => 10,
                    'default' => 0,
                    'name' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SL_TIMER'), 
                    'desc' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SL_TIMER_DESC')
                ),
                'close' => array(
                    'type' => 'bool',
                    'default' => 'no',
                    'name' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SL_CLOSE'),
                    'desc' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SL_CLOSE_DESC'),
                    'child'   => array(
                        'mobile' => array(
                            'type' => 'bool',
                            'default' => 'no',
                            'name' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SL_MOBILE'),
                            'desc' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SL_MOBILE_DESC')
                        ),
                        'demo_mode' => array(
                            'type' => 'bool',
                            'default' => 'no',
                            'name' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SL_DEMO_MODE'),
                            'desc' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SL_DEMO_MODE_DESC')
                        ),
                        'guest_only' => array(
                            'type' => 'bool',
                            'default' => 'no',
                            'name' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SL_GUEST_ONLY'),
                            'desc' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SL_GUEST_ONLY_DESC')
                        )
                    )
                ),
                'facebook' => array(
                    'type' => 'bool',
                    'default' => 'yes',
                    'name' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SL_FACEBOOK'),
                    'desc' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SL_FACEBOOK_DESC'),
                    'child'   => array(
                        'google_plus' => array(
                            'type' => 'bool',
                            'default' => 'yes',
                            'name' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SL_GOOGLE_PLUS'),
                            'desc' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SL_GOOGLE_PLUS_DESC')
                        ),
                        'twitter' => array(
                            'type' => 'bool',
                            'default' => 'yes',
                            'name' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SL_TWITTER'),
                            'desc' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SL_TWITTER_DESC')
                        )
                    )
                ),
                'url' => array(
                    'default' => '',
                    'name' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SL_URL'),
                    'desc' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SL_URL_DESC')
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
