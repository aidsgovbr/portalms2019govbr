<?php 

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_counter_config extends Su_Data {

    function __construct() {
      parent::__construct();
    }
    static function get_config() {

        return array(
            'name'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_COUNTER'),
            'type'  => 'wrap',
            'group' => 'box',
            'atts'  => array(
                'count_start' => array(
                    'type'    => 'number',
                    'min'     => 0,
                    'max'     => 9999999,
                    'step'    => 10,
                    'default' => 0,
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_COUNT_START'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_COUNT_START_DESC'),
                    'child'   => array(
                        'count_end' => array(
                            'type'    => 'number',
                            'min'     => 1,
                            'max'     => 9999999,
                            'step'    => 10,
                            'default' => 5000,
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_COUNT_END'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_COUNT_END_DESC')
                        ),
                        'counter_speed' => array(
                            'type'    => 'number',
                            'min'     => 1,
                            'max'     => 100,
                            'step'    => 1,
                            'default' => 5,
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_COUNTER_SPEED'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_COUNTER_SPEED_DESC')
                        )
                    )
                ),   
                'separator' => array(
                    'type'    => 'bool',
                    'default' => 'no',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SEPARATOR'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SEPARATOR_DESC')
                ),
                'prefix' => array(
                    'default' => '',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PREFIX'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PREFIX_DESC'),
                    'child'   => array(
                        'suffix' => array(
                            'default' => '',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SUFFIX'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SUFFIX_DESC')
                        )
                    )
                ),
                'align' => array(
                    'type'    => 'select',
                    'default' => 'top',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ALIGN'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ALIGN_DESC'),
                    'values'  => array(
                        'top'     => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TOP'),
                        'left'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LEFT'),
                        'right'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RIGHT')
                    )
                ),
                'icon' => array(
                    'type'    => 'icon',
                    'default' => '',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_DESC'),
                    'child'   => array(
                        'icon_color' => array(
                            'type'    => 'color',
                            'values'  => array( ),
                            'default' => '#444',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_COLOR'), 
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_COLOR_DESC')
                        )
                    )
                ),
                'count_color' => array(
                    'type'    => 'color',
                    'default' => '#444444',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_COUNT_COLOR'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_COUNT_COLOR_DESC'),
                    'child'   => array(
                        'count_size' => array(
                            'default' => '32px',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_COUNT_SIZE'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_COUNT_SIZE_DESC')
                        )
                    )
                ),
                'text_color' => array(
                    'type'    => 'color',
                    'default' => '#666666',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TEXT_COLOR'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TEXT_COLOR_DESC'),
                    'child'   => array(
                        'text_size' => array(
                            'default' => '14px',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_COUNTER_TEXT_SIZE'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_COUNTER_TEXT_SIZE_DESC')
                        )     
                    )
                ),
                'background' => array(
                    'type'    => 'color',
                    'default' => '#FFFFFF',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BACKGROUND'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BACKGROUND_DESC'),
                    'child'   => array(
                        'padding' => array(
                            'default' => '20px',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PADDING'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PADDING_DESC')
                        ),
                    )
                ),
                'border' => array(
                    'type'    => 'border',
                    'default' => '0px solid #DDD',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BORDER'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BORDER_DESC')
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
            ),
            'content' => 'counter content',
            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_COUNTER_DESC'),
            'icon'    => 'sort-numeric-asc'
        );
    }

}
