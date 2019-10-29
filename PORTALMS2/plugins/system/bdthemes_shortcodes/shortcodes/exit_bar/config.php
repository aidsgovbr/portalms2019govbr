<?php

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_exit_bar_config extends Su_Data {

    function __construct() {
        parent::__construct();
    }
    
    static function get_config() {
        return array(
            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_EB'),
            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_EB_DESC'),
            'content' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_EB_CONTENT'),
            'icon'    => 'close',
            'type'    => 'wrap',
            'group'   => 'box',
            'badge'   => 'NEW',
            'atts'    => array(             
                'background' => array(
                    'type'    => 'color',
                    'values'  => array( ),
                    'default' => '#f44a4c',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BACKGROUND'), 
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BACKGROUND_DESC'),
                    'child'   => array(
                        'color' => array(
                            'type' => 'color',
                            'default' => '#ffffff',
                            'name' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_COLOR'), 
                            'desc' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_COLOR_DESC')
                        )
                    )
                ),
                'title' => array(
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE'), 
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE_DESC'),
                    'child'   => array(
                        'title_color' => array(
                            'type' => 'color',
                            'default' => '#ffffff',
                            'name' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE_COLOR'), 
                            'desc' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE_COLOR_DESC')
                        )
                    )
                ),
                'width' => array(
                    'default' => '1200px',
                    'name' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_WIDTH'),
                    'desc' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_WIDTH_DESC')
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
