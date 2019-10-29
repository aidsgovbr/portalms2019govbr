<?php
/**
* @subpackage Shortcode Ultimate
* @author BdThemes https://www.bdthemes.com
* @copyright Copyright (c) 2012 - 2016 BdThemes
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

if (class_exists('Su_Shortcode_fancy_text')) {
    SpAddonsConfig::addonConfig(
    	array(
            'type'       => 'single',
            'category'   => 'Shortcode Ultimate',
            'addon_name' => 'su_fancy_text',
            'title'      => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FANCY_TEXT'),
            'desc'       => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FANCY_TEXT_DESC'),
            'icon'       => JURI::root().'plugins/sppagebuilder/shortcode_ultimate/addons/su_fancy_text/element.svg',

    		'attr'=>array(
    			'general' => array(
                    'tags' => array(
                        'type'  => 'text',
                        'std'   => 'Text 1, Text 2, Text 3',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FANCY_TEXT_TAGS'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FANCY_TEXT_TAGS_DESC')
                    ),
                    'type' => array(
                        'type'   => 'select',
                        'std'    => '1',
                        'title'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FANCY_TEXT_TYPE'),
                        'desc'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FANCY_TEXT_TYPE_DESC'),
                        'values' => array(
                            '1'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TYPE1'),
                            '2'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TYPE2'),
                            '3'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TYPE3'),
                            '4'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TYPE4'),
                            '5'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TYPE5'),
                            '6'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TYPE6'),
                            '7'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TYPE7'),
                            '8'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TYPE8'),
                            '9'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TYPE9'),
                            '10' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TYPE10')
                        ),
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