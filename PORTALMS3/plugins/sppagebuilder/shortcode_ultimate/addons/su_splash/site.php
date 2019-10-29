<?php
/**
 * @package SP Page Builder
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2016 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

class SppagebuilderAddonSu_splash extends SppagebuilderAddons{

	public function render(){

		// Prepare compatibility mode prefix
		$prefix  = su_cmpt();
		
		$width   = (isset($this->addon->settings->width) && $this->addon->settings->width) ? $this->addon->settings->width : '480';
		$opacity = (isset($this->addon->settings->opacity) && $this->addon->settings->opacity) ? $this->addon->settings->opacity : '80';
		$url     = (isset($this->addon->settings->url) && $this->addon->settings->url) ? $this->addon->settings->url : 'http://www.bdthemes.com';
		$delay   = (isset($this->addon->settings->delay) && $this->addon->settings->delay) ? $this->addon->settings->delay : '0';
		$content = (isset($this->addon->settings->content) && $this->addon->settings->content) ? $this->addon->settings->content.'[/'.$prefix.'splash]' : '';
		
		$close   = ( $this->addon->settings->close == 1 ) ? 'yes' : 'no';
		$esc     = ( $this->addon->settings->esc == 1 ) ? 'yes' : 'no';
		
		$class   = $this->addon->settings->class;
		$style   = $this->addon->settings->style;
		$padding = $this->addon->settings->padding;
		$onclick = $this->addon->settings->onclick;

		// Output
		$output = '<div class="bdt-addon bdt-addon-splash ' . $class .'">';
		$output .= su_do_shortcode('['.$prefix.'splash style="'.$style.'" padding="'.$padding.'" width="'.$width.'" opacity="'.$opacity.'" url="'.$url.'" onclick="'.$onclick.'" delay="'.$delay.'" close="'.$close.'" esc="'.$esc.'"]'.$content);
		$output .= '</div>';

		return $output;
	}
}
