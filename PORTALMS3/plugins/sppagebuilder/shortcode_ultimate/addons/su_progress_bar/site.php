<?php
/**
 * @package SP Page Builder
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2016 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

class SppagebuilderAddonSu_progress_bar extends SppagebuilderAddons{

	public function render(){

		// Prepare compatibility mode prefix
		$prefix       = su_cmpt();
		
		$percent      = (isset($this->addon->settings->percent) && $this->addon->settings->percent) ? $this->addon->settings->percent : '75';
		$duration     = (isset($this->addon->settings->duration) && $this->addon->settings->duration) ? $this->addon->settings->duration/1000 : '1.5';
		$delay        = (isset($this->addon->settings->delay) && $this->addon->settings->delay) ? $this->addon->settings->delay/1000 : '0.3';
		
		$show_percent = ( $this->addon->settings->show_percent == 1 ) ? 'yes' : 'no';
		
		$class        = $this->addon->settings->class;
		$style        = $this->addon->settings->style;
		$text         = $this->addon->settings->text;
		$text_color   = $this->addon->settings->text_color;
		$bar_color    = $this->addon->settings->bar_color;
		$fill_color   = $this->addon->settings->fill_color;
		$animation    = $this->addon->settings->animation;

		// Output
		$output = '<div class="bdt-addon bdt-addon-progress-bar ' . $class .'">';
		$output .= su_do_shortcode('['.$prefix.'progress_bar style="'.$style.'" percent="'.$percent.'" show_percent="'.$show_percent.'" text="'.$text.'" text_color="'.$text_color.'" bar_color="'.$bar_color.'" fill_color="'.$fill_color.'" animation="'.$animation.'" duration="'.$duration.'" delay="'.$delay.'"]');
		$output .= '</div>';

		return $output;
	}
}
