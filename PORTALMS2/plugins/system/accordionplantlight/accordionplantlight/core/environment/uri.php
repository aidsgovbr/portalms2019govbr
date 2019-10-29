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

class JPlantUriHelper {
	static function getRootUri($filePath, $relative = true) {
		$filePath = str_replace('\\', '/', $filePath);
		if (JPATH_ROOT != '\\' && JPATH_ROOT != '/') {
			$filePath = str_replace(str_replace('\\', '/', JPATH_ROOT), '', $filePath);
			if (!$relative)
				$filePath = trim($filePath, '/');
		}

		return JURI::root($relative) . $filePath . '/';
	}
}