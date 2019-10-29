<?php 

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_social_feed_config extends Su_Data {

    function __construct() {
        parent::__construct();
    }
    
    static function get_config() {

        return array(
            'name'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SOCIAL_FEED'),
            'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SOCIAL_FEED_DESC'),
            'type'  => 'single',
            'group' => 'content',
            'icon'  => 'share-square-o',
            'atts'  => array(
                'width' => array(
                   'default' => '320',
                   'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_WIDTH'),
                   'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_WIDTH_DESC'),
                   'child'  => array(
                        'height' => array(
                           'default' => '480',
                           'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_HEIGHT'),
                           'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_HEIGHT_DESC')
                        )
                    )
                ),
                'facebook' => array(
                    'type'    => 'bool',
                    'default' => 'yes',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHOW_FACEBOOK'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHOW_FACEBOOK_DESC'),
                    'child' => array(
                        'twitter' => array(
                            'type'    => 'bool',
                            'default' => 'yes',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHOW_TWITTER'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHOW_TWITTER_DESC')
                        ),
                        'instagram' => array(
                            'type'    => 'bool',
                            'default' => 'yes',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHOW_INSTAGRAM'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHOW_INSTAGRAM_DESC')
                        ),
                        'vkontakte' => array(
                            'type'    => 'bool',
                            'default' => 'yes',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHOW_VKONTAKTE'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHOW_VKONTAKTE_DESC')
                        ),
                        'pinterest' => array(
                            'type'    => 'bool',
                            'default' => 'yes',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHOW_PINTEREST'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHOW_PINTEREST_DESC')
                        )
                    )
                ),
                'order' => array(
                   'default' => '',
                   'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SOCIAL_FEED_ORDER'),
                   'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SOCIAL_FEED_ORDER_DESC'),
                   'child'  => array(
                        'active_tab' => array(
                                'type'    => 'select',
                                'values'  => array(
                                    'facebook'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FACEBOOK'),
                                    'twitter'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TWITTER'),
                                    'instagram' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_INSTAGRAM'),
                                    'vkontakte' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_VKONTAKTE'),
                                    'pinterest' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PINTEREST')
                                ),
                            'default' => 'facebook',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ACTIVE_TAB'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ACTIVE_TAB_DESC')
                        ),
                        'limit' => array(
                            'type'    => 'slider',
                            'min'     => 4,
                            'max'     => 40,
                            'step'    => 1,
                            'default' => 10,
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LIMIT'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LIMIT_DESC')
                        )
                    )
                ),
                'position' => array(
                        'type'    => 'select',
                        'values'  => array(
                            'default'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DEFAULT'),
                            'left'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LEFT'),
                            'right' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RIGHT')
                        ),
                    'default' => 'default',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_POSITION'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_POSITION_DESC'),
                    'child' => array(
                        'link_text' => array(
                            'default' => '',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LINK_TEXT'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LINK_TEXT_DESC')
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
            )
        );
    }
}
