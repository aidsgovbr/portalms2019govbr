<?php

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_audio_config extends Su_Data {

    function __construct() {
        parent::__construct();
    }
    
    static function get_config() {
        return array(
            'name'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_AUDIO'),
            'desc' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_AUDIO_DESC'),
            'icon' => 'play-circle',
            'group' => 'media',
            'type'  => 'single',
            'atts'  => array(
                'style' => array(
                    'type' => 'select',
                    'values' => array(
                        'dark' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DARK'),
                        'light'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LIGHT')
                    ),
                    'default' => 'dark',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE'), 
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE_DESC')
                ),
                'url' => array(
                    'default' => '',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_AUDIO_URL'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_AUDIO_URL_DESC')
                ),
                'autoplay' => array(
                    'type'    => 'bool',
                    'default' => 'no',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_AUTOPLAY'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_AUTOPLAY_DESC'),
                    'child'  => array(                        
                        'loop' => array(
                            'type'    => 'bool',
                            'default' => 'no',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LOOP'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LOOP_DESC')
                        ),
                        'volume' => array(
                            'type'    => 'slider',
                            'min'     => 0,
                            'max'     => 100,
                            'step'    => 2,
                            'default' => 50,
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_VOLUME'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_VOLUME_DESC')
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
