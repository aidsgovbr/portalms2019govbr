<?php
/**
* @subpackage Shortcode Ultimate
* @author BdThemes https://www.bdthemes.com
* @copyright Copyright (c) 2012 - 2016 BdThemes
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

if (class_exists('Su_Shortcode_dummy_image')) {
    SpAddonsConfig::addonConfig(
    	array(
            'type'       => 'single',
            'category'   => 'Shortcode Ultimate',
            'addon_name' => 'su_dummy_image',
            'title'      => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DUMMY_IMAGE'),
            'desc'       => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DUMMY_IMAGE_DESC'),
            'icon'       => JURI::root().'plugins/sppagebuilder/shortcode_ultimate/addons/su_dummy_image/element.svg',

    		'attr'=>array(
    			'general' => array(
                    'theme' => array(
                        'type'   => 'select',
                        'std'    => 'any',
                        'title'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_THEME'),
                        'desc'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_THEME_DESC'),
                        'values' => array(
                            'any'       => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ANY'),
                            'abstract'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ABSTRACT'),
                            'animals'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ANIMALS'),
                            'business'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BUSINESS'),
                            'cats'      => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CATS'),
                            'city'      => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CITY'),
                            'food'      => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FOOD'),
                            'nightlife' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_NIGHT_LIFE'),
                            'fashion'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FASHION'),
                            'people'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PEOPLE'),
                            'nature'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_NATURE'),
                            'sports'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SPORTS'),
                            'technics'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TECHNICS'),
                            'transport' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TRANSPORT')
                        ),
                    ),
                    'width' => array(
                        'type'  => 'number',
                        'std'   => 500,
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_WIDTH'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_WIDTH_DESC'),
                    ),
                    'height' => array(
                        'type'  => 'number',
                        'std'   => 300,
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_HEIGHT'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_HEIGHT_DESC')
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