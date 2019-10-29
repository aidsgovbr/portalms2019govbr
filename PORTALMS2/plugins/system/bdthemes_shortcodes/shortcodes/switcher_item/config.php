<?php 

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_switcher_item_config extends Su_Data {

    function __construct() {
        parent::__construct();
    }
    static function get_config() {

        return array(
            'name'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SWITCHER_ITEM'),
            'type'  => 'wrap',
            'group' => 'box',
            'atts'  => array(
                'title' => array(
                    'default' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DEFAULT'),
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE_DESC')
                ),
                'icon' => array(
                    'type'    => 'icon',
                    'default' => '',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_DESC')
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
            'content' => 'switcher item content',
            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SWITCHER_ITEM_DESC'),
            'icon'    => 'list-alt'
        );
    }

}
