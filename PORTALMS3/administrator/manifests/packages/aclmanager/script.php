<?php
/**
 * @package        ACL Manager for Joomla
 * @copyright      Copyright (c) 2011-2017 Sander Potjer
 * @license        GNU General Public License version 3 or later
 * @link           https://www.aclmanager.net
 */

// No direct access.
defined('_JEXEC') or die;

jimport('joomla.filesystem.folder');
jimport('joomla.filesystem.file');

/**
 * ACL Manager Install script to activate the plugin after install
 *
 * @since  2.5.0
 */
class Pkg_ACLManagerInstallerScript
{
	/**
	 * Constructor
	 *
	 * @param   JAdapterInstance $adapter The object responsible for running this script
	 *
	 * @since   2.5.0
	 */
	public function __construct(JAdapterInstance $adapter)
	{
		$this->app = JFactory::getApplication();
	}

	/**
	 * Function to act before the installation process runs
	 *
	 * @param   string           $route   Which action is happening (install|uninstall|discover_install|update)
	 * @param   JAdapterInstance $adapter The object responsible for running this script
	 *
	 * @since   2.5.0
	 *
	 * @return  boolean  True on success
	 */
	public function preflight($type, $parent)
	{
		// Check if we're coming from a version with liveupdate
		if (is_dir(JPATH_ADMINISTRATOR . '/components/com_aclmanager/liveupdate'))
		{
			// Remember this, to prevent error screens
			$this->app->setUserState('com_aclmanager.liveupdate', 1);
		}

		return true;
	}

	/**
	 * Function to act after the installation process runs
	 *
	 * @param   string           $route   Which action is happening (install|uninstall|discover_install|update)
	 * @param   JAdapterInstance $adapter The object responsible for running this script
	 *
	 * @since   2.5.0
	 *
	 * @return  boolean  True on success
	 */
	public function postflight($route, JAdapterInstance $adapter)
	{
		?>
        <div class="well" style="margin-right: 15px">
            <img src="components/com_aclmanager/assets/images/aclmanager.png" width="400" height="100" alt="ACL Manager" style="float:right;margin-right: 15px;"/>

            <h2><?php echo JText::_('COM_ACLMANAGER_PIHEADER'); ?></h2>

            <div>
				<?php echo JText::_('COM_ACLMANAGER_PISUBHEADER'); ?><br/><br/>
				<?php echo JText::_('COM_ACLMANAGER_PISUPPORT'); ?>:
                <a href="https://www.aclmanager.net">www.aclmanager.net</a><br/><br/>
            </div>

            <table class="adminlist table table-striped" width="100%">
                <thead>
                <tr>
                    <th class="title" colspan="2"><?php echo JText::_('COM_ACLMANAGER_PIEXTENSION'); ?></th>
                    <th width="30%"><?php echo JText::_('COM_ACLMANAGER_PISTATUS'); ?></th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <td colspan="3"></td>
                </tr>
                </tfoot>
                <tbody>
                <tr class="row0">
                    <td class="key" colspan="2"><a href="index.php?option=com_aclmanager">ACL Manager</a></td>
                    <td><strong style="color: green"><?php echo JText::_('COM_ACLMANAGER_PIINSTALLED'); ?></strong></td>
                </tr>
                <tr>
                    <th><?php echo JText::_('COM_ACLMANAGER_PIPLUGIN'); ?></th>
                    <th><?php echo JText::_('COM_ACLMANAGER_PIGROUP'); ?></th>
                    <th></th>
                </tr>
                <tr class="row1">
                    <td class="key">plg_system_aclmanager</td>
                    <td class="key">System</td>
                    <td><strong style="color: green"><?php echo JText::_('COM_ACLMANAGER_PIINSTALLED'); ?></strong></td>
                </tr>
                </tbody>
            </table>
        </div>
		<?php

		// Slightly dirty, but I want to remove liveupdate without displaying an error after the update...
		if ($this->app->getUserState('com_aclmanager.liveupdate'))
		{
			// Reset User State
			$this->app->setUserState('com_aclmanager.liveupdate', null);

			// Make sure that this work-around also adds the update site
			$this->addUpdateSite('ACL Manager Updates', 'extension', 'https://www.aclmanager.net/updates?', 1);

			// Redirect to prevent error screen
			$msg = JText::_('Installation of the component was successful.');
			$this->app->redirect(JRoute::_('index.php?option=com_installer&view=install', false), $msg);
		}

		return true;
	}

	/**
	 * Enable plugin after install
	 *
	 * @param   JAdapterInstance $adapter The object responsible for running this script
	 *
	 * @since   2.5.0
	 *
	 * @return  boolean  True on success
	 */
	public function install(JAdapterInstance $adapter)
	{
		$db = JFactory::getDbo();
		$q  = $db->getQuery(true);

		// Fields to update
		$fields = array(
			$db->quoteName('enabled') . ' = 1'
		);

		// Conditions for update record
		$conditions = array(
			$db->quoteName('name') . ' = ' . $db->quote('plg_system_aclmanager')
		);

		// Update extensions table
		$q->update($db->quoteName('#__extensions'))->set($fields)->where($conditions);
		$db->setQuery($q);
		$db->execute();

		return true;
	}

