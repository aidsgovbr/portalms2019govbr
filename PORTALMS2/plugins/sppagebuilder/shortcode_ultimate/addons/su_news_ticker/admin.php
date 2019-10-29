<?php
/**
* @subpackage Shortcode Ultimate
* @author BdThemes https://www.bdthemes.com
* @copyright Copyright (c) 2012 - 2016 BdThemes
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

if (class_exists('Su_Shortcode_news_ticker')) {

	SpAddonsConfig::addonConfig(
		array(
			'type'       => 'single',
			'category'   => 'Shortcode Ultimate',
			'addon_name' => 'su_news_ticker',
			'title'      => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_NEWS_TICKER'),
			'desc'       => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_NEWS_TICKER_DESC'),
	        'icon'       => JURI::root().'plugins/sppagebuilder/shortcode_ultimate/addons/su_news_ticker/element.svg',

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
						'std'   => 12,
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LIMIT'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LIMIT_DESC')
	                ),
	                'show_label' => array(
						'type'  => 'checkbox',
						'std'   => '1',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_NT_SHOW_LABEL'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_NT_SHOW_LABEL_DESC'),
	                ),
	                'label' => array(
						'type'  => 'text',
						'std'   => 'LATEST NEWS',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_NT_LABEL'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_NT_LABEL_DESC')
	                ),
	                'navigation' => array(
						'type'  => 'checkbox',
						'std'   => '1',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_NAVIGATION'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_NAVIGATION_DESC')
	                ),
	                'intro_text' => array(
						'type'  => 'checkbox',
						'std'   => '1',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_INTRO_TEXT'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_INTRO_TEXT_DESC'),
	                ),                       
	                'intro_text_limit' => array(
						'type'  => 'text',
						'std'   => '60',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TEXT_LIMIT'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TEXT_LIMIT_DESC')
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
	                'transition' => array(
						'type'   => 'select',
						'std'    => 'fade',
						'title'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_NT_TRANSITION'),
						'desc'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_NT_TRANSITION_DESC'),
						'values' => array(
							'fade'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FADE'),
							'slide-h' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SLIDEH'),
							'slide-v' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SLIDEV')
	                    ),
	                ),
	                'autoplay' => array(
						'type'  => 'checkbox',
						'std'   => '1',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_AUTOPLAY'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_AUTOPLAY_DESC'),
	                ),
	                'delay' => array(
						'type'  => 'number',
						'std'   => 4000,
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DELAY'), 
						'desc'  => 'After mentioned time (in milliseconds) animation will start'
	                ),
	                'target' => array(
						'type'   => 'select',
						'std'    => 'self',
						'title'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TARGET'),
						'desc'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TARGET_DESC'),
						'values' => array(
							'self'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SELF'),
							'blank' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BLANK')
	                    ),                    
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