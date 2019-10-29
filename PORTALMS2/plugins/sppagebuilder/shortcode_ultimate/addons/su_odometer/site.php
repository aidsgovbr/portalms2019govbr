<?php
/**
 * @package SP Page Builder
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2016 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

class SppagebuilderAddonSu_odometer extends SppagebuilderAddons{

	public function render(){

		// Prepare compatibility mode prefix
		$su_prefix     = su_cmpt();
		
		$count_start   = (isset($this->addon->settings->count_start) && $this->addon->settings->count_start) ? $this->addon->settings->count_start : '1';
		$count_end     = (isset($this->addon->settings->count_end) && $this->addon->settings->count_end) ? $this->addon->settings->count_end : '5000';
		$icon          = (isset($this->addon->settings->icon) && $this->addon->settings->icon) ? trim(str_replace('fa-', '', 'icon:'.$this->addon->settings->icon)) : '';
		$count_size    = (isset($this->addon->settings->count_size) && $this->addon->settings->count_size) ? $this->addon->settings->count_size : '32px';
		$text_size     = (isset($this->addon->settings->text_size) && $this->addon->settings->text_size) ? $this->addon->settings->text_size : '14px';
		$icon_size     = (isset($this->addon->settings->icon_size) && $this->addon->settings->icon_size) ? $this->addon->settings->icon_size : '24';
		$content       = (isset($this->addon->settings->content) && $this->addon->settings->content) ? su_clean_shortcodes($this->addon->settings->content).'[/'.$su_prefix.'odometer]' : '';
		
		$align         = $this->addon->settings->align;
		$icon_color    = $this->addon->settings->icon_color;
		$count_color   = $this->addon->settings->count_color;
		$class         = $this->addon->settings->class;

		// Output
		$output = '<div class="bdt-addon bdt-addon-odometer ' . $class .'">';
		$output .= su_do_shortcode('['.$su_prefix.'odometer count_start="'.$count_start.'" count_end="'.$count_end.'" align="'.$align.'" icon="'.$icon.'" icon_color="'.$icon_color.'" icon_size="'.$icon_size.'" count_color="'.$count_color.'" count_size="'.$count_size.'" text_color="inherit" text_size="'.$text_size.'"]'.$content);
		$output .= '</div>';

		return $output;
	}
}
