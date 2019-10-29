<?php 

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_progress_bar_config extends Su_Data {

    function __construct() {
        parent::__construct();
    }
    static function get_config() {

        return array(
            'name'     => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PROGRESS_BAR'),
            'desc'     => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PROGRESS_BAR_DESC'),
            'type'     => 'single',
            'group'    => 'extra other',
            'icon'     => 'tasks',
            'atts'     => array(
                'style' => array(
                    'type'   => 'select',
                    'values' => array(
                        '1' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DEFAULT'),
                        '2'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FANCY'),
                        '3'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_THIN'),
                        '4' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STRIPED'),
                        '5' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ANIMATE')
                    ),
                    'default' => '1',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE_DESC')
                ),
                'percent' => array(
                    'type'    => 'slider',
                    'min'     => 0,
                    'max'     => 100,
                    'step'    => 1,
                    'default' => 75,
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PERCENT'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PERCENT_DESC'),
                    'child'   => array(
                        'show_percent' => array(
                            'type'    => 'bool',
                            'default' => 'yes',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHOW_PERCENT'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHOW_PERCENT_DESC')
                        )
                    )
                ),
                'text' => array(
                    'default' => '',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TEXT'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TEXT_DESC')
                ),
                'text_color' => array(
                    'type'    => 'color',
                    'default' => '#FFFFFF',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TEXT_COLOR'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TEXT_COLOR_DESC'),
                    'child'   => array(
                    	'bar_color' => array(
                    	    'type'    => 'color',
                    	    'default' => '#f0f0f0',
                    	    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BAR_COLOR'),
                    	    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BAR_COLOR_DESC')
                    	),
                    	'fill_color' => array(
                    	    'type'    => 'color',
                    	    'default' => '#4fc1e9',
                    	    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FILL_COLOR'),
                    	    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FILL_COLOR_DESC')
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
                            'default' => 1.5,
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
