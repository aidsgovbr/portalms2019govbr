<?php 

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_photo_gallery_config extends Su_Data {

		function __construct() {
			parent::__construct();
		}

		static function get_config() {

			return array(
				'name'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PHOTO_GALLERY'),
				'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_GALLERY_DESC'),
				'icon'  => 'th',
				'type'  => 'single',
				'group' => 'gallery',
				'atts'  => array(
					'style' => array(
					    'type' => 'select',
					    'values' => array(
					        '1' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE1'),
					        '2' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE2'),
					        '3' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE3'),
					        '4' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE4')
					    ),
					    'default' => '1',
					    'name' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE'),
					    'desc' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE_DESC')
					),
					'source' => array(
							'type'    => 'source',
							'default' => 'none',
							'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SOURCE'),
							'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SOURCE_DESC')
					),
					'limit' => array(
							'type'    => 'slider',
							'min'     => -1,
							'max'     => 100,
							'step'    => 1,
							'default' => 20,
							'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LIMIT'),
							'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LIMIT_DESC')
					),
					'order' => array(
						'type'     => 'select',
						'values'   => array(
							'created'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CREATED_DATE'),
							'title'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE'),
							'hits'     => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_HITS'),
							'ordering' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ORDERING')
						),
						'default' => 'created',
						'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ORDER'),
						'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ORDER_DESCR'),
						'child'   => array(
							'order_by' => array(
								'type'   => 'select',
								'values' => array(
									'asc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ASC'),
									'desc'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DESC')
								),
								'default' => 'desc',
								'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ORDER_TYPE'),
								'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ORDER_TYPE_DESC')
							)
						)
	                ),
					'width' => array(
							'type'    => 'slider',
							'min'     => 10,
							'max'     => 1600,
							'step'    => 10,
							'default' => 250,
							'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_GALLERY_WIDTH'), 
							'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_GALLERY_WIDTH_DESC'),
							'child'   => array(
								'height' => array(
									'type'    => 'slider',
									'min'     => 10,
									'max'     => 1600,
									'step'    => 10,
									'default' => 160,
									'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_GALLERY_HEIGHT'), 
									'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_GALLERY_HEIGHT_DESC')
								),
								
								'thumb_resize' => array(
								    'type'    => 'bool',
								    'default' => 'no',
								    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_THUMB_RESIZE'), 
								    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_THUMB_RESIZE_DESC')
								)
							)
					),
	            	'horizontal_gap' => array(
	                    'min'     => 0,
	            	    'type'    => 'slider',
	            	    'max'     => 50,
	            	    'step'    => 1,
	            	    'default' => 10,
	            	    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_HORIZONTAL_GAP'), 
	            	    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_HORIZONTAL_GAP_DESC'),
	                    'child'   => array(
	                        'vertical_gap' => array(
	                            'type'    => 'slider',
	                            'min'     => 0,
	                            'max'     => 50,
	                            'step'    => 1,
	                            'default' => 10,
	                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_VERTICAL_GAP'), 
	                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_VERTICAL_GAP_DESC')
	                        )
	                    )
	            	),
	                'large' => array(
	                    'type'    => 'slider',
	                    'min'     => 1,
	                    'max'     => 10,
	                    'step'    => 1,
	                    'default' => 4,
	                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LARGE_DEVICE_ITEM'),
	                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LARGE_DEVICE_ITEM_DESC'),
	                    'child'   => array(
	                        'medium' => array(
	                            'type'    => 'slider',
	                            'min'     => 1,
	                            'max'     => 5,
	                            'step'    => 1,
	                            'default' => 3,
	                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MEDIUM_DEVICE_ITEM'),
	                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MEDIUM_DEVICE_ITEM_DESC')
	                        ),
	                        'small' => array(
	                            'type'    => 'slider',
	                            'min'     => 1,
	                            'max'     => 5,
	                            'step'    => 1,
	                            'default' => 1,
	                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SMALL_DEVICE_ITEM'),
	                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SMALL_DEVICE_ITEM_DESC')
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
