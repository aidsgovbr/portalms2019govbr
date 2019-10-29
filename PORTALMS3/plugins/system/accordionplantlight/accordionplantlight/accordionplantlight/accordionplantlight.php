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

defined('_JEXEC') or die('Restricted Access');

jimport('joomla.filter.filterinput');

JPlantLoader::import('core.environment.uri');
JPlantLoader::import('core.html.json.json');
JPlantLoader::import('core.html.style');
JPlantLoader::import('core.utilities.params');

class AccordionPlantLight {
	var $_assetsLoaded = false;
	var $_jsParameters = array(
		'activeIndex' => '0',
		'hideSpeed' => 300,
		'onOver' => false,
		'showSpeed' => 300,
		'single' => false
	);

	static function getInstance() {
		static $instance;

		if (is_null($instance))
			$instance = new AccordionPlantLight();

		return $instance;
	}

	function getOriginalJSParameters() {
		return $this->_jsParameters;
	}

	function normalizeJSParameters($jsParams) {
		$originalJsParams = $this->getOriginalJSParameters();
		$normalizedParams = JPlantParamsHelper::normalizeParameters($originalJsParams, $jsParams);

		if (isset($jsParams)) {
			if (isset($jsParams['activeIndex'])) {
				if (empty($jsParams['activeIndex']) && $jsParams['activeIndex'] !== '0' && $jsParams['activeIndex'] !== 0)
					$normalizedParams['activeIndex'] = null;
				else {
					$normalizedParams['activeIndex'] = JPlantParamsHelper::getIntArray($jsParams['activeIndex']);
					$singleMode = isset($normalizedParams['single']) ? (bool)$normalizedParams['single'] : $originalJsParams['single'];
					if ($singleMode && count($normalizedParams['activeIndex']) > 1) {
						$normalizedParams['activeIndex'] = array($normalizedParams['activeIndex'][0]);
					}
				}
			}
		}

		return $normalizedParams;
	}

	function activateAccordion($id, $jsParams, $params) {
		$this->loadAssets($params);

		$doc = JFactory::getDocument();

		$doc->addScriptDeclaration(
			sprintf(
				';(window["jpJQuery"] || jQuery)(function($) { $("#%1$s").jpAccordionLight(%2$s); });',
				$id,
				json_encode($jsParams)
			)
		);
	}

	function loadAssets($params) {
		if ($this->_assetsLoaded)
			return ;

		$filterInput = JFilterInput::getInstance();

		$defaultParams = array(
			'loadJQ' => true,
			'jqNC' => true,
			'theme' => 'ui-lightness'
		);
		$params = JPlantParamsHelper::normalizeParameters($defaultParams, $params, false);
		$params['theme'] = $filterInput->clean($params['theme'], 'CMD');

		$assetsUri = JPlantUriHelper::getRootUri(dirname(__FILE__) . '/../assets');

		$doc = JFactory::getDocument();

		if ($params['loadJQ']) {
            if (JPLANT_J3) {
                JHtml::_('jquery.framework', (bool)$params['jqNC']);
            } else {
			    $doc->addScript('https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js');
			    if ($params['jqNC'])
				    $doc->addScript($assetsUri . 'js/jquery.noconflict.js');
            }
		}
		$doc->addScript($assetsUri . 'js/jquery.accordionlight.min.js?ver=' . ACCORDIONPLANTLIGHT_VERSION);

		$doc->addStyleSheet($assetsUri . 'css/' . $params['theme'] . '/styles.css');
		$doc->addStyleSheet($assetsUri . 'css/accordion.css');

		$this->_assetsLoaded = true;
	}

	function getAccordionOutput($id, $params, $items) {
		ob_start();
		require dirname(__FILE__) . '/tmpl/default.php';
		$content = ob_get_contents();
		ob_end_clean();

		return $content;
	}
}