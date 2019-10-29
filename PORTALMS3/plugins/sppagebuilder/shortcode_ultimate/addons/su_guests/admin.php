<?php
/**
* @subpackage Shortcode Ultimate
* @author BdThemes https://www.bdthemes.com
* @copyright Copyright (c) 2012 - 2016 BdThemes
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

if (class_exists('Su_Shortcode_guests')) {
    SpAddonsConfig::addonConfig(
    	array(
            'type'       => 'wrap',
            'category'   => 'Shortcode Ultimate',
            'addon_name' => 'su_guests',
            'title'      => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_GUESTS'),
            'desc'       => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_GUESTS_DESC'),
            'icon'       => JURI::root().'plugins/sppagebuilder/shortcode_ultimate/addons/su_guests/element.svg',

    		'attr'=>array(
    			'general' => array(
                    'class' => array(
                        'type'  => 'text',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLASS'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLASS_DESC')
                    ),
                    'content' => array(
                        'type'  => 'editor',
                        'title' => 'Content',
                        'std'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_GUESTS_CONTENT')
                    ),
                ),
    		),
    	)
    );
}