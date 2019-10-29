<?php
/**
* @subpackage Shortcode Ultimate
* @author BdThemes https://www.bdthemes.com
* @copyright Copyright (c) 2012 - 2016 BdThemes
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

if (class_exists('Su_Shortcode_icon_list_item')) {
	SpAddonsConfig::addonConfig(
		array(
			'type'       => 'wrap',
			'category'   => 'Shortcode Ultimate',
			'addon_name' => 'su_icon_list_item',
			'title'      => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_LIST'),
			'desc'       => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_LIST_DESC'),
	        'icon'       => JURI::root().'plugins/sppagebuilder/shortcode_ultimate/addons/su_icon_list_item/element.svg',

			'attr'=>array(
				'general' => array(
					'title' => array(
						'type'  => 'text',
						'std'   => 'Icon List Heading',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE_DESC'),
	                ),
	                'title_size' => array(
						'type'  => 'text',
						'std'   => '16px',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE_SIZE'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE_SIZE_DESC')
	                ),
	                'connector' => array(
						'type'  => 'checkbox',
						'std'   => '0',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CONNECTOR'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CONNECTOR_DESC'),
	                ),
	                'url' => array(
						'type'  => 'text',
						'std'   => '',
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
	                'linkto' => array(
						'type'   => 'select',
						'std'    => 'title',
						'title'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LINKTO'),
						'desc'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LINKTO_DESC'),
						'values' => array(
							'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE'),
							'icon'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON'),
							'all'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ALL'),
                        ),
                    ),
	                'class' => array(
						'type'  => 'text',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLASS'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLASS_DESC')
	                ),
	                'content' => array(
						'type'   => 'editor',
						'std'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CONTENT'),
						'title'  => 'Content',
	                ),
				),
	            'icon' => array(
					'icon_type'=>array(
						'title'  =>'Icon Type',
						'desc'   =>'Select icon type',
						'type'   =>'select',
						'values' =>array(
							'fontawesome' => 'Fontawesome Icon',
							'lineicon'    => 'Line Icon',
							'image'       => 'Image Icon',
						),
						'std'=> 'fontawesome',
					),
					'icon_fontawesome'=>array(
						'title'   =>'Fontawesome Icon',
						'desc'    =>'Select a fontawesome icon',
						'type'    =>'icon',
						'std'     => 'fa-home',
						'depends' => array(
							'icon_type' => 'fontawesome',
						),
					),
					'icon_lineicon'=>array(
						'title'       =>'Line Icon',
						'desc'        =>'Write line icon name',
						'type'        =>'text',
						'std'         => 'home',
						'placeholder' => 'home',
						'depends'     => array(
							'icon_type' => 'lineicon',
						),
					),
					'icon_image'=>array(
						'title'   =>'Image Icon',
						'desc'    =>'Select an image for icon',
						'type'    =>'media',
						'std'     => '',
						'depends' => array(
							'icon_type' => 'image',
						),
					),
					'icon_color' => array(
						'type'  => 'color',
						'std'   => '#333333',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_COLOR'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_COLOR_DESC'),
	                ),
	                'icon_background' => array(
						'type'  => 'color',
						'std'   => 'transparent',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BACKGROUND'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BACKGROUND_DESC')  
	                ),
	                'icon_size' => array(
						'type'  => 'number',
						'std'   => 24,
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SIZE'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SIZE_DESC')
	                ),
	                'icon_animation' => array(
	                    'type'   => 'select',
	                    'values' => array(
							''  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_NO_ANIMATION'),
							'1' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ANIMATION1'),
							'2' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ANIMATION2'),
							'3' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ANIMATION3'),
							'4' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ANIMATION4'),
							'5' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ANIMATION5'),
							'6' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ANIMATION6')
	                    ),
						'std'   => '',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_ANIMATION'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_ANIMATION_DESC')
	                ),
	                'icon_border' => array(
						'type'  => 'text',
						'std'   => '0 solid #cccccc',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BORDER'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BORDER_DESC')
	                ),
	                'icon_shadow' => array(
						'type'  => 'text',
						'std'   => '0 0 0 #444444',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHADOW'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHADOW_DESC')
	                ),
	                'icon_padding' => array(
						'type'  => 'text',
						'std'   => '20px',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PADDING'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PADDING_DESC'),
	                ),
	                'icon_radius' => array(
						'type'  => 'text',
						'std'   => '0px',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RADIUS'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RADIUS_DESC')
	                ),
	                'icon_align' => array(
						'type'   => 'select',
						'std'    => 'center',
						'title'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ALIGN'),
						'desc'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ALIGN_DESC'),
						'values' => array(
	                        'left'      => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LEFT'),
	                        'right'     => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RIGHT'),
	                        'top'       => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TOP'),
	                        'title'     => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE'),
	                        'top_left'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TOP_LEFT'),
	                        'top_right' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TOP_RIGHT')
	                    ),
	                ),
	            ),
	            'style' => array(
	                'title_color' => array(
						'type'  => 'color',
						'std'   => '#444444',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE_COLOR'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE_COLOR_DESC')
	                ),
	            ),
			),
		)
	);
}