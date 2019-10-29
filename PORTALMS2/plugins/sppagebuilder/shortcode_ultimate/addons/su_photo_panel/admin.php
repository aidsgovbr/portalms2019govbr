<?php
/**
* @subpackage Shortcode Ultimate
* @author BdThemes https://www.bdthemes.com
* @copyright Copyright (c) 2012 - 2016 BdThemes
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

if (class_exists('Su_Shortcode_photo_panel')) {
    SpAddonsConfig::addonConfig(
    	array(
            'type'       => 'wrap',
            'category'   => 'Shortcode Ultimate',
            'addon_name' => 'su_photo_panel',
            'title'      => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PHOTO_PANEL'),
            'desc'       => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PHOTO_PANEL_DESC'),
            'icon'       => JURI::root().'plugins/sppagebuilder/shortcode_ultimate/addons/su_photo_panel/element.svg',

    		'attr'=>array(
    			'general' => array(
                    'photo' => array(
                        'type'  => 'media',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PHOTO'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PHOTO_DESC')
                    ),
                    'alt' => array(
                        'type'  => 'text',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ALT'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ALT_DESC')
                    ),
                    'url' => array(
                        'type'  => 'text',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_URL'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_URL_DESC')
                    ),
                    'text_align' => array(
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
                        'std'   => 'Photo panel content',
                        'title' => 'Content',
                    ),
                ),
                'style' => array(
                    'background' => array(
                        'type'  => 'color',
                        'std'   => '#ffffff',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BACKGROUND'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BACKGROUND_DESC'),
                    ),
                    'color' => array(
                        'type'  => 'color',
                        'std'   => '#333333',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_COLOR'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_COLOR_DESC')
                    ),
                    'border' => array(
                        'type'  => 'text',
                        'std'   => '1px solid #cccccc',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BORDER'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BORDER_DESC')
                    ),
                    'shadow' => array(
                        'type'  => 'text',
                        'std'   => '0 1px 2px #eeeeee',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHADOW'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHADOW_DESC')
                    ),
                    'radius' => array(
                        'type'  => 'number',
                        'std'   => 0,
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RADIUS'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PHOTO_PANEL_RADIUS_DESC')
                    ),
                ),
    		),
    	)
    );
}