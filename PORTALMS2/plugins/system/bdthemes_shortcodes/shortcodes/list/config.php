<?php 

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_list_config extends Su_Data {

    function __construct() {
        parent::__construct();
    }
    static function get_config() {

        return array(
            'name'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LIST'),
            'type'  => 'wrap',
            'group' => 'content',
            'atts'  => array(
                'icon' => array(
                    'type'    => 'icon',
                    'default' => 'icon: star',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_DESC'),
                    'child'   => array(
                        'icon_color' => array(
                            'type'    => 'color',
                            'default' => '#333333',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_COLOR'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_COLOR_DESC')
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
            'content' => sprintf("<ul>\n<li>List item</li>\n<li>List item</li>\n<li>List item</li>\n</ul>"),
            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LIST_DESC'),
            'icon'    => 'list-ol'
        );
    }

}
