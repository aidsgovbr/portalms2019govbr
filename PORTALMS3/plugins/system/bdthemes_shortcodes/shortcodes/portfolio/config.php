<?php 

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_portfolio_config extends Su_Data {

    function __construct() {
        parent::__construct();
    }
    static function get_config() {

        return array(
            'name'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PORTFOLIO'),
            'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PORTFOLIO_DESC'),
            'icon'  => 'suitcase',
            'type'  => 'single',
            'group' => 'gallery',
            'atts'  => array(
                'source' => array(
                    'type'    => 'article_source',
                    'default' => 'none',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SOURCE'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PORTFOLIO_SOURCE_DESC'),
                    'child'   => array(
                        'layout' => array(
                            'type'       => 'select',
                            'values'     => array(
                                'grid'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CP_GRID'),
                                'masonry' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CP_MASONRY'),
                                //'mosaic'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CP_MOSAIC'),
                                'slider'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CP_SLIDER')
                            ),
                            'default' => 'grid',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CP_LAYOUT'), 
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CP_LAYOUT_DESC'),
                        )
                    )
                ),
                'style' => array(
                    'type' => 'select',
                    'values' => array(
                        '1'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE1'),
                        '2'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE2'),
                        '3'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE3'),
                        '4'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE4'),
                        '5'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE5'),
                        '6'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE6'),
                        '7'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE7'),
                        '8'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE8'),
                        '9'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE9'),
                        '10' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE10')
                    ),
                    'default' => 1,
                    'name' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE'),
                    'desc' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE_DESC')
                ),
                'limit' => array(
                    'type'    => 'slider',
                    'min'     => 5,
                    'max'     => 100,
                    'step'    => 1,
                    'default' => 12,
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LIMIT'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LIMIT_DESC')
                ),
                'show_more' => array(
                    'type'    => 'bool',
                    'default' => 'no',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHOW_MORE'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHOW_MORE_DESC'),
                    'child'   => array(
                        'show_more_item' => array(
                            'type'    => 'slider',
                            'min'     => 1,
                            'max'     => 12,
                            'step'    => 1,
                            'default' => 4,
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHOW_MORE_LIMIT'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHOW_MORE_LIMIT_DESC')
                        ),
                        'show_more_action' => array(
                            'type'       => 'select',
                            'values'     => array(
                                'click' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CP_CLICK'),
                                'auto'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CP_AUTO')
                            ),
                            'default' => 'click',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHOW_MORE_ACTION'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHOW_MORE_ACTION_DESC')
                        )
                    )
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
                'loading_animation' => array(
                    'type'   => 'select',
                    'values' => array(
                        'default'      => 'Default',
                        'fadeIn'       => 'Fade In',
                        'lazyLoading'  => 'LazyLoading',
                        'fadeInToTop'  => 'Fade In To Top',
                        'sequentially' => 'Sequentially',
                        'bottomToTop'  => 'Bottom To Top'
                    ),
                    'default' => 'default',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LOADING_ANIMATION'), 
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LOADING_ANIMATION_DESC'),
                    'child'   => array(
                        'filter_animation' => array(
                            'type'       => 'select',
                            'values'     => array(
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
                            'default' => 'rotateSides',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FILTER_ANIMATION'), 
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FILTER_ANIMATION_DESC')
                        )
                    )
                ),
            	'horizontal_gap' => array(
                    'min'     => 0,
            	    'type'    => 'slider',
            	    'max'     => 50,
            	    'step'    => 5,
            	    'default' => 10,
            	    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_HORIZONTAL_GAP'), 
            	    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_HORIZONTAL_GAP_DESC'),
                    'child'   => array(
                        'vertical_gap' => array(
                            'type'    => 'slider',
                            'min'     => 0,
                            'max'     => 50,
                            'step'    => 5,
                            'default' => 10,
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_VERTICAL_GAP'), 
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_VERTICAL_GAP_DESC')
                        ),
                        'thumb_resize' => array(
                            'type'    => 'bool',
                            'default' => 'yes',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_THUMB_RESIZE'), 
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_THUMB_RESIZE_DESC')
                        )
                    )
                ),
                'filter' => array(
                    'type'    => 'bool',
                    'default' => 'yes',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHOW_FILTER'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHOW_FILTER_DESC'),
                    'child'   => array(
                        'filter_deeplink' => array(
                            'type'    => 'bool',
                            'default' => 'no',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FILTER_DEEPLINK'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FILTER_DEEPLINK_DESC')
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
                            'default' => '1',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FILTER_STYLE'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FILTER_STYLE_DESC')
                        )
                    )
                ),
                'show_link' => array(
                    'type'    => 'bool',
                    'default' => 'yes',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHOW_LINK'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHOW_LINK_DESC'),
                    'child'   => array(
                        'show_zoom' => array(
                            'type'    => 'bool',
                            'default' => 'yes',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHOW_ZOOM'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHOW_ZOOM_DESC')
                        )
                    )
                ),
                'include_article_image' => array(
                    'type'    => 'bool',
                    'default' => 'no',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_INCLUDE_ARTICLE_IMAGE'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_INCLUDE_ARTICLE_IMAGE_DESC'),
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
                        'large' => array(
                            'type'    => 'slider',
                            'min'     => 1,
                            'max'     => 10,
                            'step'    => 1,
                            'default' => 4,
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LARGE_DEVICE_ITEM'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LARGE_DEVICE_ITEM_DESC')
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
