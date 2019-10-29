<?php
/**
* @subpackage Shortcode Ultimate
* @author BdThemes https://www.bdthemes.com
* @copyright Copyright (c) 2012 - 2016 BdThemes
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

if (class_exists('Su_Shortcode_tabs')) {
    SpAddonsConfig::addonConfig(
    	array(
            'type'       => 'wrap',
            'category'   => 'Shortcode Ultimate',
            'addon_name' => 'su_tabs',
            'title'      => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TABS'),
            'desc'       => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TABS_DESC'),
            'icon'       => JURI::root().'plugins/sppagebuilder/shortcode_ultimate/addons/su_tabs/element.svg',

    		'attr'=>array(
                'general' => array(
                    'active' => array(
                        'type'  => 'number',
                        'std'   => 1,
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ACTIVE_TAB'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ACTIVE_TAB_DESC')
                    ),
                    'align' => array(
                        'type'   => 'select',
                        'std'    => 'left',
                        'title'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ALIGN'),
                        'desc'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ALIGN_DESC'),
                        'values' => array(
                            'left'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LEFT'),
                            'center'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TAB_CENTER'),
                            'right'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RIGHT'),
                        ),
                    ),
                    'vertical' => array(
                        'type'  => 'checkbox',
                        'std'   => '0',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_VERTICAL'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_VERTICAL_DESC')
                    ),
                    'class' => array(
                        'type'  => 'text',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLASS'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLASS_DESC')
                    )
                ),
                'tab' => array(
                    'tab_item' => array(
                        'attr' => array(
                            'title' => array(
                                'type'  => 'text',
                                'std'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DEFAULT'),
                                'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE'),
                                'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE_DESC')
                            ),
                            'disabled' => array(
                                'type'  => 'checkbox',
                                'std'   => '0',
                                'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DISABLE'),
                                'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DISABLE_DESC')
                            ),
                            'icon' => array(
                                'type'  => 'icon',
                                'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON'),
                                'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_DESC')
                            ),
                            'anchor' => array(
                                'type'  => 'text',
                                'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ANCHOR'),
                                'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ANCHOR_DESC')
                            ),
                            'url' => array(
                                'type'  => 'text',
                                'title' => JText::_('URL'),
                                'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TAB_URL_DESC'),
                            ),
                            'target' => array(
                                'type'   => 'select',
                                'std'    => 'blank',
                                'title'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TARGET'),
                                'desc'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TARGET_DESC'),
                                'values' => array(
                                    'self'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SELF'),
                                    'blank' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BLANK')
                                ),
                            ),
                            'content' =>array(
                                'type'  =>'editor',
                                'title' => 'Content',
                                'std'   =>'Tab content'
                            ),
                        ),
                    ),
                ),
    			'style' => array(
                    'style' => array(
                        'type'   => 'select',
                        'std'    => 'default',
                        'title'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE'),
                        'desc'   => sprintf( '%s.', JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE_DESC') ),
                        'values' => array(
                            'default'       => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DEFAULT'),
                            '1'             => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE1'),
                            '2'             => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE2'),
                            '3'             => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE3'),
                            'carbon'        => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CARBON'),
                            'sharp'         => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHARP'),
                            'grid'          => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_GRID'),
                            'wood'          => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_WOOD'),
                            'fabric'        => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FABRIC'),
                            'modern-dark'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MODERN_DARK'),
                            'modern-light'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MODERN_LIGHT'),
                            'modern-violet' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MODERN_VIOLET'),
                            'modern-orange' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MODERN_ORANGE'),
                            'flat-dark'     => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FLAT_DARK'),
                            'flat-light'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FLAT_LIGHT'),
                            'flat-blue'     => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FLAT_BLUE'),
                            'flat-green'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FLAT_GREEN')
                        ),
                    ),
                ),
    		),
    	)
    );
}