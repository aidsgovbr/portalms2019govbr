<?php 

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_post_slider_config extends Su_Data {

    function __construct() {
        parent::__construct();
    }
    static function get_config() {

        return array(
            'name'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_POST_SLIDER'),
            'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_POST_SLIDER_DESC'),
            'icon'  => 'picture-o',
            'type'  => 'single',
            'group' => 'gallery',
            'badge' => 'BETA',
            'atts'  => array(
                'style' => array(
                    'type'   => 'select',
                    'values' => array(
                        'light' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LIGHT'),
                        'dark' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DARK')
                    ),
                    'default' => 'light',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE_DESC')
                ),
                'source' => array(
                    'type'    => 'article_source',
                    'default' => 'none',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SOURCE'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_POST_SLIDER_SOURCE_DESC'),
                ),
                'limit' => array(
                    'type'    => 'slider',
                    'min'     => 1,
                    'max'     => 100,
                    'step'    => 1,
                    'default' => 5,
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LIMIT'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_POST_SLIDER_LIMIT_DESC')
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
                            'default' => '200',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TEXT_LIMIT'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TEXT_LIMIT_DESC')
                        )
                    )
                ),
                'category' => array(
                    'type'    => 'bool',
                    'default' => 'yes',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CATEGORY'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BOOL_CATEGORY_DESC'),
                    'child'  => array(                        
                        'date' => array(
                            'type'    => 'bool',
                            'default' => 'yes',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DATE'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DATE_DESC'),
                        )
                    )
                ),
                'arrows' => array(
                    'type'    => 'bool',
                    'default' => 'yes',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ARROWS'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ARROWS_DESC'),
                    'child'  => array(                        
                        'pagination' => array(
                            'type'    => 'bool',
                            'default' => 'no',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PAGINATION'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PAGINATION_DESC')
                        )
                    )
                ),
                'autoplay' => array(
                    'type'    => 'bool',
                    'default' => 'no',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_AUTOPLAY'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_AUTOPLAY_DESC'),
                    'child'  => array(                        
                        'hoverpause' => array(
                            'type'    => 'bool',
                            'default' => 'no',
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
                            'default' => 'yes',
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
