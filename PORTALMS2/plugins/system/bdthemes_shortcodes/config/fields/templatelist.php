<?php

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class JFormFieldTemplatelist extends JFormField {

	protected $type = 'Templatelist';

	protected function getInput() {

		// For showing intro in plugin admin.
		$doc = JFactory::getDocument();
		$doc->addScript(BDT_SU_URI . '/js/intro-ready.js');

		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
		$query->select('template AS value, title AS text, id');
		$query->from('`#__template_styles`');
		$query->where('`client_id` = 0');
		$query->order('`id` ASC');
		$db->setQuery($query);

		$rows = $db->loadObjectList();

		$this->multiple = false;

		return JHtml::_('select.genericlist', $rows, $this->getName($this->fieldname),
			array(
				'id' => $this->id,
				'list.attr' => 'class="inputbox" size="'. count($rows). '"',
				'list.select' => $this->value
			)
		);
	}
}