<?php
/**
 * @package SP Page Builder
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2016 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

class SppagebuilderAddonSu_flickr extends SppagebuilderAddons{

	public function render(){

		// Prepare compatibility mode prefix
		$prefix   = su_cmpt();
		
		$id       = (isset($this->addon->settings->id) && $this->addon->settings->id) ? $this->addon->settings->id : '95572727@N00';
		$limit    = (isset($this->addon->settings->limit) && $this->addon->settings->limit) ? $this->addon->settings->limit : '9';
		$radius   = (isset($this->addon->settings->radius) && $this->addon->settings->radius) ? $this->addon->settings->radius : 'opx';
		
		$lightbox = ( $this->addon->settings->lightbox == 1 ) ? 'yes' : 'no';
		
		$class    = $this->addon->settings->class;

		// Output
		$output = '<div class="bdt-addon bdt-addon-flickr ' . $class .'">';
		$output .= su_do_shortcode('['.$prefix.'flickr id="'.$id.'" limit="'.$limit.'" lightbox="'.$lightbox.'" radius="'.$radius.'"]');
		$output .= '</div>';

		return $output;
	}
}
