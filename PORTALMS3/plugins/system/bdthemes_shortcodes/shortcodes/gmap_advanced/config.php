<?php 

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_gmap_advanced_config extends Su_Data {

    function __construct() {
        parent::__construct();
    }
    static function get_config() {

        return array(
            'name'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_GMAPA'),
            'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_GMAPA_DESC'),
            'icon'  => 'globe',
            'type'  => 'single',
            'group' => 'media',
            'atts'  => array(
                'style' => array(
                    'type'   => 'select',
                    'values' => array(
                        'default'     => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DEFAULT'),
                        'map_style_1' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_GMAPA_SUBTLE_GRAYSCALE'),
                        'map_style_2' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_GMAPA_TURQUOISE_WATER'),
                        'map_style_3' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_GMAPA_BLUE_CYAN'),
                        'map_style_4' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_GMAPA_PROPIA_EFFECT'),
                        'map_style_5' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_GMAPA_MIDNIGHT_COMMANDER'),
                        'map_style_6' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_GMAPA_LUNAR_LANDSCAPE'),
                        'map_style_7' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_GMAPA_MIKIWAT'),
                        'map_style_8' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_GMAPA_ULTRA_LIGHT'),
                        'map_style_9' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_GMAPA_FLAT_PALE')
                    ),
                    'default' => '',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE_DESC')
                ),
                'width' => array(
                    'type'    => 'slider',
                    'min'     => 200,
                    'max'     => 1600,
                    'step'    => 20,
                    'default' => 600,
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_WIDTH'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MAP_WIDTH_DESC'),
                    'child'   => array(
                        'height' => array(
                            'type'    => 'slider',
                            'min'     => 200,
                            'max'     => 1600,
                            'step'    => 20,
                            'default' => 400,
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_HEIGHT'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MAP_HEIGHT_DESC')
                        )
                    )
                ),
                'border' => array(
                    'type'    => 'border',
                    'default' => '0px solid #ccc',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BORDER'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BORDER_DESC')
                ),
                'lat' => array(
                    'default' => '24.8248746',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_GMAP_LAT'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_GMAP_LAT_DESC'),
                    'child'   => array(
                        'lng' => array(
                            'default' => '89.3826299',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_GMAP_LNG'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_GMAP_LNG_DESC')
                        )
                    )
                ),
                'zoom_control_style' => array(
                    'type'   => 'select',
                    'values' => array(
                        'SMALL' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MAP_ZOOM_CONTROL_SMALL'),
                        'LARGE' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MAP_ZOOM_CONTROL_LARGE')
                    ),
                    'default' => 'SMALL',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MAP_ZOOM_CONTROL_STYLE'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MAP_ZOOM_CONTROL_STYLE_DESC'),
                    'child'   => array(
                        'zoom_control' => array(
                            'type'    => 'bool',
                            'default' => 'yes',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ZOOM_CONRTOL'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ZOOM_CONRTOL_DESC')
                        )
                    )
                ),
                'zoom' => array(
                    'type'    => 'slider',
                    'min'     => 1,
                    'max'     => 20,
                    'step'    => 1,
                    'default' => 16,
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MAP_ZOOM'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MAP_ZOOM_DESC')
                ),   
                'street_view_control' => array(
                    'type'    => 'bool',
                    'default' => 'no',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STREET_VIEW_CONTROL'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STREET_VIEW_CONTROL_DESC')
                ),
                'location_marker' => array(
                    'type'    => 'bool',
                    'default' => 'yes',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LOCATION_MARKER'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LOCATION_MARKER_DESC'),
                    'child'   => array(
                        'custom_marker' => array(
                            'type'    => 'upload',
                            'default' => '',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CUSTOM_MARKER'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CUSTOM_MARKER_DESC')
                        )
                    )
                ),
                'address' => array(
                    'values'  => array( ),
                    'default' => '',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ADDRESS'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ADDRESS_DESC')
                ),
                'responsive' => array(
                    'type'    => 'bool',
                    'default' => 'yes',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RESPONSIVE'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RESPONSIVE_DESC')
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
