<?php

/**
 * BDThemes Shortcode Ultimate 
 *
 * @package     Shortcode Ultimate Joomla 3.0
 * @subpackage  BDThemes Schortcodes
 * @copyright Copyright (C) 2011-2014 BDThemes Ltd. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-3.0.html GNU/GPL
 * @author BDThemes
 * @author url http://bdthemes.com
 * Special thanks to Vladimir Anokhin who permit us to make this plugin like his shortcode ultimate wordpress plugin.
 */

// Check to ensure this file is included in Joomla!
defined( '_JEXEC' ) or die( 'Restricted access' );

/**
 * Shortcode Generator
 */
class Su_Generator {

	 /**
	  * Constructor
	  */
	 function __construct() {}

    private static function GetOptionByAttr($attr_name, $attr_info) {    	
    	// Prepare default value
		$default = (string) ( isset($attr_info['default']) ) ? $attr_info['default'] : '';
		$attr_info['name'] = (isset($attr_info['name'])) ? $attr_info['name'] : $attr_name;
		$field_type = (isset($attr_info['type'])) ? ' su-field-type-'.$attr_info['type'] : ' su-field-type-text';

    	$return = '<div class="su-generator-field-container' .$field_type . '" data-default="' . htmlentities($default) . '">'; // change esc_attr to htmlentities
			$return .= '<h5>' . $attr_info['name'] . '</h5>';
			// Create field types
			if (!isset($attr_info['type']) && isset($attr_info['values']) && is_array($attr_info['values']) && count($attr_info['values']))
				$attr_info['type'] = 'select';
			elseif (!isset($attr_info['type']))
				$attr_info['type'] = 'text';
			if (is_callable(array('Su_Generator_Views', $attr_info['type'])))
				$return .= call_user_func(array('Su_Generator_Views', $attr_info['type']), $attr_name, $attr_info);
			elseif (isset($attr_info['callback']) && is_callable($attr_info['callback']))
				$return .= call_user_func($attr_info['callback'], $attr_name, $attr_info);
			if (isset($attr_info['desc'])) {
				$return .= '<div class="su-generator-attr-desc">' . str_replace(array('<b%value>', '<b_>'), '<b class="su-generator-set-value" title="' . JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ATTR_DESC') . '">', $attr_info['desc']) . '</div>';
			}					
					
		$return .= '</div>';
		return $return;
    }
	/**
	* Process AJAX request
	*/
	public static function settings() { {
	   // Request queried shortcode
	   $shortcode = Su_Data::shortcodes(( $_REQUEST['shortcode']));
	   $sueid = $_REQUEST["e_name"];

	   // Prepare actions
	   $actions = array(
	       'insert' => '<a href="javascript:void(0);" class="btn btn-primary su-generator-insert" data-sueid="'.$sueid.'"><i class="fa fa-check"></i> ' . JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_INSERT_SORTCODE') . '</a>',
	       'preview' => '<a href="javascript:void(0);" class="btn su-generator-toggle-preview"><i class="fa fa-eye"></i> ' . JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LIVE_PREVIEW') . '</a>',
	       'showcode' => '<a href="javascript:void(0);" class="btn su-generator-shortcode-preview"><i class="fa fa-code"></i> ' . JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHOW_CODE') . '</a>'
		   ); 
	   // Shortcode header
	   $return = '<div id="su-generator-breadcrumbs">';
	   $return .= '<a href="javascript:void(0);" class="su-generator-home" title="' . JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ALL_SHORTCODE_DESC') . '">' .JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ALL_SHORTCODE') .
		   '</a> &rarr; <span>' . $shortcode['name'] . '</span> <small class="alignright">' . $shortcode['desc'] . '</small><div class="su-generator-clear"></div>';
	   $return .= '</div>';
	   // Shortcode has atts
		if (count($shortcode['atts']) && $shortcode['atts']) {
			// Loop through shortcode parameters
			foreach ($shortcode['atts'] as $attr_name => $attr_info) {			
				if( !empty($attr_info["child"]) && is_array($attr_info["child"]) && count($attr_info["child"]) > 0){
					$return .= '<div class="su-generator-field-group">';
				}

				$return .=self::GetOptionByAttr($attr_name, $attr_info);

				if( !empty($attr_info["child"]) && is_array($attr_info["child"]) && count($attr_info["child"]) > 0){
					foreach ($attr_info["child"] as $attr_name_child => $attr_info_child) {
						$return .=self::GetOptionByAttr($attr_name_child, $attr_info_child);
					}
					$return .= '</div>';
				}
			}
		}
		// Single shortcode (not closed)
		if ($shortcode['type'] == 'single')
			$return .= '<input type="hidden" name="su-generator-content" id="su-generator-content" value="false" />';
		// Wrapping shortcode
		else
			$return .= '<div class="su-generator-field-container"><h5>' . JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CONTENT') . '</h5><textarea name="su-generator-content" id="su-generator-content" rows="5">' . esc_attr( str_replace( array( '%prefix_', '__' ), su_cmpt(), $shortcode['content'] ) ) . '</textarea></div>';
			$return .= '<div id="su-generator-preview"></div>';
			$return .= '<div class="su-generator-actions su-generator-clearfix">' . implode(' ', array_values($actions)) ;
			$return .= '<div data-shortcode="gmap" class="su-generator-presets alignright">
							<a class="button button-large su-gp-button btn btn-success" href="javascript:void(0);"><i class="fa fa-bars"></i> ' . JText::_("PLG_SYSTEM_BDTHEMES_SHORTCODES_PRESETS") . '</a>
							<div class="su-gp-popup" style="display: none;">
								<div class="su-gp-head">
									<a class="btn btn-small btn-success su-gp-new" href="javascript:void(0);">'.JText::_("PLG_SYSTEM_BDTHEMES_SHORTCODES_PRESETS_DESC").'</a>
								</div>
								<div class="su-gp-list">
									<b>'.JText::_("PLG_SYSTEM_BDTHEMES_SHORTCODES_PRESETS_NOT_FOUND").'</b>
								</div>
							</div>
						</div>
					</div>';
			echo $return;
		}
	exit;
	}


	/* Process AJAX request and generate preview HTML */
	public static function preview() {
		$jinput = JFactory::getApplication()->input;
    	// Output results
		echo '<h5>' . JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PREVIEW') . '</h5>';
		$sortcode = su_do_shortcode( str_replace( '\"', '"', $jinput->post->getString('shortcode')) );
		$sortcode = su_wpautop($sortcode);
		$sortcode = su_shortcode_unautop($sortcode);
		$sortcode = su_do_shortcode($sortcode);
		echo $sortcode;
		echo '<div style="clear:both"></div>';
		die();
	}

	public static function show_shortcode() {
		$jinput = JFactory::getApplication()->input;
		// Output results
		echo '<h5>' . JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PREVIEW') . '</h5>';
		$sortcode = str_replace('\"', '"', $jinput->post->getString('shortcode') );
		echo '<pre>'.$sortcode.'</pre>';
		echo '<div style="clear:both"></div>';
		die();
	}

	public static function ajax_get_icons() {
		die(Su_Tools::icons());
	}

	public static function ajax_get_licons() {
		die(Su_Tools::line_icons());
	}
}

new Su_Generator;

class Shortcodes_Ultimate_Generator extends Su_Generator {
	function __construct() {
		parent::__construct();
	}
}
