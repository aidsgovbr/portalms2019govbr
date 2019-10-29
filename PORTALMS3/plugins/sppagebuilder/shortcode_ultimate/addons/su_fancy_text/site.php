<?php
/**
 * @package SP Page Builder
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2016 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

class SppagebuilderAddonSu_fancy_text extends SppagebuilderAddons{

	public function render(){

		// Prepare compatibility mode prefix
		$prefix = su_cmpt();
		
		$tags   = (isset($this->addon->settings->tags) && $this->addon->settings->tags) ? $this->addon->settings->tags : 'Hello, Text';
		$type   = (isset($this->addon->settings->type) && $this->addon->settings->type) ? $this->addon->settings->type : '1';
		
		$class  = $this->addon->settings->class;

		// Output
		$output = '<div class="bdt-addon bdt-addon-fancy-text ' . $class .'">';
		$output .= su_do_shortcode('['.$prefix.'fancy_text tags="'.$tags.'" type="'.$type.'"]');
		$output .= '</div>';

		return $output;
	}
}
