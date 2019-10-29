<?php
// no direct access
defined('_JEXEC') or die ;

jimport('joomla.form.formfield');

class JFormFieldTitle extends JFormField {
		
	public $type = 'Title';

	/**
	 * Method to get the field options.
	 *
	 * @return	array	The field option objects.
	 * @since	1.6
	 */
	protected function getLabel() {
		


		$class = trim($this->element['class']);
		$value = trim($this->element['title']);
		$image_src = trim($this->element['imagesrc']);
		
		$html = '';
		
		$html .= '<div style="margin: 10px 0 0; text-transform: uppercase; letter-spacing: 1px; font-weight: bold; padding: 5px 10px; background-color: #F4F4F4; color: #444444">';
		if ($image_src) {
			$html .= '<img style="margin: -5px 2px 0 0; float: left; padding: 0px; width: 24px; height: 24px" src="'.$image_src.'">';
		}
		if ($value) {
			$html .= JText::_($value);
		}
		$html .= '</div>';


		
		return $html;
	}

	/**
	 * Method to get the field input markup.
	 *
	 * @return	string	The field input markup.
	 * @since	1.6
	 */
	protected function getInput() {
		
		
		$html = '';
		
		$html .= '<div style="clear: both;"></div>';

		return $html;
	}

}
?>