<?php
/**
* @subpackage Shortcode Ultimate
* @author BdThemes https://www.bdthemes.com
* @copyright Copyright (c) 2012 - 2016 BdThemes
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

if (class_exists('Su_Shortcode_table')) {
    SpAddonsConfig::addonConfig(
    	array(
            'type'       => 'single',
            'category'   => 'Shortcode Ultimate',
            'addon_name' => 'su_table',
            'title'      => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TABLE'),
            'desc'       => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TABLE_DESC'),
            'icon'       => JURI::root().'plugins/sppagebuilder/shortcode_ultimate/addons/su_table/element.svg',

    		'attr'=>array(
    			'general' => array(
                    'url' => array(
                        'type'   => 'text',
                        'title'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CSV_FILE'),
                        'desc'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CSV_FILE_DESC')
                    ),
                    'content' => array(
                        'type'  => 'editor',
                        'title' => 'Content',
                        'std'   => sprintf("<table>\n<tr>\n\t<td>Table</td>\n\t<td>Table</td>\n</tr>\n<tr>\n\t<td>Table</td>\n\t<td>Table</td>\n</tr>\n</table>"),
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