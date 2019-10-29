<?php 

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_social_like_config extends Su_Data {

    function __construct() {
        parent::__construct();
    }
    static function get_config() {

        return array(
            'name'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SC_SOCIAL_LIKE'),
            'desc' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SC_SOCIAL_LIKE_DESC'),
            'icon' => 'thumbs-o-up',
            'type'  => 'single',
            'group' => 'content',
            'atts'  => array(
                'button' => array(
                    'type'   => 'select',
                    'values' => array(
                        'facebook' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FACEBOOK'),
                        'linkedin' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LINKEDIN'),
                        'twitter'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TWITTER'),
                        'google'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_GOOGLE'),
                        'vk'       => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SL_VK')
                    ),
                    'default' => 'google',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SL_BUTTON'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SL_BUTTON_DESC')
                ),
                'button_animation' => array(
                    'type'   => 'select',
                    'values' => array(
                        'to_left'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TO_LEFT'),
                        'to_top'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TO_TOP'),
                        'to_bottom' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TO_BOTTOM'),
                        'to_right'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TO_RIGHT')
                    ),
                    'default' => 'to_left',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ANIMATION'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ANIMATION_DESC')
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
