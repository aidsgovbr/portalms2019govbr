<?php
/**
* @subpackage Shortcode Ultimate
* @author BdThemes https://www.bdthemes.com
* @copyright Copyright (c) 2012 - 2016 BdThemes
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

if (class_exists('Su_Shortcode_list')) {
    SpAddonsConfig::addonConfig(
    	array(
            'type'       => 'wrap',
            'category'   => 'Shortcode Ultimate',
            'addon_name' => 'su_list',
            'title'      => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LIST'),
            'desc'       => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LIST_DESC'),
            'icon'       => JURI::root().'plugins/sppagebuilder/shortcode_ultimate/addons/su_list/element.svg',

    		'attr'=>array(
    			'general' => array(
                    'icon' => array(
                        'type'  => 'icon',
                        'std'   => 'fa-star',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_DESC'),
                    ),
                    'icon_color' => array(
                        'type'  => 'color',
                        'std'   => '#333333',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_COLOR'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_COLOR_DESC')
                    ),
                    'class' => array(
                        'type'  => 'text',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLASS'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLASS_DESC')
                    ),
                    'content' => array(
                        'type'  => 'editor',
                        'title' => 'Content',
                        'std'   => sprintf("<ul>\n<li>List item</li>\n<li>List item</li>\n<li>List item</li>\n</ul>")
                    ),
                ),
    		),
    	)
    );
}