<?php
/**
* @subpackage Shortcode Ultimate
* @author BdThemes https://www.bdthemes.com
* @copyright Copyright (c) 2012 - 2016 BdThemes
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

if (class_exists('Su_Shortcode_modal')) {
    SpAddonsConfig::addonConfig(
    	array(
            'type'       => 'wrap',
            'category'   => 'Shortcode Ultimate',
            'addon_name' => 'su_modal',
            'title'      => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MODAL'),
            'desc'       => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MODAL_DESC'),
            'icon'       => JURI::root().'plugins/sppagebuilder/shortcode_ultimate/addons/su_modal/element.svg',

    		'attr'=>array(
    			'general' => array(
                    'effect' => array(
                        'type'   => 'select',
                        'std'    => '1',
                        'title'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MODAL_EFFECT'),
                        'desc'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MODAL_EFFECT_DESC'),
                        'values' => array(
                            '1'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FADE_IN_AND_SCALE'),
                            '2'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SLIDE_IN_RIGHT'),
                            '3'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SLIDE_IN_BOTTOM'),
                            '4'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FALL'),
                            '5'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SLIDE_FALL'),
                            '6'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STICKY_UP'),
                            '7'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_3D_FLIP_HORIZONTAL'),
                            '8'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_3D_FLIP_VERTICAL'),
                            '9'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_3D_SIGN'),
                            '10' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SUPER_SCALED'),
                            '11' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_JUST_ME'),
                            '12' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_3D_SLIT'),
                            '13' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_3D_ROTATE_BOTTOM'),
                            '14' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_3D_ROTATE_IN_LEFT'),
                            '15' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BLUR'),
                            '16' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LET_ME_IN'),
                            '17' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MAKE_WAY'),
                            '18' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SLIP_FROM_TOP')
                        ),
                    ),
                    'width' => array(
                        'type'  => 'text',
                        'std'   => '750px',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MODAL_WIDTH'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MODAL_WIDTH_DESC')
                    ),
                    'height' => array(
                        'type'  => 'text',
                        'std'   => 'auto',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MODAL_HEIGHT'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MODAL_HEIGHT_DESC'),
                    ),
                    'button_text' => array(
                        'type'  => 'text',
                        'std'   => 'Open Modal',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BUTTON_TEXT'), 
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BUTTON_TEXT_DESC'),
                    ),
                    'button_class' => array(
                        'type'  => 'text',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BUTTON_CLASS'), 
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BUTTON_CLASS_DESC')
                    ),
                    'close_button' => array(
                        'type'  => 'checkbox',
                        'std'   => '0',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLOSE_BUTTON'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLOSE_BUTTON_DESC')
                    ),                      
                    'title' => array(
                        'type'  => 'text',
                        'std'   => 'Modal title',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MODAL_TITLE'), 
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MODAL_TITLE_DESC'),
                    ),
                    'class' => array(
                        'type'  => 'text',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLASS'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLASS_DESC')
                    ),
                    'content' => array(
                        'type'  => 'editor',
                        'std'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MODAL_CONTENT'),
                        'title' => 'Content'
                    ),
                ),
                'style' => array(
                    'background' => array(
                        'type'  => 'color',
                        'std'   => '#2D89EF',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MODAL_BACKGROUND'), 
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MODAL_BACKGROUND_DESC'),
                    ),
                    'color' => array(
                        'type'  => 'color',
                        'std'   => '#ffcc00',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MODAL_COLOR'), 
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MODAL_COLOR_DESC')
                    ),
                    'border' => array(
                        'type'  => 'text',
                        'std'   => '0 solid #cccccc',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MODAL_BORDER'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MODAL_BORDER_DESC')
                    ),
                    'shadow' => array(
                        'type'  => 'text',
                        'std'   => '0 0 0 #000000',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MODAL_SHADOW'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MODAL_SHADOW_DESC')
                    ),
                    'overlay_background' => array(
                        'type'  => 'color',
                        'std'   => 'rgba(0,0,0,0.5)',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_OVERLAY_BACKGROUND'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_OVERLAY_BACKGROUND_DESC')
                    ),
                    'title_background' => array(
                        'type'  => 'color',
                        'std'   => 'rgba(0,0,0,0.1)',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE_BACKGROUND'), 
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE_BACKGROUND_DESC'),
                    ),
                    'title_color' => array(
                        'type'  => 'color',
                        'std'   => '#ffcc00',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE_COLOR'), 
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE_COLOR_DESC')
                    ),
                ),
    		),
    	)
    );
}