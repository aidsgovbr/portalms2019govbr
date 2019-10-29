<?php
/**
* @subpackage Shortcode Ultimate
* @author BdThemes https://www.bdthemes.com
* @copyright Copyright (c) 2012 - 2016 BdThemes
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

if (class_exists('Su_Shortcode_drawer')) {
	SpAddonsConfig::addonConfig(
		array(
			'type'       => 'wrap',
			'category'   => 'Shortcode Ultimate',
			'addon_name' => 'su_drawer',
			'title'      => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DRAWER'),
			'desc'       => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DRAWER_DESC'),
	        'icon'       => JURI::root().'plugins/sppagebuilder/shortcode_ultimate/addons/su_drawer/element.svg',

			'attr'=>array(
				'general' => array(
					'open_title' => array(
						'type'  => 'text',
						'std'   => 'Reveal it',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_OPEN_TITLE'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE_DESC'),
	                ),
	                'close_title' => array(
						'type'  => 'text',
						'std'   => 'Close me',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLOSE_TITLE'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE_DESC'),
	                ),
	                'open_icon' => array(
						'type'  => 'icon',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_OPEN_ICON'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_DESC'),
	                ),
	                'close_icon' => array(
						'type'  => 'icon',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLOSE_ICON'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_DESC'),
	                ),
	                'animation' => array(
						'type'   => 'select',
						'values' => array_combine(Su_Data::easings(), Su_Data::easings()),
						'std'    => 'easeOutExpo',
						'title'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ANIMATION'),
						'desc'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ANIMATION_DESC'),
	                ),
	                'duration' => array(
						'type'  => 'number',
						'std'   => 1000,
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DURATION'),
						'desc'  => 'You can set animation duration as (milliseconds) units from here.'
	                ),
	                'class' => array(
						'type'  => 'text',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLASS'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLASS_DESC')
	                ),
	                'content' => array(
						'type'  => 'editor',
						'title' => "Content",
						'std'   => "Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus.",
	                ),
				),
	            'style' => array(
	                'title_background' => array(
						'type'  => 'color',
						'std'   => '#444444',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE_BACKGROUND'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE_BACKGROUND_DESC'),
	                ),
	                'title_color' => array(
						'type'  => 'color',
						'std'   => '#ffffff',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE_COLOR'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE_COLOR_DESC'),
	                ),
	                'background' => array(
						'type'  => 'color',
						'std'   => '#f5f5f5',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CONTENT_BACKGROUND'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BACKGROUND_DESC'),
	                ),
	                'padding' => array(
						'type'  => 'text',
						'std'   => '30px',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CONTENT_PADDING'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PADDING_DESC'),
	                ),
	            ),
			),
		)
	);
}