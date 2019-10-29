<?php
/**
* @subpackage Shortcode Ultimate
* @author BdThemes https://www.bdthemes.com
* @copyright Copyright (c) 2012 - 2016 BdThemes
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

if (class_exists('Su_Shortcode_heading')) {
	SpAddonsConfig::addonConfig(
		array(
			'type'       => 'wrap',
			'category'   => 'Shortcode Ultimate',
			'addon_name' => 'su_heading',
			'title'      => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_HEADING'),
			'desc'       => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_HEADING_DESC'),
	        'icon'       => JURI::root().'plugins/sppagebuilder/shortcode_ultimate/addons/su_heading/element.svg',

			'attr'=>array(
				'general' => array(
					'content'=>array(
						'type'        => 'text',
						'title'       => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_HEADING_CONTENT'),
						'std'         => 'Your heading text',
						'placeholder' => 'Your heading text',
					),
					'heading' => array(
	                    'type'   => 'select',
	                    'values' => array(
	                        'h1' => 'H1',
	                        'h2' => 'H2',
	                        'h3' => 'H3',
	                        'h4' => 'H4',
	                        'h5' => 'H5',
	                        'h6' => 'H6'
	                    ),
						'std'   => 'h3',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_HEADING_TAG'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_HEADING_TAG_DESC'),
	                ),
		            'align' => array(
	                    'type'   => 'select',
	                    'values' => array(
	                        'left'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LEFT'),
	                        'center' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CENTER'),
	                        'right'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RIGHT')
	                    ),
						'std'   => 'center',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ALIGN'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ALIGN_DESC')
	                ),
	                'width' => array(
						'type'  => 'number',
						'std'   => 100,
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_WIDTH'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_WIDTH_DESC')
	                ),
	                'size' => array(
						'type'  => 'number',
						'std'   => 16,
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SIZE'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SIZE_DESC')
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
		                    'values' => array(
								'default'            => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DEFAULT'),
								'1'                  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE1'),
								'2'                  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE2'),
								'3'                  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE3'),
								'4'                  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE4'),
								'5'                  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE5'),
								'6'                  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE6'),
								'7'                  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE7'),
								'8'                  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE8'),
								'9'                  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE9'),
								'10'                 => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE10'),
								
								'modern-1-dark'      => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MODERN_1_DARK'),
								'modern-1-light'     => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MODERN_1_LIGHT'),
								'modern-1-blue'      => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MODERN_1_BLUE'),
								'modern-1-orange'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MODERN_1_ORANGE'),
								'modern-1-violet'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MODERN_1_VIOLET'),
								
								'modern-2-dark'      => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MODERN_2_DARK'),
								'modern-2-light'     => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MODERN_2_LIGHT'),
								'modern-2-blue'      => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MODERN_2_BLUE'),
								'modern-2-orange'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MODERN_2_ORANGE'),
								'modern-2-violet'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MODERN_2_VIOLET'),
								
								'line-dark'          => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LINE_DARK'),
								'line-light'         => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LINE_LIGHT'),
								'line-blue'          => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LINE_BLUE'),
								'line-orange'        => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LINE_ORANGE'),
								'line-violet'        => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LINE_VIOLET'),
								
								'dotted-line-dark'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DOTTED_LINE_DARK'),
								'dotted-line-light'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DOTTED_LINE_LIGHT'),
								'dotted-line-blue'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DOTTED_LINE_BLUE'),
								'dotted-line-orange' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DOTTED_LINE_ORANGE'),
								'dotted-line-violet' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DOTTED_LINE_VIOLET'),
								
								'flat-dark'          => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FLAT_DARK'),
								'flat-light'         => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FLAT_LIGHT'),
								'flat-blue'          => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FLAT_BLUE'),
								'flat-green'         => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FLAT_GREEN'),
								
								'small-line'         => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SMALL_LINE'),
								'fancy'              => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FANCY') 
		                    ),
						'std'   => 'default',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE_DESC')
	                ),
	                'style_color' => array(
						'type'  => 'color',
						'std'   => '#ddd',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE_COLOR'), 
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE_COLOR_DESC')
		            ),
	            ),
			),
		)
	);
}