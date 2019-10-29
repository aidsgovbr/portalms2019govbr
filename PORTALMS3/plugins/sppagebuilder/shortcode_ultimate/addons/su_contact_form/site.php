<?php
/**
 * @package SP Page Builder
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2016 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

class SppagebuilderAddonSu_contact_form extends SppagebuilderAddons{

	public function render(){

		// Prepare compatibility mode prefix
		$prefix             = su_cmpt();
		
		$textarea_height    = (isset($this->addon->settings->textarea_height) && $this->addon->settings->textarea_height) ? $this->addon->settings->textarea_height : '120';
		
		$subject            = ( $this->addon->settings->subject == 1 ) ? 'yes' : 'no';
		$name               = ( $this->addon->settings->name == 1 ) ? 'yes' : 'no';
		$label              = ( $this->addon->settings->label == 1 ) ? 'yes' : 'no';
		$reset              = ( $this->addon->settings->reset == 1 ) ? 'yes' : 'no';
		
		$email              = $this->addon->settings->email;
		$submit_button_text = $this->addon->settings->submit_button_text;
		$class              = $this->addon->settings->class;

		// Output
		$output = '<div class="bdt-addon bdt-addon-contact-form ' . $class .'">';
		$output .= su_do_shortcode('['.$prefix.'contact_form email="'.$email.'" subject="'.$subject.'" name="'.$name.'" label="'.$label.'" reset="'.$reset.'" textarea_height="'.$textarea_height.'" submit_button_text="'.$submit_button_text.'"]');
		$output .= '</div>';

		return $output;
	}
}
