<?php

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_icon_box_modern_config extends Su_Data {

    function __construct() {
        parent::__construct();
    }
    static function get_config() {
        
        return array(
            'name'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_BOX_MODERN'),
            'type'    => 'wrap',
            'group'   => 'content',
            'icon'    => 'th-list',
            'badge' => 'BETA',
            'atts'  => array(
                'style' => array(
                    'type'    => 'select',
                    'default' => 'default',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE'),
                    'desc'    => sprintf( '%s.', JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE_DESC') ),
                    'values'  => array(
                        '1'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE1'),
                        '2'      => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE2')
                    ),
                    'child'       => array(
                        'column' => array(
                            'type'    => 'number',
                            'min'     => 2,
                            'max'     => 4,
                            'step'    => 1,
                            'default' => 3,
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_COLUMN'), 
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_BOX_COLUMN_DESC')
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
            'content' => sprintf ('%s',"[%prefix_icon_box_modern_item title=\"Title 1\"]Content 1[/%prefix_icon_box_modern_item]\n[%prefix_icon_box_modern_item title=\"Title 2\"]Content 2[/%prefix_icon_box_modern_item]\n[%prefix_icon_box_modern_item title=\"Title 3\"]Content 3[/%prefix_icon_box_modern_item]"),
            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_BOX_MODERN_DESC')
        );
    }

}
