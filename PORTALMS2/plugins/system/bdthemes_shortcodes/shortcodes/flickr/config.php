<?php 

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_flickr_config extends Su_Data {

    function __construct() {
        parent::__construct();
    }
    static function get_config() {

        return array(
            'name'     => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FLICKR'),
            'desc'     => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FLICKR_DESC'),
            'icon'     => 'flickr',
            'type'     => 'single',
            'group'    => 'extra content',
            'atts' => array(                        
                'id' => array(
                    'default' => '95572727@N00',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FLICKR_ID'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FLICKR_ID_DESC')
                ),  
                'limit' => array(
                    'type'    => 'slider',
                    'default' => '9',
                    'min'     => '0',
                    'max'     => '100',
                    'step'    => '1',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LIMIT'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LIMIT_DESC')
                ),  
                'lightbox' => array(
                    'type'    => 'bool',
                    'default' => 'no',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LIGHTBOX'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LIGHTBOX_DESC')
                ),                  
                'radius' => array(
                    'default' => '0px',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RADIUS'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RADIUS_DESC')
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
