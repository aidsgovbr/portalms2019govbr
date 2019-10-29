<?php 

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_row_inner_config extends Su_Data {

    function __construct() {
        parent::__construct();
    }
    static function get_config() {

        return array(
            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ROW'),
            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ROW_DESC'),
            'visible' => false,
            'icon'    => 'columns',
            'type'    => 'wrap',
            'group'   => 'box',
            'content' => sprintf('%s',"[%prefix_column size=\"1/3\"]Content[/%prefix_column]\n[%prefix_column size=\"1/3\"]Content[/%prefix_column]\n[%prefix_column size=\"1/3\"]Content[/%prefix_column]"),
            'atts'    => array(
                'gutter' => array(
                    'type' => 'select',
                    'values' => array(
                        'default' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DEFAULT'),
                        'large'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LARGE'),
                        'small'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SMALL'),
                        'no'      => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_NO')
                    ),
                    'default' => 'default',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_GUTTER'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_GUTTER_DESC')
                ),
                'divider' => array(
                    'type'    => 'bool',
                    'default' => 'no',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DIVIDER'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DIVIDER_DESC')
                ),
                'margin_bottom' => array(
                    'type'    => 'bool',
                    'default' => 'yes',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MARGIN_BOTTOM'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MARGIN_BOTTOM_DESC')
                ),
                'equal_height' => array(
                    'type'    => 'bool',
                    'default' => 'no',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_EQUAL_HEIGHT'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_EQUAL_HEIGHT_DESC')
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
