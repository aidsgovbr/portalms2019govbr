<?php
/**
* @subpackage Shortcode Ultimate
* @author BdThemes https://www.bdthemes.com
* @copyright Copyright (c) 2012 - 2016 BdThemes
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

if (class_exists('Su_Shortcode_flickr')) {
    SpAddonsConfig::addonConfig(
    	array(
            'type'       => 'single',
            'category'   => 'Shortcode Ultimate',
            'addon_name' => 'su_flickr',
            'title'      => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FLICKR'),
            'desc'       => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FLICKR_DESC'),
            'icon'       => JURI::root().'plugins/sppagebuilder/shortcode_ultimate/addons/su_flickr/element.svg',

    		'attr'=>array(
    			'general' => array(
                    'id' => array(
                        'type'  => 'text',
                        'std'   => '95572727@N00',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FLICKR_ID'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FLICKR_ID_DESC')
                    ),  
                    'limit' => array(
                        'type'  => 'number',
                        'std'   => '9',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LIMIT'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LIMIT_DESC')
                    ),  
                    'lightbox' => array(
                        'type'  => 'checkbox',
                        'std'   => '0',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LIGHTBOX'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LIGHTBOX_DESC')
                    ),                  
                    'radius' => array(
                        'type'  => 'text',
                        'std'   => '0px',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RADIUS'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RADIUS_DESC')
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