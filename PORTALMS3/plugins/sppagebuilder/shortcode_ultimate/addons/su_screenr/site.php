<?php
/**
 * @package SP Page Builder
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2016 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

class SppagebuilderAddonSu_screenr extends SppagebuilderAddons{

	public function render(){

		// Prepare compatibility mode prefix
		$prefix     = su_cmpt();
		
		$width      = (isset($this->addon->settings->width) && $this->addon->settings->width) ? $this->addon->settings->width : '600';
		$height     = (isset($this->addon->settings->height) && $this->addon->settings->height) ? $this->addon->settings->height : '400';
		$responsive = ( $this->addon->settings->responsive == 1 ) ? 'yes' : 'no';
		
		$class      = $this->addon->settings->class;
		$url        = $this->addon->settings->url;

		// Output
		$output = '<div class="bdt-addon bdt-addon-screenr ' . $class .'">';
		$output .= su_do_shortcode('['.$prefix.'screenr url="'.$url.'" width="'.$width.'" height="'.$height.'" responsive="'.$responsive.'"]');
		$output .= '</div>';

		return $output;
	}
}
