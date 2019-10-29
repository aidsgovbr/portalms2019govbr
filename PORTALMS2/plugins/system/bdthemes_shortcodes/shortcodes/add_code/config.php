<?php 

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_add_code_config extends Su_Data {

    function __construct() {
        parent::__construct();
    }
    
    static function get_config() {

        return array(
            'name'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ADD_CODE'),
            'type'  => 'wrap',
            'group' => 'add_code',
            'visible' => false,
            'atts'  => array(
                'type' => array(
                        'type'    => 'select',
                        'values'  => array(
                        'default' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CSS'),
                        'soft'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_JS')
                    ),
                    'default' => 'default',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TYPE'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TYPE_DESC')
                ),             
                'url' => array(
                    'default' => '',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_URL'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_URL_DESC')
                )
            ),
            'content' => 'Box content',
            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ADD_CODE_DESC'),
            'icon'    => 'list-alt'
        );
    }

}
