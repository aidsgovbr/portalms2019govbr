<?php
/**
 * @package SP Page Builder
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2016 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

class SppagebuilderAddonSu_image_zoom extends SppagebuilderAddons{

	public function render(){

		// Prepare compatibility mode prefix
		$prefix      = su_cmpt();
		
		$image       = (isset($this->addon->settings->image) && $this->addon->settings->image) ? $this->addon->settings->image : 'http://lorempixel.com/400/300/food/';
		$zoom_size   = (isset($this->addon->settings->zoom_size) && $this->addon->settings->zoom_size) ? $this->addon->settings->zoom_size : '120,80';
		$offset      = (isset($this->addon->settings->offset) && $this->addon->settings->offset) ? $this->addon->settings->offset : '10,0';
		
		$smooth_move = ( $this->addon->settings->smooth_move == 1 ) ? 'yes' : 'no' ;
		$preload     = ( $this->addon->settings->preload == 1 ) ? 'yes' : 'no' ;
		
		$type        = $this->addon->settings->iz_type;
		$position    = $this->addon->settings->position;
		$description = $this->addon->settings->description;
		$width       = $this->addon->settings->width;
		$class       = $this->addon->settings->class;


		// Output
		$output = '<div class="bdt-addon bdt-addon-image-zoom ' . $class .'">';
		$output .= su_do_shortcode('['.$prefix.'image_zoom image="'.$image.'" type="'.$type.'" smooth_move="'.$smooth_move.'" preload="'.$preload.'" zoom_size="'.$zoom_size.'" offset="'.$offset.'" position="'.$position.'" description="'.$description.'" width="'.$width.'"]');
		$output .= '</div>';

		return $output;
	}
}
