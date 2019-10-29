<?php
/**
* @subpackage Shortcode Ultimate
* @author BdThemes https://www.bdthemes.com
* @copyright Copyright (c) 2012 - 2016 BdThemes
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

if (class_exists('Su_Shortcode_testimonial')) {
    SpAddonsConfig::addonConfig(
    	array(
            'type'       => 'wrap',
            'category'   => 'Shortcode Ultimate',
            'addon_name' => 'su_testimonial',
            'title'      => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TESTIMONIAL'),
            'desc'       => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TESTIMONIAL_DESC'),
            'icon'       => JURI::root().'plugins/sppagebuilder/shortcode_ultimate/addons/su_testimonial/element.svg',

    		'attr'=>array(
    			'general' => array(
                    'name' => array(
                        'type'  => 'text',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_NAME'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_NAME_DESC'),
                    ),
                    'title' => array(
                        'type'  => 'text',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TESTIMONIAL_TITLE_DESC')
                    ),              
                    'photo' => array(
                        'type'  => 'media',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PHOTO'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PHOTO_DESC')
                    ),
                    'company' => array(
                        'type'  => 'text',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_COMPANY'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_COMPANY_DESC'),
                    ),
                    'url' => array(
                        'type'  => 'text',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_COMPANY_URL'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_COMPANY_URL_DESC')
                    ),
                    'target' => array(
                        'type'   => 'select',
                        'std'    => 'blank',
                        'title'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TARGET'),
                        'desc'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TARGET_DESC'),
                        'values' => array(
                            'self'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SELF'),
                            'blank' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BLANK')
                        )
                    ),                
                    'italic' => array(
                        'type'  => 'checkbox',
                        'std'   => '0',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ITALIC'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ITALIC_DESC'),
                    ),
                    'radius' => array(
                        'type'  => 'text',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RADIUS'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RADIUS_DESC')
                    ),
                    'color' => array(
                        'type'  => 'color',
                        'std'   => '#444444',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_COLOR'), 
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_COLOR_DESC'),
                    ),
                    'background' => array(
                        'type'  => 'color',
                        'std'   => '#ffffff',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BACKGROUND'), 
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BACKGROUND_DESC')
                    ),
                    'border_color' => array(
                        'type'  => 'color',
                        'std'   => '#eeeeee',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BORDER_COLOR'), 
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BORDER_COLOR_DESC')
                    ),
                    'content' => array(
                        'type'  => 'editor',
                        'std'   => 'Testimonial text',
                        'title' => 'Content', 
                    ),
                    'class' => array(
                        'type'  => 'text',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLASS'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLASS_DESC')
                    ),
                ),

                'style' => array(
                    'style' => array(
                        'type'   => 'select',
                        'std'    => '1',
                        'title'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE'),
                        'desc'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE_DESC'),
                        'values' => array(
                            '1' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE1'),
                            '2' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE2'),
                            '3' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE3'),
                            '4' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE4'),
                            '5' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE5')
                        ),
                    ),
                ),
    		),
    	)
    );
}