<?php
/**
 * @package SP Page Builder
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2016 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

class SppagebuilderAddonSu_lightbox extends SppagebuilderAddons{

	public function render(){

		// Prepare compatibility mode prefix
		$prefix  = su_cmpt();
		
		$content = (isset($this->addon->settings->content) && $this->addon->settings->content) ? $this->addon->settings->content.'[/'.$prefix.'lightbox]' : '';
		
		$class   = $this->addon->settings->class;
		$src     = $this->addon->settings->src;
		$type    = $this->addon->settings->type;

		// Output
		$output = '<div class="bdt-addon bdt-addon-lightbox ' . $class .'">';
		$output .= su_do_shortcode('['.$prefix.'lightbox src="'.$src.'" type="'.$type.'"]'.$content);
		$output .= '</div>';

		return $output;
	}
}
