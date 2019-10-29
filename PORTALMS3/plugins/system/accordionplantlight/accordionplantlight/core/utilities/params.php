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

jimport('joomla.filter.filterinput');

define('JPLANT_PARAMS_SEPARATOR', '-');
define('JPLANT_PARAMS_ROOT_GROUP', '__root');

class JPlantParamsHelper {
	static function getIntArray($val, $default = null, $separator = ',') {
		if (!is_string($val))
			return $default;

		$ret = array();
		$val = explode($separator, $val);
		foreach ($val as $item) {
			$el = JPlantParamsHelper::getInt($item);
			if ($el > 0 || $item == '0' || is_numeric($item))
				$ret[] = $el;
		}

		if (count($ret) == 0)
			$ret = $default;
		else
			$ret = array_unique($ret);

		return $ret;
	}

	static function getBool($val, $default = false) {
		if (is_null($val))
			return $default;

		if (!$val)
			return false;

		return true;
	}

	static function getInt($val) {
		return @intval($val, 10);
	}

	static function getParamsTree($params, $separator = null) {
		if (empty($params))
			return null;

		if (is_null($separator))
			$separator = JPLANT_PARAMS_SEPARATOR;

		if (is_object($params))
			$params = $params->toArray();

		$group = null;
		$tree = array(JPLANT_PARAMS_ROOT_GROUP => array());
		foreach ($params as $k => $v) {
			$groups = explode($separator, $k);
			$elKey = array_pop($groups);
			$groupsCount = count($groups);
			if ($groupsCount == 0) {
				$group =& $tree[JPLANT_PARAMS_ROOT_GROUP];
			} else {
				$group =& $tree;
				for ($i = 0; $i < $groupsCount; $i++) {
					$subGroup = $groups[$i];
					if (!array_key_exists($subGroup, $group))
						$group[$subGroup] = array();

					$group =& $group[$subGroup];
				}
			}

			$group[$elKey] = $v;
		}

		return $tree;
	}

	static function normalizeParameters($originalParams, $inputParams, $diff = true, $merge = false) {
		$outputParams = array();
		if (empty($originalParams) || empty($inputParams)) {
			if (!$diff)
				$outputParams = $originalParams;

			return $outputParams;
		}

		$filterInput = JFilterInput::getInstance();
		foreach ($originalParams as $key => $val) {
			if (array_key_exists($key, $inputParams)) {
				if (is_array($val)) {
					$childParams = JPlantParamsHelper::normalizeParameters(
						$val,
						isset($inputParams[$key]) ? $inputParams[$key] : array(),
						$diff,
						$merge
					);

					if (count($childParams) != 0)
						$outputParams[$key] = $childParams;

				} else {
					$inputVal = $filterInput->clean($inputParams[$key], gettype($val));
					if (!$diff || $inputVal !== $val)
						$outputParams[$key] = $inputVal;
				}
			} else if (!$diff) {
				$outputParams[$key] = $val;
			}
		}

		if ($merge) {
			$outputParams = array_merge($inputParams, $outputParams);
		}

		return $outputParams;
	}
}