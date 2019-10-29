<?php 

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_flip_box_config extends Su_Data {

    function __construct() {
        parent::__construct();
    }
    static function get_config() {

        return array(
            'name'     => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FLIP_BOX'),
            'type'     => 'wrap',
            'group'    => 'extra content',
            'desc'     => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FLIP_BOX_DESC'),
            'icon'     => 'files-o',
            'atts'     => array(    
                'animation_style' => array(
                    'type'   => 'select',
                    'values' => array(
                        'horizontal_flip_left'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_HORIZONTAL_FLIP_LEFT'),
                        'horizontal_flip_right' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_HORIZONTAL_FLIP_RIGHT'),
                        'vertical_flip_top'     => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_VERTICAL_FLIP_TOP'),
                        'vertical_flip_bottom'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_VERTICAL_FLIP_BOTTOM'),
                        'flip_left'             => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FLIP_LEFT'),
                        'flip_right'            => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FLIP_RIGHT'),
                        'flip_top'              => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FLIP_TOP'),
                        'flip_bottom'           => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FLIP_BOTTOM')
                    ),
                    'default' => 'horizontal_flip_left',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ANIMATION_STYLE'),
                    'desc'    => sprintf( '%s.', JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ANIMATION_STYLE_DESC') )
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
            'content'  => sprintf( "[flip_front] Front Box Content [/flip_front]\n[flip_back] Back Box Content [/flip_back]")
        );
    }

}
