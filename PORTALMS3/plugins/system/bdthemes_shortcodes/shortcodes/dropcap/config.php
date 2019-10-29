<?php 

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_dropcap_config extends Su_Data {

    function __construct() {
        parent::__construct();
    }
    static function get_config() {
        return array(
            'name'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DROPCAP'),
            'type'  => 'wrap',
            'group' => 'content',
            'atts'  => array(
                'style' => array(
                    'type'   => 'select',
                    'values' => array(
                        'default' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DEFAULT'),
                        'flat'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FLAT'),
                        'light'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LIGHT'),
                        'simple'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SIMPLE')
                    ),
                    'default' => 'default',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE'), 
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE_DESC')
                ),
                'size' => array(
                    'type'    => 'slider',
                    'min'     => 1,
                    'max'     => 5,
                    'step'    => 1,
                    'default' => 3,
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SIZE'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DROPCAP_SIZE_DESC')
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
            'content' => 'D',
            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DROPCAP_DESC'),
            'icon'    => 'bold'
        );
    }

}
