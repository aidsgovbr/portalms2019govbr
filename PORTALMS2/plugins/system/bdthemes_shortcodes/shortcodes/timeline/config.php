<?php

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_timeline_config extends Su_Data {

    function __construct() {
        parent::__construct();
    }

    static function get_config() {

        return array(
            'name'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TIMELINE'),
            'desc' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TIMELINE_DESC'),
            'icon' => 'sort-amount-desc',
            'type'  => 'single',
            'group' => 'gallery',
            'atts'  => array(
                'source' => array(
                    'type'    => 'article_source',
                    'default' => 'none',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SOURCE'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TIMELINE_SOURCE_DESC')
                ),
                'limit' => array(
                    'type'    => 'slider',
                    'min'     => -1,
                    'max'     => 100,
                    'step'    => 1,
                    'default' => 20,
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ITEM_LIMIT'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TIMELINE_LIMIT_DESC')
                ),
                'order' => array(
                    'type'     => 'select',
                    'values'   => array(
                        ''         => 'Default',
                        'title'    => 'Title',
                        'created'  => 'Created Date',
                        'hits'     => 'Hits',
                        'ordering' => 'Ordering'
                    ),
                   'default' => 'created',
                   'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ORDER'),
                   'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ORDER_DESCR'),
                   'child'      => array(
                        'order_by' => array(
                            'type'   => 'select',
                            'values' => array(
                                'asc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ASC'),
                                'desc' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DESC')
                            ),
                            'default' => 'desc',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ORDER_TYPE'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ORDER_TYPE_DESC')
                        )
                   )
                ),
                'image' => array(
                    'type'    => 'bool',
                    'default' => 'yes',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_IMAGE'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TIMELINE_IMAGE_DESC'),
                    'child'     => array(
                        'highlight_year' => array(
                            'type'    => 'bool',
                            'default' => 'yes',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_HIGHTLIGHT_YEAR'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_HIGHTLIGHT_YEAR_DESC')
                        ),
                        'read_more' => array(
                            'type'    => 'bool',
                            'default' => 'yes',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_READMORE'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_READMORE_DESC')
                        )
                    )
                ),
                'intro_text' => array(
                    'type'    => 'bool',
                    'default' => 'yes',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_INTRO_TEXT'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_INTRO_TEXT_DESC'),
                    'child'     => array(
                        'date' => array(
                            'type'    => 'bool',
                            'default' => 'yes',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DATE'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DATE_DESC')    
                        ),
                        'time' => array(
                            'type'    => 'bool',
                            'default' => 'yes',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TIME'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TIME_DESC')    
                        )
                    )
                ),
                'title' => array(
                    'type'    => 'bool',
                    'default' => 'yes',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE_DESC'),
                    'child'     => array(
                        'link_title' => array(
                            'type'    => 'bool',
                            'default' => 'yes',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LINK_TITLE'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LINK_TITLE_DESC')
                        )
                    )
                ),              
                'before_text' => array(
                    'default' => '',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BEFORE_TEXT'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BEFORE_TEXT_DESC'),
                    'child'     => array(
                        'after_text' => array(
                            'default' => '',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_AFTER_TEXT'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_AFTER_TEXT_DESC')
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
