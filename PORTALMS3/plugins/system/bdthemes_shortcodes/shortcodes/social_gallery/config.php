<?php

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined('_JEXEC') or die;

class Su_Shortcode_social_gallery_config extends Su_Data {

    function __construct() {
        parent::__construct();
    }
    
    static function get_config() {

        return array(
            'name'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SOCIAL_GALLERY'),
            'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SOCIAL_GALLERY_DESC'),
            'type'  => 'single',
            'badge' => 'NEW',
            'group' => 'gallery',
            'icon'  => 'th',
            'atts'  => array(
                'instagram_name' => array(
                    'default' => '',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_INSTAGRAM_NAME'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_INSTAGRAM_NAME_DESC')
                ),
                'facebook_album_url' => array(
                    'default' => '',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FACEBOOK_ALBUM_URL'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FACEBOOK_ALBUM_URL_DESC'),
                    'child' => array(
                        'facebook_album_name' => array(
                            'default' => '',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FACEBOOK_ALBUM_NAME'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FACEBOOK_ALBUM_NAME_DESC')
                        ),
                    )
                ),
                'google_user_url' => array(
                    'default' => '',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_GOOGLE_USER_URL'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_GOOGLE_USER_URL_DESC'),
                    'child' => array(
                        'google_user_name' => array(
                            'default' => '',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_GOOGLE_USER_NAME'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_GOOGLE_USER_NAME_DESC')
                        ),
                    )
                ),
                'header_title' => array(
                    'default' => '',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_HEADER_TITLE'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_HEADER_TITLE_DESC'),
                    'child' => array(
                        'header_sub_title' => array(
                            'default' => '',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_HEADER_SUB_TITLE'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_HEADER_SUB_TITLE_DESC')
                        ),
                    )
                ),
                'header_image' => array(
                    'type' => 'upload',
                    'default' => '',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_HEADER_IMAGE'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_HEADER_IMAGE_DESC'),
                    'child' => array(
                        'header_bg_image' => array(
                            'type' => 'upload',
                            'default' => '',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_HEADER_BG_IMAGE'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_HEADER_BG_IMAGE_DESC')
                        ),
                    )
                ),
                'header_link' => array(
                    'default' => '',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_HEADER_LINK'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_HEADER_LINK_DESC'),
                    'child' => array(
                        'google_plus_link' => array(
                            'default' => '',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_GOOGLE_PLUS_LINK'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_GOOGLE_PLUS_LINK_DESC')
                        ),
                    )
                ),
                'twitter_link' => array(
                    'default' => '',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TWITTER_LINK'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TWITTER_LINK_DESC'),
                    'child' => array(
                        'facebook_link' => array(
                            'default' => '',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FACEBOOK_LINK'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FACEBOOK_LINK_DESC')
                        ),
                    )
                ),
                'limit' => array(
                    'type'    => 'slider',
                    'min'     => 1,
                    'max'     => 100,
                    'step'    => 1,
                    'default' => 15,
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ITEM_LIMIT'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ITEM_LIMIT_DESC')
                ),
                'link_type' => array(
                    'default' => 'popup',
                    'type'    => 'select',
                    'values'  => array(
                        'no'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_NO'),
                        'popup' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_POPUP'),
                        'link'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LINK')
                    ),
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LINK_TYPE'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LINK_TYPE_DESC')
                ),
                'load_more' => array(
                    'type'    => 'bool',
                    'default' => 'no',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_HIDE_LOAD_MORE'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_HIDE_LOAD_MORE_DESC')
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
