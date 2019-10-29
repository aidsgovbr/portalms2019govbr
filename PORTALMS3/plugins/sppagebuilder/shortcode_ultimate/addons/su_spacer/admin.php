<?php
/**
* @subpackage Shortcode Ultimate
* @author BdThemes https://www.bdthemes.com
* @copyright Copyright (c) 2012 - 2016 BdThemes
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

if (class_exists('Su_Shortcode_spacer')) {
    SpAddonsConfig::addonConfig(
    	array(
            'type'       => 'single',
            'category'   => 'Shortcode Ultimate',
            'addon_name' => 'su_spacer',
            'title'      => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SPACER'),
            'desc'       => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SPACER_DESC'),
            'icon'       => JURI::root().'plugins/sppagebuilder/shortcode_ultimate/addons/su_spacer/element.svg',

    		'attr'=>array(
    			'general' => array(
                    'size' => array(
                        'type'  => 'number',
                        'std'   => 20,
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SPACER_SIZE'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SPACER_SIZE_DESC'),
                    ),
                    'medium' => array(
                        'type'  => 'number',
                        'std'   => 15,
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SPACER_MEDIUM'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SPACER_MEDIUM_DESC')
                    ),
                    'small' => array(
                        'type'  => 'number',
                        'std'   => 10,
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SPACER_SMALL'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SPACER_SMALL_DESC')
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