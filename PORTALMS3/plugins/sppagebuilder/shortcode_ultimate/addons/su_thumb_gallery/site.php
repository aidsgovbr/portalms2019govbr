<?php
/**
 * @package SP Page Builder
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2016 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

class SppagebuilderAddonSu_thumb_gallery extends SppagebuilderAddons{

	public function render(){

		// Prepare compatibility mode prefix
		$prefix    = su_cmpt();
		
		$limit     = (isset($this->addon->settings->limit) && $this->addon->settings->limit) ? $this->addon->settings->limit : '20';
		$width     = (isset($this->addon->settings->width) && $this->addon->settings->width) ? $this->addon->settings->width : '850';
		$height    = (isset($this->addon->settings->height) && $this->addon->settings->height) ? $this->addon->settings->height : '478';
		
		$caption   = ( $this->addon->settings->caption == 1 ) ? 'yes' : 'no';
		
		$class     = $this->addon->settings->class;
		$order     = $this->addon->settings->order;
		$order_by  = $this->addon->settings->order_by;
		$style     = $this->addon->settings->style;
		$zoom_type = $this->addon->settings->zoom_type;

		if ( $this->addon->settings->source_type == 'category' ) {
			$j_category = rtrim(implode(',', $this->addon->settings->j_category), ',');
			$source     = 'category: '.$j_category;
		}
		elseif ( $this->addon->settings->source_type == 'k2-category' ) {
			$k2_category = rtrim(implode(',', $this->addon->settings->k2_category), ',');
			$source      = 'k2-category: '.$k2_category;
		}
		elseif ( $this->addon->settings->source_type == 'directory' ) {
			$source = 'directory: '.$this->addon->settings->dir_path;
		}
		elseif ( $this->addon->settings->source_type == 'media' ) {
			$source = 'media: '.$this->addon->settings->med_library;
		}

		// Output
		$output = '<div class="bdt-addon bdt-addon-thumb-gallery ' . $class .'">';
		$output .= su_do_shortcode('['.$prefix.'thumb_gallery style="'.$style.'" source="'.$source.'" limit="'.$limit.'" caption="'.$caption.'" order="'.$order.'" order_by="'.$order_by.'" width="'.$width.'" height="'.$height.'" zoom_type="'.$zoom_type.'"]');
		$output .= '</div>';

		return $output;
	}
}
