<?php
/**
* @package SP Page Builder
* @author JoomShaper http://www.joomshaper.com
* @copyright Copyright (c) 2010 - 2016 JoomShaper
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('Restricted access');

SpAddonsConfig::addonConfig(
	array(
		'type'=>'content',
		'addon_name'=>'contentslider',
		'title'=>'contentslider',
		'desc'=>'contentslider',
		'category'=>'Newskit',
		'attr'=>array(
			'general' => array(
				'admin_label'=>array(
					'type'=>'text',
					'title'=>JText::_('COM_SPPAGEBUILDER_ADDON_ADMIN_LABEL'),
					'desc'=>JText::_('COM_SPPAGEBUILDER_ADDON_ADMIN_LABEL_DESC'),
					'std'=> ''
				),

				'separator_options'=>array(
					'type'=>'separator',
					'title'=>JText::_('COM_SPPAGEBUILDER_GLOBAL_ADDON_OPTIONS')
				),

				'resource'=>array(
					'type'=>'select',
					'title'=>JText::_('COM_SPPAGEBUILDER_ADDON_ARTICLE_RESOURCE'),
					'desc'=>JText::_('COM_SPPAGEBUILDER_ADDON_ARTICLE_RESOURCE_DESC'),
					'values'=>array(
						'article'=>JText::_('COM_SPPAGEBUILDER_ADDON_ARTICLE_RESOURCE_ARTICLE'),
						'k2'=>JText::_('COM_SPPAGEBUILDER_ADDON_ARTICLE_RESOURCE_K2'),
						),
					'std'=>'article',
				),
				
				'catid'=>array(
					'type'=>'category',
					'title'=>JText::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_CATID'),
					'desc'=>JText::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_CATID_DESC'),
					'depends'=>array('resource'=>'article'),
					'multiple'=>true,
				),

				'k2catid'=>array(
					'type'=>'select',
					'title'=>JText::_('COM_SPPAGEBUILDER_ADDON_K2_CATID'),
					'desc'=>JText::_('COM_SPPAGEBUILDER_ADDON_K2_CATID_DESC'),
					'depends'=>array('resource'=>'k2'),
					'values'=> SpPgaeBuilderBase::k2CatList(),
					'multiple'=>true,
				),
								
				'orderby'=>array(
					'type'=>'select',
					'title'=>JText::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_ORDERING'),
					'desc'=>JText::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_ORDERING_DESC'),
					'values'=>array(
						'latest'=>JText::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_ORDERING_LATEST'),
						'oldest'=>JText::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_ORDERING_OLDEST'),
						'hits'=>JText::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_ORDERING_POPULAR'),
						'featured'=>JText::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_ORDERING_FEATURED'),
					),
					'std'=>'latest',
				),

				'limit'=>array(
					'type'=>'number', 
					'title'=>JText::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_LIMIT'),
					'desc'=>JText::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_LIMIT_DESC'),
					'std'=>'4'
				),
				'show_category'=>array(
					'type'=>'select', 
					'title'=>JText::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_SHOW_CATEGORY'),
					'desc'=>JText::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_SHOW_CATEGORY_DESC'),
					'values'=>array(
						1=>JText::_('COM_SPPAGEBUILDER_YES'),
						0=>JText::_('COM_SPPAGEBUILDER_NO'),
						),
					'std'=>1,
				),

				'show_date'=>array(
					'type'=>'select', 
					'title'=>JText::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_SHOW_DATE'),
					'desc'=>JText::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_SHOW_DATE_DESC'),
					'values'=>array(
						1=>JText::_('COM_SPPAGEBUILDER_YES'),
						0=>JText::_('COM_SPPAGEBUILDER_NO'),
						),
					'std'=>1,
				),

				'show_author'=>array(
					'type'=>'select', 
					'title'=>JText::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_SHOW_AUTHOR'),
					'desc'=>JText::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_SHOW_AUTHOR_DESC'),
					'values'=>array(
						1=>JText::_('COM_SPPAGEBUILDER_YES'),
						0=>JText::_('COM_SPPAGEBUILDER_NO'),
						),
					'std'=>1,
				),
				'autoplay'=>array(
					'type'=>'select',
					'title'=>JText::_('Autoplay'),
					'values'=>array(
						'true'=>JText::_('COM_SPPAGEBUILDER_YES'),
						'false'=>JText::_('COM_SPPAGEBUILDER_NO'),
						),
					'std'=>'true',
				),
				'rtl'=>array(
					'type'=>'select',
					'title'=>JText::_('RTL'),
					'values'=>array(
						'true'=>JText::_('COM_SPPAGEBUILDER_YES'),
						'false'=>JText::_('COM_SPPAGEBUILDER_NO'),
						),
					'std'=>'false',
				),
				'pagination'=>array(
					'type'=>'select',
					'title'=>JText::_('Pagination'),
					'values'=>array(
						'true'=>JText::_('COM_SPPAGEBUILDER_YES'),
						'false'=>JText::_('COM_SPPAGEBUILDER_NO'),
						),
					'std'=>'false',
				),
				'navigation'=>array(
					'type'=>'select',
					'title'=>JText::_('Navigation'),
					'values'=>array(
						'true'=>JText::_('COM_SPPAGEBUILDER_YES'),
						'false'=>JText::_('COM_SPPAGEBUILDER_NO'),
						),
					'std'=>'true',
				),
				'class'=>array(
					'type'=>'text',
					'title'=>JText::_('COM_SPPAGEBUILDER_ADDON_CLASS'),
					'desc'=>JText::_('COM_SPPAGEBUILDER_ADDON_CLASS_DESC'),
					'std'=>''
				),

			),
		),
	)
);
