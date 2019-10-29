<?php
/**
* @subpackage Shortcode Ultimate
* @author BdThemes https://www.bdthemes.com
* @copyright Copyright (c) 2012 - 2016 BdThemes
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

if (class_exists('Su_Shortcode_weather')) {
    SpAddonsConfig::addonConfig(
    	array(
            'type'       => 'single',
            'category'   => 'Shortcode Ultimate',
            'addon_name' => 'su_weather',
            'title'      => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_WEATHER'),
            'desc'       => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_WEATHER_DESC'),
            'icon'       => JURI::root().'plugins/sppagebuilder/shortcode_ultimate/addons/su_weather/element.svg',

    		'attr'=>array(
    			'general' => array(
                    'location' => array(
                        'type'  => 'text',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LOCATION'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LOCATION_DESC'),
                    ),
                    'country' => array(
                        'type'  => 'text',
                        'std'   => 'USA',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_COUNTRY'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_COUNTRY_DESC')
                    ),
                    'city_only' => array(
                        'type'  => 'checkbox',
                        'std'   => '0',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CITY_ONLY'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CITY_ONLY_DESC')
                    ),
                    'forecast' => array(
                        'type'  => 'text',
                        'std'   => '4',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FORECAST'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FORECAST_DESC')
                    ),
                    'api' => array(
                        'type'   => 'select',
                        'std'    => 'yahoo',
                        'title'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_API'), 
                        'desc'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_API_DESC'),
                        'values' => array(
                            'openweathermap' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_OPENWEATHERMAP'),
                            'yahoo'          => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_YAHOO')
                        ),
                    ),
                    'view' => array(
                        'type'   => 'select',
                        'std'    => 'partial',
                        'title'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_VIEW'), 
                        'desc'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_VIEW_DESC'),
                        'values' => array(
                            'partial'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PARTIAL'),
                            'full'     => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FULL'),
                            'simple'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SIMPLE'),
                            'today'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TODAY'),
                            'forecast' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FORECAST')
                        ),
                    ),
                    'units' => array(
                        'type'   => 'select',
                        'std'    => 'auto',
                        'title'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_UNITS'), 
                        'desc'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_UNITS_DESC'),
                        'values' => array(
                            'auto'     => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_AUTO'),
                            'metric'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_METRIC'),
                            'imperial' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_IMPERIAL')
                        ),
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