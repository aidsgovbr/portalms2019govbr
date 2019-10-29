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

class JPlantContentPlugin extends JObject {
	var $_pluginName;
	var $_contentHandler;
	var $_nested = false;

	function __construct($pluginName = null, $nested = false) {
		if (!is_null($pluginName))
			$this->_pluginName = $pluginName;
		$this->_nested = $nested;
	}

	function getPluginName() {
		return $this->_pluginName;
	}

	function getPluginRegExp() {
		return sprintf('/\[%1$s((?:\s+[a-z\d\_\-]+=(?:"[^"]*"|[^\s\]]*|&quot;.*?&quot;))*)\s*\](?:(.*?)(\[\/%1$s\]))?/si',
			$this->getPluginName());
	}

	function isNested() {
		return $this->_nested;
	}

	function parsePluginSimple($text) {
		$null = null;

		return $this->parsePlugin($text, $null);
	}

	function parsePlugin($text, $contentHandler) {
		$isNested = $this->isNested();
		if (!$isNested)
			return $this->_parsePlugin($text, $contentHandler);

		$name = $this->getPluginName();
		$openTag1 = '[' . $name . ']';
		$openTag2 = '[' . $name . ' ';

		if (!$this->validateNestedTags($text)) {
			$app = JFactory::getApplication();
			$app->enqueueMessage(
				sprintf(
					'[/%1$s] tag is missed or [%1$s] tag is used in an incorrect place.',
					$name
				),
				'error'
			);

			return $text;
		}

		while (strpos($text, '[' . $name) !== false && ($posClosedTag = strpos($text, '[/' . $name . ']')) !== false) {
			$posOpenTag = -1;

			while (true) {
				$curPosOpenTag = -1;
				$posOpenTag1 = strpos($text, $openTag1, $posOpenTag + 1);
				$posOpenTag2 = strpos($text, $openTag2, $posOpenTag + 1);

				if ($posOpenTag1 !== false)
					$curPosOpenTag = $posOpenTag1;

				if ($posOpenTag2 !== false && ($posOpenTag2 < $curPosOpenTag || $curPosOpenTag == -1))
					$curPosOpenTag = $posOpenTag2;

				if ($curPosOpenTag > -1 && $curPosOpenTag > $posOpenTag && $curPosOpenTag < $posClosedTag)
					$posOpenTag = $curPosOpenTag;
				else
					break;
			}

			$matches = array();
			if (!preg_match($this->getPluginRegExp(), $text, $matches, 0, $posOpenTag)) {
				$app = JFactory::getApplication();
				$app->enqueueMessage(
					sprintf(
						'[/%1$s] tag is missed or [%1$s] tag is used in an incorrect place.',
						$name
					),
					'error'
				);

				return $text;
			}

			if (!empty($matches[2])) {
				$nestedText = $matches[0];
				$nestedText = $this->_parsePlugin($nestedText, $contentHandler);
				if ($nestedText !== $matches[0]) {
					$pos = strpos($text, $matches[0]);
					$len = strlen($matches[0]);
					$text = substr_replace($text, $nestedText, $pos, $len);
				}
			}
		}

		return $text;
	}

	function validateNestedTags($text) {
		$name = strtolower($this->getPluginName());
		$isNested = $this->isNested();

		$preparedText = str_replace('[' . $name . ']', '[' . $name . ' ]', strtolower($text));
		$openTag = '[' . $name . ' ';
		$closeTag = '[/' . $name . ']';

		$closeTagPos = strpos($preparedText, $closeTag);
		if ($closeTagPos === false)
			return true;

		if (strpos($preparedText, $openTag) === false)
			return false;

		$openTagPos = -1;
		$balancing = 0;
		while ($openTagPos !== false) {
			$openTagPos = strpos($preparedText, $openTag, $openTagPos + 1);

			if ($openTagPos !== false && $openTagPos < $closeTagPos) {
				++$balancing;
			} else if ($closeTagPos !== false) {
				while ($closeTagPos !== false && ($openTagPos === false || $closeTagPos < $openTagPos)) {
					$closeTagPos = strpos($preparedText, $closeTag, $closeTagPos + 1);

					--$balancing;
					if ($balancing < 0)
						return false;
				}

				if ($openTagPos !== false)
					++$balancing;
			}
		}

		return ($balancing == 0);
	}

	function _parsePlugin($text, $contentHandler) {
		if (empty($contentHandler)) {
			$handler = array($this, 'contentHandler');
			$contentHandler = $handler;
		}

		$this->_contentHandler = $contentHandler;
		$text = preg_replace_callback(
			$this->getPluginRegExp(),
			array($this, 'parsePluginInclusions'),
			$text);

		$this->_contentHandler = null;

		return $text;
	}

	function parsePluginInclusions($matches) {
		if (empty($matches[0])) return '';

		return call_user_func($this->_contentHandler, $this->parsePluginParams($matches[1]), (!empty($matches[2]) ? $matches[2] : ''), $matches[0]);
	}

	function parsePluginParams($paramsStr) {
		$params = array();
		if (empty($paramsStr))
			return $params;

		$matches = null;
		preg_match_all('/([a-z\d\_\-]+)=("[^"]*"|&quot;.*?&quot;|[^\s\]]*)/i', $paramsStr, $matches, PREG_SET_ORDER);
		if (!empty($matches))
			foreach ($matches as $match)
				if (!empty($match[2]) && !empty($match[1]))
					$params[$match[1]] = trim(html_entity_decode($match[2], ENT_COMPAT | ENT_HTML401, 'UTF-8'), '"');

		return $params;
	}

	function contentHandler($params, $text, $originalText) {
		return $originalText;
	}
}