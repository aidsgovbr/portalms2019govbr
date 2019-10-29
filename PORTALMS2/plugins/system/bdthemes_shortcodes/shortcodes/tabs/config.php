<?php

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_tabs_config extends Su_Data {

    function __construct() {
        parent::__construct();
    }
    static function get_config() {
        
        return array(
            'name'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TABS'),
            'type'  => 'wrap',
            'group' => 'box',
            'atts'  => array(
                'style' => array(
                    'type'   => 'select',
                    'values' => array(
                        'default'       => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DEFAULT'),
                        '1'             => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE1'),
                        '2'             => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE2'),
                        '3'             => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE3'),
                        'carbon'        => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CARBON'),
                        'sharp'         => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHARP'),
                        'grid'          => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_GRID'),
                        'wood'          => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_WOOD'),
                        'fabric'        => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FABRIC'),
                        'modern-dark'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MODERN_DARK'),
                        'modern-light'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MODERN_LIGHT'),
                        'modern-violet' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MODERN_VIOLET'),
                        'modern-orange' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MODERN_ORANGE'),
                        'flat-dark'     => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FLAT_DARK'),
                        'flat-light'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FLAT_LIGHT'),
                        'flat-blue'     => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FLAT_BLUE'),
                        'flat-green'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FLAT_GREEN')
                    ),
                    'default' => 'default',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE'),
                    'desc'    => sprintf( '%s.', JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE_DESC') )
                ),
                'active' => array(
                    'type'    => 'number',
                    'min'     => 1,
                    'max'     => 100,
                    'step'    => 1,
                    'default' => 1,
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ACTIVE_TAB'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ACTIVE_TAB_DESC')
                ),
                'align' => array(
                    'type'    => 'select',
                    'default' => 'left',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ALIGN'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ALIGN_DESC'),
                    'values'  => array(
                        'left'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LEFT'),
                        'center' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TAB_CENTER'),
                        'right'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RIGHT')
                    ),
                    'child'		=> array(
                    	'vertical' => array(
                    	    'type'    => 'bool',
                    	    'default' => 'no',
                    	    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_VERTICAL'),
                    	    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_VERTICAL_DESC')
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
            'content' => sprintf ('%s',"[%prefix_tab title=\"Title 1\"]Content 1[/%prefix_tab]\n[%prefix_tab title=\"Title 2\"]Content 2[/%prefix_tab]\n[%prefix_tab title=\"Title 3\"]Content 3[/%prefix_tab]"),
            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TABS_DESC'),
            'icon'    => 'list-alt'
        );
    }

}
