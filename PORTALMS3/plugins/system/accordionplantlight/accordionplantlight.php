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

define('ACCORDIONPLANTLIGHT_VERSION', '1.2.2');

require_once dirname(__FILE__) . '/accordionplantlight/loader.php';

JPlantLoader::import('core.joomla.plugin.extcontent');
JPlantLoader::import('core.utilities.params');
JPlantLoader::import('accordionplantlight.plugin.item');
JPlantLoader::import('accordionplantlight.accordionplantlight');

class plgSystemAccordionplantlight extends JPlantJoomlaExtContentPlugin {
	function __construct($subject, $config) {
		$this->_pluginName = 'accordion';

		parent::__construct($subject, $config);
	}

	function _contentHandler($params, $text, $originalText) {
		$id = uniqid('accordion', false);

		$accordion = AccordionPlantLight::getInstance();

		$plgParams = JPlantParamsHelper::getParamsTree($this->params);
		$plgJsParams = isset($plgParams['js']) ? $plgParams['js'] : array();
		$plgJsParams = array_merge($plgJsParams, $params);
		$jsParams = $accordion->normalizeJSParameters($plgJsParams);

		$items = $this->_getItems($text, isset($jsParams['activeIndex']) ? $jsParams['activeIndex'] : null);
		$accordion->activateAccordion($id, $jsParams, $plgParams[JPLANT_PARAMS_ROOT_GROUP]);

		return $accordion->getAccordionOutput($id, $params, $items);
	}

	function _getItems($text, $activeIndex = null) {
		$itemPlugin = new AccordionPlantLightItemContentPlugin('item');
		$itemHandler = null;
		$itemPlugin->parsePlugin($text, $itemHandler);
		$items = $itemPlugin->getItems();

		if (count($items) > 0 && is_array($activeIndex)) {
			$itemsCount = count($items);
			for ($itemIdx = 0; $itemIdx < $itemsCount; ++$itemIdx) {
				if (in_array($itemIdx, $activeIndex) || (in_array(-($itemIdx + 1), $activeIndex))) {
					$items[$itemIdx]['active'] = true;
				}
			}
		}

		return $items;
	}
}