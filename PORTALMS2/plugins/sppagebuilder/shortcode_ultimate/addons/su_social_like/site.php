<?php
/**
 * @package SP Page Builder
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2016 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

class SppagebuilderAddonSu_social_like extends SppagebuilderAddons{

	public function render(){

		// Prepare compatibility mode prefix
		$prefix           = su_cmpt();
		
		$class            = $this->addon->settings->class;
		$button           = $this->addon->settings->button;
		$button_animation = $this->addon->settings->button_animation;

		// Output
		$output = '<div class="bdt-addon bdt-addon-social-like ' . $class .'">';
		$output .= su_do_shortcode('['.$prefix.'social_like button="'.$button.'" button_animation="'.$button_animation.'"]');
		$output .= '</div>';

		return $output;
	}
}
