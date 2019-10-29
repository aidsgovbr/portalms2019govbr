<?php

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_switcher_config extends Su_Data {

    function __construct() {
        parent::__construct();
    }
    static function get_config() {
        
        return array(
            'name'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SWITCHER'),
            'type'  => 'wrap',
            'group' => 'box',
            'atts'  => array(
                'style' => array(
                    'type' => 'select',
                    'default' => 1,
                    'values' => array(
                        1 => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE1'),
                        2 => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE2'),
                        3 => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE3'),
                        4 => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE4'),
                        5 => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE5')
                    ),
                    'name' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE'),
                    'desc' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE_DESC')
                ),
                'position' => array(
                    'type'    => 'select',
                    'default' => 'top',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_POSITION'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_POSITION_DESC'),
                    'values'  => array(
                        'top'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TOP'),
                        'right'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RIGHT'),
                        'bottom' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BOTTOM'),
                        'left'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LEFT')
                    ),
                    'child'   => array(
                        'align' => array(
                            'type'    => 'select',
                            'default' => 'center',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ALIGN'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ALIGN_DESC'),
                            'values'  => array(
                                'left'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LEFT'),
                                'center' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CENTER'),
                                'right'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RIGHT')
                            ),
                        ),
                        'active' => array(
                            'type'    => 'number',
                            'min'     => 1,
                            'max'     => 10,
                            'step'    => 1,
                            'default' => 1,
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ACTIVE_SWITCHER_ITEM'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ACTIVE_SWITCHER_ITEM_DESC')
                        )    
                    )
                ),
                'animation' => array(
                    'type'       => 'select',
                    'values'     => array(
                        'fadeOut' => 'Fade Out',
                        'quicksand' => 'Quicksand',
                        'boxShadow' => 'Box Shadow',
                        'bounceLeft' => 'Bounce Left',
                        'bounceTop' => 'Bounce Top',
                        'bounceBottom' => 'Bounce Bottom',
                        'moveLeft' => 'Move Left',
                        'slideLeft' => 'Slide Left',
                        'fadeOutTop' => 'Fade Out Top',
                        'sequentially' => 'Sequentially',
                        'skew' => 'Skew',
                        'slideDelay' => 'Slide Delay',
                        '3dflip' => '3d Flip',
                        'rotateSides' => 'Rotate Sides',
                        'flipOutDelay' => 'Flip Out Delay',
                        'flipOut' => 'Flip Out',
                        'unfold' => 'Unfold',
                        'foldLeft' => 'Fold Left',
                        'scaleDown' => 'Scale Down',
                        'scaleSides' => 'Scale Sides',
                        'frontRow' => 'Front Row',
                        'flipBottom' => 'Flip Bottom',
                        'rotateRoom' => 'Rotate Room'
                    ),
                    'default' => 'rotateSides',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ANIMATION'), 
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ANIMATION_DESC')
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
            'content' => sprintf ('%s',"[%prefix_switcher_item title=\"Title 1\" icon=\"icon: star\"]Content 1[/%prefix_switcher_item]\n[%prefix_switcher_item title=\"Title 2\" icon=\"icon: star\"]Content 2[/%prefix_switcher_item]\n[%prefix_switcher_item title=\"Title 3\" icon=\"icon: star\"]Content 3[/%prefix_switcher_item]"),
            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SWITCHER_DESC'),
            'icon'    => 'list-alt'
        );
    }

}
