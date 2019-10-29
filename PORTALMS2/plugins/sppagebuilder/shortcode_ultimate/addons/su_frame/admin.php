<?php
/**
* @subpackage Shortcode Ultimate
* @author BdThemes https://www.bdthemes.com
* @copyright Copyright (c) 2012 - 2016 BdThemes
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

if (class_exists('Su_Shortcode_frame')) {
    SpAddonsConfig::addonConfig(
    	array(
            'type'       => 'wrap',
            'category'   => 'Shortcode Ultimate',
            'addon_name' => 'su_frame',
            'title'      => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FRAME'),
            'desc'       => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FRAME_DESC'),
            'icon'       => JURI::root().'plugins/sppagebuilder/shortcode_ultimate/addons/su_frame/element.svg',

    		'attr'=>array(
    			'general' => array(
                    'align' => array(
                        'type'   => 'select',
                        'std'    => 'left',
                        'title'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ALIGN'),
                        'desc'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ALIGN_DESC'),
                        'values' => array(
                            'left'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LEFT'),
                            'center' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CENTER'),
                            'right'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RIGHT')
                        ),
                    ),
                    'class' => array(
                        'type'  => 'text',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLASS'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLASS_DESC')
                    ),
                    'content' => array(
                        'type'  => 'editor',
                        'title' => 'Content',
                        'std'   => '<img src="http://lorempixel.com/g/400/200/" />',
                    ),
                ),
    		),
    	)
    );
}