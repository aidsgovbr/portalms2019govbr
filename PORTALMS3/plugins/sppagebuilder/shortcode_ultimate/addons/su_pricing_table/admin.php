<?php
/**
* @subpackage Shortcode Ultimate
* @author BdThemes https://www.bdthemes.com
* @copyright Copyright (c) 2012 - 2016 BdThemes
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

if (class_exists('Su_Shortcode_pricing_table')) {
    SpAddonsConfig::addonConfig(
    	array(
            'type'       => 'wrap',
            'category'   => 'Shortcode Ultimate',
            'addon_name' => 'su_pricing_table',
            'title'      => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PRICING_TABLE'),
            'desc'       => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PRICING_TABLE_DESC'),
            'icon'       => JURI::root().'plugins/sppagebuilder/shortcode_ultimate/addons/su_pricing_table/element.svg',

    		'attr'=>array(
                'general' => array(
                    'style' => array(
                        'type'   => 'select',
                        'std'    => 1,
                        'title'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE'),
                        'desc'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE_DESC'),
                        'values' => array(
                            '1' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE1'),
                            '2' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE2'),
                            '3' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE3'),
                            '4' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE4')
                        ),
                    ),
                    'class' => array(
                        'type'  => 'text',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLASS'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLASS_DESC')
                    )
                ),
                'plan' => array(
                    'pricing_plan' => array(
                        'attr' => array(
                            'name' => array(
                                'type'  => 'text',
                                'std'   => 'Standard',
                                'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_NAME'),
                                'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_NAME_DESC')
                            ),
                            'price' => array(
                                'type'  => 'text',
                                'std'   => '19.99',
                                'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PRICE'),
                                'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PRICE_DESC'),
                            ),
                            'old_price' => array(
                                'type'  => 'text',
                                'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_OLD_PRICE'),
                                'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_OLD_PRICE_DESC')
                            ),
                            'before' => array(
                                'type'  => 'text',
                                'std'   => '$',
                                'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BEFORE_PRICE'),
                                'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BEFORE_PRICE_DESC')
                            ),
                            'after' => array(
                                'type'  => 'text',
                                'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_AFTER_PRICE'),
                                'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_AFTER_PRICE_DESC')
                            ),
                            'period' => array(
                                'type'  => 'text',
                                'std'   => 'per month',
                                'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PERIOD'),
                                'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PERIOD_DESC')
                            ),
                            'featured' => array(
                                'type'  => 'checkbox',
                                'std'   => '0',
                                'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FEATURED'),
                                'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FEATURED_DESC')
                            ),
                            'icon' => array(
                                'type'  => 'icon',
                                'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON'),
                                'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_DESC'),
                            ),
                            'icon_color' => array(
                                'type'  => 'color',
                                'std'   => '#333333',
                                'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_COLOR'),
                                'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_COLOR_DESC')
                            ),
                            'btn_url' => array(
                                'type'  => 'text',
                                'std'   => '#',
                                'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BUTTON_URL'),
                                'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_URL_DESC'),
                            ),
                            'btn_target' => array(
                                'type'   => 'select',
                                'std'    => 'self',
                                'title'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BUTTON_TARGET'),
                                'desc'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TARGET_DESC'),
                                'values' => array(
                                    'self'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SELF'),
                                    'blank' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BLANK')
                                )
                            ),
                            'btn_text' => array(
                                'type'  => 'text',
                                'std'   => 'Sign up now',
                                'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BUTTON_TEXT'),
                                'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BUTTON_TEXT_DESC')
                            ),
                            'btn_color' => array(
                                'type'  => 'color',
                                'std'   => '#ffffff',
                                'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BUTTON_COLOR'),
                                'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_COLOR_DESC'),
                            ),
                            'btn_background' => array(
                                'type'  => 'color',
                                'std'   => '#4FC1E9',
                                'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BUTTON_BACKGROUND'),
                                'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BACKGROUND_DESC')
                            ),
                            'btn_background_hover' => array(
                                'type'  => 'color',
                                'std'   => '#1AA0D1',
                                'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BUTTON_HOVER_BACKGROUND'),
                                'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BUTTON_HOVER_BACKGROUND_DESC')
                            ),
                            'badge' => array(
                                'type'  => 'text',
                                'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BADGE'),
                                'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BADGE_DESC'),
                            ),
                            'badge_background' => array(
                                'type'  => 'color',
                                'std'   => '#999999',
                                'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BADGE_BACKGROUND'),
                                'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BADGE_BACKGROUND_DESC')
                            ),
                            'color' => array(
                                'type'  => 'color',
                                'std'   => '#444444',
                                'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TEXT_COLOR'),
                                'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TEXT_COLOR_DESC'),
                            ),
                            'background' => array(
                                'type'  => 'color',
                                'std'   => '#FFFFFF',
                                'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PLAN_BACKGROUND'),
                                'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PLAN_BACKGROUND_DESC')
                            ),
                            'content' =>array(
                                'type'  =>'editor',
                                'title' => 'Content',
                                'std'   =>sprintf( "<ul>\n<li>%s</li>\n<li>%s</li>\n<li>%s</li>\n</ul>", 'Option 1', 'Option 2', 'Option 3' ),
                            ),
                        ),
                    ),
                ),
    		),
    	)
    );
}