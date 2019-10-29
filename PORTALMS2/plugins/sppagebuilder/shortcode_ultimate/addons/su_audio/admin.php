<?php
/**
* @subpackage Shortcode Ultimate
* @author BdThemes https://www.bdthemes.com
* @copyright Copyright (c) 2012 - 2016 BdThemes
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

if (class_exists('Su_Shortcode_audio')) {
    SpAddonsConfig::addonConfig(
    	array(
            'type'       => 'single',
            'category'   => 'Shortcode Ultimate',
            'addon_name' => 'su_audio',
            'title'      => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_AUDIO'),
            'desc'       => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_AUDIO_DESC'),
            'icon'       => JURI::root().'plugins/sppagebuilder/shortcode_ultimate/addons/su_audio/element.svg',

    		'attr'=>array(
    			'general' => array(
                    'url' => array(
                        'type'   => 'media',
                        'format' => 'audio',
                        'title'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_AUDIO_URL'),
                        'desc'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_AUDIO_URL_DESC')
                    ),
                    'autoplay' => array(
                        'type'  => 'checkbox',
                        'std'   => '0',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_AUTOPLAY'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_AUTOPLAY_DESC'),
                    ),                       
                    'loop' => array(
                        'type'  => 'checkbox',
                        'std'   => '0',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LOOP'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LOOP_DESC')
                    ),
                    'volume' => array(
                        'type'  => 'number',
                        'std'   => 50,
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_VOLUME'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_VOLUME_DESC')
                    ),
                    'class' => array(
                        'type'  => 'text',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLASS'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLASS_DESC')
                    ),
                ),
                'style' => array(
                    'style' => array(
                        'type'   => 'select',
                        'std'    => 'dark',
                        'title'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE'), 
                        'desc'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE_DESC'),
                        'values' => array(
                            'dark'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DARK'),
                            'light' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LIGHT')
                        ),
                    ),
                ),
    		),
    	)
    );
}