	/**
	 * Function to perform changes during update
	 *
	 * @param   JAdapterInstance $adapter The object responsible for running this script
	 *
	 * @return  boolean  True on success
	 *
	 * @since   2.5.0
	 */
	public function update(JAdapterInstance $adapter)
	{
		// Remove old folders
		$this->removeOldFolders();

		// Remove old files
		$this->removeOldFiles();

		// Remove old language files
		$this->removeOldLanguageFiles();

		return true;
	}

	/**
	 * Function to remove old folders
	 *
	 * @return  void
	 *
	 * @since   2.5.0
	 */
	private function removeOldFolders()
	{
		// Build the folder array
		$folders = array(
			JPATH_PLUGINS . '/system/aclmanager/overrides/25',
			JPATH_PLUGINS . '/system/aclmanager/overrides/31',
			JPATH_PLUGINS . '/system/aclmanager/overrides/32',
			JPATH_ADMINISTRATOR . '/components/com_aclmanager/liveupdate',
		);

		// Remove the admin files
		foreach ($folders as $folder)
		{
			if (is_dir($folder))
			{
				JFolder::delete($folder);
			}
		}
	}

	/**
	 * Function to remove old files
	 *
	 * @return  void
	 *
	 * @since   2.5.0
	 */
	private function removeOldFiles()
	{
		// Files to remove
		$files = array(
			JPATH_ADMINISTRATOR . '/components/com_aclmanager/install.aclmanager.php',
			JPATH_ADMINISTRATOR . '/components/com_aclmanager/remove.aclmanager.php',
			JPATH_ADMINISTRATOR . '/components/com_aclmanager/script.aclmanager.php',
			JPATH_PLUGINS . '/system/aclmanager/overrides/articles.php',
		);

		// Remove the admin files
		foreach ($files as $file)
		{
			if (is_file($file))
			{
				JFile::delete($file);
			}
		}
	}

	/**
	 * Function to remove old language files
	 *
	 * @return  void
	 *
	 * @since   2.5.0
	 */
	private function removeOldLanguageFiles()
	{
		// Get the installed languages
		$languages = JFolder::listFolderTree(JPATH_ADMINISTRATOR . '/language', '-');

		// Remove com_aclmanager.ini & com_aclmanager.sys.ini for each language
		foreach ($languages as $language)
		{
			$languagepath = JPATH_ADMINISTRATOR . '/language/' . $language['name'] . '/' . $language['name'];

			if (is_file($languagepath . '.com_aclmanager.ini'))
			{
				JFile::delete($languagepath . '.com_aclmanager.ini');
			}

			if (is_file($languagepath . '.com_aclmanager.sys.ini'))
			{
				JFile::delete($languagepath . '.com_aclmanager.sys.ini');
			}
		}
	}

	/**
	 * Adds an update site to the table if it doesn't exist.
	 *
	 * @param   string  $name     The friendly name of the site
	 * @param   string  $type     The type of site (e.g. collection or extension)
	 * @param   string  $location The URI for the site
	 * @param   boolean $enabled  If this site is enabled
	 *
	 * @return  void
	 *
	 * @since  2.5.0
	 */
	private function addUpdateSite($name, $type, $location, $enabled)
	{
		$db = JFactory::getDbo();

		// Get extension ID
		$query = $db->getQuery(true)
			->select($db->quoteName('extension_id'))
			->from($db->quoteName('#__extensions'))
			->where($db->quoteName('element') . ' = ' . $db->quote('pkg_aclmanager'));
		$db->setQuery($query);

		$eid = (int) $db->loadResult();

		// Look if the location is used already; doesn't matter what type you can't have two types at the same address, doesn't make sense
		$query = $db->getQuery(true)
			->select('update_site_id')
			->from('#__update_sites')
			->where('location = ' . $db->quote($location));
		$db->setQuery($query);
		$update_site_id = (int) $db->loadResult();

		// If it doesn't exist, add it!
		if (!$update_site_id)
		{
			$query->clear()
				->insert('#__update_sites')
				->columns(array($db->quoteName('name'), $db->quoteName('type'), $db->quoteName('location'), $db->quoteName('enabled')))
				->values($db->quote($name) . ', ' . $db->quote($type) . ', ' . $db->quote($location) . ', ' . (int) $enabled);
			$db->setQuery($query);

			if ($db->execute())
			{
				// Link up this extension to the update site
				$update_site_id = $db->insertid();
			}
		}

		// Check if it has an update site id (creation might have failed)
		if ($update_site_id)
		{
			// Look for an update site entry that exists
			$query->clear()
				->select('update_site_id')
				->from('#__update_sites_extensions')
				->where('update_site_id = ' . $update_site_id)
				->where('extension_id = ' . $eid);
			$db->setQuery($query);
			$tmpid = (int) $db->loadResult();

			if (!$tmpid)
			{
				// Link this extension to the relevant update site
				$query->clear()
					->insert('#__update_sites_extensions')
					->columns(array($db->quoteName('update_site_id'), $db->quoteName('extension_id')))
					->values($update_site_id . ', ' . $eid);
				$db->setQuery($query);
				$db->execute();
			}
		}
	}
}