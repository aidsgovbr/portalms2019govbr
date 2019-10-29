<?php

// no direct access
defined('_JEXEC') or die ;

jimport('joomla.form.formfield');

class JFormFieldExtensionVersion extends JFormField {
		
	public $type = 'ExtensionVersion';
	
	protected $version;

	protected function getLabel() 
	{		
		$lang = JFactory::getLanguage();
		$lang->load('plg_system_bdthemes_shortcodes', JPATH_SITE);
		
		$html = '';
		
		$html .= '<div style="clear: both;">'.JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_VERSION').'</div>';
		
		return $html;
	}

	protected function getInput() {
		$html = '<div style="padding-top: 5px; overflow: inherit">';
		
		$html .= '<span class="label">'.$this->version.'</span>';
		
		$html .= '</div>';
		
		return $html;
	}
	
	public function setup(SimpleXMLElement $element, $value, $group = null)
	{
		$return = parent::setup($element, $value, $group);
	
		if ($return) {
			$this->version = isset($this->element['version']) ? $this->element['version'] : '';
		}
	
		return $return;
	}

}
?>
