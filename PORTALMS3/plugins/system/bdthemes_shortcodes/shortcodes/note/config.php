<?php 

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_note_config extends Su_Data {

    function __construct() {
        parent::__construct();
    }
    
    static function get_config() {

        return array(
            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_NOTE'),
            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_NOTE_DESC'),
            'content' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_NOTE_CONTENT'),
            'icon'    => 'sticky-note',
            'type'    => 'wrap',
            'group'   => 'box',
            'atts'    => array(
                'style' => array(
                    'type' => 'select',
                    'values' => array(
                        '1' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_NOTE_STYLE1'),
                        '2' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_NOTE_STYLE2'),
                        '3' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_NOTE_STYLE3'),
                        '4' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_NOTE_STYLE4'),
                        '5' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_NOTE_STYLE5'),
                        '6' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_NOTE_STYLE6')
                    ),
                    'default' => 1,
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_NOTE_STYLE'), 
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_NOTE_STYLE_DESC'),
                    'child'   => array(
                        'type' => array(
                            'type' => 'select',
                            'values' => array(
                                'info' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_NOTE_TYPE_INFO'),
                                'success' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_NOTE_TYPE_SUCCESS'),
                                'warning' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_NOTE_TYPE_WARNING'),
                                'danger' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_NOTE_TYPE_DANGER')
                            ),
                            'default' => 'info',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_NOTE_TYPE'), 
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_NOTE_TYPE_DESC')
                        )
                    )
                ),
                'icon' => array(
                    'type'    => 'bool',
                    'default' => 'no',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_NOTE_ICON'), 
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_NOTE_ICON_DESC'),
                    'child'   => array(
                        'radius' => array(
                            'default' => '3px',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RADIUS'), 
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RADIUS_DESC')
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
