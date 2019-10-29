<?php 

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_column_inner_config extends Su_Data {

    function __construct() {
        parent::__construct();
    }
    static function get_config() {
        return array(
            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_COLUMN'),
            'type'    => 'wrap',
            'group'   => 'box',
            'visible' => false,
            'atts' => array(
                'size' => array(
                    'type' => 'select',
                    'values' => array(
                        '1/1' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FULL_WIDTH'),
                        '1/2' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ONE_HALF'),
                        '1/3' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ONE_THIRD'),
                        '2/3' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TWO_THIRD'),
                        '1/4' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ONE_FOURTH'),
                        '3/4' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_THREE_FOURTH'),
                        '1/5' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ONE_FIFTH'),
                        '2/5' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TWO_FIFTH'),
                        '3/5' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_THREE_FIFTH'),
                        '4/5' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FOUR_FIFTH'),
                        '1/6' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ONE_SIXTH'),
                        '5/6' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FIVE_SIXTH')
                    ),
                    'default' => '1/1',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SIZE'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SIZE_DESC')
                ),
                'center' => array(
                    'type'    => 'bool',
                    'default' => 'no',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CENTER'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CENTER_DESC')
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
            'content' => 'Column content',
            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_COLUMN_DESC'),
            'icon'    => 'columns'
        );
    }

}
