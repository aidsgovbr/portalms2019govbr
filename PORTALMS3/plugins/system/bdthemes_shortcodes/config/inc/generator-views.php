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

function get_img_url($image) {
  return BDT_SU_URI.'images'.$image;
}

/**
 * Shortcode Generator
 */
class Su_Generator_Views {

	/**
	 * Constructor
	 */
	function __construct() {}

	public static function text( $id, $field ) {
		$field = su_parse_args( $field, array(
			'default' => ''
		) );
		$return = '<input type="text" name="' . $id . '" value="' . htmlentities( $field['default'] ) . '" id="su-generator-attr-' . $id . '" class="su-generator-attr" />';
		return $return;
	}

	public static function note( $id, $field ) {
		$field = su_parse_args( $field, array(
			'default' => ''
		) );
		$return = '<span>' . htmlentities( $field['default'] ) . '</span><input style="display: none;" type="text" name="' . $id . '" value="' . htmlentities( $field['default'] ) . '" id="su-generator-attr-' . $id . '" class="su-generator-attr" />';
		return $return;
	}

	public static function textarea( $id, $field ) {
		$field = su_parse_args( $field, array(
			'rows'    => 3,
			'default' => ''
		) );
		$return = '<textarea name="' . $id . '" id="su-generator-attr-' . $id . '" rows="' . $field['rows'] . '" class="su-generator-attr">' . esc_textarea( $field['default'] ) . '</textarea>';
		return $return;
	}

	public static function select( $id, $field ) {
		// Multiple selects
		$multiple = ( isset( $field['multiple'] ) ) ? ' multiple' : '';
		$return = '<select name="' . $id . '" id="su-generator-attr-' . $id . '" class="su-generator-attr"' . $multiple . '>';
		// Create options
		foreach ( $field['values'] as $option_value => $option_title ) {
			// Is this option selected
			$selected = ( $field['default'] === $option_value ) ? ' selected="selected"' : '';
			// Create option
			$return .= '<option value="' . $option_value . '"' . $selected . '>' . $option_title . '</option>';
		}
		$return .= '</select>';
		return $return;
	}

