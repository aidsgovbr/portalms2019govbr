<?php
/**
* @subpackage Shortcode Ultimate
* @author BdThemes https://www.bdthemes.com
* @copyright Copyright (c) 2012 - 2016 BdThemes
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

if (class_exists('Su_Shortcode_timeline')) {
    SpAddonsConfig::addonConfig(
    	array(
            'type'       => 'single',
            'category'   => 'Shortcode Ultimate',
            'addon_name' => 'su_timeline',
            'title'      => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TIMELINE'),
            'desc'       => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TIMELINE_DESC'),
            'icon'       => JURI::root().'plugins/sppagebuilder/shortcode_ultimate/addons/su_timeline/element.svg',

    		'attr'=>array(
    			'general' => array(
                    'source_type'  => array(
                        'type'   => 'select',
                        'values' => array(
                            "category"    => "Joomla Category",
                            "k2-category" => "K2 Category",
                        ),
                        'std'    => 'category',
                        'title'  => 'Source Type',
                        'desc'   => 'Select Source Type'
                    ),
                    'j_category'  => array(
                        'type'     => 'select',
                        'multiple' => 'multiple',
                        'values'   => su_sp_category(),
                        'title'    => 'Joomla Category',
                        'desc'     => 'Select one more category',
                        'depends'  => array(
                            'source_type' => 'category',
                        ),
                    ),
                    'k2_category'  => array(
                        'type'     => 'select',
                        'multiple' => 'multiple',
                        'values'   => su_sp_category('k2'),
                        'title'    => 'K2 Category',
                        'desc'     => 'Select one more category',
                        'depends'  => array(
                            'source_type' => 'k2-category',
                        ),
                    ),
                    'limit' => array(
                        'type'  => 'number',
                        'std'   => 20,
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ITEM_LIMIT'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TIMELINE_LIMIT_DESC')
                    ),
                    'order' => array(
                        'type'   => 'select',
                        'std'    => 'created',
                        'title'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ORDER'),
                        'desc'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ORDER_DESCR'),
                        'values' => array(
                            ''         => 'Default',
                            'title'    => 'Title',
                            'created'  => 'Created Date',
                            'hits'     => 'Hits',
                            'ordering' => 'Ordering'
                        ),
                    ),
                    'order_by' => array(
                        'type'   => 'select',
                        'std'    => 'desc',
                        'title'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ORDER_TYPE'),
                        'desc'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ORDER_TYPE_DESC'),
                        'values' => array(
                            'asc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ASC'),
                            'desc' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DESC')
                        ),
                    ),
                    'image' => array(
                        'type'  => 'checkbox',
                        'std'   => '1',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_IMAGE'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TIMELINE_IMAGE_DESC'),
                    ),
                    'highlight_year' => array(
                        'type'  => 'checkbox',
                        'std'   => '1',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_HIGHTLIGHT_YEAR'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_HIGHTLIGHT_YEAR_DESC')
                    ),
                    'read_more' => array(
                        'type'  => 'checkbox',
                        'std'   => '1',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_READMORE'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_READMORE_DESC')
                    ),
                    'intro_text' => array(
                        'type'  => 'checkbox',
                        'std'   => '1',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_INTRO_TEXT'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_INTRO_TEXT_DESC'),
                    ),
                    'date' => array(
                        'type'  => 'checkbox',
                        'std'   => '1',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DATE'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DATE_DESC')    
                    ),
                    'time' => array(
                        'type'  => 'checkbox',
                        'std'   => '1',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TIME'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TIME_DESC')    
                    ),
                    'title' => array(
                        'type'  => 'checkbox',
                        'std'   => '1',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE_DESC'),
                    ),
                    'link_title' => array(
                        'type'  => 'checkbox',
                        'std'   => '1',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LINK_TITLE'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LINK_TITLE_DESC')
                    ),              
                    'before_text' => array(
                        'type'  => 'text',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BEFORE_TEXT'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BEFORE_TEXT_DESC'),
                    ),
                    'after_text' => array(
                        'type'  => 'text',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_AFTER_TEXT'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_AFTER_TEXT_DESC')
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