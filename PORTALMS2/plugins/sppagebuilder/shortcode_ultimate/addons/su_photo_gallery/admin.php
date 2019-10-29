<?php
/**
* @subpackage Shortcode Ultimate
* @author BdThemes https://www.bdthemes.com
* @copyright Copyright (c) 2012 - 2016 BdThemes
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

if (class_exists('Su_Shortcode_photo_gallery')) {
    SpAddonsConfig::addonConfig(
    	array(
            'type'       => 'single',
            'category'   => 'Shortcode Ultimate',
            'addon_name' => 'su_photo_gallery',
            'title'      => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PHOTO_GALLERY'),
            'desc'       => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_GALLERY_DESC'),
            'icon'       => JURI::root().'plugins/sppagebuilder/shortcode_ultimate/addons/su_photo_gallery/element.svg',

    		'attr'=>array(
    			'general' => array(
                    'source_type'  => array(
                        'type'   => 'select',
                        'values' => array(
                            "category"    => "Joomla Category",
                            "k2-category" => "K2 Category",
                            "directory"   => "Directory Path",
                            "media"       => "Media Library",
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
                    'dir_path'  => array(
                        'type'        => 'text',
                        'title'       => 'Directory',
                        'placeholder' => 'images/gallery',
                        'desc'        => 'Type directory path',
                        'depends'     => array(
                            'source_type' => 'directory',
                        ),
                    ),
                    'med_library'  => array(
                        'type'        => 'text',
                        'title'       => 'Image URL',
                        'placeholder' => 'images/01.jpg,images/02.jpg',
                        'desc'        => 'Type image url. Use comma for saperating multiple image',
                        'depends'     => array(
                            'source_type' => 'media',
                        ),
                    ),
                    'limit' => array(
                        'type'  => 'number',
                        'std'   => 20,
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LIMIT'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LIMIT_DESC')
                    ),
                    'order' => array(
                        'type'   => 'select',
                        'std'    => 'created',
                        'title'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ORDER'),
                        'desc'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ORDER_DESCR'),
                        'values' => array(
                            'created'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CREATED_DATE'),
                            'title'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE'),
                            'hits'     => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_HITS'),
                            'ordering' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ORDERING')
                        ),
                    ),
                    'order_by' => array(
                        'type'   => 'select',
                        'std'    => 'desc',
                        'title'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ORDER_TYPE'),
                        'desc'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ORDER_TYPE_DESC'),
                        'values' => array(
                            'asc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ASC'),
                            'desc' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DESC')
                        ),
                    ),
                    'width' => array(
                        'type'  => 'number',
                        'std'   => 250,
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_GALLERY_WIDTH'), 
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_GALLERY_WIDTH_DESC'),
                    ),
                    'height' => array(
                        'type'  => 'number',
                        'std'   => 160,
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_GALLERY_HEIGHT'), 
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_GALLERY_HEIGHT_DESC')
                    ),
                    'thumb_resize' => array(
                        'type'  => 'checkbox',
                        'std'   => '0',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_THUMB_RESIZE'), 
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_THUMB_RESIZE_DESC')
                    ),
                    'horizontal_gap' => array(
                        'type'  => 'number',
                        'std'   => 10,
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_HORIZONTAL_GAP'), 
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_HORIZONTAL_GAP_DESC'),
                    ),
                    'vertical_gap' => array(
                        'type'  => 'number',
                        'std'   => 10,
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_VERTICAL_GAP'), 
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_VERTICAL_GAP_DESC')
                    ),
                    'large' => array(
                        'type'  => 'number',
                        'std'   => 4,
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LARGE_DEVICE_ITEM'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LARGE_DEVICE_ITEM_DESC'),
                    ),
                    'medium' => array(
                        'type'  => 'number',
                        'std'   => 3,
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MEDIUM_DEVICE_ITEM'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MEDIUM_DEVICE_ITEM_DESC')
                    ),
                    'small' => array(
                        'type'  => 'number',
                        'std'   => 1,
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SMALL_DEVICE_ITEM'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SMALL_DEVICE_ITEM_DESC')
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
                            '4' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE4')
                        ),
                    ),
                ),
    		),
    	)
    );
}