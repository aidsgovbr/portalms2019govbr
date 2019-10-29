<?php

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_exit_popup_config extends Su_Data {

    function __construct() {
        parent::__construct();
    }
    
    static function get_config() {
        return array(
            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_EP'),
            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_EP_DESC'),
            'content' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_EP_CONTENT'),
            'icon'    => 'close',
            'type'    => 'wrap',
            'group'   => 'box',
            'atts'    => array(             
                'background' => array(
                    'type'    => 'color',
                    'values'  => array( ),
                    'default' => '#ffffff',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BACKGROUND'), 
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BACKGROUND_DESC'),
                    'child'   => array(
                        'color' => array(
                            'type' => 'color',
                            'default' => '#444444',
                            'name' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_COLOR'), 
                            'desc' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_COLOR_DESC')
                        )
                    )
                ),
                'border' => array(
                    'type'    => 'border',
                    'default' => '0 solid #cccccc',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BORDER'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BORDER_DESC')
                ),
                'radius' => array(
                    'default' => '0',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RADIUS'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RADIUS_DESC')
                ),
                'shadow' => array(
                    'type'    => 'shadow',
                    'default' => '0 0 0 #000000',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHADOW'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHADOW_DESC')
                ),
                'height' => array(
                    'default' => '300px',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_HEIGHT'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_HEIGHT_DESC'),
                    'child'   => array(
                        'width' => array(
                            'default' => '590px',
                            'name' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_WIDTH'),
                            'desc' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_WIDTH_DESC')
                        )
                    )
                ),
                'overlay_background' => array(
                    'type'    => 'color',
                    'default' => 'rgba(0,0,0,0.75)',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_OBG'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_OBG_DESC')
                ),
                'expiration_day' => array(
                    'default' => '7',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_EXDAY'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_EXDAY_DESC'),
                    'child' => array(
                        'always_visible' => array(
                            'type'    => 'bool',
                            'default' => 'no',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_AV'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_AV_DESC')
                        ),
                        'auto' => array(
                            'type'    => 'bool',
                            'default' => 'no',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_EP_AUTO'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_EP_AUTO_DESC')
                        ),
                        'cycle' => array(
                            'default' => '0',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CYCLE'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CYCLE_DESC')
                        )
                    )
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
