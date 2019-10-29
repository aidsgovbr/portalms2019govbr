<?php
/**
* @subpackage Shortcode Ultimate
* @author BdThemes https://www.bdthemes.com
* @copyright Copyright (c) 2012 - 2016 BdThemes
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

if (class_exists('Su_Shortcode_dummy_text')) {
    SpAddonsConfig::addonConfig(
    	array(
            'type'       => 'single',
            'category'   => 'Shortcode Ultimate',
            'addon_name' => 'su_dummy_text',
            'title'      => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DUMMY_TEXT'),
            'desc'       => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DUMMY_TEXT_DESC'),
            'icon'       => JURI::root().'plugins/sppagebuilder/shortcode_ultimate/addons/su_dummy_text/element.svg',

    		'attr'=>array(
    			'general' => array(
                    'what' => array(
                        'type'   => 'select',
                        'std'    => 'paras',
                        'title'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_WHAT'),
                        'desc'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_WHAT_DESC'),
                        'values' => array(
                            'paras' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PARAS'),
                            'words' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_WORDS'),
                            'bytes' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BYTES'),
                        ),
                    ),
                    'cache' => array(
                        'type'  => 'checkbox',
                        'std'   => '1',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CACHE'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CACHE_DESC')
                    ),
                    'amount' => array(
                        'type'  => 'number',
                        'std'   => 1,
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_AMOUNT'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_AMOUNT_DESC')
                    ),
                    'class' => array(
                        'type'  => 'text',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLASS'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLASS_DESC')
                    ),
                ),
    		),
    	)
    );
}