	public static function bool( $id, $field ) {
		$return = '<span class="su-generator-switch su-generator-switch-' . $field['default'] . '"><span class="su-generator-yes">' . JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_YES') . '</span><span class="su-generator-no">' . JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_NO') . '</span></span><input type="hidden" name="' . $id . '" value="' . htmlentities( $field['default'] ) . '" id="su-generator-attr-' . $id . '" class="su-generator-attr su-generator-switch-value" />';
		return $return;
	}

	public static function upload( $id, $field ) {
		$return = '<div class="su-generator-img-picker-wrapper">
						<input type="text" name="' . $id . '" value="' . htmlentities( $field['default'] ) . '" id="su-generator-attr-' . $id . '" class="su-generator-attr su-generator-upload-value" />
						<div class="su-generator-field-actions">
							<a class="btn modal btn-primary" title="'.JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SELECT_IMAGE').'" onClick="SqueezeBox.fromElement(this, {handler:\'iframe\', size: {x: 790, y: 580}}); return false;" href="index.php?option=com_media&view=images&tmpl=component&asset=&author=&fieldid=su-generator-attr-' . $id . '&folder=" rel="{handler: \'iframe\', size: {x: 790, y: 580}}">
								<i class="fa fa-image"></i>'.JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SELECT_MEDIA').'
							</a>
						</div>
				   </div>';
		return $return;
	}

	public static function icon( $id, $field ) {
		$return = '<div class="su-generator-icon-picker-wrapper">
						<input type="text" name="' . $id . '" value="' . htmlentities( $field['default'] ) . '" id="su-generator-attr-' . $id . '" class="su-generator-attr su-generator-icon-picker-value" />
						<div class="su-generator-field-actions">
							<a class="btn modal btn-primary su-generator-image-picker-button" title="'.JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SELECT_IMAGE').'" onClick="SqueezeBox.fromElement(this, {handler:\'iframe\', size: {x: 790, y: 580}}); return false;" href="index.php?option=com_media&view=images&tmpl=component&asset=&author=&fieldid=su-generator-attr-' . $id . '&folder=" rel="{handler: \'iframe\', size: {x: 790, y: 580}}">
								<i class="fa fa-image"></i>' . JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SELECT_IMAGE') .'
							</a>
							<a href="javascript:;" class="btn btn-warning su-generator-icon-picker-button su-generator-field-action">
								<i class="fa fa-magic"></i>' . JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_PICKER') .'
							</a>
							<a href="javascript:;" class="btn btn-warning su-generator-licon-picker-button su-generator-field-action">
								<i class="fa fa-magic"></i>' . JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LICON_PICKER') .'
							</a>
						</div>
					</div>
					<div class="su-generator-icon-picker su-generator-clearfix">
						<input type="text" class="su-icon-picker-search" placeholder="' . JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FILTER_ICONS') . '" />
					</div>
					<div class="su-generator-licon-picker su-generator-clearfix">
						<input type="text" class="su-licon-picker-search" placeholder="' . JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FILTER_ICONS') . '" />
					</div>';
		return $return;
	}

	public static function livicon( $id, $field ) {
		$return = '<div class="su-generator-livicon-picker-wrapper">
						<input type="text" name="' . $id . '" value="' . htmlentities( $field['default'] ) . '" id="su-generator-attr-' . $id . '" class="su-generator-attr su-generator-livicon-picker-value" />
						<div class="su-generator-field-actions">
							<a href="javascript:;" class="btn btn-warning su-generator-livicon-picker-button su-generator-field-action">
								<i class="fa fa-magic"></i>' . JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ICON_PICKER') .'
							</a>
						</div>
					</div>
					<div class="su-generator-livicon-picker su-generator-clearfix">
						<input type="text" class="su-livicon-picker-search" placeholder="' . JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FILTER_ICONS') . '" />
					</div>';
		return $return;
	}

	public static function color( $id, $field ) {
		$return = '<span class="su-generator-select-color"><span class="su-generator-select-color-wheel"></span><input type="text" name="' . $id . '" value="' . $field['default'] . '" id="su-generator-attr-' . $id . '" class="su-generator-attr su-generator-select-color-value" /></span>';
		return $return;
	}

	public static function gallery( $id, $field ) {
		$shult = shortcodes_ultimate();
		// Prepare galleries list
		$galleries = $shult->su_get_option( 'galleries' );
		$created = ( is_array( $galleries ) && count( $galleries ) ) ? true : false;
		$return = '<select name="' . $id . '" id="su-generator-attr-' . $id . '" class="su-generator-attr" data-loading="' . JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PLEASE_WAIT') . '">';
		// Check that galleries is set
		if ( $created ) // Create options
			foreach ( $galleries as $g_id => $gallery ) {
				// Is this option selected
				$selected = ( $g_id == 0 ) ? ' selected="selected"' : '';
				// Prepare title
				$gallery['name'] = ( $gallery['name'] == '' ) ? JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_UNTITLED_GALLERY') : stripslashes( $gallery['name'] );
				// Create option
				$return .= '<option value="' . ( $g_id + 1 ) . '"' . $selected . '>' . $gallery['name'] . '</option>';
			}
		// Galleries not created
		else
			$return .= '<option value="0" selected>' . JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_GALLERIES_NOT_FOUND') . '</option>';
		$return .= '</select><small class="description"><a href="' . $shult->admin_url . '#tab-3" target="_blank">' . JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MANAGE_GALLERIES') . '</a>&nbsp;&nbsp;&nbsp;<a href="javascript:;" class="su-generator-reload-galleries">' . JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RELOAD_GALLERIES') . '</a></small>';
		return $return;
	}

	public static function number( $id, $field ) {
		$return = '<input type="number" name="' . $id . '" value="' . htmlentities($field['default']) . '" id="su-generator-attr-' . $id . '" min="' . $field['min'] . '" max="' . $field['max'] . '" step="' . $field['step'] . '" class="su-generator-attr" />';
		return $return;
	}

	public static function slider( $id, $field ) {
		$return = '<div class="su-generator-range-picker su-generator-clearfix"><input type="number" name="' . $id . '" value="' . htmlentities( $field['default'] ) . '" id="su-generator-attr-' . $id . '" min="' . $field['min'] . '" max="' . $field['max'] . '" step="' . $field['step'] . '" class="su-generator-attr" /></div>';
		return $return;
	}

	public static function shadow( $id, $field ) {
		$defaults = ( $field['default'] === 'none' ) ? array ('0', '0', '0', '#000000') : explode(' ', str_replace( 'px', '', $field['default']));
		$return = '<div class="su-generator-shadow-picker"><span class="su-generator-shadow-picker-field"><input type="number" min="-1000" max="1000" step="1" value="' . $defaults[0] . '" class="su-generator-sp-hoff" /><small>' . JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_HORIZONTAL_OFFSET') . ' (px)</small></span><span class="su-generator-shadow-picker-field"><input type="number" min="-1000" max="1000" step="1" value="' . $defaults[1] . '" class="su-generator-sp-voff" /><small>' . JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_VERTICAL_OFFSET') . ' (px)</small></span><span class="su-generator-shadow-picker-field"><input type="number" min="-1000" max="1000" step="1" value="' . $defaults[2] . '" class="su-generator-sp-blur" /><small>' . JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BLUR') . ' (px)</small></span><span class="su-generator-shadow-picker-field su-generator-shadow-picker-color"><span class="su-generator-shadow-picker-color-wheel"></span><input type="text" value="' . $defaults[3] . '" class="su-generator-shadow-picker-color-value" /><small>' . JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_COLOR') . '</small></span><input type="hidden" name="' . $id . '" value="' . htmlentities( $field['default'] ) . '" id="su-generator-attr-' . $id . '" class="su-generator-attr" /></div>';
		return $return;
	}

	public static function border( $id, $field ) {
		$defaults = ($field['default'] === 'none' ) ? array ('0', 'solid', '#000000') : explode(' ', str_replace( 'px', '', $field['default']));
		$borders = Su_Tools::select( array(
				'options' => Su_Data::borders(),
				'class' => 'su-generator-bp-style',
				'selected' => $defaults[1]
			));
		$return = '<div class="su-generator-border-picker"><span class="su-generator-border-picker-field"><input type="number" min="-1000" max="1000" step="1" value="' . $defaults[0] . '" class="su-generator-bp-width" /><small>' . JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BORDER_WIDTH') . ' (px)</small></span><span class="su-generator-border-picker-field">' . $borders . '<small>' . JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BORDER_STYLE') . '</small></span><span class="su-generator-border-picker-field su-generator-border-picker-color"><span class="su-generator-border-picker-color-wheel"></span><input type="text" value="' . $defaults[2] . '" class="su-generator-border-picker-color-value" /><small>' . JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BORDER_COLOR') . '</small></span><input type="hidden" name="' . $id . '" value="' . htmlentities( $field['default'] ) . '" id="su-generator-attr-' . $id . '" class="su-generator-attr" /></div>';
		return $return;
	}

	public static function source( $id, $field ) {
		$field = array_merge( $field, array(
				'default' => 'none'
			));
		if (JComponentHelper::isEnabled('com_k2', true)) {
			$sources = Su_Tools::select( array(
				'options'  => array(
					'media'       => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MEDIA_LIBRARY'),
					'directory'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DIRECTORY_PATH'),
					'category'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CATEGORY'),
					'k2-category' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_K2_CATEGORY')
				),
				'selected' => '0',
				'none'     => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SELECT_IMAGES_SOURCE') . '&hellip;',
				'class'    => 'su-generator-isp-sources'
			));
		}
		else {
			$sources = Su_Tools::select( array(
				'options'  => array(
					'media'     => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MEDIA_LIBRARY'),
					'directory' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DIRECTORY_PATH'),
					'category'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CATEGORY'),
				),
				'selected' => '0',
				'none'     => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SELECT_IMAGES_SOURCE') . '&hellip;',
				'class'    => 'su-generator-isp-sources'
			));
		}
		$categories = Su_Tools::select( array(
				'options'  => Su_Tools::get_terms( 'category' ),
				'multiple' => true,
				'size'     => 10,
				'class'    => 'su-generator-isp-categories'
			));
		if (JComponentHelper::isEnabled('com_k2', true)) {
			$k2_categories = Su_Tools::select( array(
				'options'  => Su_Tools::get_k2_terms( 'k2-category' ),
				'multiple' => true,
				'size'     => 10,
				'class'    => 'su-generator-isp-k2-categories'
			));
		} else {
			$k2_categories = null;
		}
		$terms = Su_Tools::select( array(
				'class'    => 'su-generator-isp-terms',
				'multiple' => true,
				'size'     => 10,
				'disabled' => true,
				'style'    => 'display:none'
			));
		$return  = '<div class="su-generator-isp">' . $sources;

			$return .= '<div class="su-generator-isp-source su-generator-isp-source-media">';
        		$return .= '<div class="su-generator-clearfix">';
        			$return .= '<a class="btn modal button button-primary su-generator-isp-add-media" title="'.JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SELECT_IMAGE') .'" onClick="SqueezeBox.fromElement(this, {handler:\'iframe\', size: {x: 830, y: 600}}); return false;" href="index.php?option=com_media&view=images&tmpl=component&asset=&author=&fieldid=su-generator-attr-source&folder=" rel="{handler: \'iframe\', size: {x: 830, y: 600}}">';
        				$return .= '<i class="fa fa-plus"></i>&nbsp;&nbsp;' . JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ADD_IMAGE');
    				$return .= '</a>';
        		$return .= '</div>';
				$return .= '<div id="su-generator-attr-image" class="su-generator-isp-images su-generator-clearfix">';
					$return .= '<em class="description">' . JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ADD_IMAGE_DESC') . '</em>';
				$return .= '</div>';
			$return .= '</div>';

			$return .= '<div class="su-generator-isp-source su-generator-isp-source-directory">';
				$return .= '<em class="description">' . JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DIRECTORY_PATH_DESC') . '</em>';
				$return .= '<input class="su-generator-isp-directory" type="text" placeholder="images/gallery" />';
			$return .= '</div>';

			$return .= '<div class="su-generator-isp-source su-generator-isp-source-category">';
				$return .= '<em class="description">' . JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CATEGORY_DESC') . '</em>';
				$return .= $categories;
			$return .= '</div>';

			$return .= '<div class="su-generator-isp-source su-generator-isp-source-k2-category">';
				$return .= '<em class="description">' . JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_K2_CATEGORY_DESC'). '</em>';
				$return .= $k2_categories;
			$return .= '</div>';
			$return .= '<input type="hidden" name="' . $id . '" value="' . $field['default'] . '" id="su-generator-attr-' . $id . '" class="su-generator-attr" />';
		$return .= '</div>';
		return $return;
	}
	public static function image_source( $id, $field ) {
		$field = array_merge( $field, array(
				'default' => 'none'
			));
		$sources = Su_Tools::select( array(
				'options'  => array('media' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MEDIA_LIBRARY')),
				'selected' => '0',
				'none'     => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SELECT_IMAGES_SOURCE') . '&hellip;',
				'class'    => 'su-generator-isp-sources'
			) );
		$categories = Su_Tools::select( array(
				'options'  => Su_Tools::get_terms( 'category' ),
				'multiple' => true,
				'size'     => 10,
				'class'    => 'su-generator-isp-categories'
			) );
		$terms = Su_Tools::select( array(
				'class'    => 'su-generator-isp-terms',
				'multiple' => true,
				'size'     => 10,
				'disabled' => true,
				'style'    => 'display:none'
			) );
		$return  = '<div class="su-generator-isp">' . $sources;
			$return .= '<div class="su-generator-isp-source su-generator-isp-source-media">';
        		$return .= '<div class="su-generator-clearfix">';
        			$return .= '<a class="btn modal button button-primary su-generator-isp-add-media" title="'.JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SELECT_IMAGE') .'" onClick="SqueezeBox.fromElement(this, {handler:\'iframe\', size: {x: 830, y: 600}}); return false;" href="index.php?option=com_media&view=images&tmpl=component&asset=&author=&fieldid=su-generator-attr-source&folder=" rel="{handler: \'iframe\', size: {x: 830, y: 600}}">';
        				$return .= '<i class="fa fa-plus"></i>&nbsp;&nbsp;' . JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ADD_IMAGE');
    				$return .= '</a>';
        		$return .= '</div>';
				$return .= '<div id="su-generator-attr-image" class="su-generator-isp-images su-generator-clearfix">';
					$return .= '<em class="description">' . JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ADD_IMAGE_DESC') . '</em>';
				$return .= '</div>';
			$return .= '</div>';
			$return .= '<input type="hidden" name="' . $id . '" value="' . $field['default'] . '" id="su-generator-attr-' . $id . '" class="su-generator-attr" />';
		$return .= '</div>';
		return $return;
	}
	public static function article_source( $id, $field ) {
		$field = array_merge( $field, array(
				'default' => 'none'
			));
		if (JComponentHelper::isEnabled('com_k2', true)) {
		    $sources = Su_Tools::select( 
		    	array('options'     => array( 'category'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ARTICLE_CATEGORY'), 'k2-category' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_K2_CATEGORY')),
			    'none'        => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SELECT_ARTICLE_SOURCE') . '&hellip;',
			    'selected'    => '0',
			    'class'       => 'su-generator-isp-sources'
		   ));
		    
		} else {
			$sources = Su_Tools::select( 
				array( 'options'     => array( 'category'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ARTICLE_CATEGORY')),
				'none'        => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SELECT_ARTICLE_SOURCE') . '&hellip;',
				'selected'    => '0',
				'class'       => 'su-generator-isp-sources'
			));
		}
		$categories = Su_Tools::select( array(
			'options'  => Su_Tools::get_terms('category'),
			'multiple' => true,
			'size'     => 10,
			'class'    => 'su-generator-isp-categories'
		));
		if (JComponentHelper::isEnabled('com_k2', true)) {
			$k2_categories = Su_Tools::select( array(
				'options'  => Su_Tools::get_k2_terms( 'k2-category' ),
				'multiple' => true,
				'size'     => 10,
				'class'    => 'su-generator-isp-k2-categories'
			));
		} else {
			$k2_categories = null;
		}
		$terms = Su_Tools::select( array(
				'class'    => 'su-generator-isp-terms',
				'multiple' => true,
				'size'     => 10,
				'disabled' => true,
				'style'    => 'display:none'
			));
		$return  = '<div class="su-generator-isp">' . $sources;
			$return .= '<div class="su-generator-isp-source su-generator-isp-source-category">';
				$return .= '<em class="description">' . JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CATEGORY_DESC') . '</em>';
				$return .= $categories;
			$return .= '</div>';
			$return .= '<div class="su-generator-isp-source su-generator-isp-source-k2-category">';
				$return .= '<em class="description">' . JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_K2_CATEGORY_DESC'). '</em>';
				$return .= $k2_categories;
			$return .= '</div>';
			$return .= '<input type="hidden" name="' . $id . '" value="' . $field['default'] . '" id="su-generator-attr-' . $id . '" class="su-generator-attr" />';
		$return .= '</div>';
		return $return;
	}

}
