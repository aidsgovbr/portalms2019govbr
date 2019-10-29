<?php
/**
 * @package SP Page Builder
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2016 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

class SppagebuilderAddonSu_mailchimp extends SppagebuilderAddons{

	public function render(){

		// Prepare compatibility mode prefix
		$prefix      = su_cmpt();
		
		$class       = $this->addon->settings->class;
		$email_list  = $this->addon->settings->email_list;
		$before_text = $this->addon->settings->before_text;
		$after_text  = $this->addon->settings->after_text;

		// Output
		$output = '<div class="bdt-addon bdt-addon-mailchimp ' . $class .'">';
		$output .= su_do_shortcode('['.$prefix.'mailchimp email_list="'.$email_list.'" before_text="'.$before_text.'" after_text="'.$after_text.'"]');
		$output .= '</div>';

		return $output;
	}
}
