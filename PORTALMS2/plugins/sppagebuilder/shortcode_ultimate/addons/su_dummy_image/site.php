<?php
/**
 * @package SP Page Builder
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2016 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

class SppagebuilderAddonSu_dummy_image extends SppagebuilderAddons{

	public function render(){

		// Prepare compatibility mode prefix
    	$prefix = su_cmpt();

		$width  = (isset($this->addon->settings->width) && $this->addon->settings->width) ? $this->addon->settings->width : '500';
		$height = (isset($this->addon->settings->height) && $this->addon->settings->height) ? $this->addon->settings->height : '500';
		
		$class  = $this->addon->settings->class;
		$theme  = $this->addon->settings->theme;

		// Output
		$output = '<div class="bdt-addon bdt-addon-dummy-image ' . $class .'">';
		$output .= su_do_shortcode('['.$prefix.'dummy_image theme="'.$theme.'" width="'.$width.'" height="'.$height.'"]');
		$output .= '</div>';

		return $output;
	}
}
