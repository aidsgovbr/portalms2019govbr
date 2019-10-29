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

class JPlantCSSHelper extends JHTML {
	static function getSizeValue($val, $unit = 'px') {
		$intVal = @intval($val, 10);
		if (is_numeric($val))
			$val .= $unit;
			
		return $val;
	}
}