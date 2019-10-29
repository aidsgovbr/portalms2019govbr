<?php
/*
 * @package		JPlant.Framework
 * @author		http://www.j-plant.com
 * @copyright	Copyright (C) 2010 J-Plant. All rights reserved.
 * @license		GNU/GPL v. 3.0
 *
 * JPlant Framework is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 *
 */
defined('_JEXEC') or die('Restricted access');

JPlantLoader::import('core.plugin.plugin');
jimport('joomla.plugin.plugin');

class JPlantJoomlaContentPlugin extends JPlugin {
	var $_pluginName = null;
	var $_nested = false;

	function onPrepareContent($article, $params, $limitstart) {
		if (!$this->needToParse())
			return ;

		$article->text = $this->parsePlugin($article->text);
	}

	function onContentPrepare($context, $article) {
		if (!$this->needToParse())
			return ;

		$article->text = $this->parsePlugin($article->text);
	}

	function getPluginName() {
		return $this->_pluginName;
	}

	function isNested() {
		return $this->_nested;
	}

	function parsePlugin($text) {
		 $plg = new JPlantContentPlugin($this->getPluginName(), $this->isNested());
		 $handler = array($this, 'contentHandler');

		 return $plg->parsePlugin($text, $handler);
	}

	function contentHandler($params, $text, $originalText) {
		return $originalText;
	}

	function needToParse() {
		$mainframe = JFactory::getApplication();

		$doc = JFactory::getDocument();
		$docType = $doc->getType();

		if ($mainframe->isAdmin() || $docType != 'html')
			return false;

		return true;
	}
}