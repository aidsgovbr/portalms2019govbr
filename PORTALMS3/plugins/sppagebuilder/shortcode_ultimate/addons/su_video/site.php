<?php
/**
 * @package SP Page Builder
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2016 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

class SppagebuilderAddonSu_video extends SppagebuilderAddons{

	public function render(){

		// Prepare compatibility mode prefix
		$prefix   = su_cmpt();
		
		$width    = (isset($this->addon->settings->width) && $this->addon->settings->width) ? $this->addon->settings->width : '600';
		$height   = (isset($this->addon->settings->height) && $this->addon->settings->height) ? $this->addon->settings->height : '300';
		$volume   = (isset($this->addon->settings->volume) && $this->addon->settings->volume) ? $this->addon->settings->volume : '50';
		
		$controls = ( $this->addon->settings->controls == 1 ) ? 'yes' : 'no';
		$autoplay = ( $this->addon->settings->autoplay == 1 ) ? 'yes' : 'no';
		$loop     = ( $this->addon->settings->loop == 1 ) ? 'yes' : 'no';
		
		$class    = $this->addon->settings->class;
		$style    = $this->addon->settings->style;
		$url      = $this->addon->settings->url;
		$poster   = $this->addon->settings->poster;
		$title    = $this->addon->settings->title;

		// Output
		$output = '<div class="bdt-addon bdt-addon-video ' . $class .'">';
		$output .= su_do_shortcode('['.$prefix.'video style="'.$style.'" url="'.$url.'" poster="'.$poster.'" title="'.$title.'" width="'.$width.'" height="'.$height.'" controls="'.$controls.'" autoplay="'.$autoplay.'" loop="'.$loop.'" volume="'.$volume.'"]');
		$output .= '</div>';

		return $output;
	}
}
