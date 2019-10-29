<?php
/**
* @subpackage Shortcode Ultimate
* @author BdThemes https://www.bdthemes.com
* @copyright Copyright (c) 2012 - 2016 BdThemes
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

if (class_exists('Su_Shortcode_user_content')) {
    SpAddonsConfig::addonConfig(
    	array(
            'type'       => 'wrap',
            'category'   => 'Shortcode Ultimate',
            'addon_name' => 'su_user_content',
            'title'      => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_USER_CONTENT'),
            'desc'       => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_USER_CONTENT_DESC'),
            'icon'       => JURI::root().'plugins/sppagebuilder/shortcode_ultimate/addons/su_user_content/element.svg',

    		'attr'=>array(
    			'general' => array(
                    'message' => array(
                        'type'  => 'text',
                        'std'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_USER_CONTENT_MESSAGE'),
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MESSAGE'), 
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MESSAGE_DESC')
                    ),
                    'color' => array(
                        'type'  => 'color',
                        'std'   => '#ffcc00',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BOX_COLOR'), 
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BOX_COLOR_DESC')
                    ),
                    'login_text' => array(
                        'type'  => 'text',
                        'std'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LOGIN'),
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LOGIN_LINK_TEXT'), 
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LOGIN_LINK_TEXT_DESC'),
                    ),
                    'login_url' => array(
                        'type'  => 'text',
                        'std'   => 'index.php?option=com_users&view=login',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LOGIN_LINK_URL'), 
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LOGIN_LINK_URL_DESC')
                    ),
                    'class' => array(
                        'type'  => 'text',
                        'title' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLASS'),
                        'desc'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLASS_DESC')
                    ),
                    'content' => array(
                        'type'  => 'editor',
                        'std'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_USER_CONTENT_CONTENT'),
                        'title' => 'Content',
                    ),
                ),
    		),
    	)
    );
}