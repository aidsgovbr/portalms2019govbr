<?php
/**
* @subpackage Shortcode Ultimate
* @author BdThemes https://www.bdthemes.com
* @copyright Copyright (c) 2012 - 2016 BdThemes
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

if (class_exists('Su_Shortcode_document')) {
    SpAddonsConfig::addonConfig(
    	array(
            'type'       => 'single',
            'category'   => 'Shortcode Ultimate',
            'addon_name' => 'su_document',
            'title'      => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DOCUMENT'),
            'desc'       => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DOCUMENT_DESC'),
            'icon'       => JURI::root().'plugins/sppagebuilder/shortcode_ultimate/addons/su_document/element.svg',

    		'attr'=>array(
    			'general' => array(
                    'url' => array(
                        'type'  => 'text',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_URL'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DOCUMENT_URL_DESC')
                    ),
                    'width' => array(
                        'type'  => 'number',
                        'std'   => 600,
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_WIDTH'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DOCUMENT_WIDTH_DESC'),
                    ),
                    'height' => array(
                        'type'  => 'number',
                        'std'   => 600,
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_HEIGHT'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DOCUMENT_HEIGHT_DESC')
                    ),
                    'responsive' => array(
                        'type'  => 'checkbox',
                        'std'   => '1',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RESPONSIVE'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RESPONSIVE_DESC')
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