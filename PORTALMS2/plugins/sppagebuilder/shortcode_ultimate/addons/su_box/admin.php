<?php
/**
* @subpackage Shortcode Ultimate
* @author BdThemes https://www.bdthemes.com
* @copyright Copyright (c) 2012 - 2016 BdThemes
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

if (class_exists('Su_Shortcode_box')) {
    SpAddonsConfig::addonConfig(
    	array(
            'type'       => 'wrap',
            'category'   => 'Shortcode Ultimate',
            'addon_name' => 'su_box',
            'title'      => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BOX'),
            'desc'       => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BOX_DESC'),
            'icon'       => JURI::root().'plugins/sppagebuilder/shortcode_ultimate/addons/su_box/element.svg',

    		'attr'=>array(
    			'general' => array(
                    'title' => array(
                        'type'  => 'text',
                        'std'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BOX_TITLE_DEFAULT'),
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE'), 
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE_DESC'),
                    ),
                    'class' => array(
                        'type'  => 'text',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLASS'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLASS_DESC')
                    ),
                    'content' => array(
                        'type'  => 'editor',
                        'std'   => 'Box content',
                        'title' => 'Content',
                    ),
                ),
                'style' => array(
                    'style' => array(
                        'type'   => 'select',
                        'std'    => 'default',
                        'title'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE'),
                        'desc'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE_DESC'),
                        'values' => array(
                            'default' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DEFAULT'),
                            'soft'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SOFT'),
                            'glass'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_GLASS'),
                            'bubbles' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BUBBLES'),
                            'noise'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_NOISE')
                        ),
                    ),
                    'title_color' => array(
                        'type'  => 'color',
                        'std'   => '#ffffff',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE_COLOR'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE_COLOR_DESC')
                    ), 
                    'box_color' => array(
                        'type'  => 'color',
                        'std'   => '#333333',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BOX_COLOR'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_COLOR_DESC')    
                    ),                     
                   'radius' => array(
                        'type'  => 'number',
                        'std'   => 0,
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RADIUS'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BOX_RADIUS_DESC')
                    ),
                ),
    		),
    	)
    );
}