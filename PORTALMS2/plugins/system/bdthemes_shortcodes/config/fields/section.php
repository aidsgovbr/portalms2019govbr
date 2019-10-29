<?php
// no direct access
defined('_JEXEC') or die ;

jimport('joomla.form.formfield');

class JFormFieldSection extends JFormField {
		
	public $type = 'Section';

	/**
	 * Method to get the field options.
	 *
	 * @return	array	The field option objects.
	 * @since	1.6
	 */
	protected function getLabel() {
		


		$class = trim($this->element['class']);
		$tag = trim($this->element['tag']);
		$title = trim($this->element['title']);
		
		$html = '';
		
		if ($tag == 'start') {
			$html .= '</div></div><div class="'.$class.'" style="border: 1px solid #ddd; padding: 15px; max-width: 650px;">';
				if ($title) {
					$html .= '<div class="su-section-title" style="border-bottom: 1px solid #ddd;padding: 10px 15px;background: #f5f5f5;margin: -15px -15px 20px;font-weight: 700;text-transform: uppercase;">'.JText::_($title).'</div>';
				}
			$html .= '<div><div>';
		} elseif ($tag == 'end') {
			$html .= '</div>';
		}
		
		return $html;
	}

	/**
	 * Method to get the field input markup.
	 *
	 * @return	string	The field input markup.
	 * @since	1.6
	 */
	protected function getInput() {
		
		$class = trim($this->element['class']);

		$html = '';

		return $html;
	}

}
?>