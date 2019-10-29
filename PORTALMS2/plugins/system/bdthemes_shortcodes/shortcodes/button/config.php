<?php 

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_button_config extends Su_Data {

    function __construct() {
      parent::__construct();
    }

    static function get_config() {

        return array(
            'name'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BUTTON'),
            'type'  => 'wrap',
            'group' => 'content',
            'content' => 'Button text',
            'desc' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BUTTON_DESC'),
            'icon' => 'heart',
            'atts' => array(
                'style' => array(
                    'type' => 'select',
                    'values' => array(
                        'default' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DEFAULT'),
                        'soft'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SOFT'),
                        'glass'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_GLASS'),
                        'bubbles' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BUBBLES'),
                        'noise'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_NOISE'),
                        'stroked' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STROKED'),
                        'border' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BORDER'),
                        '3d'      => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_3D')
                    ),
                    'default' => 'default',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE'), 
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE_DESC')
                ),
                'url' => array(
                    'values'  => array( ),
                    'default' => '#',
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
                        'background_hover' => array(
                            'type'    => 'color',
                            'values'  => array( ),
                            'default' => '#2D89EF',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_HOVER_BACKGROUND'), 
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_HOVER_BACKGROUND_DESC')
                        )
                    )
                ),
                'size' => array(
                    'type'    => 'slider',
                    'min'     => 1,
                    'max'     => 20,
                    'step'    => 1,
                    'default' => 3,
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SIZE'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SIZE_DESC')
                ),
                'wide' => array(
                    'type'    => 'bool',
                    'default' => 'no',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_WIDE'), 
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_WIDE_DESC'),
                    'child'   => array(
                        'center' => array(
                            'type'    => 'bool',
                            'default' => 'no',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CENTER'), 
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CENTER_DESC')
                        )
                    )
                ),
                'radius' => array(
                    'default' => '3px',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RADIUS'), 
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RADIUS_DESC')
                ),
                'icon' => array(
                    'type'    => 'icon',
                    'default' => '',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_DESC'),
                    'child'   => array(
                        'icon_color' => array(
                            'type'    => 'color',
                            'default' => '#FFFFFF',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_COLOR'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_COLOR_DESC')
                        )
                    )
                ),
                'desc' => array(
                    'default' => '',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DESCRIPTION'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DESCRIPTION_DESC'),
                    'child'   => array(
                        'onclick' => array(
                            'default' => '',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ONCLICK'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ONCLICK_DESC')
                        )
                   )
                ),
                'padding' => array(
                    'default' => '',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PADDING'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PADDING_DESC'),
                     'child'   => array(
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
            )
        );
    }

}
