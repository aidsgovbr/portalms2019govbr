<?php 

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_box_config extends Su_Data {

    function __construct() {
        parent::__construct();
    }
    
    static function get_config() {

        return array(
            'name'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BOX'),
            'type'  => 'wrap',
            'group' => 'box',
            'atts'  => array(
                'style' => array(
                        'type'    => 'select',
                        'values'  => array(
                        'default' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DEFAULT'),
                        'soft'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SOFT'),
                        'glass'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_GLASS'),
                        'bubbles' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BUBBLES'),
                        'noise'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_NOISE')
                    ),
                    'default' => 'default',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE_DESC')
                ),
                'title' => array(
                    'values'  => array( ),
                    'default' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BOX_TITLE_DEFAULT'),
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE'), 
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE_DESC'),
                    'child'  => array(
                        'title_color' => array(
                            'type'    => 'color',
                            'default' => '#ffffff',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE_COLOR'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE_COLOR_DESC')
                        )
                    )
                ), 
                'box_color' => array(
                    'type'    => 'color',
                    'values'  => array( ),
                    'default' => '#333333',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BOX_COLOR'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_COLOR_DESC')    
                ),                     
               'radius' => array(
					'type' => 'slider',
					'min' => 0,
					'max' => 20,
					'step' => 1,
					'default' => 0,
					'name' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RADIUS'),
					'desc' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BOX_RADIUS_DESC')
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
            ),
            'content' => 'Box content',
            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BOX_DESC'),
            'icon'    => 'list-alt'
        );
    }

}
