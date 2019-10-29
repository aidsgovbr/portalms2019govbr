<?php

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_dummy_text_config extends Su_Data {

    function __construct() {
        parent::__construct();
    }
    static function get_config() {

        return array(
            'name'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DUMMY_TEXT'),
            'type'  => 'single',
            'group' => 'content',
            'atts'  => array(
                'what' => array(
                    'type'   => 'select',
                    'values' => array(
                        'paras' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PARAS'),
                        'words' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_WORDS'),
                        'bytes' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BYTES'),
                    ),
                    'default' => 'paras',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_WHAT'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_WHAT_DESC'),
                    'child'   => array(
                        'cache' => array(
                            'type'    => 'bool',
                            'default' => 'yes',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CACHE'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CACHE_DESC')
                        )
                    )
                ),
                'amount' => array(
                    'type'    => 'slider',
                    'min'     => 1,
                    'max'     => 100,
                    'step'    => 1,
                    'default' => 1,
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_AMOUNT'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_AMOUNT_DESC')
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
            'desc' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DUMMY_TEXT_DESC'),
            'icon' => 'text-height'
        );
    }

}
