<?php
/**
* @subpackage Shortcode Ultimate
* @author BdThemes https://www.bdthemes.com
* @copyright Copyright (c) 2012 - 2016 BdThemes
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

if (class_exists('Su_Shortcode_carousel')) {
	SpAddonsConfig::addonConfig(
		array(
			'type'       => 'single',
			'category'   => 'Shortcode Ultimate',
			'addon_name' => 'su_carousel',
			'title'      => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CAROUSEL'),
			'desc'       => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CAROUSEL_DESC'),
	        'icon'       => JURI::root().'plugins/sppagebuilder/shortcode_ultimate/addons/su_carousel/element.svg',

			'attr'       => array(
				'general'    => array(
					'source_type'  => array(
						'type'   => 'select',
						'values' => array(
							"category"    => "Joomla Category",
							"k2-category" => "K2 Category",
							"directory"   => "Directory Path",
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
	                'dir_path'  => array(
						'type'        => 'text',
						'title'       => 'Directory',
						'std'         => 'images/gallery',
						'placeholder' => 'images/gallery',
						'desc'        => 'Type directory path',
						'depends'     => array(
							'source_type' => 'directory',
						),
	                ),
					'order'    => array(
						'type'     => 'select',
						'values'   => array(
							'created'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CREATED_DATE'),
							'title'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE'),
							'hits'     => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_HITS'),
							'ordering' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ORDERING'),
						),
						'std'      => 'created',
						'title'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ORDER'),
						'desc'     => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ORDER_DESCR'),
					),
					'order_by' => array(
						'type'     => 'select',
						'values'   => array(
							'asc'      => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ASC'),
							'desc'     => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DESC'),
						),
						'std'      => 'desc',
						'title'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ORDER_TYPE'),
						'desc'     => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ORDER_TYPE_DESC'),
					),
					'image' => array(
						'type'  => 'checkbox',
						'std'   => '1',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_IMAGE'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_IMAGE_DESC'),
	                ),                      
	                'image_height' => array(
						'type'    => 'number',
						'std'     => 320,
						'title'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_IMAGE_HEIGHT'), 
						'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_IMAGE_HEIGHT_DESC'),
						'depends' => array(
							'image' => '1',
						),
	                ),
	                'image_width' => array(
						'type'  => 'number',
						'std'   => 360,
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_IMAGE_WIDTH'), 
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_IMAGE_WIDTH_DESC'),
						'depends' => array(
							'image' => '1',
						),
	                ),
	                'thumb_resize' => array(
						'type'  => 'checkbox',
						'std'   => '0',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_THUMB_RESIZE'), 
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_THUMB_RESIZE_DESC'),
						'depends' => array(
							'image' => '1',
						),
	                ),
	                'title' => array(
						'type'  => 'checkbox',
						'std'   => '1',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CAROULES_TITLE_DESC'),
	                ),
	                'title_link' => array(
						'type'    => 'checkbox',
						'std'     => '1',
						'title'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE_LINK'),
						'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE_LINK_DESC'),
						'depends' => array(
							'title' => '1',
						),
	                ),
	                'title_limit' => array(
						'type'    => 'number',
						'title'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE_LIMIT'),
						'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE_LIMIT_DESC'),
						'depends' => array(
							'title' => '1',
						),
	                ),
	                'intro_text' => array(
						'type'  => 'checkbox',
						'std'   => '1',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CAROULES_TEXT'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CAROULES_TEXT_DESC'),
	                ),                       
	                'intro_text_limit' => array(
						'type'    => 'number',
						'std'     => '60',
						'title'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TEXT_LIMIT'),
						'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TEXT_LIMIT_DESC'),
						'depends' => array(
							'intro_text' => '1',
						),
	                ),
	                'category' => array(
						'type'  => 'checkbox',
						'std'   => '0',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CATEGORY'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BOOL_CATEGORY_DESC'),
	                ),                       
	                'date' => array(
						'type'  => 'checkbox',
						'std'   => '0',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DATE'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DATE_DESC'),
	                ),
	                'arrows' => array(
						'type'  => 'checkbox',
						'std'   => '0',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ARROWS'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ARROWS_DESC'),
	                ),                       
	                'arrow_position' => array(
	                    'type'   => 'select',
	                    'values' => array(
	                        'default'      => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DEFAULT'),
	                        'top-left'     => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TOP_LEFT'),
	                        'top-right'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TOP_RIGHT'),
	                        'bottom-left'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BOTTOM_LEFT'),
	                        'bottom-right' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BOTTOM_RIGHT'),
	                    ),
						'std'     => 'default',
						'title'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ARROW_POSITION'),
						'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ARROW_POSITION_DESC'),
						'depends' => array(
							'arrows' => '1',
						),
	                ),
	                'pagination' => array(
						'type'  => 'checkbox',
						'std'   => '1',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PAGINATION'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PAGINATION_DESC'),
	                ),
	                'autoplay' => array(
						'type'  => 'checkbox',
						'std'   => '1',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_AUTOPLAY'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_AUTOPLAY_DESC'),
	                ),                       
	                'hoverpause' => array(
						'type'  => 'checkbox',
						'std'   => '1',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_HOVERPAUSE'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_HOVERPAUSE_DESC'),
	                ),
	                'lazyload' => array(
						'type'  => 'checkbox',
						'std'   => '0',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LAZYLOAD'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LAZYLOAD_DESC'),
	                ),
	                'loop' => array(
						'type'  => 'checkbox',
						'std'   => '0',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LOOP'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LOOP_DESC'),
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
				"item" => array(
	                'limit'      => array(
						'type'       => 'number',
						'std'        => 5,
						'title'      => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LIMIT'),
						'desc'       => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CAROUSEL_LIMIT_DESC'),
	                ),
					'items'   => array(
						'type'  => 'number',
						'std'   => 5,
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LARGE_DEVICE_ITEM'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LARGE_DEVICE_ITEM_DESC'),
					),
					'medium'  => array(
						'type'  => 'number',
						'std'   => 3,
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MEDIUM_DEVICE_ITEM'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MEDIUM_DEVICE_ITEM_DESC'),
					),
					'small'   => array(
						'type'  => 'number',
						'std'   => 1,
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SMALL_DEVICE_ITEM'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SMALL_DEVICE_ITEM_DESC'),
					),
				),
				"style" => array(
	                'style'  => array(
						'type'   => 'select',
						'values' => array(
							'1'      => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE1'),
							'2'      => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE2'),
							'3'      => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE3'),
							'4'      => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE4')
	                    ),
						'std'    => 1,
						'title'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE'),
						'desc'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE_DESC'),
	                ),
	                'background' => array(
						'type'   => 'color',
						'values' => array( ),
						'std'    => '#2D89EF',
						'title'  => 'Item Background', 
						'desc'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BACKGROUND_DESC'),
	                ),
	                'title_color' => array(
						'type'    => 'color',
						'values'  => array( ),
						'std'     => '#2D89EF',
						'title'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE_COLOR'), 
						'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE_COLOR_DESC'),
						'depends' => array(
							'title' => '1',
						),
	                ),
	                'margin' => array(
						'type'  => 'number',
						'std'   => 10,
						'title' => 'Item Margin',
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CAROUSEL_MARGIN_DESC'),
	                ),
				),
			),
		)
	);
}