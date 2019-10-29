<?php
/**
* @subpackage Shortcode Ultimate
* @author BdThemes https://www.bdthemes.com
* @copyright Copyright (c) 2012 - 2016 BdThemes
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

if (class_exists('Su_Shortcode_progress_pie')) {
    SpAddonsConfig::addonConfig(
    	array(
            'type'       => 'single',
            'category'   => 'Shortcode Ultimate',
            'addon_name' => 'su_progress_pie',
            'title'      => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PROGRESS_PIE'),
            'desc'       => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PROGRESS_PIE_DESC'),
            'icon'       => JURI::root().'plugins/sppagebuilder/shortcode_ultimate/addons/su_progress_pie/element.svg',

    		'attr'=>array(
    			'general' => array(
                    'percent' => array(
                        'type'  => 'number',
                        'std'   => 75,
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PROGRESS_PIE_PERCENT'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PROGRESS_PIE_PERCENT_DESC')
                    ),
                    'before' => array(
                        'type'  => 'text',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PROGRESS_PIE_BEFORE'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PROGRESS_PIE_BEFORE_DESC'),
                    ),
                    'text' => array(
                        'type'  => 'text',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PROGRESS_PIE_TEXT'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PROGRESS_PIE_TEXT_DESC')
                    ),
                    'after' => array(
                        'type'  => 'text',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PROGRESS_PIE_AFTER'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PROGRESS_PIE_AFTER_DESC')
                    ),
                    'text_size' => array(
                        'type'  => 'text',
                        'std'   => 22,
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TEXT_SIZE'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TEXT_SIZE_DESC')
                    ),
                    'line_width' => array(
                        'type'  => 'number',
                        'std'   => 10,
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PROGRESS_PIE_LINE_WIDTH'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PROGRESS_PIE_LINE_WIDTH_DESC'),
                    ),
                    'line_cap' => array(
                        'type'   => 'select',
                        'std'    => 'round',
                        'title'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PROGRESS_PIE_LINE_CAP'),
                        'desc'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PROGRESS_PIE_LINE_CAP_DESC'),
                        'values' => array(
                            'round'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PROGRESS_PIE_ROUND'),
                            'square' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PROGRESS_PIE_SQUARE'),
                            'butt'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PROGRESS_PIE_BUTT')
                        ),
                    ),
                    'bar_color' => array(
                        'type'  => 'color',
                        'std'   => '#F14B51',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PROGRESS_PIE_COLOR'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PROGRESS_PIE_COLOR_DESC'),
                    ),
                    'fill_color' => array(
                        'type'  => 'color',
                        'std'   => '#f5f5f5',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PROGRESS_PIE_FILL_COLOR'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PROGRESS_PIE_FILL_COLOR_DESC')
                    ),
                    'text_color' => array(
                        'type'  => 'color',
                        'std'   => '#bbbbbb',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TEXT_COLOR'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TEXT_COLOR_DESC'),
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
                        'std'   => 2000,
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
    		),
    	)
    );
}