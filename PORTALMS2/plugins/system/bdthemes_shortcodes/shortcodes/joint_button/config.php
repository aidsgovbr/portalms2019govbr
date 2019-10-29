<?php 

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_joint_button_config extends Su_Data {

    function __construct() {
      parent::__construct();
    }

    static function get_config() {

        return array(
            'name'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_JOINT_BUTTON'),
            'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_JOINT_BUTTON_DESC'),
            'type'  => 'single',
            'group' => 'content',
            'badge' => 'BETA',
            'icon'  => 'heart',
            'atts'  => array(
                'left_btn_text' => array(
                    'default' => 'Get Support',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LEFT_BTN_TEXT'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LEFT_BTN_TEXT_DESC'),
                    'child'   => array(
                        'left_btn_url' => array(
                            'default' => '#',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_URL'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_URL_DESC'),
                        ),
                        'left_btn_target' => array(
                            'type'    => 'select',
                            'default' => 'blank',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TARGET'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TARGET_DESC'),
                            'values'  => array(
                                'self'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SELF'),
                                'blank' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BLANK'),
                            ),                    
                        ),
                    ),
                ),
                'left_btn_bg' => array(
                    'default' => '#666666',
                    'type'    => 'color',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LEFT_BTN_BG'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BACKGROUND_DESC'),
                    'child'   => array(
                        'left_btn_hover_bg' => array(
                            'default' => '#4d4d4d',
                            'type'    => 'color',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_HOVER_BACKGROUND'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_HOVER_BACKGROUND_DESC'),
                        ),
                        'left_btn_color' => array(
                            'default' => '#ffffff',
                            'type'    => 'color',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_COLOR'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_COLOR_DESC'),
                        ),
                    ),
                ),
                'left_btn_icon' => array(
                    'default' => '',
                    'type'    => 'icon',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LEFT_BTN_ICON'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_DESC'),
                ),
                'middle_txt' => array(
                    'default' => 'Or',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MIDDLE_TEXT'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MIDDLE_TEXT_DESC'),
                ),
                'right_btn_text' => array(
                    'default' => 'View Details',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RIGHT_BTN_TEXT'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RIGHT_BTN_TEXT_DESC'),
                    'child'   => array(
                        'right_btn_url' => array(
                            'default' => '#',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_URL'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_URL_DESC'),
                        ),
                        'right_btn_target' => array(
                            'type'    => 'select',
                            'default' => 'blank',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TARGET'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TARGET_DESC'),
                            'values'  => array(
                                'self'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SELF'),
                                'blank' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BLANK'),
                            ),                    
                        ),
                    ),
                ),
                'right_btn_bg' => array(
                    'default' => '#f57c00',
                    'type'    => 'color',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RIGHT_BTN_BG'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BACKGROUND_DESC'),
                    'child'   => array(
                        'right_btn_hover_bg' => array(
                            'default' => '#fa8d1d',
                            'type'    => 'color',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_HOVER_BACKGROUND'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_HOVER_BACKGROUND_DESC'),
                        ),
                        'right_btn_color' => array(
                            'default' => '#ffffff',
                            'type'    => 'color',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_COLOR'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_COLOR_DESC'),
                        ),
                    ),
                ),
                'right_btn_icon' => array(
                    'default' => '',
                    'type'    => 'icon',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RIGHT_BTN_ICON'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_DESC'),
                ),
                'width' => array(
                    'default' => '450px',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_WIDTH'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_WIDTH_DESC'),
                ),
                'align' => array(
                    'type'    => 'select',
                    'default' => 'center',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ALIGN'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ALIGN_DESC'),
                    'values'  => array(
                        'left'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LEFT'),
                        'right'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RIGHT'),
                        'center' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CENTER'),
                    ),
                ),
                'radius' => array(
                    'default' => '3px',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RADIUS'), 
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RADIUS_DESC'),
                ),
                'scroll_reveal' => array(
                    'name' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SCROLL_REVEAL'),
                    'desc' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SCROLL_REVEAL_DESC'),
                ),
                'class' => array(
                    'name' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLASS'),
                    'desc' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLASS_DESC'),
                ) 
            )
        );
    }
}