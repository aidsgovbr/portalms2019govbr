<?php
/**
 * @package SP Page Builder
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2016 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

class SppagebuilderAddonSu_table extends SppagebuilderAddons{

	public function render(){

		// Prepare compatibility mode prefix
		$prefix  = su_cmpt();
		
		$content = (isset($this->addon->settings->content) && $this->addon->settings->content) ? $this->addon->settings->content.'[/'.$prefix.'table]' : '';
		
		$class   = $this->addon->settings->class;
		$url     = $this->addon->settings->url;

		// Output
		$output = '<div class="bdt-addon bdt-addon-table ' . $class .'">';
		$output .= su_do_shortcode('['.$prefix.'table url=""]'.$content);
		$output .= '</div>';

		return $output;
	}
}
