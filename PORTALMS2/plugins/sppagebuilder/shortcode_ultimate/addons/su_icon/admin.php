<?php
/**
* @subpackage Shortcode Ultimate
* @author BdThemes https://www.bdthemes.com
* @copyright Copyright (c) 2012 - 2016 BdThemes
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

if (class_exists('Su_Shortcode_icon')) {
	SpAddonsConfig::addonConfig(
		array(
			'type'       => 'single',
			'category'   => 'Shortcode Ultimate',
			'addon_name' => 'su_icon',
			'title'      => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON'),
			'desc'       => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_HEADING_DESC'),
	        'icon'       => JURI::root().'plugins/sppagebuilder/shortcode_ultimate/addons/su_icon/element.svg',

			'attr'=>array(
				'general' => array(
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
					'url' => array(
						'type'  => 'text',
						'std'   => '',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_URL'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_URL_DESC')
	                ),
	                'size' => array(
						'type'  => 'number',
						'std'   => '16',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_SIZE'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_SIZE_DESC')
	                ),
	                'class' => array(
						'type'  => 'text',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLASS'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLASS_DESC')
	                ),
				),
	            'style' => array(
	                'color' => array(
						'type'  => 'color',
						'std'   => '#333333',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_COLOR'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_COLOR_DESC')
	                ),
	            ),
			),
		)
	);
}