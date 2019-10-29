<?php
/**
* @subpackage Shortcode Ultimate
* @author BdThemes https://www.bdthemes.com
* @copyright Copyright (c) 2012 - 2016 BdThemes
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

if (class_exists('Su_Shortcode_trailer_box')) {
    SpAddonsConfig::addonConfig(
    	array(
            'type'       => 'wrap',
            'category'   => 'Shortcode Ultimate',
            'addon_name' => 'su_trailer_box',
            'title'      => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TB'),
            'desc'       => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TB_DESC'),
            'icon'       => JURI::root().'plugins/sppagebuilder/shortcode_ultimate/addons/su_trailer_box/element.svg',

            'attr'=>array(
                'general' => array(
                    'image' => array(
                        'type'  => 'media',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TB_BG_IMG'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TB_BG_IMG_DESC'),
                    ),
                    'title' => array(
                        'type'  => 'text',
                        'std'   => 'Trailer Box Title',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TB_TITLE'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TB_TITLE_DESC'),
                    ),
                    'title_size' => array(
                        'type'  => 'text',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TB_TITLE_SIZE'), 
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TB_TITLE_SIZE_DESC')
                    ),
                    'align' => array(
                        'type'   => 'select',
                        'std'    => 'default',
                        'title'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ALIGN'),
                        'desc'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ALIGN_DESC'),
                        'values' => array(
                            'default' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DEFAULT'),
                            'left'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LEFT'),
                            'right'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RIGHT'),
                            'center'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CENTER')
                        ),
                    ),
                    'radius' => array(
                        'type'  => 'text',
                        'std'   => '0px',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RADIUS'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TRAILER_BOX_RADIUS_DESC')
                    ),
                    'url' => array(
                        'type'  => 'text',
                        'std'   => '#',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_URL'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_URL_DESC'),
                    ),
                    'target' => array(
                        'type'   => 'select',
                        'std'    => 'self',
                        'title'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TARGET'),
                        'desc'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TARGET_DESC'),
                        'values' => array(
                            'self'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SELF'),
                            'blank' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BLANK')
                        ),
                    ),
                    'class' => array(
                        'type'  => 'text',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLASS'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLASS_DESC')
                    ),
                    'content' => array(
                        'type'  => 'editor',
                        'title' => 'Content',
                        'std'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TB_CONTENT')
                    ),
                ),
    			'style' => array(
                    'style' => array(
                        'type'   => 'select',
                        'std'    => '1',
                        'title'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE'), 
                        'desc'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE_DESC'),
                        'values' => array(
                            '1'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TB_S1'),
                            '2'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TB_S2'),
                            '3'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TB_S3'),
                            '4'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TB_S4'),
                            '5'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TB_S5'),
                            '6'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TB_S6'),
                            '7'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TB_S7'),
                            '8'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TB_S8'),
                            '9'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TB_S9'),
                            '10' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TB_S10'),
                            '11' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TB_S11'),
                            '12' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TB_S12'),
                            '13' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TB_S13'),
                            '14' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TB_S14'),
                            '15' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TB_S15'),
                            '16' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TB_S16'),
                            '17' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TB_S17'),
                            '18' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TB_S18'),
                            '19' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TB_S19'),
                            '20' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TB_S20'),
                            '21' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TB_S21'),
                            '22' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TB_S22'),
                            '23' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TB_S23'),
                            '24' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TB_S24'),
                            '25' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TB_S25'),
                        ),
                    ),
                    'background' => array(
                        'type'  => 'color',
                        'std'   => '#000000',
                        'title' => 'Overlay Background Color', 
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TB_BG_COLOR_DESC')
                    ),
                    'title_color' => array(
                        'type'  => 'color',
                        'std'   => '#FFFFFF',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TB_TITLE_COLOR'), 
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TB_TITLE_COLOR_DESC')
                    ),
                    'color' => array(
                        'type'  => 'color',
                        'std'   => '#FFFFFF',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TB_CONTENT_COLOR'), 
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TB_CONTENT_COLOR_DESC'),
                    ),
                ),
    		),
    	)
    );
}