<?php

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_testimonial_config extends Su_Data {

    function __construct() {
        parent::__construct();
    }
    
    static function get_config() {
    
        return array(
            'name'     => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TESTIMONIAL'),
            'type'     => 'wrap',
            'group'    => 'extra box',
            'desc'     => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TESTIMONIAL_DESC'),
            'icon'     => 'comments-o',
            'atts'     => array(
                'style' => array(
                    'type' => 'select',
                    'values' => array(
                        '1' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE1'),
                        '2' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE2'),
                        '3' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE3'),
                        '4' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE4'),
                        '5' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE5')
                    ),
                    'default' => '1',
                    'name' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE'),
                    'desc' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE_DESC')
                ),
                'name' => array(
                    'default' => '',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_NAME'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_NAME_DESC'),
                    'child' => array(
                        'title' => array(
                            'default' => '',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TESTIMONIAL_TITLE_DESC')
                        )
                    )
                ),              
                'photo' => array(
                    'type'    => 'upload',
                    'default' => '',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PHOTO'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PHOTO_DESC')
                ),
                'company' => array(
                    'default' => '',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_COMPANY'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_COMPANY_DESC'),
                    'child' => array(
                        'url' => array(
                            'default' => '',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_COMPANY_URL'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_COMPANY_URL_DESC')
                        ),
                        'target' => array(
                            'type'    => 'select',
                            'default' => 'blank',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TARGET'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TARGET_DESC'),
                            'values'  => array(
                                'self'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SELF'),
                                'blank' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BLANK')
                            )
                        )
                    )
                ),                
                'italic' => array(
                    'type' => 'bool',
                    'default' => 'no',
                    'name' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ITALIC'),
                    'desc' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ITALIC_DESC'),
                    'child' => array(
                        'radius' => array(
                            'default' => '',
                            'name' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RADIUS'),
                            'desc' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RADIUS_DESC')
                        )
                    )
                ),
                'color' => array(
                    'type' => 'color',
                    'default' => '#444444',
                    'name' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_COLOR'), 
                    'desc' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_COLOR_DESC'),
                    'child' => array(
                        'background' => array(
                            'type' => 'color',
                            'default' => '#ffffff',
                            'name' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BACKGROUND'), 
                            'desc' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BACKGROUND_DESC')
                        ),
                        'border_color' => array(
                            'type' => 'color',
                            'default' => '#eeeeee',
                            'name' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BORDER_COLOR'), 
                            'desc' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BORDER_COLOR_DESC')
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
            'content' => 'Testimonial text'
        );
    }

}
