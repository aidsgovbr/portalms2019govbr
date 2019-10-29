<?php

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_spoiler_config extends Su_Data {

    function __construct() {
        parent::__construct();
    }
    static function get_config() {

        return array(
            'name'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SPOILER'),
            'type'  => 'wrap',
            'group' => 'box',
            'atts'  => array(
            	'style' => array(
            	    'type'   => 'select',
            	    'values' => array(
                        'default'       => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DEFAULT'),
                        '1'             => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE1'),
                        '2'             => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE2'),
                        '3'             => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE3'),
                        '4'             => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE4'),
                        '5'             => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE5'),
                        'fancy'         => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FANCY'),
                        'simple'        => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SIMPLE'),
                        'carbon'        => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CARBON'),
                        'sharp'         => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHARP'),
                        'grid'          => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_GRID'),
                        'wood'          => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_WOOD'),
                        'fabric'        => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FABRIC'),
                        'modern-dark'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MODERN_DARK'),
                        'modern-light'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MODERN_LIGHT'),
                        'modern-violet' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MODERN_VIOLET'),
                        'modern-orange' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MODERN_ORANGE'),
                        'glass-dark'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_GLASS_DARK'),
                        'glass-light'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_GLASS_LIGHT'),
                        'glass-blue'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_GLASS_BLUE'),
                        'glass-green'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_GLASS_GREEN'),
                        'glass-gold'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_GLASS_GOLD')
            	    ),
            	    'default' => 'default',
            	    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE'),
            	    'desc'    => sprintf( '%s.', JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE_DESC'))
            	),
            	'icon' => array(
            	    'type'   => 'select',
            	    'values' => array(
                        'none'           => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_NO_ICON'),
                        'plus'           => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PLUS'),
                        'plus-circle'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PLUS_CIRCLE'),
                        'plus-square-1'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PLUS_SQUARE_1'),
                        'plus-square-2'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PLUS_SQUARE_2'),
                        'arrow'          => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ARROW'),
                        'arrow-circle-1' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ARROW_CIRCLE_1'),
                        'arrow-circle-2' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ARROW_CIRCLE_2'),
                        'chevron'        => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CHEVRON'),
                        'chevron-circle' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CHEVRON_CIRCLE'),
                        'caret'          => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CARET'),
                        'caret-square'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CARET_SQUARE'),
                        'folder-1'       => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FOLDER_1'),
                        'folder-2'       => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FOLDER_2')
            	    ),
            	    'default' => 'plus',
            	    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON'),
            	    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_TYPE_DESC'),
                    'child' => array(
                        'align' => array(
                            'type'   => 'select',
                            'values' => array(
                                'left'        => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LEFT'),
                                'right'        => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RIGHT')
                            ),
                            'default' => 'left',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ALIGN'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ALIGN_DESC')
                        )
                    )
            	),
                'title' => array(
                    'default' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SPOILER_TITLE_DEFAULT'),
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE'), 
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE_DESC')
                ),
                'open' => array(
                    'type'    => 'bool',
                    'default' => 'no',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_OPEN'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_OPEN_DESC')
                ),
                'anchor' => array(
                    'default' => '',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ANCHOR'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ANCHOR_DESC')
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
            'content' => 'Hidden content',
            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SPOILER_DESC'),
            'icon'    => 'list-ul'
        );
    }

}
