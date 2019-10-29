<?php 

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_lightbox_config extends Su_Data {

    function __construct() {
        parent::__construct();
    }
    static function get_config() {
        return array(
            'name'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LIGHTBOX'),
            'type'  => 'wrap',
            'group' => 'gallery',
            'atts'  => array(
                'src' => array(
                    'default' => '',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LIGHTBOX_SOURCE'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LIGHTBOX_SOURCE_DESC')
                ),
                'type' => array(
                    'type'   => 'select',
                    'values' => array(
                        'iframe' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_IFRAME'),
                        'image'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_IMAGE'),
                        'inline' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_INLINE')
                    ),
                    'default' => 'iframe',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LIGHTBOX_TYPE'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LIGHTBOX_TYPE_DESC')
                ),
                'class' => array(
                    'default' => '',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLASS'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLASS_DESC')
                )
            ),
            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LIGHTBOX_DESC'),
            'content' => '[%prefix_button] Click Here to Watch the Video [/%prefix_button]',
            'icon'    => 'external-link'
        );
    }

}
