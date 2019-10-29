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
defined('_JEXEC') or die('Restricted Access');

JPlantLoader::import('core.joomla.plugin.content');
JPlantLoader::import('core.joomla.document.html.helper');

class JPlantJoomlaExtContentPlugin extends JPlantJoomlaContentPlugin {
	var $_executed = false;

	function onPrepareContent($article, $params, $limitstart) {
		if (!$this->isMode('content'))
			return ;

		$this->_executed = true;

		parent::onPrepareContent($article, $params, $limitstart);
	}

	function onContentPrepare($context, $article) {
		if (!$this->isMode('content'))
			return ;

		$this->_executed = true;

		parent::onContentPrepare($context, $article);
	}

	function onAfterRender() {
		if (!$this->needToParse() || $this->_executed || !$this->isMode('any'))
			return ;

		$option = JRequest::getString('option');
		$view = JRequest::getString('view');
		$task = JRequest::getString('task');
		$layout = JRequest::getString('layout');
		if (
			($option == 'com_content' && $view == 'form' && $layout == 'edit') ||
			($option == 'com_k2' && $view == 'item' && ($task == 'edit' || $task == 'save'))
		)
			return ;

		$docHelper = JPlantDocumentHTMLHelper::getInstance();
		$changesTrackId = $docHelper->startTrackHeadChanges();

        $app = JFactory::getApplication();
        $context = $this;
        $body = preg_replace_callback(
            '/<body[^>]*>(.*)<\/body\s*>/is',
            function($matches) use ($context) {
                return str_replace($matches[1], $context->parsePlugin($matches[1]), $matches[0]);
            },
            $app->getBody()
        );

        $docChanges = $docHelper->getHeadChanges($changesTrackId);

		if (count($docChanges) > 0)
			$body = preg_replace('/<\/head\s*>/i', join('', $docChanges) . '$0', $body);

		$app->setBody($body);

		$this->_executed = true;
	}

	function contentHandler($params, $text, $originalText) {
		if (!$this->isMode('content')) {
			$secret = $this->params->get('secret');
			if ($secret && (empty($params['secret']) || $secret !== $params['secret']))
				return $originalText;
		}

		unset($params['secret']);

		return $this->_contentHandler($params, $text, $originalText);
	}

	function _contentHandler($params, $text, $originalText) {
		return $originalText;
	}

    function isMode($mode, $defaultMode = 'content') {
        return strtolower($this->params->get('mode', $defaultMode)) == strtolower($mode);
    }
}