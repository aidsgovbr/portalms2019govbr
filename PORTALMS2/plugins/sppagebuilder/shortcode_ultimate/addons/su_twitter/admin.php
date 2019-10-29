<?php
/**
* @subpackage Shortcode Ultimate
* @author BdThemes https://www.bdthemes.com
* @copyright Copyright (c) 2012 - 2016 BdThemes
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

if (class_exists('Su_Shortcode_twitter')) {
    SpAddonsConfig::addonConfig(
    	array(
            'type'       => 'single',
            'category'   => 'Shortcode Ultimate',
            'addon_name' => 'su_twitter',
            'title'      => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TWITTER'),
            'desc'       => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TWITTER_DESC'),
            'icon'       => JURI::root().'plugins/sppagebuilder/shortcode_ultimate/addons/su_twitter/element.svg',

    		'attr'=>array(
    			'general' => array(
                    'source' => array(
                        'type'   => 'select',
                        'std'    => 'arrow-default',
                        'title'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TWITTER_SOURCE'),
                        'desc'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TWITTER_SOURCE_DESC'),
                        'values' => array(
                            'user'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TWITTER_SU'),
                            'search' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TWITTER_SS')
                        ),
                    ),
                    'search' => array(
                        'type'  => 'text',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TWITTER_SK'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TWITTER_SK_DESC')
                    ),
                    'transitionin' => array(
                        'type'   => 'select',
                        'std'    => 'fadeIn',
                        'title'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TRANSITION_IN'),
                        'desc'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TRANSITION_IN_DESC'),
                        'values' => array_combine( Su_Data::animations_in(), Su_Data::animations_in() ),
                    ),
                    'transitionout' => array(
                        'type'   => 'select',
                        'std'    => 'fadeOut',
                        'title'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TRANSITION_OUT'),
                        'desc'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TRANSITION_OUT_DESC'),
                        'values' => array_combine( Su_Data::animations_out(), Su_Data::animations_out() ),
                    ),
                    'font_size' => array(
                        'type'  => 'text',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FONT_SIZE'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FONT_SIZE_DESC')
                    ),
                    'profile_image' => array(
                        'type'  => 'checkbox',
                        'std'   => '1',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TWITTER_PI'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TWITTER_PI_DESC'),
                    ),
                    'date' => array(
                        'type'  => 'checkbox',
                        'std'   => '1',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DATE'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DATE_DESC')
                    ),
                    'limit' => array(
                        'type'  => 'number',
                        'std'   => 5,
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LIMIT'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LIMIT_DESC')
                    ),
                    'arrows' => array(
                        'type'  => 'checkbox',
                        'std'   => '1',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ARROWS'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ARROWS_DESC'),
                    ),
                    'pagination' => array(
                        'type'  => 'checkbox',
                        'std'   => '0',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PAGINATION'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PAGINATION_DESC')
                    ),
                    'autoplay' => array(
                        'type'  => 'checkbox',
                        'std'   => '1',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_AUTOPLAY'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_AUTOPLAY_DESC')
                    ),
                    'speed' => array(
                        'type'  => 'number',
                        'std'   => 400,
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SPEED'), 
                        'desc'  => 'Specify time (in milliseconds) that will be taken to complete animation effect',
                    ),
                    'delay' => array(
                        'type'  => 'number',
                        'std'   => 4,
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DELAY'), 
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DELAY_DESC')
                    ),
                    'loop' => array(
                        'type'  => 'checkbox',
                        'std'   => '1',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LOOP'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LOOP_DESC')
                    ),
                    'class' => array(
                        'type'  => 'text',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLASS'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLASS_DESC')
                    ),
                ),
    		),
    	)
    );
}