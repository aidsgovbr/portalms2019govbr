<?php
/**
 * @package SP Page Builder
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2016 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

class SppagebuilderAddonSu_device_slider extends SppagebuilderAddons{

	public function render(){

		// Prepare compatibility mode prefix
		$prefix     = su_cmpt();
		
		$limit      = (isset($this->addon->settings->limit) && $this->addon->settings->limit) ? $this->addon->settings->limit : '5';
		$speed      = (isset($this->addon->settings->speed) && $this->addon->settings->speed) ? $this->addon->settings->speed/1000 : '0.6';
		$delay      = (isset($this->addon->settings->delay) && $this->addon->settings->delay) ? $this->addon->settings->delay/1000 : '4';
		
		$lightbox   = ( $this->addon->settings->lightbox == 1 ) ? 'yes' : 'no';
		$arrows     = ( $this->addon->settings->arrows == 1 ) ? 'yes' : 'no';
		$pagination = ( $this->addon->settings->pagination == 1 ) ? 'yes' : 'no';
		$autoplay   = ( $this->addon->settings->autoplay == 1 ) ? 'yes' : 'no';
		$autoheight = ( $this->addon->settings->autoheight == 1 ) ? 'yes' : 'no';
		$hoverpause = ( $this->addon->settings->hoverpause == 1 ) ? 'yes' : 'no';
		$lazyload   = ( $this->addon->settings->lazyload == 1 ) ? 'yes' : 'no';
		$loop       = ( $this->addon->settings->loop == 1 ) ? 'yes' : 'no';
		
		$device     = $this->addon->settings->device;
		$class      = $this->addon->settings->class;

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
		$output = '<div class="bdt-addon bdt-addon-device-slider ' . $class .'">';
		$output .= su_do_shortcode('['.$prefix.'device_slider source="'.$source.'" limit="'.$limit.'" device="'.$device.'" lightbox="'.$lightbox.'" arrows="'.$arrows.'" pagination="'.$pagination.'" autoplay="'.$autoplay.'" autoheight="'.$autoheight.'" hoverpause="'.$hoverpause.'" lazyload="'.$lazyload.'" loop="'.$loop.'" speed="'.$speed.'" delay="'.$delay.'"]');
		$output .= '</div>';

		return $output;
	}
}
