<?php 

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_spacer_config extends Su_Data {

    function __construct() {
        parent::__construct();
    }
    static function get_config() {

        return array(
            'name'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SPACER'),
            'type'  => 'single',
            'group' => 'content other',
            'atts'  => array(
                'size' => array(
                    'type'    => 'slider',
                    'min'     => 0,
                    'max'     => 600,
                    'step'    => 10,
                    'default' => 20,
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SPACER_SIZE'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SPACER_SIZE_DESC'),
                    'child' => array(
                        'medium' => array(
                            'type'    => 'slider',
                            'min'     => 0,
                            'max'     => 400,
                            'step'    => 5,
                            'default' => 15,
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SPACER_MEDIUM'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SPACER_MEDIUM_DESC')
                        ),
                        'small' => array(
                            'type'    => 'slider',
                            'min'     => 0,
                            'max'     => 300,
                            'step'    => 5,
                            'default' => 10,
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SPACER_SMALL'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SPACER_SMALL_DESC')
                        )
                    )
                ),
                'class' => array(
                    'default' => '',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLASS'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLASS_DESC')
                )
            ),
            'desc' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SPACER_DESC'),
            'icon' => 'arrows-v'
        );
    }

}
