<?php
/**
 * @package SP Page Builder
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2016 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

class SppagebuilderAddonModal extends SppagebuilderAddons{

	public function render() {

		$class = (isset($this->addon->settings->class) && $this->addon->settings->class) ? $this->addon->settings->class : '';
		$title = (isset($this->addon->settings->title) && $this->addon->settings->title) ? $this->addon->settings->title : '';
		$heading_selector = (isset($this->addon->settings->heading_selector) && $this->addon->settings->heading_selector) ? $this->addon->settings->heading_selector : 'h3';

		//Options
		$modal_selector = (isset($this->addon->settings->modal_selector) && $this->addon->settings->modal_selector) ? $this->addon->settings->modal_selector : '';
		$button_text = (isset($this->addon->settings->button_text) && $this->addon->settings->button_text) ? $this->addon->settings->button_text : '';
		$button_class = (isset($this->addon->settings->button_type) && $this->addon->settings->button_type) ? ' sppb-btn-' . $this->addon->settings->button_type : ' sppb-btn-default';
		$button_class .= (isset($this->addon->settings->button_size) && $this->addon->settings->button_size) ? ' sppb-btn-' . $this->addon->settings->button_size : '';
		$button_class .= (isset($this->addon->settings->button_shape) && $this->addon->settings->button_shape) ? ' sppb-btn-' . $this->addon->settings->button_shape: ' sppb-btn-rounded';
		$button_class .= (isset($this->addon->settings->button_appearance) && $this->addon->settings->button_appearance) ? ' sppb-btn-' . $this->addon->settings->button_appearance : '';
		$button_class .= (isset($this->addon->settings->button_block) && $this->addon->settings->button_block) ? ' ' . $this->addon->settings->button_block : '';
		$button_icon = (isset($this->addon->settings->button_icon) && $this->addon->settings->button_icon) ? $this->addon->settings->button_icon : '';
		$button_icon_position = (isset($this->addon->settings->button_icon_position) && $this->addon->settings->button_icon_position) ? $this->addon->settings->button_icon_position: 'left';

		if($button_icon_position == 'left') {
			$button_text = ($button_icon) ? '<i class="fa ' . $button_icon . '"></i> ' . $button_text : $button_text;
		} else {
			$button_text = ($button_icon) ? $button_text . ' <i class="fa ' . $button_icon . '"></i>' : $button_text;
		}

		$selector_image = (isset($this->addon->settings->selector_image) && $this->addon->settings->selector_image) ? $this->addon->settings->selector_image : '';
		$selector_icon_name = (isset($this->addon->settings->selector_icon_name) && $this->addon->settings->selector_icon_name) ? $this->addon->settings->selector_icon_name : '';
		$alignment = (isset($this->addon->settings->alignment) && $this->addon->settings->alignment) ? $this->addon->settings->alignment : '';
		$modal_unique_id = 'sppb-modal-' . $this->addon->id;
		$modal_content_type = (isset($this->addon->settings->modal_content_type) && $this->addon->settings->modal_content_type) ? $this->addon->settings->modal_content_type : 'text';
		$modal_content_text = (isset($this->addon->settings->modal_content_text) && $this->addon->settings->modal_content_text) ? $this->addon->settings->modal_content_text : '';
		$modal_content_image = (isset($this->addon->settings->modal_content_image) && $this->addon->settings->modal_content_image) ? $this->addon->settings->modal_content_image : '';
		$modal_content_video_url = (isset($this->addon->settings->modal_content_video_url) && $this->addon->settings->modal_content_video_url) ? $this->addon->settings->modal_content_video_url : '';
		$modal_popup_width = (isset($this->addon->settings->modal_popup_width) && $this->addon->settings->modal_popup_width) ? $this->addon->settings->modal_popup_width : '';
		$modal_popup_height = (isset($this->addon->settings->modal_popup_height) && $this->addon->settings->modal_popup_height) ? $this->addon->settings->modal_popup_height : '';

		if ( $modal_content_type == 'text' ) {
			$mfg_type = 'inline';
		} else if ( $modal_content_type == 'video' ) {
			$mfg_type = 'iframe';
		} else if ( $modal_content_type == 'image' ) {
			$mfg_type = 'image';
		}

		$output = '';

		if($modal_content_type == 'text') {
			$url = '#' . $modal_unique_id;
			$output .= '<div id="' . $modal_unique_id . '" class="mfp-hide white-popup-block">';
				$output .= '<div class="modal-inner-block">';
					$output .= $modal_content_text;
				$output .= '</div>';
			$output .= '</div>';
			$attribs = 'data-popup_type="inline" data-mainclass="mfp-no-margins mfp-with-zoom"';
		} else if( $modal_content_type == 'video') {
			$url = $modal_content_video_url;
			$attribs = 'data-popup_type="iframe" data-mainclass="mfp-no-margins mfp-with-zoom"';
		} else {
			$url = '#' . $modal_unique_id;
			$output .= '<div id="' . $modal_unique_id . '" class="mfp-hide popup-image-block">';
				$output .= '<div class="modal-inner-block">';
				$output .= '<img class="mfp-img" src="'.$modal_content_image.'" >';
				$output .= '</div>';
			$output .= '</div>';
			$attribs = 'data-popup_type="inline" data-mainclass="mfp-no-margins mfp-with-zoom"';
		}

		$output .= '<div class="' . $class . ' ' . $alignment . '">';

		if($modal_selector=='image') {
			$output .= ($selector_image) ? '<a class="sppb-modal-selector sppb-magnific-popup" '. $attribs .' href="'. $url . '" id="'. $modal_unique_id .'-selector"><img src="' . $selector_image . '" alt=""><i class="fa fa-play"></i></a>' : '';
		} else if ($modal_selector=='icon') {
			if($selector_icon_name) {
				$output  .= '<a class="sppb-modal-selector sppb-magnific-popup" href="'. $url . '" '. $attribs .' id="'. $modal_unique_id .'-selector">';
				$output  .= '<span>';
				$output  .= '<i class="fa ' . $selector_icon_name . '"></i>';
				$output  .= '</span>';
				$output  .= '</a>';
			}
		} else {
			$output .= '<a class="sppb-btn ' . $button_class . ' sppb-magnific-popup sppb-modal-selector" '. $attribs .' href="'. $url . '" id="'. $modal_unique_id .'-selector">'. $button_text .'</a>';
		}

		$output .= '</div>';

		return $output;

	}

	public function scripts() {
		return array(JURI::base(true) . '/components/com_sppagebuilder/assets/js/jquery.magnific-popup.min.js');
	}

	public function stylesheets() {
		return array(JURI::base(true) . '/components/com_sppagebuilder/assets/css/magnific-popup.css');
	}

	public function css() {
		$addon_id = '#sppb-addon-' . $this->addon->id;

		$modal_content_type = (isset($this->addon->settings->modal_content_type) && $this->addon->settings->modal_content_type) ? $this->addon->settings->modal_content_type : 'text';

		$modal_size  = (isset($this->addon->settings->modal_popup_width) && $this->addon->settings->modal_popup_width) ? 'max-width: ' .$this->addon->settings->modal_popup_width . 'px;' : '';
		$modal_size .= (isset($this->addon->settings->modal_popup_height) && $this->addon->settings->modal_popup_height) ? ' max-height: ' . $this->addon->settings->modal_popup_height . 'px;' : '';

		$modal_selector = (isset($this->addon->settings->modal_selector) && $this->addon->settings->modal_selector) ? $this->addon->settings->modal_selector : '';
		$selector_icon_name = (isset($this->addon->settings->selector_icon_name) && $this->addon->settings->selector_icon_name) ? $this->addon->settings->selector_icon_name : '';
		$selector_style	= (isset($this->addon->settings->selector_margin_top) && $this->addon->settings->selector_margin_top) ? 'margin-top:' . (int) $this->addon->settings->selector_margin_top .'px;' : '';
		$selector_style	.= (isset($this->addon->settings->selector_margin_bottom) && $this->addon->settings->selector_margin_bottom) ? 'margin-bottom:' . (int) $this->addon->settings->selector_margin_bottom .'px;' : '';

		$css = '';
		if($modal_selector == 'icon') {
			if($selector_icon_name) {
				$selector_style	.= 'display:inline-block;line-height:1;';
				$selector_style	.= (isset($this->addon->settings->selector_icon_padding) && $this->addon->settings->selector_icon_padding) ? 'padding:' . (int) $this->addon->settings->selector_icon_padding .'px;' : '';
				$selector_style	.= (isset($this->addon->settings->selector_icon_color) && $this->addon->settings->selector_icon_color) ? 'color:' . $this->addon->settings->selector_icon_color .';' : '';
				$selector_style	.= (isset($this->addon->settings->selector_icon_background) && $this->addon->settings->selector_icon_background) ? 'background-color:' . $this->addon->settings->selector_icon_background .';' : '';
				$selector_style	.= (isset($this->addon->settings->selector_icon_border_color) && $this->addon->settings->selector_icon_border_color) ? 'border-style:solid;border-color:' . $this->addon->settings->selector_icon_border_color .';' : '';

				$selector_style	.= (isset($this->addon->settings->selector_icon_border_width) && $this->addon->settings->selector_icon_border_width) ? 'border-width:' . (int) $this->addon->settings->selector_icon_border_width .'px;' : '';
				$selector_style	.= (isset($this->addon->settings->selector_icon_border_radius) && $this->addon->settings->selector_icon_border_radius) ? 'border-radius:' . (int) $this->addon->settings->selector_icon_border_radius .'px;' : '';

				$selector_icon_style	= (isset($this->addon->settings->selector_icon_size) && $this->addon->settings->selector_icon_size) ? 'font-size:' . (int) $this->addon->settings->selector_icon_size . 'px;width:' . (int) $this->addon->settings->selector_icon_size . 'px;height:' . (int) $this->addon->settings->selector_icon_size . 'px;line-height:' . (int) $this->addon->settings->selector_icon_size . 'px;' : '';

				if($selector_style) {
					$css .= $addon_id . ' .sppb-modal-selector span {';
					$css .= $selector_style;
					$css .= '}';
				}

				if($selector_icon_style) {
					$css .= $addon_id . ' .sppb-modal-selector span > i {';
					$css .= $selector_icon_style;
					$css .= '}';
				}

			}
		} else {
			if($selector_style) {
				$css .= $addon_id . ' .sppb-modal-selector {';
				$css .= $selector_style;
				$css .= '}';
			}
		}

		if( $modal_content_type != 'video' && $modal_size) {
			$css .= '#sppb-modal-' . $this->addon->id . ' {';
			$css .= $modal_size;
			$css .= '}';
		}

		// Button css
		$layout_path = JPATH_ROOT . '/components/com_sppagebuilder/layouts';
		$css_path = new JLayoutFile('addon.css.button', $layout_path);
		$css .= $css_path->render(array('addon_id' => $addon_id, 'options' => $this->addon->settings, 'id' => 'sppb-modal-' . $this->addon->id . '-selector'));

		return $css;
	}

}
