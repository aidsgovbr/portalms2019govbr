<?php
/**
* @subpackage Shortcode Ultimate
* @author BdThemes https://www.bdthemes.com
* @copyright Copyright (c) 2012 - 2016 BdThemes
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

if (class_exists('Su_Shortcode_custom_carousel')) {
    SpAddonsConfig::addonConfig(
    	array(
            'type'       => 'wrap',
            'category'   => 'Shortcode Ultimate',
            'addon_name' => 'su_custom_carousel',
            'title'      => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CUSTOM_CAROUSEL'),
            'desc'       => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CUSTOM_CAROUSEL_DESC'),
            'icon'       => JURI::root().'plugins/sppagebuilder/shortcode_ultimate/addons/su_custom_carousel/element.svg',

    		'attr'=>array(
                'general' => array(
                    'large' => array(
                        'type'  => 'number',
                        'std'   => 5,
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LARGE_DEVICE_ITEM'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LARGE_DEVICE_ITEM_DESC')
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
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SMALL_DEVICE_ITEM_DESC'),
                    ),                
                    'pagination' => array(
                        'type'  => 'checkbox',
                        'std'   => '1',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PAGINATION'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PAGINATION_DESC'),
                    ),
                    'arrows' => array(
                        'type'  => 'checkbox',
                        'std'   => '1',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ARROWS'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ARROWS_DESC')
                    ),
                    'autoplay' => array(
                        'type'  => 'checkbox',
                        'std'   => '1',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_AUTOPLAY'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_AUTOPLAY_DESC')
                    ),
                    'center_zoom' => array(
                        'type'  => 'checkbox',
                        'std'   => '0',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CENTER_ZOOM'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CENTER_ZOOM_DESC')
                    ),
                    'hoverpause' => array(
                        'type'  => 'checkbox',
                        'std'   => '1',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_HOVERPAUSE'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_HOVERPAUSE_DESC'),
                    ),
                    'lazyload' => array(
                        'type'  => 'checkbox',
                        'std'   => '0',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LAZYLOAD'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LAZYLOAD_DESC')
                    ),
                    'loop' => array(
                        'type'  => 'checkbox',
                        'std'   => '1',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LOOP'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LOOP_DESC')
                    ),               
                    'speed' => array(
                        'type'  => 'number',
                        'std'   => 600,
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SPEED'), 
                        'desc'  => 'Specify time (in milliseconds) that will be taken to complete animation effect',
                    ),
                    'delay' => array(
                        'type'  => 'number',
                        'std'   => 4000,
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DELAY'), 
                        'desc'  => 'After mentioned time (in milliseconds) animation will start'
                    ),
                    'class' => array(
                        'type'  => 'text',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLASS'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLASS_DESC')
                    )
                ),
                'item' => array(
                    'carousel_item' => array(
                        'attr' => array(
                            'content' =>array(
                                'type'  =>'editor',
                                'title' => 'Content',
                                'std'   =>'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.'
                            ),
                        ),
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
                            '4' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE4'),
                            '5' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE5')
                        )
                    ),
                    'background' => array(
                        'type'  => 'color',
                        'std'   => 'rgba(0,0,0,0)',
                        'title' => 'Item Background',
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BACKGROUND_DESC'),
                    ),
                    'margin' => array(
                        'type'  => 'number',
                        'std'   => 10,
                        'title' => 'Item Margin',
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CAROUSEL_MARGIN_DESC'),
                    ),
                    'padding' => array(
                        'type'  => 'text',
                        'title' => 'Item Padding',
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PADDING_DESC')
                    ),
                    'border' => array(
                        'type'  => 'text',
                        'std'   => '0px solid #eee',
                        'title' => 'Item Border',
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BORDER_DESC')
                    ),
                ),
    		),
    	)
    );
}