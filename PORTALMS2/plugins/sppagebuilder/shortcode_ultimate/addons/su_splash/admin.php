<?php
/**
* @subpackage Shortcode Ultimate
* @author BdThemes https://www.bdthemes.com
* @copyright Copyright (c) 2012 - 2016 BdThemes
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

if (class_exists('Su_Shortcode_splash')) {
    SpAddonsConfig::addonConfig(
    	array(
            'type'       => 'wrap',
            'category'   => 'Shortcode Ultimate',
            'addon_name' => 'su_splash',
            'title'      => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SPLASH'),
            'desc'       => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SPLASH_DESC'),
            'icon'       => JURI::root().'plugins/sppagebuilder/shortcode_ultimate/addons/su_splash/element.svg',

    		'attr'=>array(
    			'general' => array(
                    'width' => array(
                        'type'  => 'number',
                        'std'   => 480,
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_WIDTH'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_WIDTH_DESC'),
                    ),
                    'opacity' => array(
                        'type'  => 'number',
                        'std'   => 80,
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_OPACITY'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_OPACITY_DESC')
                    ),
                    'url' => array(
                        'type'  => 'text',
                        'std'   => 'http://www.bdthemes.com',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_URL'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_URL_DESC'),
                    ),
                    'onclick' => array(
                        'type'   => 'select',
                        'std'    => 'close-bg',
                        'title'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ONCLICK'),
                        'desc'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ONCLICK_DESC'),
                        'values' => array(
                            'none'     => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_NONE'),
                            'close'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLOSE'),
                            'close-bg' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLOSE_BG'),
                            'url'      => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_URL')
                        )
                    ),
                    'delay' => array(
                        'type'  => 'number',
                        'std'   => 0,
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DELAY'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DELAY_DESC')
                    ),
                    'close' => array(
                        'type'  => 'checkbox',
                        'std'   => '1',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLOSE'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLOSE_DESC'),
                    ),
                    'esc' => array(
                        'type'  => 'checkbox',
                        'std'   => '1',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ESC'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ESC_DESC')
                        
                    ),
                    'class' => array(
                        'type'  => 'text',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLASS'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLASS_DESC')
                    ),
                    'content' => array(
                        'type'  => 'editor',
                        'std'   => 'Splash screen content',
                        'title' => 'Content',
                    ),
                ),
                'style' => array(
                    'style' => array(
                        'type'   => 'select',
                        'std'    => 'dark',
                        'title'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE'),
                        'desc'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE_DESC'),
                        'values' => array(
                            'dark'               => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DARK'),
                            'dark-boxed'         => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DARK_BOXED'),
                            'light'              => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LIGHT'),
                            'light-boxed'        => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LIGHT_BOXED'),
                            'blue-boxed'         => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BLUE_BOXED'),
                            'light-boxed-blue'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LIGHT_BOXED_BLUE'),
                            'light-boxed-green'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LIGHT_BOXED_GREEN'),
                            'light-boxed-orange' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LIGHT_BOXED_ORANGE'),
                            'maintenance'        => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MAINTENANCE')
                        ),
                    ),
                    'padding' => array(
                        'type'  => 'text',
                        'std'   => '45px',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PADDING'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PADDING_DESC')  
                    ),
                ),
    		),
    	)
    );
}