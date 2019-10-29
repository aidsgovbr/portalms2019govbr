<?php
/**
 * @package SP Page Builder
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2016 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

class SppagebuilderAddonSu_audio extends SppagebuilderAddons{

	public function render(){

		// Prepare compatibility mode prefix
		$prefix   = su_cmpt();
		
		$volume   = (isset($this->addon->settings->volume) && $this->addon->settings->volume) ? $this->addon->settings->volume : '50';
		
		$autoplay = ( $this->addon->settings->autoplay == 1 ) ? 'yes' : 'no';
		$loop     = ( $this->addon->settings->loop == 1 ) ? 'yes' : 'no';
		
		$class    = $this->addon->settings->class;
		$style    = $this->addon->settings->style;
		$url      = $this->addon->settings->url;

		// Output
		$output = '<div class="bdt-addon bdt-addon-audio ' . $class .'">';
		$output .= su_do_shortcode('['.$prefix.'audio style="'.$style.'" url="'.$url.'" autoplay="'.$autoplay.'" loop="'.$loop.'" volume="'.$volume.'"]');
		$output .= '</div>';

		return $output;
	}
}
