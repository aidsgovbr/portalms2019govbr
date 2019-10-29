<?php
/**
* @subpackage Shortcode Ultimate
* @author BdThemes https://www.bdthemes.com
* @copyright Copyright (c) 2012 - 2016 BdThemes
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

if (class_exists('Su_Shortcode_post_slider')) {
    SpAddonsConfig::addonConfig(
    	array(
            'type'       => 'single',
            'category'   => 'Shortcode Ultimate',
            'addon_name' => 'su_post_slider',
            'title'      => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_POST_SLIDER'),
            'desc'       => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_POST_SLIDER_DESC'),
            'icon'       => JURI::root().'plugins/sppagebuilder/shortcode_ultimate/addons/su_post_slider/element.svg',

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
                        'std'   => 5,
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LIMIT'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_POST_SLIDER_LIMIT_DESC')
                    ),
                    'order' => array(
                        'type'   => 'select',
                        'std'    => 'created',
                        'title'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ORDER'),
                        'desc'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ORDER_DESCR'),
                        'values' => array(
                            'created'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CREATED_DATE'),
                            'title'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE'),
                            'hits'     => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_HITS'),
                            'ordering' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ORDERING')
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
                    'title' => array(
                        'type'  => 'checkbox',
                        'std'   => '1',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CAROULES_TITLE_DESC'),
                    ),
                    'title_link' => array(
                        'type'  => 'checkbox',
                        'std'   => '1',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE_LINK'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE_LINK_DESC')
                    ),
                    'intro_text' => array(
                        'type'  => 'checkbox',
                        'std'   => '1',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CAROULES_TEXT'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CAROULES_TEXT_DESC'),
                    ),                       
                    'intro_text_limit' => array(
                        'type'  => 'text',
                        'std'   => '200',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TEXT_LIMIT'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TEXT_LIMIT_DESC')
                    ),
                    'category' => array(
                        'type'    => 'checkbox',
                        'std' => '1',
                        'title'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CATEGORY'),
                        'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BOOL_CATEGORY_DESC'),
                    ),                       
                    'date' => array(
                        'type'  => 'checkbox',
                        'std'   => '1',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DATE'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DATE_DESC'),
                    ),
                    'arrows' => array(
                        'type'  => 'checkbox',
                        'std'   => '1',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ARROWS'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ARROWS_DESC'),
                    ),                       
                    'pagination' => array(
                        'type'  => 'checkbox',
                        'std'   => 'no',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PAGINATION'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PAGINATION_DESC')
                    ),
                    'autoplay' => array(
                        'type'  => 'checkbox',
                        'std'   => '0',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_AUTOPLAY'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_AUTOPLAY_DESC'),
                    ),                        
                    'hoverpause' => array(
                        'type'  => 'checkbox',
                        'std'   => '0',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_HOVERPAUSE'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_HOVERPAUSE_DESC')
                    ),
                    'lazyload' => array(
                        'type'  => 'checkbox',
                        'std'   => '0',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LAZYLOAD'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LAZYLOAD_DESC')
                    ),
                    'loop' => array(
                        'type'  => 'checkbox',
                        'std'   => '1',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LOOP'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LOOP_DESC')
                    ),                
                    'delay' => array(
                        'type'  => 'number',
                        'std'   => 4000,
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DELAY'), 
                        'desc'  => 'After mentioned time (in milliseconds) animation will start',
                    ),                        
                    'speed' => array(
                        'type'  => 'number',
                        'std'   => 350,
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SPEED'), 
                        'desc'  => 'Specify time (in milliseconds) that will be taken to complete animation effect'
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
                        'std'    => 'light',
                        'title'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE'),
                        'desc'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE_DESC'),
                        'values' => array(
                            'light' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LIGHT'),
                            'dark'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DARK')
                        ),
                    ),
                ),
    		),
    	)
    );
}