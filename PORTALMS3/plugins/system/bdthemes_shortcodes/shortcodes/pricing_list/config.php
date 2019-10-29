<?php

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_pricing_list_config extends Su_Data {

    function __construct() {
        parent::__construct();
    }
    static function get_config() {
        
        return array(
            'name'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PRICING_LIST'),
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
                        'default'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DEFAULT'),
                        'striped'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STRIPED')
                    ),
                    'child'       => array(
                        'space' => array(
                            'default' => '10',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SPACE'), 
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SPACE_DESC')
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
            'content' => sprintf ('%s',"[%prefix_pricing_list_item title=\"Pricing Item Title 1\"]Content 1[/%prefix_pricing_list_item]\n[%prefix_pricing_list_item title=\"Pricing Item Title 2\"]Content 2[/%prefix_pricing_list_item]\n[%prefix_pricing_list_item title=\"Pricing Item Title 3\"]Content 3[/%prefix_pricing_list_item]"),
            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PRICING_LIST_DESC')
        );
    }

}
