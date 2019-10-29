<?php
/**
* @subpackage Shortcode Ultimate
* @author BdThemes https://www.bdthemes.com
* @copyright Copyright (c) 2012 - 2016 BdThemes
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

if (class_exists('Su_Shortcode_faq')) {
	SpAddonsConfig::addonConfig(
		array(
			'type'       => 'single',
			'category'   => 'Shortcode Ultimate',
			'addon_name' => 'su_faq',
			'title'      => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FAQ'),
			'desc'       => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FAQ_DESC'),
	        'icon'       => JURI::root().'plugins/sppagebuilder/shortcode_ultimate/addons/su_faq/element.svg',

			'attr'       => array(
				'general'    => array(
					'source_type'  => array(
						'type'   => 'select',
						'values' => array(
							"category"    => "Joomla Category",
							"k2-category" => "K2 Category",
	                    ),
						'std'    => 'category',
						'title'  => 'Source Type',
						'desc'   => 'Select Source Type'
	                ),
	                'j_category'  => array(
						'type'     => 'select',
						'multiple' => 'multiple',
						'values'   => su_sp_category(),
						'title'    => 'Joomla Category',
						'desc'     => 'Select one more category',
						'depends'  => array(
							'source_type' => 'category',
						),
	                ),
	                'k2_category'  => array(
						'type'     => 'select',
						'multiple' => 'multiple',
						'values'   => su_sp_category('k2'),
						'title'    => 'K2 Category',
						'desc'     => 'Select one more category',
						'depends'  => array(
							'source_type' => 'k2-category',
						),
	                ),
	                'limit' => array(
						'type'  => 'number',
						'std'   => 12,
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LIMIT'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LIMIT_DESC')
	                ),
	                'order' => array(
						'type'   => 'select',
						'values' => array(
							'created'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CREATED_DATE'),
							'title'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE'),
							'hits'     => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_HITS'),
							'ordering' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ORDERING')
						),
						'std'   => 'created',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ORDER'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ORDER_DESCR'),
	             	),
					'order_by' => array(
						'type'   => 'select',
						'values' => array(
							'asc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ASC'),
							'desc'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DESC')
						),
						'std'   => 'desc',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ORDER_TYPE'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ORDER_TYPE_DESC')
	                ),
	                'filter' => array(
						'type'  => 'checkbox',
						'std'   => '1',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHOW_FILTER'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHOW_FILTER_DESC'),
	                ),
	                'filter_animation' => array(
						'type'   => 'select',
						'values' => array(
							'fadeOut'      => 'Fade Out',
							'quicksand'    => 'Quicksand',
							'boxShadow'    => 'Box Shadow',
							'bounceLeft'   => 'Bounce Left',
							'bounceTop'    => 'Bounce Top',
							'bounceBottom' => 'Bounce Bottom',
							'moveLeft'     => 'Move Left',
							'slideLeft'    => 'Slide Left',
							'fadeOutTop'   => 'Fade Out Top',
							'sequentially' => 'Sequentially',
							'skew'         => 'Skew',
							'slideDelay'   => 'Slide Delay',
							'3dflip'       => '3d Flip',
							'rotateSides'  => 'Rotate Sides',
							'flipOutDelay' => 'Flip Out Delay',
							'flipOut'      => 'Flip Out',
							'unfold'       => 'Unfold',
							'foldLeft'     => 'Fold Left',
							'scaleDown'    => 'Scale Down',
							'scaleSides'   => 'Scale Sides',
							'frontRow'     => 'Front Row',
							'flipBottom'   => 'Flip Bottom',
							'rotateRoom'   => 'Rotate Room'
	                    ),
						'std'   => 'rotateSides',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FILTER_ANIMATION'), 
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FILTER_ANIMATION_DESC')
	                ),
	                'link_to_article' => array(
						'type'  => 'checkbox',
						'std'   => '0',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LINK_TO_ARTILE'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LINK_TO_ARTILE_DESC'),
	                ),
	                'target' => array(
						'type'   => 'select',
						'values' => array(
	                        'self'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SELF'),
	                        'blank' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BLANK')
	                    ),
					'std'   => 'self',
					'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TARGET'),
					'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TARGET_DESC')
	                ),
	                'class' => array(
						'type'  => 'text',
						'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLASS'),
						'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLASS_DESC')
	                ),
				),
			),
		)
	);
}