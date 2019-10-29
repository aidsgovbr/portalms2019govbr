<?php 

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_instagram_config extends Su_Data {

    function __construct() {
        parent::__construct();
    }
    static function get_config() {

        return array(
            'name'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_INSTAGRAM'),
            'desc' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_INSTAGRAM_DESC'),
            'type'  => 'single',
            'group' => 'content other',
            'icon' => 'instagram',
            'atts'  => array(
                'layout' => array(
                    'default' => '',
                    'type'    => 'select',
                    'values'  => array(
                        '1' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE1'),
                        '2' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE2'),
                        '3' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE3'),
                        '4' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE4'),
                        '5' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE5'),
                    ),
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LINK_TYPE'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LINK_TYPE_DESC')
                ),
                'instagram_id' => array(
                    'default' => '',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_USER'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_USER_DESC'),
                    'child' => array(
                        'hash_tag' => array(
                            'default' => '',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_HASH_TAG'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_HASH_TAG_DESC')
                        )                        
                    )
                ),
                'instagram_token' => array(
                    'default' => '',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_INSTAGRAM_ACCESS_TOKEN'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_INSTAGRAM_ACCESS_TOKEN_DESC'),
                ),
                'limit' => array(
                    'type'    => 'slider',
                    'min'     => 1,
                    'max'     => 100,
                    'step'    => 1,
                    'default' => 10,
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
                /*'gap' => array(
                    'type'    => 'bool',
                    'default' => 'yes',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_GAP'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_GAP_DESC')
                ),*/
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
