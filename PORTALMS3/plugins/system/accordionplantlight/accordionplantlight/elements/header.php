<?php
/*
 * @package		JPlant.Elements
 * @author		http://www.j-plant.com
 * @copyright	Copyright (C) 2010 J-Plant. All rights reserved.
 * @license		GNU/GPL v. 3.0
 *
 * JPlant Elements is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 *
 */
defined('_JEXEC') or die ('Restricted access');

class JElementHeader extends JElement {
	var	$_name = 'header';

	function fetchElement($name, $value, &$node, $control_name) {
		return '<div style="font-weight:normal;font-size:12px;color:#FFF;padding:4px;margin:0;background:#0B55C4;">' . JText::_($value) . '</div>';
	}
}