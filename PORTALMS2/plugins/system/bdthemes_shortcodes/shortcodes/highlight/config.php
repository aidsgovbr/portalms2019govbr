<?php 

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_highlight_config extends Su_Data {

    function __construct() {
        parent::__construct();
    }
    static function get_config() {

        return array(
            'name'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_HIGHLIGHT'),
            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_HIGHLIGHT_DESC'),
            'icon'    => 'pencil-square-o',
            'content' => 'For highlight text',
            'type'  => 'wrap',
            'group' => 'content',
            'atts'  => array(
                'background' => array(
                    'type'    => 'color',
                    'default' => '#DDFF99',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BACKGROUND'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BACKGROUND_DESC'),
                    'child'   => array(
                        'color' => array(
                            'type'    => 'color',
                            'default' => '#000000',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TEXT_COLOR'), 
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TEXT_COLOR_DESC')
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
