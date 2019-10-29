<?php 

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_livicon_config extends Su_Data {
    function __construct() {
        parent::__construct();
    }
    static function get_config() {

        return array(
            'name'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LIVICON'),
            'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LIVICON_DESC'),
            'type'  => 'single',
            'group' => 'extra content media',
            'icon'  => 'cog fa-spin',
            'atts'     => array(
                'icon' => array(
                    'type'    => 'select',
                    'values'  => array_combine(Su_Data::livicons(), Su_Data::livicons()),
                    'default' => 'heart',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_DESC'),
                    'child'   => array(
                        'size' => array(
                            'type'    => 'slider',
                            'default' => 32,
                            'min'     => '4',
                            'max'     => '256',
                            'step'    => '2',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_SIZE'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_SIZE_DESC')
                        )
                    )
                ),
                'background_color' => array(
                    'type'    => 'color',
                    'default' => '#eeeeee',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BACKGROUND'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BACKGROUND_DESC'),
                    'child'   => array(
                        'color' => array(
                            'type'    => 'color',
                            'default' => '#666666',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_COLOR'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_COLOR_DESC'),
                        ),
                        'hover_color' => array(
                            'type'    => 'color',
                            'default' => '#000000',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_HOVER_COLOR'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_HOVER_COLOR_DESC')
                        )
                    )
                ),
                'event_type' => array(
                    'type' => 'select',
                    'values' => array(
                        'hover' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_HOVER'),
                        'click' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLICK')
                    ),
                    'default' => 'hover',
                    'name' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_EVENT_TYPE'),
                    'desc' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_EVENT_TYPE_DESC')
                ),
                'animate' => array(
                    'type'    => 'bool',
                    'default' => 'yes',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ANIMATE'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ANIMATE_DESC'),
                    'child'   => array(
                        'loop' => array(
                            'type'    => 'bool',
                            'default' => 'no',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LOOP'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LOOP_DESC')
                        ),
                        'parent' => array(
                            'type'    => 'bool',
                            'default' => 'no',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PARENT'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PARENT_DESC')
                        )
                    )
                ),
                'duration' => array(
                    'type'    => 'slider',
                    'default' => 0.6,
                    'min'     => 0.2,
                    'max'     => 5,
                    'step'    => 0.2,
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DURATION'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DURATION_DESC'),
                    'child'   => array(
                        'iteration' => array(
                            'type'    => 'slider',
                            'default' => 1,
                            'min'     => 1,
                            'max'     => 5,
                            'step'    => 1,
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ITERATION'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ITERATION_DESC')
                        )
                    )
                ),
                'url' => array(
                    'default' => '',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_URL'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_URL_DESC'),
                    'child'  => array(
                        'target' => array(
                            'type'   => 'select',
                            'values' => array(
                                'self'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SELF'),
                                'blank'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BLANK')
                            ),                    
                            'default' => 'self',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TARGET'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TARGET_DESC')
                        )
                    )
                ),
                'border' => array(
                    'type'    => 'border',
                    'default' => '0px solid #444444',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BORDER'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BORDER_DESC')
                ),
                'radius' => array(
                    'default' => '3px',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RADIUS'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RADIUS_DESC'),
                    'child'   => array(
                        'padding' => array(
                            'default' => '15px',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PADDING'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PADDING_DESC')  
                        ),
                        'margin' => array(
                            'default' => '',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MARGIN'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MARGIN_DESC')
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
            ),
        );
    }
}
