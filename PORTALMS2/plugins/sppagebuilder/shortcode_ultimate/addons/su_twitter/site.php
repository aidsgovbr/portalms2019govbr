<?php
/**
 * @package SP Page Builder
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2016 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

class SppagebuilderAddonSu_twitter extends SppagebuilderAddons{

	public function render(){

		// Prepare compatibility mode prefix
		$prefix        = su_cmpt();
		
		$search        = (isset($this->addon->settings->search) && $this->addon->settings->search) ? $this->addon->settings->search : 'envato';
		$limit         = (isset($this->addon->settings->limit) && $this->addon->settings->limit) ? $this->addon->settings->limit : '5';
		$speed         = (isset($this->addon->settings->speed) && $this->addon->settings->speed) ? $this->addon->settings->speed/1000 : '0.4';
		$delay         = (isset($this->addon->settings->delay) && $this->addon->settings->delay) ? $this->addon->settings->delay : '4';
		
		$profile_image = ( $this->addon->settings->profile_image == 1 ) ? 'yes' : 'no';
		$date          = ( $this->addon->settings->date == 1 ) ? 'yes' : 'no';
		$arrows        = ( $this->addon->settings->arrows == 1 ) ? 'yes' : 'no';
		$pagination    = ( $this->addon->settings->pagination == 1 ) ? 'yes' : 'no';
		$autoplay      = ( $this->addon->settings->autoplay == 1 ) ? 'yes' : 'no';
		$loop          = ( $this->addon->settings->loop == 1 ) ? 'yes' : 'no';
		
		$class         = $this->addon->settings->class;
		$source        = $this->addon->settings->source;
		$transitionin  = $this->addon->settings->transitionin;
		$transitionout = $this->addon->settings->transitionout;
		$font_size     = $this->addon->settings->font_size;

		// Output
		$output = '<div class="bdt-addon bdt-addon-twitter ' . $class .'">';
		$output .= su_do_shortcode('['.$prefix.'twitter source="'.$source.'" search="'.$search.'" transitionin="'.$transitionin.'" transitionout="'.$transitionout.'" font_size="'.$font_size.'" profile_image="'.$profile_image.'" date="'.$date.'" limit="'.$limit.'" arrows="'.$arrows.'" pagination="'.$pagination.'" autoplay="'.$autoplay.'" speed="'.$speed.'" delay="'.$delay.'" loop="'.$loop.'"]');
		$output .= '</div>';

		return $output;
	}
}
