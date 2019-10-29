<?php 

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_news_ticker_config extends Su_Data {

    function __construct() {
        parent::__construct();
    }
    static function get_config() {

        return array(
            'name'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_NEWS_TICKER'),
            'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_NEWS_TICKER_DESC'),
            'icon'  => 'file-text-o',
            'type'  => 'single',
            'group' => 'gallery',
            'badge' => 'NEW',
            'atts'  => array(
                // 'style' => array(
                //     'type'       => 'select',
                //     'values'     => array(
                //         '1'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE1'),
                //         '2' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE2'),
                //         '3'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE3')
                //     ),
                //     'default' => '1',
                //     'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE'), 
                //     'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE_DESC')
                // ),
                'source' => array(
                    'type'    => 'article_source',
                    'default' => 'none',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SOURCE'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SOURCE_DESC'),
                    'child'   => array(
                        'limit' => array(
                            'type'    => 'slider',
                            'min'     => 5,
                            'max'     => 100,
                            'step'    => 1,
                            'default' => 12,
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LIMIT'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LIMIT_DESC')
                        )
                    )
                ),
                'show_label' => array(
                    'type'    => 'bool',
                    'default' => 'yes',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_NT_SHOW_LABEL'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_NT_SHOW_LABEL_DESC'),
                    'child'   => array(
                        'label' => array(
                            'default' => 'LATEST NEWS',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_NT_LABEL'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_NT_LABEL_DESC')
                        )
                    )
                ),
                // 'color' => array(
                //     'type'    => 'color',
                //     'values'  => array( ),
                //     'default' => '#FFFFFF',
                //     'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_COLOR'),
                //     'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_COLOR_DESC'),
                //     'child' => array(
                //         'background' => array(
                //             'type'    => 'color',
                //             'values'  => array( ),
                //             'default' => '#2D89EF',
                //             'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BACKGROUND'), 
                //             'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BACKGROUND_DESC')
                //         ),
                //         'title_color' => array(
                //             'type'    => 'color',
                //             'values'  => array( ),
                //             'default' => '#2D89EF',
                //             'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE_COLOR'), 
                //             'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE_COLOR_DESC')
                //         )
                //     )
                // ),
                'navigation' => array(
                    'type'    => 'bool',
                    'default' => 'yes',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_NAVIGATION'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_NAVIGATION_DESC')
                ),
                'intro_text' => array(
                    'type'    => 'bool',
                    'default' => 'yes',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_INTRO_TEXT'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_INTRO_TEXT_DESC'),
                    'child'  => array(                        
                        'intro_text_limit' => array(
                            'default' => '60',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TEXT_LIMIT'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TEXT_LIMIT_DESC')
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
                'transition' => array(
                    'type'       => 'select',
                    'values'     => array(
                        'fade'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FADE'),
                        'slide-h' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SLIDEH'),
                        'slide-v'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SLIDEV')
                    ),
                    'default' => 'fade',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_NT_TRANSITION'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_NT_TRANSITION_DESC')
                ),
                'autoplay' => array(
                    'type'    => 'bool',
                    'default' => 'yes',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_AUTOPLAY'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_AUTOPLAY_DESC'),
                    'child'   => array(
                        'delay' => array(
                            'type'    => 'slider',
                            'min'     => 1,
                            'max'     => 10,
                            'step'    => 1,
                            'default' => 4,
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DELAY'), 
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DELAY_DESC')
                        )
                    )
                ),
                'target' => array(
                    'type'   => 'select',
                    'values' => array(
                        'self'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SELF'),
                        'blank'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BLANK')
                    ),                    
                    'default' => 'self',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TARGET'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TARGET_DESC')
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
