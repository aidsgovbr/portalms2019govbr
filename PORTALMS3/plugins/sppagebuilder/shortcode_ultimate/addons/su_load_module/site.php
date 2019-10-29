<?php
/**
 * @package SP Page Builder
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2016 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

class SppagebuilderAddonSu_load_module extends SppagebuilderAddons{

	public function render(){

		// Prepare compatibility mode prefix
		$prefix      = su_cmpt();
		
		$class       = $this->addon->settings->class;
		$id          = $this->addon->settings->id;
		$module_name = $this->addon->settings->module_name;

		// Output
		$output = '<div class="bdt-addon bdt-addon-load-module ' . $class .'">';
		$output .= su_do_shortcode('['.$prefix.'load_module id="'.$id.'" module_name="'.$module_name.'"]');
		$output .= '</div>';

		return $output;
	}
}
