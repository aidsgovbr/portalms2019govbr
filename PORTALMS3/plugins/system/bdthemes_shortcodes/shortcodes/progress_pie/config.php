<?php

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_progress_pie_config extends Su_Data {

    function __construct() {
        parent::__construct();
    }
    static function get_config() {

        return array(
            'name'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PROGRESS_PIE'),
            'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PROGRESS_PIE_DESC'),
            'type'  => 'single',
            'group' => 'extra other',
            'icon'  => 'pie-chart',
            'atts'     => array(
                'percent' => array(
                    'type'    => 'slider',
                    'min'     => 1,
                    'max'     => 100,
                    'step'    => 1,
                    'default' => 75,
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PROGRESS_PIE_PERCENT'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PROGRESS_PIE_PERCENT_DESC')
                ),
                'before' => array(
                    'default' => '',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PROGRESS_PIE_BEFORE'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PROGRESS_PIE_BEFORE_DESC'),
                    'child'   => array(
                        'text' => array(
                            'default' => '',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PROGRESS_PIE_TEXT'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PROGRESS_PIE_TEXT_DESC')
                        ),
                        'after' => array(
                            'default' => '',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PROGRESS_PIE_AFTER'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PROGRESS_PIE_AFTER_DESC')
                        ),
                        'text_size' => array(
                            'default' => 22,
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TEXT_SIZE'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TEXT_SIZE_DESC')
                        )
                    )
                ),
                'line_width' => array(
                    'type'    => 'slider',
                    'min'     => 1,
                    'max'     => 30,
                    'step'    => 1,
                    'default' => 10,
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PROGRESS_PIE_LINE_WIDTH'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PROGRESS_PIE_LINE_WIDTH_DESC'),
                    'child'   => array(
                        'line_cap' => array(
                            'type'   => 'select',
                            'values' => array(
                                'round'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PROGRESS_PIE_ROUND'),
                                'square' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PROGRESS_PIE_SQUARE'),
                                'butt'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PROGRESS_PIE_BUTT')
                            ),
                            'default' => 'round',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PROGRESS_PIE_LINE_CAP'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PROGRESS_PIE_LINE_CAP_DESC')
                        )
                    )
                ),
                'bar_color' => array(
                    'type'    => 'color',
                    'default' => '#F14B51',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PROGRESS_PIE_COLOR'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PROGRESS_PIE_COLOR_DESC'),
                    'child'     => array(
                        'fill_color' => array(
                            'type'    => 'color',
                            'default' => '#f5f5f5',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PROGRESS_PIE_FILL_COLOR'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PROGRESS_PIE_FILL_COLOR_DESC')
                        ),
                        'text_color' => array(
                            'type'    => 'color',
                            'default' => '#bbbbbb',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TEXT_COLOR'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TEXT_COLOR_DESC'),
                        )
                    )
                ),
                'animation' => array(
                    'type'    => 'select',
                    'values'  => array_combine(Su_Data::easings(), Su_Data::easings()),
                    'default' => 'easeInOutExpo',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ANIMATION'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ANIMATION_DESC'),
                    'child'   => array(
                        'duration' => array(
                            'type'    => 'slider',
                            'min'     => 0.5,
                            'max'     => 10,
                            'step'    => 0.5,
                            'default' => 2,
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DURATION'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DURATION_DESC')
                        ),
                        'delay' => array(
                            'type'    => 'slider',
                            'min'     => 0.1,
                            'max'     => 5,
                            'step'    => 0.2,
                            'default' => 0.3,
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DELAY'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DELAY_DESC')
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
