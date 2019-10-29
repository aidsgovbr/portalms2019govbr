<?php 

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_tab_config extends Su_Data {

    function __construct() {
        parent::__construct();
    }
    static function get_config() {

        return array(
            'name'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TAB'),
            'type'  => 'wrap',
            'group' => 'box',
            'atts'  => array(
                'title' => array(
                    'default' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DEFAULT'),
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE_DESC')
                ),
                'disabled' => array(
                    'type'    => 'bool',
                    'default' => 'no',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DISABLE'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DISABLE_DESC')
                ),
                'icon' => array(
                    'type'    => 'icon',
                    'default' => '',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_DESC')
                ),
                'anchor' => array(
                    'default' => '',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ANCHOR'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ANCHOR_DESC')
                ),
                'url' => array(
                    'default' => '',
                    'name' => JText::_('URL'),
                    'desc' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TAB_URL_DESC'),
                    'child'     => array(
                        'target' => array(
                            'type' => 'select',
                            'values' => array(
                                'self'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SELF'),
                                'blank' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BLANK')
                            ),
                            'default' => 'blank',
                            'name' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TARGET'),
                            'desc' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TARGET_DESC')
                        )
                    )
                ),
                'class' => array(
                    'default' => '',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLASS'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLASS_DESC')
                )
            ),
            'content' => 'Tab content',
            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TAB_DESC'),
            'icon'    => 'list-alt'
        );
    }

}
