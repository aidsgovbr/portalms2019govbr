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

if (!class_exists('JPlantLoader')) {
	DEFINE('JPLANT_LOADER_KEY', 'jplantlibraries');
	DEFINE('JPLANT_LOADER_SEP', '.');
	DEFINE('JPLANT_LOADER_ADAPTER_DIR', '_jadapters');

	$version = new JVersion();
	DEFINE('JPLANT_J15', version_compare($version->getShortVersion(), '1.5.0', '>=') && version_compare($version->getShortVersion(), '1.6.0', '<'));
	DEFINE('JPLANT_J16', !JPLANT_J15 && version_compare($version->getShortVersion(), '1.6.0', '>=') && version_compare($version->getShortVersion(), '1.7.0', '<'));
    DEFINE('JPLANT_J3', version_compare($version->getShortVersion(), '3.0.0', '>='));

	class JPlantLoader {
		static function import($filePath, $namespace = JPLANT_LOADER_KEY) {
			$includePaths = JPlantLoader::getIncludePaths();

			if (count($includePaths) < 2)
				return JLoader::import($filePath, $includePaths[0], $namespace);

			$realFilePath = '/' . str_replace(JPLANT_LOADER_SEP, '/', $filePath) . '.php';
			foreach ($includePaths as $includePath) {
				$path = $includePath . $realFilePath;

				if (@file_exists($path))
					return JLoader::import($filePath, $includePath, JPLANT_LOADER_KEY);
			}

			JError::raiseError(500, 'Unable to load the following library: "' . $filePath . '"');
			return null;
		}

		static function importAdapter($filePath) {
			$adapter = '_j16';
			if (JPLANT_J15)
				$adapter = '_j15';

			$path = explode('.', $filePath);
			$lib = array_pop($path);
			$path = join('.', $path);

			JPlantLoader::import($path . '.' . JPLANT_LOADER_ADAPTER_DIR . '.' . $adapter . '.' . $lib);
		}

		static function registerIncludePath($includePath) {
			$helper = JPlantLoader::_getHelperInstance();
			$helper->registerIncludePath($includePath);
		}

		static function getIncludePaths() {
			$helper = JPlantLoader::_getHelperInstance();

			return $helper->getIncludePaths();
		}

		static function _getHelperInstance() {
			static $helper;

			if (is_null($helper))
				$helper = new JPlantLoaderHelper();

			return $helper;
		}
	}

	class JPlantLoaderHelper {
		var $_includePaths = array();

		function registerIncludePath($includePath) {
			if (!in_array($includePath, $this->_includePaths))
				$this->_includePaths[] = $includePath;
		}

		function getIncludePaths() {
			return $this->_includePaths;
		}
	}
}

JPlantLoader::registerIncludePath(dirname(__FILE__));