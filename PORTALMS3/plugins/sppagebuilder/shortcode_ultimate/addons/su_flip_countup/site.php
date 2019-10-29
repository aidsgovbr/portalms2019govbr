<?php
/**
 * @package SP Page Builder
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2016 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

class SppagebuilderAddonSu_flip_countup extends SppagebuilderAddons{

	public function render(){

		// Prepare compatibility mode prefix
		$prefix      = su_cmpt();
		
		$datetime    = (isset($this->addon->settings->datetime) && $this->addon->settings->datetime) ? $this->addon->settings->datetime : '2017-03-27T14:15:00';
		
		$time_name   = ( $this->addon->settings->time_name == 1 ) ? 'yes' : 'no';
		
		$class       = $this->addon->settings->class;
		$count_size  = $this->addon->settings->count_size;
		$count_color = $this->addon->settings->count_color;
		$text        = $this->addon->settings->text;
		$prefix      = $this->addon->settings->prefix;
		$suffix      = $this->addon->settings->suffix;
		$layout      = $this->addon->settings->layout;
		$align       = $this->addon->settings->align;
		
		// Output
		$output  = '<div class="bdt-addon bdt-addon-flip-countup ' . $class .'">';
		$output  .= su_do_shortcode('['.$prefix.'flip_countup datetime="'.$datetime.'" count_size="'.$count_size.'" count_color="'.$count_color.'" text="'.$text.'" time_name="'.$time_name.'" prefix="'.$prefix.'" suffix="'.$suffix.'" layout="'.$layout.'" align="'.$align.'"]');

		return $output;
	}
}
