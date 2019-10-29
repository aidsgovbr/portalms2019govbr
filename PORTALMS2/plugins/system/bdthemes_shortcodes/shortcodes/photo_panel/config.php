<?php 

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_photo_panel_config extends Su_Data {

    function __construct() {
        parent::__construct();
    }
    static function get_config() {
      // photo_panel
        return array(
            'content'  => 'Panel content',
            'name'     => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PHOTO_PANEL'),
            'type'     => 'wrap',
            'group'    => 'extra box',
            'desc'     => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PHOTO_PANEL_DESC'),
            'icon'     => 'pencil-square-o',
            'function' => array( 'Shortcodes_Ultimate_Extra_Shortcodes', 'photo_panel' ),
            'atts'     => array(
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
                    'default' => '0 1px 2px #eeeeee',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHADOW'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHADOW_DESC')
                ),
                'radius' => array(
                    'type'    => 'slider',
                    'min'     => 0,
                    'max'     => 60,
                    'step'    => 1,
                    'default' => 0,
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RADIUS'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PHOTO_PANEL_RADIUS_DESC')
                ),
                'text_align' => array(
                    'type'    => 'select',
                    'default' => 'left',
                    'values'  => array(
                        'left'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LEFT'),
                        'center' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CENTER'),
                        'right'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RIGHT')
                    ),
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ALIGN'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ALIGN_DESC')
                ),
                'photo' => array(
                    'type'    => 'upload',
                    'default' => 'http://lorempixel.com/400/300/food/',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PHOTO'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PHOTO_DESC')
                ),
                'alt' => array(
                    'default' => '',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ALT'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ALT_DESC')
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
