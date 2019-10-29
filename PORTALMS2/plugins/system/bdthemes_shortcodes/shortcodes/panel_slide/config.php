<?php 

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_panel_slide_config extends Su_Data {

    function __construct() {
        parent::__construct();
    }
    static function get_config() {

       return array(
            'name'     => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PANEL_SLIDE'),
            'type'     => 'wrap',
            'group'    => 'extra gallery',
            'desc'     => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PANEL_SLIDE_DESC'),
            'icon'     => 'desktop',
            'function' => array( 'Shortcodes_Ultimate_Extra_Shortcodes', 'panel_slide' ),
            'atts'     => array(
                'image' => array(
                    'type'    => 'upload',
                    'default' => BDT_SU_IMG.'no-image.jpg',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_IMAGE'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PS_IMAGE_DESC')
                ),
                'title' => array(
                    'default' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PS_TITLE_DEFAULT'),
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE_DESC')
                ),
                'link_title' => array(
                    'default' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PS_LINK_TITLE_DEFAULT'),
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PS_LINK_TITLE'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PS_LINK_TITLE_DESC'),
                    'child' =>array(
                        'url' => array(
                            'default' => '#',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_URL'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_URL_DESC')
                        ),
                        'target' => array(
                            'type'    => 'select',
                            'default' => '_blank',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TARGET'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TARGET_DESC'),
                            'values'  => array(
                                '_self'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SELF'),
                                '_blank'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BLANK')
                            ),                    
                        ),
                    ),
                ),
                'background' => array(
                    'type'    => 'color',
                    'values'  => array( ),
                    'default' => '#2D89EF',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BACKGROUND'), 
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BACKGROUND_DESC')
                ),
                'class' => array(
                    'default' => '',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLASS'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLASS_DESC')
                ),
            ),
            'content' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CONTENT_DEFAULT')
        );
    }

}
