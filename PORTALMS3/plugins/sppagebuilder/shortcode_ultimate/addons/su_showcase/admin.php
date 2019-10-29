<?php
/**
* @subpackage Shortcode Ultimate
* @author BdThemes https://www.bdthemes.com
* @copyright Copyright (c) 2012 - 2016 BdThemes
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

if (class_exists('Su_Shortcode_showcase')) {
    SpAddonsConfig::addonConfig(
    	array(
    		'type'       => 'single',
    		'category'   => 'Shortcode Ultimate',
    		'addon_name' => 'su_showcase',
    		'title'      => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHOWCASE'),
    		'desc'       => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHOWCASE_DESC'),
            'icon'       => JURI::root().'plugins/sppagebuilder/shortcode_ultimate/addons/su_showcase/element.svg',

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
    				'layout' => array(
    				    'type'       => 'select',
    				    'values'     => array(
    				        'grid'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CP_GRID'),
    				        'masonry' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CP_MASONRY'),
    				        //'mosaic'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CP_MOSAIC'),
    				        'slider'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CP_SLIDER')
    				    ),
    					'std'   => 'grid',
    					'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CP_LAYOUT'), 
    					'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CP_LAYOUT_DESC'),
    				),
                    'show_more' => array(
    					'type'  => 'checkbox',
    					'std'   => '0',
    					'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHOW_MORE'),
    					'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHOW_MORE_DESC'),
                    ),
                    'show_more_item' => array(
                        'type'    => 'number',
                        'std'     => 4,
                        'title'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHOW_MORE_LIMIT'),
                        'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHOW_MORE_LIMIT_DESC'),
                        'depends' => array(
                            'show_more' => '1',
                        ),
                    ),
                    'show_more_action' => array(
                        'type'   => 'select',
                        'values' => array(
                            'click' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CP_CLICK'),
                            'auto'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CP_AUTO')
                        ),
                        'std'     => 'click',
                        'title'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHOW_MORE_ACTION'),
                        'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHOW_MORE_ACTION_DESC'),
                        'depends' => array(
                            'show_more' => '1',
                        ),
               	 	),
               	 	'order' => array(
                        'type'     => 'select',
                        'values'   => array(
                            'created'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CREATED_DATE'),
                            'title'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE'),
                            'hits'     => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_HITS'),
                            'ordering' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ORDERING')
                        ),
    					'std'   => 'created',
    					'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ORDER'),
    					'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ORDER_DESCR'),
                    ),
                    'order_by' => array(
                        'type'   => 'select',
                        'values' => array(
                            'asc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ASC'),
                            'desc'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DESC')
                        ),
    					'std'   => 'desc',
    					'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ORDER_TYPE'),
    					'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ORDER_TYPE_DESC')
                    ),
                    'horizontal_gap' => array(
    					'type'  => 'number',
    					'std'   => 10,
    					'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_HORIZONTAL_GAP'), 
    					'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_HORIZONTAL_GAP_DESC'),
                    ),
                    'vertical_gap' => array(
    					'type'  => 'number',
    					'std'   => 10,
    					'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_VERTICAL_GAP'), 
    					'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_VERTICAL_GAP_DESC')
                    ),
                    'thumb_resize' => array(
    					'type'  => 'checkbox',
    					'std'   => '1',
    					'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_THUMB_RESIZE'), 
    					'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_THUMB_RESIZE_DESC')
                    ),
                    'filter' => array(
    					'type'  => 'checkbox',
    					'std'   => '1',
    					'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHOW_FILTER'),
    					'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHOW_FILTER_DESC'),
                    ),
                    'filter_align' => array(
    					'type'   => 'select',
    					'values' => array(
    						'left'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LEFT'),
    						'center' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CENTER'),
    						'right'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RIGHT'),
    					),
                        'std'     => 'left',
                        'title'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FILTER_ALIGN'),
                        'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FILTER_ALIGN_DESC'),
                        'depends' => array(
                            'filter' => '1',
                        ),
                    ),
                    'filter_deeplink' => array(
                        'type'    => 'checkbox',
                        'std'     => '0',
                        'title'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FILTER_DEEPLINK'),
                        'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FILTER_DEEPLINK_DESC'),
                        'depends' => array(
                            'filter' => '1',
                        ),
                    ),
                    'filter_counter' => array(
                        'type'    => 'checkbox',
                        'std'     => '1',
                        'title'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FILTER_COUNTER'),
                        'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FILTER_COUNTER_DESC'),
                        'depends' => array(
                            'filter' => '1',
                        ),
                    ),
                    'page_deeplink' => array(
    					'type'  => 'checkbox',
    					'std'   => '0',
    					'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PAGE_DEEPLINK'),
    					'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PAGE_DEEPLINK_DESC')
                    ),
                    'item_link' => array(
                        'type'   => 'select',
                        'values' => array(
                            'no'     => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_NO'),
                            'inline' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_INLINE'),
                            'single' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SINGLE'),
                            'link'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LINK')
    					),
    					'std'   => 'inline',
    					'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ITEM_LINK'),
    					'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ITEM_LINK_DESC')
                    ),
                    'popup_position' => array(
                        'type'       => 'select',
                        'values'     => array(
                            'bottom' => 'Bottom',
                            'top'    => 'Top',
                            'above'  => 'Above',
                            'below'  => 'Below'
                        ),
    					'std'   => 'below',
    					'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_POPUP_POSITION'), 
    					'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_POPUP_POSITION_DESC'),
                    ),
                    'popup_category' => array(
                        'type'    => 'checkbox',
                        'std' => '1',
                        'title'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHOWCASE_POPUP_CATEGORY'),
                        'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHOWCASE_POPUP_CATEGORY_DESC'),  
                    ),
                    'popup_date' => array(
                        'type'    => 'checkbox',
                        'std' => '1',
                        'title'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHOWCASE_POPUP_DATE'),
                        'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHOWCASE_POPUP_DATE_DESC')
                    ),
                    'popup_image' => array(
                        'type'    => 'checkbox',
                        'std' => '1',
                        'title'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHOWCASE_POPUP_IMAGE'),
                        'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHOWCASE_POPUP_IMAGE_DESC')
                    ),
                    'popup_detail_button' => array(
                        'type'    => 'checkbox',
                        'std' => '1',
                        'title'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHOWCASE_PDB'),
                        'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHOWCASE_PDB_DESC')
                    ),
                    'include_article_image' => array(
    					'type'  => 'checkbox',
    					'std'   => '0',
    					'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_INCLUDE_ARTICLE_IMAGE'),
    					'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_INCLUDE_ARTICLE_IMAGE_DESC'),
                    ),
                    'class' => array(
                        'type'  => 'text',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLASS'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLASS_DESC')
                    ),
                ),
                'item' => array(
                    'limit' => array(
                        'type'  => 'number',
                        'std'   => 12,
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LIMIT'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LIMIT_DESC')
                    ),
                    'large' => array(
                        'type'  => 'number',
                        'std'   => 4,
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LARGE_DEVICE_ITEM'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LARGE_DEVICE_ITEM_DESC')
                    ),
                    'medium' => array(
                        'type'  => 'number',
                        'std'   => 3,
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MEDIUM_DEVICE_ITEM'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MEDIUM_DEVICE_ITEM_DESC')
                    ),
                    'small' => array(
                        'type'  => 'number',
                        'std'   => 1,
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SMALL_DEVICE_ITEM'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SMALL_DEVICE_ITEM_DESC')
                    ),
                ),
                'style' => array(
                    'caption_style' => array(
                        'type'       => 'select',
                        'values'     => array(
                            'pushTop'             => 'Push Top',
                            'pushDown'            => 'Push Down',
                            'revealBottom'        => 'Reveal Bottom',
                            'revealTop'           => 'Reveal Top',
                            'revealLeft'          => 'Reveal Left',
                            'moveRight'           => 'Move Right',
                            'overlayBottom'       => 'Overlay Bottom',
                            'overlayBottomPush'   => 'Overlay Push',
                            'overlayBottomReveal' => 'Overlay Reveal',
                            'overlayBottomAlong'  => 'Overlay Along',
                            'overlayRightAlong'   => 'Overlay Right',
                            'minimal'             => 'Minimal',
                            'fadeIn'              => 'Fade In',
                            'zoom'                => 'Zoom',
                            'opacity'             => 'Opacity'
                        ),
                        'std'   => 'overlayBottomPush',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CAPTION_STYLE'), 
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CAPTION_STYLE_DESC'),
                    ),
                    'filter_style' => array(
                        'type'       => 'select',
                        'values'     => array(
                            '1' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE1'),
                            '2' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE2'),
                            '3' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE3'),
                            '4' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE4'),
                            '5' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE5'),
                            '6' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE6'),
                            '7' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE7'),
                            '8' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE8'),
                            '9' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE9')
                        ),
                        'std'     => '1',
                        'title'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FILTER_STYLE'),
                        'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FILTER_STYLE_DESC'),
                        'depends' => array(
                            'filter' => '1',
                        ),
                    ),
                    'filter_animation' => array(
                        'title'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FILTER_ANIMATION'), 
                        'desc'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FILTER_ANIMATION_DESC'),
                        'type'   => 'select',
                        'values' => array(
                            'fadeOut'      => 'Fade Out',
                            'quicksand'    => 'Quicksand',
                            'boxShadow'    => 'Box Shadow',
                            'bounceLeft'   => 'Bounce Left',
                            'bounceTop'    => 'Bounce Top',
                            'bounceBottom' => 'Bounce Bottom',
                            'moveLeft'     => 'Move Left',
                            'slideLeft'    => 'Slide Left',
                            'fadeOutTop'   => 'Fade Out Top',
                            'sequentially' => 'Sequentially',
                            'skew'         => 'Skew',
                            'slideDelay'   => 'Slide Delay',
                            '3dflip'       => '3d Flip',
                            'rotateSides'  => 'Rotate Sides',
                            'flipOutDelay' => 'Flip Out Delay',
                            'flipOut'      => 'Flip Out',
                            'unfold'       => 'Unfold',
                            'foldLeft'     => 'Fold Left',
                            'scaleDown'    => 'Scale Down',
                            'scaleSides'   => 'Scale Sides',
                            'frontRow'     => 'Front Row',
                            'flipBottom'   => 'Flip Bottom',
                            'rotateRoom'   => 'Rotate Room'
                        ),
                        'std'     => 'rotateSides',
                        'depends' => array(
                            'filter' => '1',
                        ),
                    ),
                    'loading_animation' => array(
                        'title'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LOADING_ANIMATION'), 
                        'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LOADING_ANIMATION_DESC'),
                        'type'   => 'select',
                        'values' => array(
                            'default'      => 'Default',
                            'fadeIn'       => 'Fade In',
                            'lazyLoading'  => 'LazyLoading',
                            'fadeInToTop'  => 'Fade In To Top',
                            'sequentially' => 'Sequentially',
                            'bottomToTop'  => 'Bottom To Top'
                        ),
                        'std' => 'default',
                    ),
                ),
    		),
    	)
    );
}