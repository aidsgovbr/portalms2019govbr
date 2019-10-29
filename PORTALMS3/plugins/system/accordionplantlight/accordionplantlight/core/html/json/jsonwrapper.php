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

require_once dirname(__FILE__) . '/json/JSON.php';

function json_encode($arg) {
	global $services_json;
	if (!isset($services_json)) {
		$services_json = new Services_JSON();
	}

	return $services_json->encode($arg);
}

function json_decode($arg) {
	global $services_json;
	if (!isset($services_json)) {
		$services_json = new Services_JSON();
	}

	return $services_json->decode($arg);
}