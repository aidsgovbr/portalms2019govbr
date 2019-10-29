<?php
/**
 * @package SP Page Builder
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2016 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

class SppagebuilderAddonSu_list extends SppagebuilderAddons{

	public function render(){

		// Prepare compatibility mode prefix
		$prefix     = su_cmpt();
		
		$icon       = (isset($this->addon->settings->icon) && $this->addon->settings->icon) ? trim(str_replace('fa-', '', 'icon:'.$this->addon->settings->icon)) : 'icon:star';
		$icon_color = (isset($this->addon->settings->icon_color) && $this->addon->settings->icon_color) ? $this->addon->settings->icon_color : '#333333';
		$content    = (isset($this->addon->settings->content) && $this->addon->settings->content) ? $this->addon->settings->content.'[/'.$prefix.'list]' : '';
		
		$class      = $this->addon->settings->class;

		// Output
		$output = '<div class="bdt-addon bdt-addon-list ' . $class .'">';
		$output .= su_do_shortcode('['.$prefix.'list icon="icon: '.$icon.'" icon_color="'.$icon_color.'"]'.su_clean_shortcodes($content));
		$output .= '</div>';

		return $output;
	}
}
