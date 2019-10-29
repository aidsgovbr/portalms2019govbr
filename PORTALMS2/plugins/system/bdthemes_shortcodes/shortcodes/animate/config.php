<?php

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_animate_config extends Su_Data {

    function __construct() {
        parent::__construct();
    }

    static function get_config() {
        // animate
        return array(
            'name'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ANIMATE'),
            'type'  => 'wrap',
            'group' => 'other',
            'atts'  => array(
                'type' => array(
                    'type'    => 'select',
                    'values'  => array_combine( Su_Data::animations(), Su_Data::animations() ),
                    'default' => 'bounceIn',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ANIMATE_STYLE'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ANIMATE_STYLE_DESC')
                ),
                'duration' => array(
                    'type'    => 'slider',
                    'min'     => 0,
                    'max'     => 20,
                    'step'    => 0.5,
                    'default' => 1,
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DURATION'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DURATION_DESC'),
                    'child'  => array(
                        'delay' => array(
                            'type'    => 'slider',
                            'min'     => 0,
                            'max'     => 20,
                            'step'    => 0.5,
                            'default' => 0,
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DELAY'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DELAY_DESC')
                        )
                    )
                ),
                'inline' => array(
                    'type'    => 'bool',
                    'default' => 'no',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_INLINE'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_INLINE_DESC')
                ),
                'class' => array(
                    'default' => '',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLASS'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLASS_DESC')
                )
            ),
            'content' => 'Animated content',
            'desc' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ANIMATE_DESC'),
            'icon' => 'bolt'
            );
    }

}
