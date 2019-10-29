<?php 

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_carousel_item_config extends Su_Data {

    function __construct() {
        parent::__construct();
    }
    static function get_config() {

       return array(
            'name'     => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CAROUSEL_ITEM'),
            'type'     => 'wrap',
            'group'    => 'extra gallery',
            'desc'     => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CAROUSEL_ITEM_DESC'),
            'icon'     => 'desktop',
            'atts'     => array(
                'class' => array(
                    'default' => '',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLASS'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLASS_DESC')
                )
            ),
            'content' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CONTENT_DEFAULT')
        );
    }

}
