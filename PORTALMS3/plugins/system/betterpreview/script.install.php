<?php
/**
 * @package         Better Preview
 * @version         6.0.6
 * 
 * @author          Peter van Westen <info@regularlabs.com>
 * @link            http://www.regularlabs.com
 * @copyright       Copyright © 2017 Regular Labs All Rights Reserved
 * @license         http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */

defined('_JEXEC') or die;

require_once __DIR__ . '/script.install.helper.php';

class PlgSystemBetterPreviewInstallerScript extends PlgSystemBetterPreviewInstallerScriptHelper
{
	public $name           = 'BETTER_PREVIEW';
	public $alias          = 'betterpreview';
	public $extension_type = 'plugin';

	public function uninstall($adapter)
	{
		$this->uninstallPlugin($this->extname, 'editors-xtd');
	}

	public function onAfterInstall($route)
	{
		$this->createTable();

		$this->convertOldSettings();
		$this->fixSystemPluginOrdering();

		JFactory::getCache()->clean('_system');

		$this->deleteOldModule();
	}

	public function createTable()
	{
		$query = "CREATE TABLE IF NOT EXISTS `#__betterpreview_sefs` (
			`url` char(255) NOT NULL,
			`sef` char(255) NOT NULL,
			`created` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
			KEY  (`url`(50))
		) DEFAULT CHARSET=utf8;";
		$this->db->setQuery($query);
		$this->db->execute();

		$query = 'SHOW INDEX FROM ' . $this->db->quoteName('#__betterpreview_sefs');
		$this->db->setQuery($query);
		$index = $this->db->loadObject();

		if ( ! empty($index->Key_name) && $index->Key_name == 'PRIMARY')
		{
			$query = 'ALTER TABLE ' . $this->db->quoteName('#__betterpreview_sefs')
				. ' DROP INDEX ' . $this->db->quoteName($index->Key_name) . ','
				. ' ADD INDEX ' . $this->db->quoteName('url') . ' (' . $this->db->quoteName('url') . '(50));';
			$this->db->setQuery($query);
			$this->db->execute();
		}

		// delete all cached sef urls
		$this->db->truncateTable('#__betterpreview_sefs');
	}

	public function fixSystemPluginOrdering()
	{
		// force system plugin ordering
		$query = $this->db->getQuery(true)
			->update('#__extensions')
			->set($this->db->quoteName('ordering') . ' = -1')
			->where($this->db->quoteName('element') . ' = ' . $this->db->quote('betterpreview'))
			->where($this->db->quoteName('folder') . ' = ' . $this->db->quote('system'));
		$this->db->setQuery($query);
		$this->db->execute();
	}

	public function convertOldSettings()
	{
		$query = $this->db->getQuery(true)
			->select('params')
			->from('#__extensions')
			->where($this->db->quoteName('element') . ' = ' . $this->db->quote('betterpreview'))
			->where($this->db->quoteName('folder') . ' = ' . $this->db->quote('system'));
		$this->db->setQuery($query);

		$params = $this->db->loadResult();

		if (strpos($params, 'default_menu_id') !== false)
		{
			return;
		}

		$params = str_replace('"use_home_menu_id":"0"', '"default_menu_id":"-1"', $params);

		$query = $this->db->getQuery(true)
			->update('#__extensions')
			->set($this->db->quoteName('params') . ' = ' . $this->db->quote($params))
			->where($this->db->quoteName('element') . ' = ' . $this->db->quote('betterpreview'))
			->where($this->db->quoteName('folder') . ' = ' . $this->db->quote('system'));
		$this->db->setQuery($query);
		$this->db->execute();
	}

	public function deleteOldModule()
	{
		// delete old module
		$query = $this->db->getQuery(true)
			->delete('#__extensions')
			->where($this->db->quoteName('element') . ' = ' . $this->db->quote('mod_betterpreview'));
		$this->db->setQuery($query);
		$this->db->execute();

		$query->clear()
			->delete('#__modules')
			->where($this->db->quoteName('module') . ' = ' . $this->db->quote('mod_betterpreview'));
		$this->db->setQuery($query);
		$this->db->execute();

		$folder = JPATH_ADMINISTRATOR . '/modules/mod_betterpreview';
		if (JFolder::exists($folder))
		{
			JFolder::delete($folder);
		}

		JFactory::getCache()->clean('_system');
	}
}
