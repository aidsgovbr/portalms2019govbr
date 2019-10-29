<?php
/**
* @subpackage Shortcode Ultimate
* @author BdThemes https://www.bdthemes.com
* @copyright Copyright (c) 2012 - 2016 BdThemes
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

if (class_exists('Su_Shortcode_accordion')) {
    SpAddonsConfig::addonConfig(
    	array(
            'type'       => 'wrap',
            'category'   => 'Shortcode Ultimate',
            'addon_name' => 'su_accordion',
            'title'      => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ACCORDION'),
            'desc'       => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ACCORDION_DESC'),
            'icon'       => JURI::root().'plugins/sppagebuilder/shortcode_ultimate/addons/su_accordion/element.svg',

    		'attr'=>array(
                'general' => array(
                    'items' => array(
                        'attr' => array(
                            'title' => array(
                                'type'  => 'text',
                                'std'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SPOILER_TITLE_DEFAULT'),
                                'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE'), 
                                'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE_DESC')
                            ),
                            'open' => array(
                                'type'  => 'checkbox',
                                'std'   => '0',
                                'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_OPEN'),
                                'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_OPEN_DESC')
                            ),
                            'icon' => array(
                                'type'   => 'select',
                                'std'    => 'plus',
                                'title'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON'),
                                'desc'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_TYPE_DESC'),
                                'values' => array(
                                    'none'           => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_NO_ICON'),
                                    'plus'           => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PLUS'),
                                    'plus-circle'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PLUS_CIRCLE'),
                                    'plus-square-1'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PLUS_SQUARE_1'),
                                    'plus-square-2'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PLUS_SQUARE_2'),
                                    'arrow'          => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ARROW'),
                                    'arrow-circle-1' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ARROW_CIRCLE_1'),
                                    'arrow-circle-2' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ARROW_CIRCLE_2'),
                                    'chevron'        => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CHEVRON'),
                                    'chevron-circle' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CHEVRON_CIRCLE'),
                                    'caret'          => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CARET'),
                                    'caret-square'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CARET_SQUARE'),
                                    'folder-1'       => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FOLDER_1'),
                                    'folder-2'       => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FOLDER_2')
                                ),
                            ),
                            'anchor' => array(
                                'type'  => 'text',
                                'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ANCHOR'),
                                'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ANCHOR_DESC')
                            ),
                            'style' => array(
                                'type'   => 'select',
                                'std'    => 'default',
                                'title'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE'),
                                'desc'   => sprintf( '%s.', JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE_DESC')),
                                'values' => array(
                                    'default'       => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DEFAULT'),
                                    '1'             => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE1'),
                                    '2'             => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE2'),
                                    '3'             => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE3'),
                                    '4'             => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE4'),
                                    '5'             => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE5'),
                                    'fancy'         => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FANCY'),
                                    'simple'        => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SIMPLE'),
                                    'carbon'        => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CARBON'),
                                    'sharp'         => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHARP'),
                                    'grid'          => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_GRID'),
                                    'wood'          => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_WOOD'),
                                    'fabric'        => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FABRIC'),
                                    'modern-dark'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MODERN_DARK'),
                                    'modern-light'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MODERN_LIGHT'),
                                    'modern-violet' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MODERN_VIOLET'),
                                    'modern-orange' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MODERN_ORANGE'),
                                    'glass-dark'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_GLASS_DARK'),
                                    'glass-light'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_GLASS_LIGHT'),
                                    'glass-blue'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_GLASS_BLUE'),
                                    'glass-green'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_GLASS_GREEN'),
                                    'glass-gold'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_GLASS_GOLD')
                                ),
                            ),
                            'align' => array(
                                'type'   => 'select',
                                'std'    => 'left',
                                'title'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ALIGN'),
                                'desc'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ALIGN_DESC'),
                                'values' => array(
                                    'left'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LEFT'),
                                    'right' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RIGHT')
                                ),
                            ),
                            'content' => array(
                                'type'  => 'editor',
                                'std'   => 'Spoiler content',
                                'title' => 'Content',
                            ),
                        ),
                    ),
                    'class' => array(
                        'type'  => 'text',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLASS'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLASS_DESC')
                    )
                ),
    		),
    	)
    );
}