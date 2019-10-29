<?php
/**
* @subpackage Shortcode Ultimate
* @author BdThemes https://www.bdthemes.com
* @copyright Copyright (c) 2012 - 2016 BdThemes
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

if (class_exists('Su_Shortcode_load_module')) {
    SpAddonsConfig::addonConfig(
    	array(
            'type'       => 'single',
            'category'   => 'Shortcode Ultimate',
            'addon_name' => 'su_load_module',
            'title'      => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LOAD_MODULE'),
            'desc'       => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LOAD_MODULE_DESC'),
            'icon'       => JURI::root().'plugins/sppagebuilder/shortcode_ultimate/addons/su_load_module/element.svg',

    		'attr'=>array(
    			'general' => array(
                    'id' => array(
                        'type'  => 'text',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MODULE_ID'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MODULE_ID_DESC'),
                    ),
                    'module_name' => array(
                        'type'  => 'text',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MODULE_NAME'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MODULE_NAME_DESC')
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