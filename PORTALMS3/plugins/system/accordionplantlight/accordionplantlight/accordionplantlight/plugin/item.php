<?php
/*
 * @package		Accordion Plant Light
 * @author		http://www.j-plant.com
 * @copyright	Copyright (C) 2010 J-Plant. All rights reserved.
 * @license		GNU/GPL v. 3.0
 *
 * This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 *
 */

defined('_JEXEC') or die('Restricted access');

JPlantLoader::import('core.plugin.plugin');

class AccordionPlantLightItemContentPlugin extends JPlantContentPlugin {
	var $_pluginName = 'item';
	var $_items = array();

	function contentHandler($params, $text, $originalText) {
		$title = isset($params['title']) ? $params['title'] : '';

		$this->_items[] = array(
			'title' => $title,
			'text' => $text
			);

		return '';
	}

	function getItems() {
		return $this->_items;
	}
}