<?php 

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_panel_slider_config extends Su_Data {

    function __construct() {
        parent::__construct();
    }
    
    static function get_config() {
        return array(
            'name'     => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PANEL_SLIDER'),
            'type'     => 'wrap',
            'group'    => 'extra gallery',
            'badge'    => 'NEW',
            'desc'     => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PANEL_SLIDER_DESC'),
            'icon'     => 'desktop',
            'function' => array( 'Shortcodes_Ultimate_Extra_Shortcodes', 'panel_slider' ),
            'atts'     => array(
                'small' => array(
                    'type'    => 'slider',
                    'min'     => 1,
                    'max'     => 6,
                    'step'    => 1,
                    'default' => 1,
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SMALL_DEVICE_ITEM'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SMALL_DEVICE_ITEM_DESC'),
                    'child'   => array(
                        'medium' => array(
                            'type'    => 'slider',
                            'min'     => 1,
                            'max'     => 6,
                            'step'    => 1,
                            'default' => 2,
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MEDIUM_DEVICE_ITEM'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MEDIUM_DEVICE_ITEM_DESC')
                        ),
                        'large' => array(
                            'type'    => 'slider',
                            'min'     => 1,
                            'max'     => 6,
                            'step'    => 1,
                            'default' => 3,
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LARGE_DEVICE_ITEM'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LARGE_DEVICE_ITEM_DESC')
                        )
                    )
                ),
                'gutter' => array(
                    'type'    => 'select',
                    'default' => 'collapse',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_GUTTER'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PS_GUTTER_DESC'),
                    'values'  => array(
                        'small'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SMALL'),
                        'medium'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MEDIUM'),
                        'Large'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LARGE'),
                        'collapse' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_COLLAPSE'),
                    )
                ),
                'autoplay' => array(
                    'type'    => 'bool',
                    'default' => 'yes',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_AUTOPLAY'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_AUTOPLAY_DESC'),
                    'child'   => array(
                        'loop' => array(
                            'type'    => 'bool',
                            'default' => 'yes',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LOOP'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LOOP_DESC')
                        ),
                    )
                ),
                'navigation' => array(
                    'type'    => 'bool',
                    'default' => 'yes',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_NAVIGATION'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_NAVIGATION_DESC'),
                    'child'   => array(
                        'pagination' => array(
                            'type'    => 'bool',
                            'default' => 'no',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PAGINATION'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PAGINATION_DESC'),
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
            ),
            'content' => sprintf( '[__panel_slide] %1$s1 [/__panel_slide]%2$s[__panel_slide] %1$s2 [/__panel_slide]%2$s[__panel_slide] %1$s3 [/__panel_slide]', 'Slide content', "\n" )
        );
    }

}
