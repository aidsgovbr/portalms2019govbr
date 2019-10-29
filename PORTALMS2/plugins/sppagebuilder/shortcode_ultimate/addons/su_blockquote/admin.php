<?php
/**
* @subpackage Shortcode Ultimate
* @author BdThemes https://www.bdthemes.com
* @copyright Copyright (c) 2012 - 2016 BdThemes
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

if (class_exists('Su_Shortcode_blockquote')) {
    SpAddonsConfig::addonConfig(
    	array(
            'type'       => 'wrap',
            'category'   => 'Shortcode Ultimate',
            'addon_name' => 'su_blockquote',
            'title'      => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BLOCKQUOTE'),
            'desc'       => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BLOCKQUOTE_DESC'),
            'icon'       => JURI::root().'plugins/sppagebuilder/shortcode_ultimate/addons/su_blockquote/element.svg',

    		'attr'=>array(
    			'general' => array(
                    'cite' => array(
                        'type'  => 'text',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CITE'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CITE_DESC'),
                    ),
                    'url' => array(
                        'type'  => 'text',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_URL'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_URL_DESC')
                    ),
                    'pull' => array(
                        'type'  => 'checkbox',
                        'std'   => '0',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PULLQUOTE'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PULLQUOTE_DESC'),
                    ),
                    'italic' => array(
                        'type'  => 'checkbox',
                        'std'   => '0',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ITALIC'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ITALIC_DESC')
                    ),
                    'class' => array(
                        'type'  => 'text',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLASS'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLASS_DESC')
                    ),
                    'content' => array(
                        'type'  => 'editor',
                        'std'   => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum, maiores esse temporibus accusantium quas soluta quis sed rerum. Sapiente, culpa fugit sit est laboriosam odit.',
                        'title' => 'Content',
                    ),
                ),
                'style' => array(
                    'font' => array(
                        'type'   => 'select',
                        'std'    => 'default',
                        'title'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FONT_STYLE'),
                        'desc'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FONT_STYLE_DESC'),
                        'values' => array(
                            'default' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DEFAULT'),
                            1         => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE1'),
                            2         => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE2'),
                            3         => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE3')
                        ),
                    ),
                    'align' => array(
                        'type'   => 'select',
                        'std'    => 'default',
                        'title'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ALIGN'), 
                        'desc'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ALIGN_DESC'),
                        'values' => array(
                            'default' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DEFAULT'),
                            'left'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LEFT'),
                            'right'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RIGHT')
                        ),
                    ),
                ),
    		),
    	)
    );
}