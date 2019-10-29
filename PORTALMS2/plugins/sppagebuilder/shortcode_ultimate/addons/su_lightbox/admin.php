<?php
/**
* @subpackage Shortcode Ultimate
* @author BdThemes https://www.bdthemes.com
* @copyright Copyright (c) 2012 - 2016 BdThemes
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

if (class_exists('Su_Shortcode_lightbox')) {
    SpAddonsConfig::addonConfig(
    	array(
            'type'       => 'wrap',
            'category'   => 'Shortcode Ultimate',
            'addon_name' => 'su_lightbox',
            'title'      => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LIGHTBOX'),
            'desc'       => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LIGHTBOX_DESC'),
            'icon'       => JURI::root().'plugins/sppagebuilder/shortcode_ultimate/addons/su_lightbox/element.svg',

    		'attr'=>array(
    			'general' => array(
                    'src' => array(
                        'type'  => 'text',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LIGHTBOX_SOURCE'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LIGHTBOX_SOURCE_DESC')
                    ),
                    'type' => array(
                        'type'   => 'select',
                        'std'    => 'iframe',
                        'title'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LIGHTBOX_TYPE'),
                        'desc'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LIGHTBOX_TYPE_DESC'),
                        'values' => array(
                            'iframe' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_IFRAME'),
                            'image'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_IMAGE'),
                            'inline' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_INLINE')
                        ),
                    ),
                    'class' => array(
                        'type'  => 'text',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLASS'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLASS_DESC')
                    ),
                    'content' => array(
                        'type'  => 'editor',
                        'std'   => 'Open in Lightbox',
                        'title' => 'Content',
                    ),
                ),
    		),
    	)
    );
}