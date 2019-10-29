<?php
/**
* @subpackage Shortcode Ultimate
* @author BdThemes https://www.bdthemes.com
* @copyright Copyright (c) 2012 - 2016 BdThemes
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

if (class_exists('Su_Shortcode_qrcode')) {
    SpAddonsConfig::addonConfig(
    	array(
            'type'       => 'single',
            'category'   => 'Shortcode Ultimate',
            'addon_name' => 'su_qrcode',
            'title'      => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_QR_CODE'),
            'desc'       => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_QR_CODE_DESC'),
            'icon'       => JURI::root().'plugins/sppagebuilder/shortcode_ultimate/addons/su_qrcode/element.svg',

    		'attr'=>array(
    			'general' => array(
                    'data' => array(
                        'type'  => 'text',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_QR_CODE_DATA'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_QR_CODE_DATA_DESC')
                    ),
                    'title' => array(
                        'type'  => 'text',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_QR_CODE_TITLE'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_QR_CODE_TITLE_DESC')
                    ),
                    'size' => array(
                        'type'  => 'number',
                        'std'   => 200,
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SIZE'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_QR_CODE_SIZE_DESC')
                    ),
                    'margin' => array(
                        'type'  => 'number',
                        'std'   => 0,
                        'title' =>  JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MARGIN'),
                        'desc'  =>  JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_QUCODE_MARGIN_DESC')
                    ),
                    'align' => array(
                        'type'   => 'select',
                        'std'    => 'none',
                        'title'  =>  JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ALIGN'),
                        'desc'   =>  JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ALIGN_DESC'),
                        'values' => array(
                            'none'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_NONE'),
                            'left'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LEFT'),
                            'center' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CENTER'),
                            'right'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RIGHT'),
                        ),
                    ),
                    'link' => array(
                        'type'  => 'text',
                        'title' =>  JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LINK'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_QR_CODE_LINK_DESC'),
                    ),
                    'target' => array(
                        'type'   => 'select',
                        'std'    => 'blank',
                        'title'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TARGET'),
                        'desc'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TARGET_DESC'),
                        'values' => array(
                            'self'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SELF'),
                            'blank' =>  JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BLANK'),
                        ),
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