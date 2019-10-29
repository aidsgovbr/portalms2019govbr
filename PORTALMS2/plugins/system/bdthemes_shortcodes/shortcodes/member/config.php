<?php 

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_member_config extends Su_Data {

    function __construct() {
        parent::__construct();
    }
    static function get_config() {

        return array(
            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MEMBER'),
            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MEMBER_DESC'),
            'content' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MEMBER_CONTENT'),
            'icon'    => 'users',
            'type'    => 'wrap',
            'group'   => 'extra box content',
            'atts'    => array(
                'style' => array(
                    'type'   => 'select',
                    'values' => array(
                        '1' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE1'),
                        '2' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE2'),
                        '3' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE3'),
                        '4' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE4'),
                        '5' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE5'),
                        '6' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE6'),
                        '7' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE7'),
                        '8' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE8')
                    ),
                    'default' => '1',
                    'name' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE'),
                    'desc' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE_DESC')
                ),
                'background' => array(
                    'type'    => 'color',
                    'default' => '#ffffff',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BACKGROUND'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BACKGROUND_DESC'),
                    'child'   => array(
                        'color' => array(
                            'type'    => 'color',
                            'default' => '#333333',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_COLOR'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_COLOR_DESC')
                        )
                    )
                ),
                'border' => array(
                    'type'    => 'border',
                    'default' => '1px solid #cccccc',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BORDER'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BORDER_DESC')
                ),
                'shadow' => array(
                    'type'    => 'shadow',
                    'default' => '0 0 0 #eeeeee',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHADOW'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHADOW_DESC')
                ),
                'radius' => array(
                    'default' => '0px',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RADIUS'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MEMBER_RADIUS_DESC')
                ),
                'text_align' => array(
                        'type'    => 'select',
                        'default' => 'left',
                        'values'  => array(
                        'left'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LEFT'),
                        'center'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CENTER'),
                        'right'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RIGHT')
                    ),
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ALIGN'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ALIGN_DESC')
                ),
                'photo' => array(
                    'type'    => 'upload',
                    'default' => BDT_SU_IMG.'sample/member.svg',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MEMBER_PHOTO'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MEMBER_PHOTO_DESC')
                ),
                'name' => array(
                    'default' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_NAME_DEFAULT'),
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_NAME'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_NAME_DESC')
                ),
                'role' => array(
                    'default' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ROLE_DEFAULT'),
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ROLE'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ROLE_DESC')
                ),
                'icon_1' => array(
                    'type'    => 'icon',
                    'default' => '',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_1'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_DESC'),
                    'child'   => array(
                        'icon_1_color' => array(
                            'type'    => 'color',
                            'default' => '#444444',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_1_COLOR'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_COLOR_DESC')
                        )
                    )
                ),
                'icon_1_title' => array(
                    'default' => '',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_1_TITLE'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE_DESC'),
                    'child'   => array(
                        'icon_1_url' => array(
                            'default' => '',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_1_URL'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_URL_DESC')
                        )
                    )
                ),
                'icon_2' => array(
                    'type'    => 'icon',
                    'default' => '',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_2'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_DESC'),
                    'child'   => array(
                        'icon_2_color' => array(
                            'type'    => 'color',
                            'default' => '#444444',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_2_COLOR'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_COLOR_DESC')
                        )
                    )
                ), 
                'icon_2_title' => array(
                    'default' => '',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_2_TITLE'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE_DESC'),
                    'child'   => array(
                        'icon_2_url' => array(
                            'default' => '',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_2_URL'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_URL_DESC')
                        )
                    )
                ),
                'icon_3' => array(
                    'type'    => 'icon',
                    'default' => '',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_3'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_DESC'),
                    'child'   => array(
                        'icon_3_color' => array(
                            'type'    => 'color',
                            'default' => '#444444',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_3_COLOR'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_COLOR_DESC')
                        )
                    )
                ),
                'icon_3_title' => array(
                    'default' => '',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_3_TITLE'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE_DESC'),
                    'child'   => array(
                        'icon_3_url' => array(
                            'default' => '',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_3_URL'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_URL_DESC')
                        )
                    )
                ),
                'icon_4' => array(
                    'type'    => 'icon',
                    'default' => '',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_4'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_DESC'),
                    'child'   => array(
                        'icon_4_color' => array(
                            'type'    => 'color',
                            'default' => '#444444',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_4_COLOR'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_COLOR_DESC')
                        )
                    )
                ),
                'icon_4_title' => array(
                    'default' => '',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_4_TITLE'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE_DESC'),
                    'child'   => array(
                        'icon_4_url' => array(
                            'default' => '',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_4_URL'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_URL_DESC')
                        )
                    )
                ),
                'icon_5' => array(
                    'type'    => 'icon',
                    'default' => '',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_5'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_DESC'),
                    'child'   => array(
                        'icon_5_color' => array(
                            'type'    => 'color',
                            'default' => '#444444',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_5_COLOR'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_COLOR_DESC')
                        )
                    )
                ),
                'icon_5_title' => array(
                    'default' => '',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_5_TITLE'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE_DESC'),
                    'child'   => array(
                        'icon_5_url' => array(
                            'default' => '',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_5_URL'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_URL_DESC')
                        )
                    )
                ),
                'icon_6' => array(
                    'type'    => 'icon',
                    'default' => '',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_6'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_DESC'),
                    'child'   => array(
                        'icon_6_color' => array(
                            'type'    => 'color',
                            'default' => '#444444',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_6_COLOR'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_COLOR_DESC')
                        )
                    )
                ),
                'icon_6_title' => array(
                    'default' => '',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_6_TITLE'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE_DESC'),
                    'child'   => array(
                        'icon_6_url' => array(
                            'default' => '',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_6_URL'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_URL_DESC')
                        )
                    )
                ),
                'url' => array(
                    'default' => '',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_URL'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_URL_DESC')
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
