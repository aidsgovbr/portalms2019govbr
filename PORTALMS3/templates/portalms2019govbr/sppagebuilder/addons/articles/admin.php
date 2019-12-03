<?php
/**
* @package SP Page Builder
* @author JoomShaper http://www.joomshaper.com
* @copyright Copyright (c) 2010 - 2016 JoomShaper
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('resticted aceess');


SpAddonsConfig::addonConfig(
array(
	'type'=>'content',
	'addon_name'=>'sp_articles',
	'title'=>JText::_('COM_SPPAGEBUILDER_ADDON_ARTICLES'),
	'desc'=>JText::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_DESC'),
	'category'=>'Content',
	'attr'=>array(
		'general' => array(
			'admin_label'=>array(
				'type'=>'text',
				'title'=>JText::_('COM_SPPAGEBUILDER_ADDON_ADMIN_LABEL'),
				'desc'=>JText::_('COM_SPPAGEBUILDER_ADDON_ADMIN_LABEL_DESC'),
				'std'=> ''
			),

			'title'=>array(
				'type'=>'text',
				'title'=>JText::_('COM_SPPAGEBUILDER_ADDON_TITLE'),
				'desc'=>JText::_('COM_SPPAGEBUILDER_ADDON_TITLE_DESC'),
				'std'=>'',
			),

			'heading_selector'=>array(
				'type'=>'select',
				'title'=>JText::_('COM_SPPAGEBUILDER_ADDON_HEADINGS'),
				'desc'=>JText::_('COM_SPPAGEBUILDER_ADDON_HEADINGS_DESC'),
				'values'=>array(
					'h1'=>JText::_('COM_SPPAGEBUILDER_ADDON_HEADINGS_H1'),
					'h2'=>JText::_('COM_SPPAGEBUILDER_ADDON_HEADINGS_H2'),
					'h3'=>JText::_('COM_SPPAGEBUILDER_ADDON_HEADINGS_H3'),
					'h4'=>JText::_('COM_SPPAGEBUILDER_ADDON_HEADINGS_H4'),
					'h5'=>JText::_('COM_SPPAGEBUILDER_ADDON_HEADINGS_H5'),
					'h6'=>JText::_('COM_SPPAGEBUILDER_ADDON_HEADINGS_H6'),
				),
				'std'=>'h3',
				'depends'=>array(array('title', '!=', '')),
			),

			'title_font_family'=>array(
				'type'=>'fonts',
				'title'=>JText::_('COM_SPPAGEBUILDER_ADDON_TITLE_FONT_FAMILY'),
				'desc'=>JText::_('COM_SPPAGEBUILDER_ADDON_TITLE_FONT_FAMILY_DESC'),
				'depends'=>array(array('title', '!=', '')),
				'selector'=> array(
					'type'=>'font',
					'font'=>'{{ VALUE }}',
					'css'=>'.sppb-addon-title { font-family: {{ VALUE }}; }'
				)
			),

			'title_fontsize'=>array(
				'type'=>'slider',
				'title'=>JText::_('COM_SPPAGEBUILDER_ADDON_TITLE_FONT_SIZE'),
				'desc'=>JText::_('COM_SPPAGEBUILDER_ADDON_TITLE_FONT_SIZE_DESC'),
				'std'=>'',
				'depends'=>array(array('title', '!=', '')),
				'responsive' => true,
				'max'=> 400,
			),

			'title_lineheight'=>array(
				'type'=>'slider',
				'title'=>JText::_('COM_SPPAGEBUILDER_ADDON_TITLE_LINE_HEIGHT'),
				'std'=>'',
				'depends'=>array(array('title', '!=', '')),
				'responsive' => true,
				'max'=> 400,
			),

			'title_font_style'=>array(
				'type'=>'fontstyle',
				'title'=> JText::_('COM_SPPAGEBUILDER_ADDON_TITLE_FONT_STYLE'),
				'depends'=>array(array('title', '!=', '')),
			),

			'title_letterspace'=>array(
				'type'=>'select',
				'title'=>JText::_('COM_SPPAGEBUILDER_GLOBAL_LETTER_SPACING'),
				'values'=>array(
					'0'=> 'Default',
					'1px'=> '1px',
					'2px'=> '2px',
					'3px'=> '3px',
					'4px'=> '4px',
					'5px'=> '5px',
					'6px'=>	'6px',
					'7px'=>	'7px',
					'8px'=>	'8px',
					'9px'=>	'9px',
					'10px'=> '10px'
				),
				'std'=>'0',
				'depends'=>array(array('title', '!=', '')),
			),

			'title_text_color'=>array(
				'type'=>'color',
				'title'=>JText::_('COM_SPPAGEBUILDER_ADDON_TITLE_TEXT_COLOR'),
				'desc'=>JText::_('COM_SPPAGEBUILDER_ADDON_TITLE_TEXT_COLOR_DESC'),
				'depends'=>array(array('title', '!=', '')),
			),

			'title_margin_top'=>array(
				'type'=>'slider',
				'title'=>JText::_('COM_SPPAGEBUILDER_ADDON_TITLE_MARGIN_TOP'),
				'desc'=>JText::_('COM_SPPAGEBUILDER_ADDON_TITLE_MARGIN_TOP_DESC'),
				'placeholder'=>'10',
				'depends'=>array(array('title', '!=', '')),
				'responsive' => true,
				'max'=> 400,
			),

			'title_margin_bottom'=>array(
				'type'=>'slider',
				'title'=>JText::_('COM_SPPAGEBUILDER_ADDON_TITLE_MARGIN_BOTTOM'),
				'desc'=>JText::_('COM_SPPAGEBUILDER_ADDON_TITLE_MARGIN_BOTTOM_DESC'),
				'placeholder'=>'10',
				'depends'=>array(array('title', '!=', '')),
				'responsive' => true,
				'max'=> 400,
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

			'tagids'=>array(
				'type'=>'select',
				'title'=>JText::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_TAGS'),
				'desc'=>JText::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_TAGS_DESC'),
				'depends'=>array('resource'=>'article'),
				'values'=> SpPgaeBuilderBase::getArticleTags(),
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

			'post_type'=>array(
				'type'=>'select',
				'title'=>JText::_('COM_SPPAGEBUILDER_ADDON_POST_TYPE'),
				'desc'=>JText::_('COM_SPPAGEBUILDER_ADDON_POST_TYPE_DESC'),
				'values'=>array(
					''	=>JText::_('COM_SPPAGEBUILDER_ADDON_POST_TYPE_ALL'),
					'standard'	=>JText::_('COM_SPPAGEBUILDER_ADDON_POST_TYPE_STANDARD'),
					'audio'		=>JText::_('COM_SPPAGEBUILDER_ADDON_POST_TYPE_AUDIO'),
					'video'		=>JText::_('COM_SPPAGEBUILDER_ADDON_POST_TYPE_VIDEO'),
					'gallery'	=>JText::_('COM_SPPAGEBUILDER_ADDON_POST_TYPE_GALLERY'),
					'link'		=>JText::_('COM_SPPAGEBUILDER_ADDON_POST_TYPE_LINK'),
					'quote'		=>JText::_('COM_SPPAGEBUILDER_ADDON_POST_TYPE_QUOTE'),
					'status'	=>JText::_('COM_SPPAGEBUILDER_ADDON_POST_TYPE_STATUS'),
				),
				'std'=>'',
				'depends'=>array('resource'=>'article')
			),

			'include_subcat'=>array(
				'type'=>'select',
				'title'=>JText::_('COM_SPPAGEBUILDER_ADDON_INCLUDE_SUBCATEGORIES'),
				'desc'=>JText::_('COM_SPPAGEBUILDER_ADDON_INCLUDE_SUBCATEGORIES_DESC'),
				'values'=>array(
					1=>JText::_('COM_SPPAGEBUILDER_YES'),
					0=>JText::_('COM_SPPAGEBUILDER_NO'),
				),
				'std'=> 1,
			),

			'ordering'=>array(
				'type'=>'select',
				'title'=>JText::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_ORDERING'),
				'desc'=>JText::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_ORDERING_DESC'),
				'values'=>array(
					'latest'=>JText::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_ORDERING_LATEST'),
					'oldest'=>JText::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_ORDERING_OLDEST'),
					'hits'=>JText::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_ORDERING_POPULAR'),
					'featured'=>JText::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_ORDERING_FEATURED'),
					'alphabet_asc'=>JText::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_ORDERING_ALPHABET_ASC'),
					'alphabet_desc'=>JText::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_ORDERING_ALPHABET_DESC'),
					'random'=>JText::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_ORDERING_RANDOM'),
				),
				'std'=>'latest',
			),

			'limit'=>array(
				'type'=>'number',
				'title'=>JText::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_LIMIT'),
				'desc'=>JText::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_LIMIT_DESC'),
				'std'=>'3'
			),

			'columns'=>array(
				'type'=>'number',
				'title'=>JText::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_COLUMNS'),
				'desc'=>JText::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_COLUMNS_DESC'),
				'std'=>'3',
			),

			'show_intro'=>array(
				'type'=>'checkbox',
				'title'=>JText::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_SHOW_INTRO'),
				'desc'=>JText::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_SHOW_INTRO_DESC'),
				'std'=>1,
			),

			'intro_limit'=>array(
				'type'=>'number',
				'title'=>JText::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_INTRO_LIMIT'),
				'desc'=>JText::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_INTRO_LIMIT_DESC'),
				'std'=>'200',
				'depends'=>array('show_intro'=>'1')
			),

			'link_articles'=>array(
				'type'=>'checkbox',
				'title'=>JText::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_ALL_ARTICLES_BUTTON'),
				'desc'=>JText::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_ALL_ARTICLES_BUTTON_DESC'),
				'values'=>array(
					1=>JText::_('COM_SPPAGEBUILDER_YES'),
					0=>JText::_('COM_SPPAGEBUILDER_NO'),
				),
				'std'=>0,
			),

			'link_catid'=>array(
				'type'=>'category',
				'title'=>JText::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_CATID'),
				'desc'=>JText::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_CATID_DESC'),
				'depends'=> array(
					array('resource', '=', 'article'),
					array('link_articles', '=', '1')
				)
			),

			'link_k2catid'=>array(
				'type'=>'select',
				'title'=>JText::_('COM_SPPAGEBUILDER_ADDON_K2_CATID'),
				'desc'=>JText::_('COM_SPPAGEBUILDER_ADDON_K2_CATID_DESC'),
				'depends'=> array(
					array('resource', '=', 'k2'),
					array('link_articles', '=', '1')
				),
				'values'=> SpPgaeBuilderBase::k2CatList(),
			),

			'all_articles_btn_text'=>array(
				'type'=>'text',
				'title'=>JText::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_ALL_ARTICLES_BUTTON_TEXT'),
				'desc'=>JText::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_ALL_ARTICLES_BUTTON_TEXT_DESC'),
				'std'=>'See all posts',
				'depends'=>array('link_articles'=>'1')
			),

			'all_articles_btn_font_family'=>array(
				'type'=>'fonts',
				'title'=>JText::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_FONT_FAMILY'),
				'depends'=>array('link_articles'=>'1'),
				'selector'=> array(
					'type'=>'font',
					'font'=>'{{ VALUE }}',
					'css'=>'.btn { font-family: {{ VALUE }}; }'
				)
			),

			'all_articles_btn_font_style'=>array(
				'type'=>'fontstyle',
				'title'=> JText::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_FONT_STYLE'),
				'depends'=>array('link_articles'=>'1')
			),

			'all_articles_btn_letterspace'=>array(
				'type'=>'select',
				'title'=>JText::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_LETTER_SPACING'),
				'values'=>array(
					'0'=> 'Default',
					'1px'=> '1px',
					'2px'=> '2px',
					'3px'=> '3px',
					'4px'=> '4px',
					'5px'=> '5px',
					'6px'=>	'6px',
					'7px'=>	'7px',
					'8px'=>	'8px',
					'9px'=>	'9px',
					'10px'=> '10px'
				),
				'std'=>'0',
				'depends'=>array('link_articles'=>'1')
			),

			'all_articles_btn_type'=>array(
				'type'=>'select',
				'title'=>JText::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_STYLE'),
				'desc'=>JText::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_STYLE_DESC'),
				'values'=>array(
					'default'=>JText::_('COM_SPPAGEBUILDER_GLOBAL_DEFAULT'),
					'primary'=>JText::_('COM_SPPAGEBUILDER_GLOBAL_PRIMARY'),
					'secondary'=>JText::_('COM_SPPAGEBUILDER_GLOBAL_SECONDARY'),
					'success'=>JText::_('COM_SPPAGEBUILDER_GLOBAL_SUCCESS'),
					'info'=>JText::_('COM_SPPAGEBUILDER_GLOBAL_INFO'),
					'warning'=>JText::_('COM_SPPAGEBUILDER_GLOBAL_WARNING'),
					'danger'=>JText::_('COM_SPPAGEBUILDER_GLOBAL_DANGER'),
					'dark'=>JText::_('COM_SPPAGEBUILDER_GLOBAL_DARK'),
					'link'=>JText::_('COM_SPPAGEBUILDER_GLOBAL_LINK'),
					'custom'=>JText::_('COM_SPPAGEBUILDER_GLOBAL_CUSTOM'),
				),
				'std'=>'default',
				'depends'=>array('link_articles'=>'1')
			),

			'all_articles_btn_appearance'=>array(
				'type'=>'select',
				'title'=>JText::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_APPEARANCE'),
				'desc'=>JText::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_APPEARANCE_DESC'),
				'values'=>array(
					''=>JText::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_APPEARANCE_FLAT'),
					'outline'=>JText::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_APPEARANCE_OUTLINE'),
					'3d'=>JText::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_APPEARANCE_3D'),
				),
				'std'=>'flat',
				'depends'=>array('link_articles'=>'1')
			),

			'all_articles_btn_background_color'=>array(
				'type'=>'color',
				'title'=>JText::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND_COLOR'),
				'desc'=>JText::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND_COLOR_DESC'),
				'std' => '#444444',
				'depends'=>array(
					array('link_articles', '=', '1'),
					array('all_articles_btn_type' , '=', 'custom')
				),
			),

			'all_articles_btn_color'=>array(
				'type'=>'color',
				'title'=>JText::_('COM_SPPAGEBUILDER_GLOBAL_COLOR'),
				'desc'=>JText::_('COM_SPPAGEBUILDER_GLOBAL_COLOR_DESC'),
				'std' => '#fff',
				'depends'=>array(
					array('link_articles', '=', '1'),
					array('all_articles_btn_type' , '=', 'custom')
				),
			),

			'all_articles_btn_background_color_hover'=>array(
				'type'=>'color',
				'title'=>JText::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND_COLOR_HOVER'),
				'desc'=>JText::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND_COLOR_HOVER_DESC'),
				'std' => '#222',
				'depends'=>array(
					array('link_articles', '=', '1'),
					array('all_articles_btn_type' , '=', 'custom')
				),
			),

			'all_articles_btn_color_hover'=>array(
				'type'=>'color',
				'title'=>JText::_('COM_SPPAGEBUILDER_GLOBAL_COLOR_HOVER'),
				'desc'=>JText::_('COM_SPPAGEBUILDER_GLOBAL_COLOR_HOVER_DESC'),
				'std' => '#fff',
				'depends'=>array(
					array('link_articles', '=', '1'),
					array('all_articles_btn_type' , '=', 'custom')
				),
			),

			'all_articles_btn_size'=>array(
				'type'=>'select',
				'title'=>JText::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_SIZE'),
				'desc'=>JText::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_SIZE_DESC'),
				'values'=>array(
					''=>JText::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_SIZE_DEFAULT'),
					'lg'=>JText::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_SIZE_LARGE'),
					'xlg'=>JText::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_SIZE_XLARGE'),
					'sm'=>JText::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_SIZE_SMALL'),
					'xs'=>JText::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_SIZE_EXTRA_SAMLL'),
				),
				'depends'=>array('link_articles'=>'1')
			),

			'all_articles_btn_icon'=>array(
				'type'=>'icon',
				'title'=>JText::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_ICON'),
				'desc'=>JText::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_ICON_DESC'),
				'depends'=>array('link_articles'=>'1')
			),

			'all_articles_btn_icon_position'=>array(
				'type'=>'select',
				'title'=>JText::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_ICON_POSITION'),
				'values'=>array(
					'left'=>JText::_('COM_SPPAGEBUILDER_GLOBAL_LEFT'),
					'right'=>JText::_('COM_SPPAGEBUILDER_GLOBAL_RIGHT'),
				),
				'depends'=>array('link_articles'=>'1')
			),

			'all_articles_btn_block'=>array(
				'type'=>'select',
				'title'=>JText::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_BLOCK'),
				'desc'=>JText::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_BLOCK_DESC'),
				'values'=>array(
					''=>JText::_('JNO'),
					'sppb-btn-block'=>JText::_('JYES'),
				),
				'depends'=>array('link_articles'=>'1')
			),

			'class'=>array(
				'type'=>'text',
				'title'=>JText::_('COM_SPPAGEBUILDER_ADDON_CLASS'),
				'desc'=>JText::_('COM_SPPAGEBUILDER_ADDON_CLASS_DESC'),
				'std'=>''
			),

		),
		'options' => array(

			'hide_thumbnail'=>array(
				'type'=>'checkbox',
				'title'=>JText::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_HIDE_THUMBNAIL'),
				'desc'=>JText::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_HIDE_THUMBNAIL_DESC'),
				'values'=>array(
					1=>JText::_('COM_SPPAGEBUILDER_YES'),
					0=>JText::_('COM_SPPAGEBUILDER_NO'),
				),
				'std'=>0,
			),

			'show_author'=>array(
				'type'=>'checkbox',
				'title'=>JText::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_SHOW_AUTHOR'),
				'desc'=>JText::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_SHOW_AUTHOR_DESC'),
				'values'=>array(
					1=>JText::_('COM_SPPAGEBUILDER_YES'),
					0=>JText::_('COM_SPPAGEBUILDER_NO'),
				),
				'std'=>1,
			),

			'show_category'=>array(
				'type'=>'checkbox',
				'title'=>JText::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_SHOW_CATEGORY'),
				'desc'=>JText::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_SHOW_CATEGORY_DESC'),
				'values'=>array(
					1=>JText::_('COM_SPPAGEBUILDER_YES'),
					0=>JText::_('COM_SPPAGEBUILDER_NO'),
				),
				'std'=>1,
			),

			'show_date'=>array(
				'type'=>'checkbox',
				'title'=>JText::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_SHOW_DATE'),
				'desc'=>JText::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_SHOW_DATE_DESC'),
				'values'=>array(
					1=>JText::_('COM_SPPAGEBUILDER_YES'),
					0=>JText::_('COM_SPPAGEBUILDER_NO'),
				),
				'std'=>1,
			),

			'show_readmore'=>array(
				'type'=>'checkbox',
				'title'=>JText::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_SHOW_READMORE'),
				'desc'=>JText::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_SHOW_READMORE_DESC'),
				'values'=>array(
					1=>JText::_('COM_SPPAGEBUILDER_YES'),
					0=>JText::_('COM_SPPAGEBUILDER_NO'),
				),
				'std'=>1,
			),

			'readmore_text'=>array(
				'type'=>'text',
				'title'=>JText::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_READMORE_TEXT'),
				'desc'=>JText::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_READMORE_TEXT_DESC'),
				'std'=>'Read More',
				'depends'=>array('show_readmore'=>'1')
			),

		),
	),
	)
);
