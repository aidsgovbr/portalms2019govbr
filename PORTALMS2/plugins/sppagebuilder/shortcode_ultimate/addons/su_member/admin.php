<?php
/**
* @subpackage Shortcode Ultimate
* @author BdThemes https://www.bdthemes.com
* @copyright Copyright (c) 2012 - 2016 BdThemes
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

if (class_exists('Su_Shortcode_member')) {
	SpAddonsConfig::addonConfig(
		array(
			'type'       => 'wrap',
			'category'   => 'Shortcode Ultimate',
			'addon_name' => 'su_member',
			'title'      => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MEMBER'),
			'desc'       => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MEMBER_DESC'),
	        'icon'       => JURI::root().'plugins/sppagebuilder/shortcode_ultimate/addons/su_member/element.svg',

			'attr'=>array(
				'general' => array(
	                'photo' => array(
						'type'  => 'media',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MEMBER_PHOTO'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MEMBER_PHOTO_DESC')
	                ),
	                'name' => array(
						'type'  => 'text',
						'std'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_NAME_DEFAULT'),
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_NAME'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_NAME_DESC')
	                ),
	                'role' => array(
						'type'  => 'text',
						'std'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ROLE_DEFAULT'),
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ROLE'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ROLE_DESC')
	                ),
	                'text_align' => array(
						'type'   => 'select',
						'std'    => 'left',
						'values' => array(
	                        'left'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LEFT'),
	                        'center'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CENTER'),
	                        'right'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RIGHT')
	                	),
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ALIGN'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ALIGN_DESC')
	                ),
	                'url' => array(
						'type'  => 'text',
						'std'   => '',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_URL'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_URL_DESC')
	                ),
	                'class' => array(
						'type'  => 'text',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLASS'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLASS_DESC')
	                ),
	                'content' => array(
						'type'  => 'editor',
						'std'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MEMBER_CONTENT'),
						'title' => 'Content',
						'desc'  => '',
	                ),
				),
	            'icon' => array(
	                'icon_1' => array(
						'type'  => 'icon',
						'std'   => '',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_1'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_DESC'),
	                ),
	                'icon_1_color' => array(
						'type'  => 'color',
						'std'   => '#444444',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_1_COLOR'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_COLOR_DESC')
	                ),
	                'icon_1_title' => array(
						'type'  => 'text',
						'std'   => '',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_1_TITLE'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE_DESC'),
	                ),
	                'icon_1_url' => array(
						'type'  => 'text',
						'std'   => '',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_1_URL'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_URL_DESC')
	                ),
	                'icon_2' => array(
						'type'  => 'icon',
						'std'   => '',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_2'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_DESC'),
	                ),
	                'icon_2_color' => array(
						'type'  => 'color',
						'std'   => '#444444',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_2_COLOR'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_COLOR_DESC')
	                ),
	                'icon_2_title' => array(
						'type'  => 'text',
						'std'   => '',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_2_TITLE'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE_DESC'),
	                ),
	                'icon_2_url' => array(
						'type'  => 'text',
						'std'   => '',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_2_URL'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_URL_DESC')
	                ),
	                'icon_3' => array(
						'type'  => 'icon',
						'std'   => '',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_3'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_DESC'),
	                ),
	                'icon_3_color' => array(
						'type'  => 'color',
						'std'   => '#444444',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_3_COLOR'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_COLOR_DESC')
	                ),
	                'icon_3_title' => array(
						'type'  => 'text',
						'std'   => '',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_3_TITLE'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE_DESC'),
	                ),
	                'icon_3_url' => array(
						'type'  => 'text',
						'std'   => '',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_3_URL'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_URL_DESC')
	                ),
	                'icon_4' => array(
						'type'  => 'icon',
						'std'   => '',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_4'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_DESC'),
	                ),
	                'icon_4_color' => array(
						'type'  => 'color',
						'std'   => '#444444',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_4_COLOR'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_COLOR_DESC')
	                ),
	                'icon_4_title' => array(
						'type'  => 'text',
						'std'   => '',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_4_TITLE'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE_DESC'),
	                ),
	                'icon_4_url' => array(
						'type'  => 'text',
						'std'   => '',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_4_URL'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_URL_DESC')
	                ),
	                'icon_5' => array(
						'type'  => 'icon',
						'std'   => '',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_5'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_DESC'),
	                ),
	                'icon_5_color' => array(
						'type'  => 'color',
						'std'   => '#444444',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_5_COLOR'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_COLOR_DESC')
	                ),
	                'icon_5_title' => array(
						'type'  => 'text',
						'std'   => '',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_5_TITLE'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE_DESC'),
	                ),
	                'icon_5_url' => array(
						'type'  => 'text',
						'std'   => '',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_5_URL'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_URL_DESC')
	                ),
	                'icon_6' => array(
						'type'  => 'icon',
						'std'   => '',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_6'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_DESC'),
	                ),
	                'icon_6_color' => array(
						'type'  => 'color',
						'std'   => '#444444',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_6_COLOR'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_COLOR_DESC')
	                ),
	                'icon_6_title' => array(
						'type'  => 'text',
						'std'   => '',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_6_TITLE'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE_DESC'),
	                ),
	                'icon_6_url' => array(
						'type'  => 'text',
						'std'   => '',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_6_URL'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_URL_DESC')
	                ),
	            ),
		        'style' => array(
					'style' => array(
	                    'type'   => 'select',
	                    'values' => array(
	                        '1' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE1'),
	                        '2' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE2'),
	                        '3' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE3'),
	                        '4' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE4'),
	                        '5' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE5'),
	                        '6' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE6'),
	                        '7' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE7'),
	                        '8' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE8')
	                    ),
						'std'   => '1',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE_DESC')
	                ),
	                'color' => array(
						'type'  => 'color',
						'std'   => '#333333',
						'title' => 'Name Color',
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_COLOR_DESC')
	                ),
	                'shadow' => array(
						'type'  => 'text',
						'std'   => '0 0 0 #eeeeee',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHADOW'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHADOW_DESC')
	                ),
		        ),
			),
		)
	);
}