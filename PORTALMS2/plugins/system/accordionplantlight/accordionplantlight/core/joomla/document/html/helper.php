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

class JPlantDocumentHTMLHelper {
	var $_changes = array();

	static function getInstance() {
		static $inst;

		if (is_null($inst))
			$inst = new JPlantDocumentHTMLHelper();

		return $inst;
	}

	function startTrackHeadChanges() {
		$doc = JFactory::getDocument();
		if ($doc->getType() != 'html')
			return null;

		$trackId = uniqid('tc', false);
		$this->_changes[$trackId] = $this->getHeadData();

		return $trackId;
	}

	function endTrackHeadChanges($trackId) {
		unset($this->_changes[$trackId]);
	}

	function getHeadChanges($trackId, $end = true) {
		$changes = array();
		if (!isset($this->_changes[$trackId]))
			return $changes;

		$startHeadData = $this->_changes[$trackId];
		$endHeadData = $this->getHeadData();
		foreach ($endHeadData['styleSheets'] as $styleSheet => $styleAttrs) {
			if (!array_key_exists($styleSheet, $startHeadData['styleSheets']))
				$changes[] = '<link rel="stylesheet" href="' . $styleSheet . '" type="' . $this->getMimeType($styleAttrs, 'text/css') . '" />';
		}

		foreach ($endHeadData['style'] as $mimeType => $style) {
			if (empty($style) || (array_key_exists($mimeType, $startHeadData['style']) && $style == $startHeadData['style'][$mimeType]))
				continue;

			if (!empty($startHeadData['style'][$mimeType]))
				$style = str_replace($startHeadData['style'][$mimeType], '', $style);

			$changes[] = '<style type="' . $mimeType . '">' . $style . '</style>';
		}

		foreach ($endHeadData['scripts'] as $script => $mimeType) {
			if (!array_key_exists($script, $startHeadData['scripts']))
				$changes[] = '<script type="' . (is_array($mimeType) ? $this->getMimeType($mimeType, 'text/javascript') : $mimeType) . '" src="' . $script . '"></script>';
		}

		foreach ($endHeadData['script'] as $mimeType => $script) {
			if (!empty($startHeadData['script'][$mimeType])) {
				$changedScript = '';
				$startScript = $startHeadData['script'][$mimeType];
				if (strpos($script, $startScript) === 0)
					$changedScript = trim(substr($script, strlen($startScript)));

				if (!empty($changedScript))
					$changes[] = '<script type="' . $mimeType . '">' . $changedScript . '</script>';
			} else {
				$changes[] = '<script type="' . $mimeType . '">' . $script . '</script>';
			}
		}

		foreach ($endHeadData['custom'] as $customTag) {
			if (!in_array($customTag, $startHeadData['custom']))
				$changes[] = $customTag;
		}

		if ($end)
			$this->endTrackHeadChanges($trackId);

		return $changes;
	}

	function getHeadData() {
		$doc = JFactory::getDocument();

		return $doc->getHeadData();
	}

    private function getMimeType($meta, $defaultMimeType = '') {
        if (!empty($meta['mime']))
            return $meta['mime'];

        if (!empty($meta['type']))
            return $meta['type'];

        return $defaultMimeType;
    }
}