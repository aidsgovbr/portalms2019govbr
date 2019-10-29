<?php 

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_fancy_text_config extends Su_Data {

    function __construct() {
        parent::__construct();
    }
    static function get_config() {

        return array(
            'name'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FANCY_TEXT'),
            'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FANCY_TEXT_DESC'),
            'icon'  => 'text-height',
            'type'  => 'single',
            'group' => 'extra content',
            'atts' => array(
                'tags' => array(
                    'default' => 'Text 1, Text 2, Text 3',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FANCY_TEXT_TAGS'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FANCY_TEXT_TAGS_DESC')
                ),
                'type' => array(
                    'type'   => 'select',
                    'values' => array(
                        '1'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TYPE1'),
                        '2'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TYPE2'),
                        '3'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TYPE3'),
                        '4'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TYPE4'),
                        '5'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TYPE5'),
                        '6'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TYPE6'),
                        '7'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TYPE7'),
                        '8'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TYPE8'),
                        '9'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TYPE9'),
                        '10' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TYPE10')
                    ),
                    'default' => 'rotate-1',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FANCY_TEXT_TYPE'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FANCY_TEXT_TYPE_DESC')
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
