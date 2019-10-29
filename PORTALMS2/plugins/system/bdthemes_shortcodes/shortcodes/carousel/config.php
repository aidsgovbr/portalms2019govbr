<?php 

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_carousel_config extends Su_Data {

    function __construct() {
        parent::__construct();
    }
    static function get_config() {

        return array(
            'name'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CAROUSEL'),
            'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CAROUSEL_DESC'),
            'icon'  => 'picture-o',
            'type'  => 'single',
            'group' => 'gallery',
            'badge' => 'UPDATE',
            'atts'  => array(
                'style' => array(
                    'type'   => 'select',
                    'values' => array(
                        '1' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE1'),
                        '2' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE2'),
                        '3' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE3'),
                        '4' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE4')
                    ),
                    'default' => 1,
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE_DESC')
                ),
                'source' => array(
                    'type'    => 'source',
                    'default' => 'none',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SOURCE'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CAROUSEL_SOURCE_DESC')
                ),
                'limit' => array(
                    'type'    => 'slider',
                    'min'     => 1,
                    'max'     => 100,
                    'step'    => 1,
                    'default' => 5,
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LIMIT'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CAROUSEL_LIMIT_DESC')
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
                'items' => array(
                    'type'    => 'slider',
                    'min'     => 1,
                    'max'     => 10,
                    'step'    => 1,
                    'default' => 5,
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ITEMS'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ITEMS_DESC'),

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
                'image' => array(
                    'type'    => 'bool',
                    'default' => 'yes',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_IMAGE'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_IMAGE_DESC'),
                    'child'  => array(                        
                        'image_height' => array(
                            'type'    => 'slider',
                            'min'     => 10,
                            'max'     => 640,
                            'step'    => 10,
                            'default' => 320,
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_IMAGE_HEIGHT'), 
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_IMAGE_HEIGHT_DESC')
                        ),
                        'image_width' => array(
                            'type'    => 'slider',
                            'min'     => 10,
                            'max'     => 640,
                            'step'    => 10,
                            'default' => 360,
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_IMAGE_WIDTH'), 
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_IMAGE_WIDTH_DESC')
                        ),
                        'thumb_resize' => array(
                            'type'    => 'bool',
                            'default' => 'no',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_THUMB_RESIZE'), 
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_THUMB_RESIZE_DESC')
                        )
                    )
                ),
                'title' => array(
                    'type'    => 'bool',
                    'default' => 'yes',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CAROULES_TITLE_DESC'),
                    'child'  => array(
                        'title_link' => array(
                            'type'    => 'bool',
                            'default' => 'yes',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE_LINK'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE_LINK_DESC')
                        ),
                        'title_limit' => array(
                            'default' => '',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE_LIMIT'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE_LIMIT_DESC')
                        )
                    )
                ),
                'intro_text' => array(
                    'type'    => 'bool',
                    'default' => 'yes',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CAROULES_TEXT'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CAROULES_TEXT_DESC'),
                    'child'  => array(                        
                        'intro_text_limit' => array(
                            'default' => '60',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TEXT_LIMIT'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TEXT_LIMIT_DESC')
                        )
                    )
                ),
                'category' => array(
                    'type'    => 'bool',
                    'default' => 'no',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CATEGORY'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BOOL_CATEGORY_DESC'),
                    'child'  => array(                        
                        'date' => array(
                            'type'    => 'bool',
                            'default' => 'no',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DATE'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DATE_DESC'),
                        )
                    )
                ),
                'color' => array(
                    'type'    => 'color',
                    'values'  => array( ),
                    'default' => '#FFFFFF',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_COLOR'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_COLOR_DESC'),
                    'child' => array(
                        'background' => array(
                            'type'    => 'color',
                            'values'  => array( ),
                            'default' => '#2D89EF',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BACKGROUND'), 
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BACKGROUND_DESC')
                        ),
                        'title_color' => array(
                            'type'    => 'color',
                            'values'  => array( ),
                            'default' => '#2D89EF',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE_COLOR'), 
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE_COLOR_DESC')
                        )
                    )
                ),
                'margin' => array(
                    'type'    => 'slider',
                    'min'     => 0,
                    'max'     => 80,
                    'step'    => 5,
                    'default' => 10,
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MARGIN'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CAROUSEL_MARGIN_DESC')
                ),
                'arrows' => array(
                    'type'    => 'bool',
                    'default' => 'no',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ARROWS'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ARROWS_DESC'),
                    'child'  => array(                        
                        'arrow_position' => array(
                            'type'   => 'select',
                            'values' => array(
                                'default'      => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DEFAULT'),
                                'top-left'     => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TOP_LEFT'),
                                'top-right'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TOP_RIGHT'),
                                'bottom-left'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BOTTOM_LEFT'),
                                'bottom-right' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BOTTOM_RIGHT'),
                            ),
                            'default' => 'default',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ARROW_POSITION'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ARROW_POSITION_DESC')
                        ),
                        'pagination' => array(
                            'type'    => 'bool',
                            'default' => 'yes',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PAGINATION'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PAGINATION_DESC')
                        )
                    )
                ),
                'autoplay' => array(
                    'type'    => 'bool',
                    'default' => 'yes',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_AUTOPLAY'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_AUTOPLAY_DESC'),
                    'child'  => array(                        
                        'hoverpause' => array(
                            'type'    => 'bool',
                            'default' => 'yes',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_HOVERPAUSE'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_HOVERPAUSE_DESC')
                        ),
                        'lazyload' => array(
                            'type'    => 'bool',
                            'default' => 'no',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LAZYLOAD'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LAZYLOAD_DESC')
                        ),
                        'loop' => array(
                            'type'    => 'bool',
                            'default' => 'no',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LOOP'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LOOP_DESC')
                        )
                    )
                ),                
                'delay' => array(
                    'type'    => 'slider',
                    'min'     => 1,
                    'max'     => 10,
                    'step'    => 0.5,
                    'default' => 4,
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DELAY'), 
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DELAY_DESC'),
                    'child'  => array(                        
                        'speed' => array(
                            'type'    => 'slider',
                            'min'     => 0.1,
                            'max'     => 15,
                            'step'    => 0.2,
                            'default' => 0.35,
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SPEED'), 
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SPEED_DESC')
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
