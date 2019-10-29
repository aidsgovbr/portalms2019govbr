<?php 

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_calltoaction_config extends Su_Data {

    function __construct() {
        parent::__construct();
    }
    static function get_config() {
        return array(
            'name'     => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CALLTOACTION'),
            'desc'     => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CALLTOACTION_DESC'),
            'content'  => 'Lorem ipsum dolor sit amet consectetuer adipiscing elit.',
            'type'     => 'wrap',
            'group'    => 'content',
            'icon'     => 'pencil',
            'atts' => array(                        
                'align' => array(
                    'type' => 'select',
                    'values' => array(
                        'left' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LEFT'),
                        'right' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RIGHT'),
                        'center' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CENTER')
                    ),
                    'default' => 'left',
                    'name' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ALIGN'),
                    'desc' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ALIGN_DESC')
                ),
                'title' => array(
                    'default' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CA_TITLE'),
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE_DESC'),
                    'child'   => array(
                        'title_color' => array(
                            'type'    => 'color',
                            'default' => '#333333',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE_COLOR'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE_COLOR_DESC')
                        ),
                    )
                ),          
                'button_text' => array(
                    'default' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CA_BTN_TXT'),
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BUTTON_TEXT'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BUTTON_TEXT_DESC'),
                    'child'   => array(
                        'button_link' => array(
                            'default' => '#',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BUTTON_LINK'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BUTTON_LINK_DESC'),
                            
                        ),
                        'target' => array(
                            'type' => 'select',
                            'values' => array(
                                'self'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SELF'),
                                'blank' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BLANK')
                            ),
                            'default' => 'self',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TARGET'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TARGET_DESC')
                        ) 
                    )
                ),                         
                'button_color' => array(
                    'type'    => 'color',
                    'default' => '#e5e5e5',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BUTTON_COLOR'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BUTTON_COLOR_DESC'),
                    'child'  => array(
                        'button_background' => array(
                            'type'    => 'color',
                            'values'  => array( ),
                            'default' => '#444444',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BUTTON_BACKGROUND'), 
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BUTTON_BACKGROUND_DESC')
                        )
                    )
                ),                          
                'color' => array(
                    'type'    => 'color',
                    'default' => '#888',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_COLOR'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_COLOR_DESC'),
                    'child'  => array(
                        'background' => array(
                            'type'    => 'color',
                            'values'  => array( ),
                            'default' => '#f5f5f5',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BACKGROUND'), 
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BACKGROUND_DESC')
                        )
                    )
                ),                              
                'radius' => array(
                    'default' => '2px',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RADIUS'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RADIUS_DESC'),
                    'child'     => array(
                        'button_radius' => array(
                            'default' => '2px',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BUTTON_RADIUS'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BUTTON_RADIUS_DESC')
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
            )
        );
    }

}
