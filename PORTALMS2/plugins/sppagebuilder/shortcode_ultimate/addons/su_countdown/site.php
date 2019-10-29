<?php
/**
 * @package SP Page Builder
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2016 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

class SppagebuilderAddonSu_countdown extends SppagebuilderAddons{

	public function render(){

		// Prepare compatibility mode prefix
		$prefix        = su_cmpt();
		
		$count_date    = (isset($this->addon->settings->count_date) && $this->addon->settings->count_date) ? $this->addon->settings->count_date : '2020/12/25';
		$count_size    = (isset($this->addon->settings->count_size) && $this->addon->settings->count_size) ? $this->addon->settings->count_size : '32';
		$text_size     = (isset($this->addon->settings->text_size) && $this->addon->settings->text_size) ? $this->addon->settings->text_size : '14';
		$divider_color = (isset($this->addon->settings->divider_color) && $this->addon->settings->divider_color) ? $this->addon->settings->divider_color : 'rgba(100,100,100,.1)';
		$content       = (isset($this->addon->settings->content) && $this->addon->settings->content) ? su_clean_shortcodes($this->addon->settings->content).'[/'.$prefix.'countdown]' : '';
		
		$count_time    = $this->addon->settings->count_time;
		$align         = $this->addon->settings->align;
		$count_color   = $this->addon->settings->count_color;
		$text_align    = $this->addon->settings->text_align;
		$divider       = $this->addon->settings->divider;
		$class         = $this->addon->settings->class;
		
		// Output
		$output  = '<div class="bdt-addon bdt-addon-countdown ' . $class .'">';
		$output  .= su_do_shortcode('['.$prefix.'countdown count_date="'.$count_date.'" count_time="'.$count_time.'" align="'.$align.'" count_size="'.$count_size.'" count_color="'.$count_color.'" text_color="inherit" text_align="'.$text_align.'" text_size="'.$text_size.'" divider="'.$divider.'" divider_color="'.$divider_color.'"]'.$content);

		return $output;
	}
}
