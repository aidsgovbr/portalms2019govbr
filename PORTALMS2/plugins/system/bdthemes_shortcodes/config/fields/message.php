<?php

// no direct access
defined('_JEXEC') or die ;

jimport('joomla.form.formfield');
jimport('joomla.version');

class JFormFieldMessage extends JFormField {
		
	public $type = 'Message';

	/**
	 * Method to get the field options.
	 *
	 * @return	array	The field option objects.
	 * @since	1.6
	 */
	protected function getLabel() {
				
		$html = '';
		
		$message_type = trim($this->element['style']);
		
		if ($message_type == 'example') {
			$html .= '<label style="visibility: hidden; margin: 0; font-size: 1px;">Example</label>';
		} else {
			$html .= '<div style="clear: both;"></div>';
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
		
		$html = '';
		
		//$lang = JFactory::getLanguage();
		//$lang->load('lib_syw.sys', JPATH_SITE);
		
		$message = trim($this->element['text']);
		$message_type = trim($this->element['style']);
		$message_label = '';
		if ($this->element['label']) {
			$message_label = JText::_(trim($this->element['label']));	
		}
			
		if ($message_type == 'example') {			
			if ($message_label) {
				$html .= '<span class="label">'.$message_label.'</span>&nbsp;';
			}
			$html .= '<span class="muted" style="font-size: 0.8em;">';
			if ($message) {
				$html .= JText::_($message);
			}
			$html .= '</span>';
		} else {
			$style = '';
			$style_label = '';
			switch ($message_type) {
				case 'warning':
					$style = 'alert-warning';
					$style_label = ' label-warning';
					break;
				case 'error':
					$style = 'alert-error';
					$style_label = ' label-important';
					break;
				case 'info':
					$style = 'alert-info';
					$style_label = ' label-info';
					break;
				default: /* message/success */
					$style = 'alert-success';
					$style_label = ' label-success';
					break;
			}
			
			$html .= '<div class="alert '.$style.'">';
			if ($message_label) {
				$html .= '<span class="label'.$style_label.'">'.$message_label.'</span>&nbsp;';
			}
			$html .= '<span>';
			if ($message) {
				$html .= JText::_($message);
			}
			$html .= '</span>';
			$html .= '</div>';
		}
		
		return $html;
	}

}
?>