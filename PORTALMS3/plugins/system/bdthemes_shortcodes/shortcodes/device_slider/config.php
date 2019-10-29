<?php 

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_device_slider_config extends Su_Data {

    function __construct() {
        parent::__construct();
    }
    
    static function get_config() {
        return array(
            'name'     => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DEVICE_SLIDER'),
            'desc'     => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DEVICE_SLIDER_DESC'),
            'type'     => 'single',
            'group'    => 'extra gallery',
            'icon'     => 'desktop',
            'badge'    => 'UPDATE',
            'atts'     => array(
                'source' => array(
                    'type'    => 'source',
                    'default' => '',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SOURCE'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SOURCE_DESC'),
                    'child'   => array(
                        'limit' => array(
                            'type'    => 'slider',
                            'min'     => 1,
                            'max'     => 20,
                            'step'    => 1,
                            'default' => 5,
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LIMIT'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LIMIT_DESC')
                        )
                    )
                ),
                'device' => array(
                    'type'    => 'select',
                    'default' => 'imac',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DEVICE'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DEVICE_DESC'),
                    'values'  => array(
                        'imac'     => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DEVICE_IMAC'),
                        'macbook'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DEVICE_MACBOOK'),
                        'ipad'     => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DEVICE_IPAD'),
                        'iphone'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DEVICE_IPHONE'),
                        'galaxys6' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DEVICE_GALAXYS6')
                    ),
                    'child'   => array(
                        'lightbox' => array(
                            'type'    => 'bool',
                            'default' => 'no',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LIGHTBOX'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LIGHTBOX_DESC')
                        ),
                        'arrows' => array(
                            'type'    => 'bool',
                            'default' => 'no',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ARROWS'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ARROWS_DESC')
                        )
                    )
                ),                
                'pagination' => array(
                    'type'    => 'bool',
                    'default' => 'no',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PAGINATION'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PAGINATION_DESC'),
                    'child'   => array(
                        'autoplay' => array(
                            'type'    => 'bool',
                            'default' => 'yes',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_AUTOPLAY'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_AUTOPLAY_DESC')
                        ),
                        'autoheight' => array(
                            'type'    => 'bool',
                            'default' => 'no',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_AUTOHEIGHT'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_AUTOHEIGHT_DESC')
                        )
                    )
                ),
                'hoverpause' => array(
                    'type'    => 'bool',
                    'default' => 'yes',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_HOVERPAUSE'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_HOVERPAUSE_DESC'),
                    'child'   => array(
                        'lazyload' => array(
                            'type'    => 'bool',
                            'default' => 'no',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LAZYLOAD'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LAZYLOAD_DESC')
                        ),
                        'loop' => array(
                            'type'    => 'bool',
                            'default' => 'yes',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LOOP'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LOOP_DESC')
                        ),
                    )
                ),                
                'speed' => array(
                    'type'    => 'slider',
                    'min'     => 0.1,
                    'max'     => 15,
                    'step'    => 0.2,
                    'default' => 0.6,
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SPEED'), 
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SPEED_DESC'),
                    'child'   => array(
                        'delay' => array(
                            'type'    => 'slider',
                            'min'     => 1,
                            'max'     => 10,
                            'step'    => 1,
                            'default' => 4,
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DELAY'), 
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DELAY_DESC')
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
