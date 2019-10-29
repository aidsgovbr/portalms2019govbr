<?php
/**
* @subpackage Shortcode Ultimate
* @author BdThemes https://www.bdthemes.com
* @copyright Copyright (c) 2012 - 2016 BdThemes
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

if (class_exists('Su_Shortcode_progress_bar')) {
    SpAddonsConfig::addonConfig(
    	array(
            'type'       => 'single',
            'category'   => 'Shortcode Ultimate',
            'addon_name' => 'su_progress_bar',
            'title'      => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PROGRESS_BAR'),
            'desc'       => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PROGRESS_BAR_DESC'),
            'icon'       => JURI::root().'plugins/sppagebuilder/shortcode_ultimate/addons/su_progress_bar/element.svg',

    		'attr'=>array(
    			'general' => array(
                    'percent' => array(
                        'type'  => 'number',
                        'std'   => 75,
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PERCENT'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PERCENT_DESC'),
                    ),
                    'show_percent' => array(
                        'type'  => 'checkbox',
                        'std'   => '1',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHOW_PERCENT'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHOW_PERCENT_DESC')
                    ),
                    'text' => array(
                        'type'  => 'text',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TEXT'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TEXT_DESC')
                    ),
                    'text_color' => array(
                        'type'  => 'color',
                        'std'   => '#FFFFFF',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TEXT_COLOR'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TEXT_COLOR_DESC'),
                    ),
                    'bar_color' => array(
                        'type'  => 'color',
                        'std'   => '#f0f0f0',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BAR_COLOR'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BAR_COLOR_DESC')
                    ),
                    'fill_color' => array(
                        'type'  => 'color',
                        'std'   => '#4fc1e9',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FILL_COLOR'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FILL_COLOR_DESC')
                    ),
                    'animation' => array(
                        'type'   => 'select',
                        'std'    => 'easeInOutExpo',
                        'title'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ANIMATION'),
                        'desc'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ANIMATION_DESC'),
                        'values' => array_combine(Su_Data::easings(), Su_Data::easings()),
                    ),
                    'duration' => array(
                        'type'  => 'number',
                        'std'   => 1500,
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DURATION'),
                        'desc'  => 'You can set animation duration as (milliseconds) units from here.'
                    ),
                    'delay' => array(
                        'type'  => 'number',
                        'std'   => 300,
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DELAY'),
                        'desc'  => 'After mentioned time (in milliseconds) animation will start'
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
                        'std'    => '1',
                        'title'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE'),
                        'desc'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE_DESC'),
                        'values' => array(
                            '1' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DEFAULT'),
                            '2' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FANCY'),
                            '3' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_THIN'),
                            '4' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STRIPED'),
                            '5' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ANIMATE')
                        ),
                    ),
                ),
    		),
    	)
    );
}