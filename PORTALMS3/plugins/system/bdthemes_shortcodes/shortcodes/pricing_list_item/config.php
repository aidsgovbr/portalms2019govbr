<?php 

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_pricing_list_item_config extends Su_Data {

    function __construct() {
        parent::__construct();
    }
    static function get_config() {

        return array(
            'name'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PRICING_LIST_ITEM'),
            'type'    => 'wrap',
            'group'   => 'content',
            'icon'    => 'th-list',
            'badge' => 'BETA',
            'atts'  => array(
                'price' => array(
                    'default' => '$29.99',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PRICE'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PRICE_DESC'),
                    'child'   => array(
                        'title' => array(
                            'default' => 'Pricing Item Title',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE_DESC')
                        )
                    )
                ),
                'icon' => array(
                    'type'    => 'icon',
                    'default' => '',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_DESC')
                ),
                'icon_color' => array(
                    'type'    => 'color',
                    'default' => '#666',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_COLOR'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_COLOR_DESC'),
                    'child'   => array(
                        'icon_size' => array(
                            'type'    => 'slider',
                            'min'     => 4,
                            'max'     => 128,
                            'step'    => 4,
                            'default' => 32,
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SIZE'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SIZE_DESC')
                        )
                    )
                ),
                'icon_bg' => array(
                    'type'    => 'color',
                    'default' => 'transparent',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_BACKGROUND'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_BACKGROUND_DESC'),
                    'child'   => array(
                        'icon_padding' => array(
                            'default' => '5px',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_PADDING'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_PADDING_DESC')
                        )
                    )
                ),
                'icon_radius' => array(
                    'default' => '0px',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_RADIUS'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_RADIUS_DESC'),
                    'child'   => array(
                        'icon_margin' => array(
                            'default' => '0px 10px 0 0',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_MARGIN'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_MARGIN_DESC')
                        )
                    )
                ),
                'icon_shadow' => array(
                    'type'    => 'shadow',
                    'default' => '0 0 0 #000000',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_SHADOW'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_SHADOW_DESC')
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
            'content' => 'item content',
            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PRICING_LIST_ITEM_DESC')
        );
    }

}
