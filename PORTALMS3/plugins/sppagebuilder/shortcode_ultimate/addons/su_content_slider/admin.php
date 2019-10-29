<?php
/**
* @subpackage Shortcode Ultimate
* @author BdThemes https://www.bdthemes.com
* @copyright Copyright (c) 2012 - 2016 BdThemes
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

if (class_exists('Su_Shortcode_content_slider')) {
    SpAddonsConfig::addonConfig(
    	array(
            'type'       => 'wrap',
            'category'   => 'Shortcode Ultimate',
            'addon_name' => 'su_content_slider',
            'title'      => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CONTENT_SLIDER'),
            'desc'       => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CONTENT_SLIDER_DESC'),
            'icon'       => JURI::root().'plugins/sppagebuilder/shortcode_ultimate/addons/su_content_slider/element.svg',

    		'attr'=>array(
                'general' => array(                
                    'arrows' => array(
                        'type'  => 'checkbox',
                        'std'   => '1',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ARROWS'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ARROWS_DESC'),
                    ),
                    'arrow_position' => array(
                        'type'   => 'select',
                        'std'    => 'arrow-default',
                        'title'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ARROW_POSITION'),
                        'desc'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ARROW_POSITION_DESC'),
                        'values' => array(
                            'arrow-default'      => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DEFAULT'),
                            'arrow-top-left'     => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TOP_LEFT'),
                            'arrow-top-right'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TOP_RIGHT'),
                            'arrow-bottom-left'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BOTTOM_LEFT'),
                            'arrow-bottom-right' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BOTTOM_RIGHT')
                        ),
                    ),
                    'pagination' => array(
                        'type'  => 'checkbox',
                        'std'   => '0',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PAGINATION'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PAGINATION_DESC'),
                    ),
                    'autoplay' => array(
                        'type'  => 'checkbox',
                        'std'   => '1',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_AUTOPLAY'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_AUTOPLAY_DESC')
                    ),
                    'autoheight' => array(
                        'type'  => 'checkbox',
                        'std'   => '0',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_AUTOHEIGHT'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_AUTOHEIGHT_DESC')
                    ),
                    'hoverpause' => array(
                        'type'  => 'checkbox',
                        'std'   => '1',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_HOVERPAUSE'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_HOVERPAUSE_DESC'),
                    ),
                    'lazyload' => array(
                        'type'  => 'checkbox',
                        'std'   => '0',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LAZYLOAD'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LAZYLOAD_DESC')
                    ),
                    'loop' => array(
                        'type'  => 'checkbox',
                        'std'   => '1',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LOOP'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LOOP_DESC')
                    ),
                    'speed' => array(
                        'type'  => 'number',
                        'std'   => 600,
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SPEED'), 
                        'desc'  => 'Specify time (in milliseconds) that will be taken to complete animation effect',
                    ),
                    'delay' => array(
                        'type'  => 'number',
                        'std'   => 4000,
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DELAY'), 
                        'desc'  => 'After mentioned time (in milliseconds) animation will start'
                    ),
                    'class' => array(
                        'type'  => 'text',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLASS'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLASS_DESC')
                    )
                ),
                'slide' => array(
                    'slide_item' => array(
                        'attr' => array(
                            'content' =>array(
                                'type'  =>'editor',
                                'title' => 'Content',
                                'std'   =>'Slide content'
                            ),
                        ),
                    ),
                ),
    			'style' => array(
                    'style' => array(
                        'type'   => 'select',
                        'std'    => 'default',
                        'title'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE'),
                        'desc'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE_DESC'),
                        'values' => array(
                            'default' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DEFAULT'),
                            'dark'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DARK'),
                            'light'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LIGHT')
                        )
                    ),
                    'transitionin' => array(
                        'type'   => 'select',
                        'values' => array_combine( Su_Data::animations_in(), Su_Data::animations_in() ),
                        'std'    => 'fadeIn',
                        'title'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TRANSITION_IN'),
                        'desc'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TRANSITION_IN_DESC'),
                    ),
                    'transitionout' => array(
                        'type'   => 'select',
                        'values' => array_combine( Su_Data::animations_out(), Su_Data::animations_out() ),
                        'std'    => 'fadeOut',
                        'title'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TRANSITION_OUT'),
                        'desc'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TRANSITION_OUT_DESC')
                    ),
                    'margin' => array(
                        'type'  => 'number',
                        'std'   => 10,
                        'title' => 'Slide Margin',
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CAROUSEL_MARGIN_DESC')
                    ),
                ),
    		),
    	)
    );
}