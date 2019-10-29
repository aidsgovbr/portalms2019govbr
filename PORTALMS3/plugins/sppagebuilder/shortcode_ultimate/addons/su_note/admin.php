<?php
/**
* @subpackage Shortcode Ultimate
* @author BdThemes https://www.bdthemes.com
* @copyright Copyright (c) 2012 - 2016 BdThemes
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

if (class_exists('Su_Shortcode_note')) {
    SpAddonsConfig::addonConfig(
    	array(
            'type'       => 'wrap',
            'category'   => 'Shortcode Ultimate',
            'addon_name' => 'su_note',
            'title'      => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_NOTE'),
            'desc'       => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_NOTE_DESC'),
            'icon'       => JURI::root().'plugins/sppagebuilder/shortcode_ultimate/addons/su_note/element.svg',

    		'attr'=>array(
    			'general' => array(
                    'type' => array(
                        'type'   => 'select',
                        'std'    => 'info',
                        'title'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_NOTE_TYPE'), 
                        'desc'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_NOTE_TYPE_DESC'),
                        'values' => array(
                            'info'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_NOTE_TYPE_INFO'),
                            'success' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_NOTE_TYPE_SUCCESS'),
                            'warning' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_NOTE_TYPE_WARNING'),
                            'danger'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_NOTE_TYPE_DANGER')
                        ),
                    ),
                    'icon' => array(
                        'type'  => 'checkbox',
                        'std'   => '0',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_NOTE_ICON'), 
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_NOTE_ICON_DESC'),
                    ),
                    'radius' => array(
                        'type'  => 'text',
                        'std'   => '3px',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RADIUS'), 
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RADIUS_DESC')
                    ),
                    'class' => array(
                        'type'  => 'text',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLASS'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLASS_DESC')
                    ),
                    'content' => array(
                        'type'  => 'editor',
                        'title' => 'Content',
                        'std'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_NOTE_CONTENT')
                    ),
                ),
                'style' => array(
                    'style' => array(
                        'type'   => 'select',
                        'std'    => 1,
                        'title'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_NOTE_STYLE'), 
                        'desc'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_NOTE_STYLE_DESC'),
                        'values' => array(
                            '1' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_NOTE_STYLE1'),
                            '2' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_NOTE_STYLE2'),
                            '3' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_NOTE_STYLE3'),
                            '4' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_NOTE_STYLE4'),
                            '5' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_NOTE_STYLE5'),
                            '6' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_NOTE_STYLE6')
                        ),
                    ),
                ),
    		),
    	)
    );
}