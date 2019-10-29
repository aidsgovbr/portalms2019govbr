<?php
/**
 * @package SP Page Builder
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2016 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

class SppagebuilderAddonSu_gmap_advanced extends SppagebuilderAddons{

	public function render(){

		// Prepare compatibility mode prefix
		$prefix              = su_cmpt();
		
		$width               = (isset($this->addon->settings->width) && $this->addon->settings->width) ? $this->addon->settings->width : 'auto';
		$height              = (isset($this->addon->settings->height) && $this->addon->settings->height) ? $this->addon->settings->height : '400';
		$lat                 = (isset($this->addon->settings->lat) && $this->addon->settings->lat) ? $this->addon->settings->lat : '24.824874';
		$lng                 = (isset($this->addon->settings->lng) && $this->addon->settings->lng) ? $this->addon->settings->lng : '89.382629';
		$lng                 = (isset($this->addon->settings->lng) && $this->addon->settings->lng) ? $this->addon->settings->lng : '89.382629';
		$zoom                = (isset($this->addon->settings->zoom) && $this->addon->settings->zoom) ? $this->addon->settings->zoom : '16';
		$address             = (isset($this->addon->settings->address) && $this->addon->settings->address) ? $this->addon->settings->address : 'We are Located Here';
		
		$zoom_control        = ( $this->addon->settings->zoom_control == 1 ) ? 'yes' : 'no';
		$street_view_control = ( $this->addon->settings->street_view_control == 1 ) ? 'yes' : 'no';
		$location_marker     = ( $this->addon->settings->location_marker == 1 ) ? 'yes' : 'no';
		$responsive          = ( $this->addon->settings->responsive == 1 ) ? 'yes' : 'no';
		
		$class               = $this->addon->settings->class;
		$style               = $this->addon->settings->style;
		$zoom_control_style  = $this->addon->settings->zoom_control_style;
		$custom_marker       = $this->addon->settings->custom_marker;

		// Output
		$output = '<div class="bdt-addon bdt-addon-gmap-advanced ' . $class .'">';
		$output .= su_do_shortcode('['.$prefix.'gmap_advanced style="'.$style.'" width="'.$width.'" height="'.$height.'" lat="'.$lat.'" lng="'.$lng.'" zoom_control_style="'.$zoom_control_style.'" zoom_control="'.$zoom_control.'" zoom="'.$zoom.'" street_view_control="'.$street_view_control.'" location_marker="'.$location_marker.'" custom_marker="'.$custom_marker.'" address="'.$address.'" responsive="'.$responsive.'"]');
		$output .= '</div>';

		return $output;
	}
}
