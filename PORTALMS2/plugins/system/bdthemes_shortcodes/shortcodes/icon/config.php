<?php 

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_icon_config extends Su_Data {
    function __construct() {
        parent::__construct();
    }
    static function get_config() {

        return array(
            'name'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON'),
            'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_HEADING_DESC'),
            'type'  => 'single',
            'group' => 'extra content media',
            'icon'  => 'rocket',
            'atts'     => array(
                'icon' => array(
                    'type'    => 'icon',
                    'default' => 'icon: heart',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_DESC')
                ),
                'url' => array(
                    'default' => '',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_URL'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_URL_DESC')
                ),
                'background' => array(
                    'type'    => 'color',
                    'default' => '#eeeeee',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BACKGROUND'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BACKGROUND_DESC'),
                    'child'   => array(
                        'color' => array(
                            'type'    => 'color',
                            'default' => '#333333',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_COLOR'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_COLOR_DESC')
                        )
                    )
                ),
                'size' => array(
                    'type'    => 'slider',
                    'default' => '16',
                    'min'     => '4',
                    'max'     => '256',
                    'step'    => '2',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_SIZE'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_SIZE_DESC')
                ),
                'radius' => array(
                    'default' => '3px',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RADIUS'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RADIUS_DESC'),
                    'child'   => array(
                        'padding' => array(
                            'default' => '15px',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PADDING'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PADDING_DESC')  
                        ),
                        'margin' => array(
                            'default' => '',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MARGIN'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MARGIN_DESC')
                        )
                    )
                ),
                'border' => array(
                    'type'    => 'border',
                    'default' => '0px solid #444444',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BORDER'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BORDER_DESC')
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
        );
    }

}
