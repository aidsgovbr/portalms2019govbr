<?php

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_icon_list_item_config extends Su_Data {

    function __construct() {
        parent::__construct();
    }

    static function get_config() {
        return array(
            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_LIST'),
            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_LIST_DESC'),
            'content' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CONTENT'),
            'type'    => 'wrap',
            'group'   => 'content',
            'icon'    => 'th-list',
            'atts'     => array(
                'title' => array(
                    'default' => 'Icon List Heading',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE_DESC'),
                    'child'   => array(
                        'title_color' => array(
                            'type'    => 'color',
                            'default' => '#444444',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE_COLOR'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE_COLOR_DESC')
                        ),
                        'title_size' => array(
                            'default' => '16px',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE_SIZE'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE_SIZE_DESC')
                        )
                    )
                ),      
                'icon' => array(
                    'type'    => 'icon',
                    'default' => 'icon: heart',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_DESC')
                ),
                'icon_color' => array(
                    'type'    => 'color',
                    'default' => '#333333',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_COLOR'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_COLOR_DESC'),
                    'child'   => array(
                        'icon_background' => array(
                            'type'    => 'color',
                            'default' => 'transparent',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BACKGROUND'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BACKGROUND_DESC')  
                        ),
                        'icon_size' => array(
                            'type'    => 'slider',
                            'min'     => 4,
                            'max'     => 128,
                            'step'    => 4,
                            'default' => 24,
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SIZE'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SIZE_DESC')
                        )
                    )
                ),
                'icon_animation' => array(
                    'type'   => 'select',
                    'values' => array(
                        '' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_NO_ANIMATION'),
                        '1' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ANIMATION1'),
                        '2' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ANIMATION2'),
                        '3' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ANIMATION3'),
                        '4' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ANIMATION4'),
                        '5' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ANIMATION5'),
                        '6' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ANIMATION6')
                    ),
                    'default' => '',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_ANIMATION'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_ANIMATION_DESC')
                ),
                'icon_border' => array(
                    'type'    => 'border',
                    'default' => '0 solid #cccccc',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BORDER'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BORDER_DESC')
                ),
                'icon_shadow' => array(
                    'type'    => 'shadow',
                    'default' => '0 0 0 #444444',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHADOW'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHADOW_DESC')
                ),
                'icon_padding' => array(
                    'default' => '20px',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PADDING'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PADDING_DESC'),
                    'child'   => array(
                        'icon_radius' => array(
                            'default' => '0px',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RADIUS'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RADIUS_DESC')
                        )
                    )
                ),
                'icon_align' => array(
                    'type'    => 'select',
                    'default' => 'center',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ALIGN'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ALIGN_DESC'),
                    'values'  => array(
                        'left'      => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LEFT'),
                        'right'     => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RIGHT'),
                        'top'       => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TOP'),
                        'title'     => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE'),
                        'top_left'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TOP_LEFT'),
                        'top_right' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TOP_RIGHT')
                    ),
                    'child'   => array(
                        'connector' => array(
                            'type'    => 'bool',
                            'default' => 'no',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CONNECTOR'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CONNECTOR_DESC'),
                            'description_gap' => array(
                                'type'    => 'bool',
                                'default' => 'no',
                                'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DESCRIPTION_GAP'),
                                'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DESCRIPTION_GAP_DESC')
                            )
                        )                      
                    )
                ),                      
                'color' => array(
                    'type'    => 'color',
                    'default' => '#333333',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_COLOR'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_COLOR_DESC')
                ),
                'url' => array(
                    'default' => '',
                    'name' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_URL'),
                    'desc' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_URL_DESC'),
                    'child'     => array(
                        'target' => array(
                            'type'    => 'select',
                            'default' => 'self',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TARGET'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TARGET_DESC'),
                            'values'  => array(
                                'self'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SELF'),
                                'blank' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BLANK')
                            ),
                        ),
                        'linkto' => array(
                            'type'    => 'select',
                            'default' => 'title',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LINKTO'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LINKTO_DESC'),
                            'values'  => array(
                                'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE'),
                                'icon'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON'),
                                'all'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ALL'),
                            ),
                        ),
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
