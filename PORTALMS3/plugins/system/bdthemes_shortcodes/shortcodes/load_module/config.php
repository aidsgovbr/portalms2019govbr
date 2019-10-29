<?php 

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_load_module_config extends Su_Data {

    function __construct() {
        parent::__construct();
    }
    static function get_config() {
       // load_module
        return array(
            'name'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LOAD_MODULE'),
            'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LOAD_MODULE_DESC'),
            'type'  => 'single',
            'group' => 'gallery',
            'icon'  => 'cube',
            'atts'  => array(
                'id' => array(
                    'default' => '',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MODULE_ID'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MODULE_ID_DESC'),
                    'child'   => array(
                        'module_name' => array(
                            'default' => '',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MODULE_NAME'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MODULE_NAME_DESC')
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
            )
        );
    }

}
