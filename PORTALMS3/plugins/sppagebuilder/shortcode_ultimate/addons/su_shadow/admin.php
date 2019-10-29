<?php
/**
* @subpackage Shortcode Ultimate
* @author BdThemes https://www.bdthemes.com
* @copyright Copyright (c) 2012 - 2016 BdThemes
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

if (class_exists('Su_Shortcode_shadow')) {
    SpAddonsConfig::addonConfig(
    	array(
            'type'       => 'wrap',
            'category'   => 'Shortcode Ultimate',
            'addon_name' => 'su_shadow',
            'title'      => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHADOW'),
            'desc'       => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHADOW_HEADING_DESC'),
            'icon'       => JURI::root().'plugins/sppagebuilder/shortcode_ultimate/addons/su_shadow/element.svg',

    		'attr'=>array(
    			'general' => array(
                    'style' => array(
                        'type'   => 'select',
                        'std'    => 'default',
                        'title'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE'),
                        'desc'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE_DESC'),
                        'values' => array(
                            'default'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DEFAULT'),
                            'left'       => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LEFT_CORNER'),
                            'right'      => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RIGHT_CORNER'),
                            'horizontal' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_HORIZONTAL'),
                            'vertical'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_VERTICAL'),
                            'bottom'     => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BOTTOM'),
                            'simple'     => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SIMPLE')
                        )
                    ),
                    'inline' => array(
                        'type'  => 'checkbox',
                        'std'   => '0',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_INLINE'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_INLINE_DESC')
                    ),
                    'class' => array(
                        'type'  => 'text',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLASS'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLASS_DESC')
                    ),
                    'content' => array(
                        'type'  => 'editor',
                        'std'   => 'Shadow content',
                        'title' => 'Content',
                    ),
                ),
    		),
    	)
    );
}