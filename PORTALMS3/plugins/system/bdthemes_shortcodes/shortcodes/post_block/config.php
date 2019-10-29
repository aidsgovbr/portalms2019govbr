<?php 

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_post_block_config extends Su_Data {

    function __construct() {
        parent::__construct();
    }
    static function get_config() {

        return array(
            'name'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_POST_BLOCK'),
            'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_POST_BLOCK_DESC'),
            'icon'  => 'th-large',
            'badge'  => 'New',
            'type'  => 'single',
            'group' => 'gallery',
            'atts'  => array(
                'source' => array(
                    'type'    => 'article_source',
                    'default' => 'none',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SOURCE'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SOURCE_DESC'),
                    'child'   => array(
                        'limit' => array(
                            'type'    => 'slider',
                            'min'     => 1,
                            'max'     => 100,
                            'step'    => 1,
                            'default' => 12,
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LIMIT'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LIMIT_DESC')
                        ),
                    )
                ),
                'category' => array(
                    'type'    => 'bool',
                    'default' => 'yes',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CATEGORY_SHOW'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CATEGORY_SHOW_DESC'),
                    'child'   => array(
                        'date' => array(
                            'type'    => 'bool',
                            'default' => 'yes',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DATE'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DATE_DESC')                           
                        )
                    )
                ),
                'show_intro_text' => array(
                    'type'    => 'bool',
                    'default' => 'yes',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DESC_SHOW'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DESC_SHOW_DESC'),
                    'child'   => array(
                        'intro_text_limit' => array(
                            'type'    => 'slider',
                            'min'     => 10,
                            'max'     => 1000,
                            'step'    => 10,
                            'default' => 110,
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_INTRO_TEXT_LIMIT'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_INTRO_TEXT_LIMIT_DESC')
                        )
                    )
                ),
                'show_title' => array(
                    'type'    => 'bool',
                    'default' => 'yes',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE_SHOW'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE_SHOW_DESC'),
                    'child'   => array(
                        'show_meta' => array(
                            'type'    => 'bool',
                            'default' => 'yes',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_META_SHOW'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_META_SHOW_DESC'),
                        )
                    )
                ),
                'show_thumb' => array(
                    'type'    => 'bool',
                    'default' => 'yes',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_THUMB_SHOW'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_THUMB_SHOW_DESC'),
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
