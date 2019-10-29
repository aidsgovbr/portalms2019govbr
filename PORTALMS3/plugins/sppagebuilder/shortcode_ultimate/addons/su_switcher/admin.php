<?php
/**
* @subpackage Shortcode Ultimate
* @author BdThemes https://www.bdthemes.com
* @copyright Copyright (c) 2012 - 2016 BdThemes
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

if (class_exists('Su_Shortcode_switcher')) {
    SpAddonsConfig::addonConfig(
        array(
            'type'       => 'wrap',
            'category'   => 'Shortcode Ultimate',
            'addon_name' => 'su_switcher',
            'title'      => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SWITCHER'),
            'desc'       => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SWITCHER_DESC'),
            'icon'       => JURI::root().'plugins/sppagebuilder/shortcode_ultimate/addons/su_switcher/element.svg',

            'attr'=>array(
                'general' => array(
                    'position' => array(
                        'type'   => 'select',
                        'std'    => 'top',
                        'title'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_POSITION'),
                        'desc'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_POSITION_DESC'),
                        'values' => array(
                            'top'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TOP'),
                            'right'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RIGHT'),
                            'bottom' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BOTTOM'),
                            'left'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LEFT')
                        ),
                    ),
                    'align' => array(
                        'type'   => 'select',
                        'std'    => 'center',
                        'title'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ALIGN'),
                        'desc'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ALIGN_DESC'),
                        'values' => array(
                            'left'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LEFT'),
                            'center' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CENTER'),
                            'right'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RIGHT')
                        ),
                    ),
                    'active' => array(
                        'type'  => 'number',
                        'std'   => 1,
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ACTIVE_SWITCHER_ITEM'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ACTIVE_SWITCHER_ITEM_DESC')
                    ),
                    'class' => array(
                        'type'  => 'text',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLASS'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLASS_DESC')
                    )
                ),
                'item' => array(
                    'switcher_item' => array(
                        'attr' => array(
                            'title' => array(
                                'type'  => 'text',
                                'std'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DEFAULT'),
                                'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE'),
                                'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE_DESC')
                            ),
                            'icon' => array(
                                'type'  => 'icon',
                                'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON'),
                                'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_DESC')
                            ),
                            'content' =>array(
                                'type'  =>'editor',
                                'title' => 'Content',
                                'std'   =>'Switcher item content'
                            ),
                        ),
                    ),
                ),
                'style' => array(
                    'style' => array(
                        'type'   => 'select',
                        'std'    => 1,
                        'title'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE'),
                        'desc'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE_DESC'),
                        'values' => array(
                            1 => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE1'),
                            2 => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE2'),
                            3 => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE3'),
                            4 => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE4'),
                            5 => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE5')
                        ),
                    ),
                    'animation' => array(
                        'type'   => 'select',
                        'std'    => 'rotateSides',
                        'title'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ANIMATION'), 
                        'desc'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ANIMATION_DESC'),
                        'values' => array(
                            'fadeOut'      => 'Fade Out',
                            'quicksand'    => 'Quicksand',
                            'boxShadow'    => 'Box Shadow',
                            'bounceLeft'   => 'Bounce Left',
                            'bounceTop'    => 'Bounce Top',
                            'bounceBottom' => 'Bounce Bottom',
                            'moveLeft'     => 'Move Left',
                            'slideLeft'    => 'Slide Left',
                            'fadeOutTop'   => 'Fade Out Top',
                            'sequentially' => 'Sequentially',
                            'skew'         => 'Skew',
                            'slideDelay'   => 'Slide Delay',
                            '3dflip'       => '3d Flip',
                            'rotateSides'  => 'Rotate Sides',
                            'flipOutDelay' => 'Flip Out Delay',
                            'flipOut'      => 'Flip Out',
                            'unfold'       => 'Unfold',
                            'foldLeft'     => 'Fold Left',
                            'scaleDown'    => 'Scale Down',
                            'scaleSides'   => 'Scale Sides',
                            'frontRow'     => 'Front Row',
                            'flipBottom'   => 'Flip Bottom',
                            'rotateRoom'   => 'Rotate Room'
                        ),
                    ),
                ),
            ),
        )
    );
}