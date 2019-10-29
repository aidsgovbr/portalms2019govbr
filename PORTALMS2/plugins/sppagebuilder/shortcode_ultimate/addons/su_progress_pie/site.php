<?php
/**
 * @package SP Page Builder
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2016 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

class SppagebuilderAddonSu_progress_pie extends SppagebuilderAddons{

	public function render(){

		// Prepare compatibility mode prefix
		$prefix     = su_cmpt();
		
		$percent    = (isset($this->addon->settings->percent) && $this->addon->settings->percent) ? $this->addon->settings->percent : '75';
		$duration   = (isset($this->addon->settings->duration) && $this->addon->settings->duration) ? $this->addon->settings->duration/1000 : '2';
		$delay      = (isset($this->addon->settings->delay) && $this->addon->settings->delay) ? $this->addon->settings->delay/1000 : '0.3';
		
		$class      = $this->addon->settings->class;
		$before     = $this->addon->settings->before;
		$text       = $this->addon->settings->text;
		$after      = $this->addon->settings->after;
		$text_size  = $this->addon->settings->text_size;
		$line_width = $this->addon->settings->line_width;
		$line_cap   = $this->addon->settings->line_cap;
		$bar_color  = $this->addon->settings->bar_color;
		$fill_color = $this->addon->settings->fill_color;
		$text_color = $this->addon->settings->text_color;
		$animation  = $this->addon->settings->animation;

		// Output
		$output = '<div class="bdt-addon bdt-addon-progress-pie ' . $class .'">';
		$output .= su_do_shortcode('['.$prefix.'progress_pie percent="'.$percent.'" before="'.$before.'" text="'.$text.'" after="'.$after.'" text_size="'.$text_size.'" line_width="'.$line_width.'" line_cap="'.$line_cap.'" bar_color="'.$bar_color.'" fill_color="'.$fill_color.'" text_color="'.$text_color.'" animation="'.$animation.'" duration="'.$duration.'" delay="'.$delay.'"]');
		$output .= '</div>';

		return $output;
	}
}
