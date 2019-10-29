<?php

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_divider_config extends Su_Data {

    function __construct() {
        parent::__construct();
    }
    static function get_config() {

        return array(
            'name'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DIVIDER'),
            'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DIVIDER_DESC'),
            'icon'  => 'ellipsis-h',
            'type'  => 'single',
            'group' => 'content',
            'atts'  => array(
                'style' => array(
                    'type' => 'select',
                    'values' => array(
                        '1'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SINGLE_LINE'),
                        '2'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DOUBLE_LINE'),
                        '3' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SINGLE_DASHED'),
                        '4' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DOUBLE_DASHED'),
                        '5' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SINGLE_DOTTED'),
                        '6' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DOUBLE_DOTTED'),
                        '7' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STRIPED')
                    ),
                    'default' => '1',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE_DESC'),
                    'child'  => array(
                        'color' => array(
                            'type'    => 'color',
                            'values'  => array( ),
                            'default' => '#c5c5c5',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_COLOR'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_COLOR_DESC')
                        )
                    )
                ),
                'align' => array(
                    'type'   => 'select',
                    'values' => array(
                        'left'        => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LEFT'),
                        'right'        => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RIGHT'),
                        'center'        => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CENTER')
                    ),
                    'default' => 'center',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DIVIDER_ALIGN'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DIVIDER_ALIGN_DESC'),
                    'child' => array(
                        'icon_align' => array(
                            'type'   => 'select',
                            'values' => array(
                                'left'        => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LEFT'),
                                'right'        => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RIGHT'),
                                'center'        => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CENTER')
                            ),
                            'default' => 'center',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_ALIGN'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_ALIGN_DESC')
                        )
                    )
                ),
                'icon' => array(
                    'type'    => 'icon',
                    'default' => '',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_DESC')
                ),
                'icon_style' => array(
                    'type' => 'select',
                    'values' => array(
                        '1' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DEFAULT'),
                        '2' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BACKGROUND'),
                        '3' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BORDER')
                    ),
                    'default' => '1',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_STYLE'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE_DESC'),
                    'child'   => array(
                        'icon_color' => array(
                            'type'    => 'color',
                            'values'  => array( ),
                            'default' => '#444',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_COLOR'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_COLOR_DESC')
                        ),
                        'icon_size' => array(
                            'type'    => 'slider',
                            'min'     => 10,
                            'max'     => 320,
                            'step'    => 1,
                            'default' => 24,
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_SIZE'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_SIZE_DESC')
                        )
                    )
                ),
                'top' => array(
                    'type'    => 'bool',
                    'default' => 'no',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHOW_TOP_LINK'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHOW_TOP_LINK_DESC')
                ),
                'width' => array(
                    'type'    => 'slider',
                    'min'     => 0,
                    'max'     => 100,
                    'step'    => 1,
                    'default' => 100,
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DIVIDER_WIDTH'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DIVIDER_WIDTH_DESC'),
                    'child'   => array(
                        'force_fullwidth' => array(
                            'type'    => 'bool',
                            'default' => 'no',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DIVIDER_FFWIDTH'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DIVIDER_FFWIDTH_DESC')
                        )
                    )
                ),
                'margin_top' => array(
                    'type'    => 'slider',
                    'default' => '10',
                    'min'     => '0',
                    'max'     => '200',
                    'step'    => '5',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DIVIDER_MARGIN_TOP'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DIVIDER_MARGIN_TOP_DESC'),
                    'child'   => array(
                        'margin_bottom' => array(
                            'type'    => 'slider',
                            'default' => '10',
                            'min'     => '0',
                            'max'     => '200',
                            'step'    => '5',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DIVIDER_MARGIN_BOTTOM'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DIVIDER_MARGIN_BOTTOM_DESC')
                        )
                    )
                ),
                'visible' => array(
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_VISIBLE'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_VISIBLE_DESC'),
                    'type' => 'select',
                    'default' => 'default',
                    'values' => array(
                        'default' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DEFAULT'),
                        'large' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LARGE'),
                        'medium' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MEDIUM'),
                        'small' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SMALL')                        
                    ),
                    'child'   => array(
                        'hidden' => array(
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_HIDDEN'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_HIDDEN_DESC'),
                            'type' => 'select',
                            'default' => 'default',
                            'values' => array(
                                'default' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DEFAULT'),
                                'large' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LARGE'),
                                'medium' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MEDIUM'),
                                'small' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SMALL')                        
                            )
                        ),
                        'center' => array(
                            'type'    => 'bool',
                            'default' => 'no',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CENTER'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CENTER_DESC')
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
