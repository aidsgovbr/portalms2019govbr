<?php

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_weather_config extends Su_Data {

    function __construct() {
        parent::__construct();
    }
    
    static function get_config() {
        return array(
            'name'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_WEATHER'),
            'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_WEATHER_DESC'),
            'icon'  => 'cloud',
            'type'  => 'single',
            'group' => 'other',
            'atts'  => array(
                'location' => array(
                    'default' => '',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LOCATION'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LOCATION_DESC'),
                    'child'   => array(
                        'country' => array(
                            'default' => 'USA',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_COUNTRY'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_COUNTRY_DESC')
                        ),
                        'city_only' => array(
                            'type'    => 'bool',
                            'default' => 'no',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CITY_ONLY'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CITY_ONLY_DESC')
                        )
                    )
                ),
                'forecast' => array(
                    'default' => '4',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FORECAST'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FORECAST_DESC')
                ),
                'api' => array(
                    'type'   => 'select',
                    'values' => array(
                        'openweathermap'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_OPENWEATHERMAP'),
                        'yahoo' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_YAHOO')
                    ),
                    'default' => 'yahoo',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_API'), 
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_API_DESC')
                ),
                'view' => array(
                    'type'   => 'select',
                    'values' => array(
                        'partial' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PARTIAL'),
                        'full' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FULL'),
                        'simple' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SIMPLE'),
                        'today' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TODAY'),
                        'forecast' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FORECAST')
                    ),
                    'default' => 'partial',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_VIEW'), 
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_VIEW_DESC')
                ),
                'units' => array(
                    'type'   => 'select',
                    'values' => array(
                        'auto' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_AUTO'),
                        'metric' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_METRIC'),
                        'imperial' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_IMPERIAL')
                    ),
                    'default' => 'auto',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_UNITS'), 
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_UNITS_DESC')
                ),
                'color' => array(
                    'type'    => 'color',
                    'default' => '#FFFFFF',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_COLOR'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_COLOR_DESC'),
                    'child' => array(
                        'background' => array(
                            'type'    => 'color',
                            'default' => '#8DD438',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BACKGROUND'), 
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BACKGROUND_DESC')
                        )
                    )
                ),
                'padding' => array(
                    'default' => '25px',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PADDING'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PADDING_DESC'),
                     'child'   => array(
                         'margin' => array(
                             'default' => '0px',
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
