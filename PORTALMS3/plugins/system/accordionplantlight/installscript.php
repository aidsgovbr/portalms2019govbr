<?php
/*
 * @package		Accordion Plant Light
 * @author		http://www.j-plant.com
 * @copyright	Copyright (C) 2010 J-Plant. All rights reserved.
 * @license		GNU/GPL v. 3.0
 *
 * This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 *
 */
defined('_JEXEC') or die('Restricted access');

jimport('joomla.filesystem.file');

class plgSystemaccordionplantlightInstallerScript {
	private $filesFolder = 'files';

	function preflight($type, $parent) {
		if ($type == 'install' || $type == 'update')
			$this->replaceManifestFile($parent);
	}

	function postflight($type, $parent) {
		if ($type == 'install' || $type == 'update')
			$this->deleteFakeManifestFile($parent);
	}

	private function replaceManifestFile($parent) {
		$installer = $parent->getParent();
		$manifestFile = preg_replace('/^\_{1}/', '', basename($installer->getPath('manifest')));

		$filesFolder = dirname(__FILE__) . '/' . $this->filesFolder . '/';

		JFile::delete($filesFolder . $manifestFile);
		JFile::copy($filesFolder . '../' . $manifestFile, $filesFolder . $manifestFile);
	}

	private function deleteFakeManifestFile($parent) {
		$installer = $parent->getParent();
		$manifestFile = basename($installer->getPath('manifest'));

		JFile::delete($installer->getPath('extension_root') . '/' . $manifestFile);
	}
}