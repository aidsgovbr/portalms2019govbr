<?php
/**
* @subpackage Shortcode Ultimate
* @author BdThemes https://www.bdthemes.com
* @copyright Copyright (c) 2012 - 2016 BdThemes
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

if (class_exists('Su_Shortcode_video')) {
    SpAddonsConfig::addonConfig(
    	array(
            'type'       => 'single',
            'category'   => 'Shortcode Ultimate',
            'addon_name' => 'su_video',
            'title'      => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_VIDEO'),
            'desc'       => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_VIDEO_DESC'),
            'icon'       => JURI::root().'plugins/sppagebuilder/shortcode_ultimate/addons/su_video/element.svg',

    		'attr'=>array(
    			'general' => array(
                    'url' => array(
                        'type'  => 'text',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_VIDEO_URL'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_VIDEO_URL_DESC')
                    ),
                    'poster' => array(
                        'type'  => 'media',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_POSTER'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_POSTER_DESC')
                    ),
                    'title' => array(
                        'type'  => 'text',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE_DESC')
                    ),
                    'controls' => array(
                        'type'  => 'checkbox',
                        'std'   => '1',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CONTROLS'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CONTROLS_DESC'),
                    ),
                    'autoplay' => array(
                        'type'  => 'checkbox',
                        'std'   => '0',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_AUTOPLAY'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_AUTOPLAY_DESC')
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
                    'width' => array(
                        'type'  => 'number',
                        'std'   => 600,
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_WIDTH'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PLAYER_WIDTH_DESC'),
                    ),
                    'height' => array(
                        'type'  => 'number',
                        'std'   => 300,
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_HEIGHT'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PLAYER_HEIGHT_DESC')
                    ),
                ),
    		),
    	)
    );
}