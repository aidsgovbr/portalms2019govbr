<?php
/**
 * @package     ComCatagoriesOverride
 * @subpackage  com_ccategories
 *
 * @copyright   Copyright (C) 2013 CDESI - MS. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Tiago Garcia
 */

// No direct access.
defined('_JEXEC') or die;

/**
 * ComContentOverride helper.
 *
 * @package     ComCatagoriesOverride
 * @subpackage  com_ccategories
 * @since       3.0
 */
class OverrideHelper
{

	/**
	 * Gets a list of the actions that can be performed.
	 *
	 * @param   string	$extension	The extension.
	 * @param   integer  $categoryId	The category ID.
	 *
	 * @return  JObject
	 * @since   1.6
	 */
	public static function getActionsCategories($extension, $categoryId = 0)
	{
		$user		= JFactory::getUser();
		$result		= new JObject;
		$parts		= explode('.', $extension);
		$component	= $parts[0];

		if (empty($categoryId))
		{
			$assetName = $component;
			$level = 'component';
		}
		else
		{
			$assetName = $component.'.category.'.(int) $categoryId;
			$level = 'category';
		}

		$actions = JAccess::getActions($component, $level);

		foreach ($actions as $action)
		{
			$result->set($action->name, $user->authorise($action->name, $assetName));
		}

		return $result;
	}

	/**
	 * Method to return a list of all categories that a user has permission for a given action
	 *
	 * @param   string  $component  The component from which to retrieve the categories
	 * @param   string  $action     The name of the section within the component from which to retrieve the actions.
	 *
	 * @return  array  List of categories that this group can do this action to (empty array if none). Categories must be published.
	 *
	 * @since   11.1
	 */
	public static function getAuthorisedCategories($component, $action)
	{
		// Brute force method: get all published category rows for the component and check each one
		// TODO: Modify the way permissions are stored in the db to allow for faster implementation and better scaling
		$db = JFactory::getDbo();
		$query = $db->getQuery(true)->select('c.id AS id, a.name AS asset_name')->from('#__categories AS c')
		->innerJoin('#__assets AS a ON c.asset_id = a.id')->where('c.extension = ' . $db->quote($component))->where('c.published IN (0, 1)')
		->order('id ASC');
		$db->setQuery($query);
		$allCategories = $db->loadObjectList('id');
		$allowedCategories = array();
		$user		= JFactory::getUser();

		foreach ($allCategories as $category)
		{
			if ($user->authorise($action, $category->asset_name))
			{
				$allowedCategories[] = (int) $category->id;
			}
		}
		return $allowedCategories;
	}

	/**
	 * Method to return a list of all categories that a user has permission for a given action edit
	 *
	 * @param   string  $component  The component from which to retrieve the categories
	 *
	 * @return  array  List of categories that this group can do this action to (empty array if none). Categories must be published.
	 *
	 * @since   3.0
	 */
	public static function getFilterCategories()
	{
		$db		= JFactory::getDbo();
		$user  = JFactory::getUser();
		$query	= $db->getQuery(true);
		$query->select('id As value, title As text');
		$query->from('#__categories AS a');
		$query->where('id IN (' . implode(',', $user->getAuthorisedCategories('com_content', 'core.edit')) .')');
		$query->where('published = ' . $db->quote('1'));
		$query->where('extension = ' . $db->quote('com_content'));
		$query->order('a.id');
		$db->setQuery($query);

		try
		{
			return $filterCategories = $db->loadObjectList();
		}
		catch (RuntimeException $e)
		{
			return JError::raiseWarning(500, $e->getMessage());
		}
	}

	/**
	 * Configure the Submenu links.
	 *
	 * @param   string	The extension being used for the categories.
	 *
	 * @return  void
	 * @since   1.6
	 */
	public static function addSubmenu($extension)
	{
		switch ($extension) {
			case 'articles':
			$component = 'com_content';
			break;
			case 'categories':
			$component = 'com_categories';
			break;
			case 'featured':
			$component = 'com_content';
			break;
			case 'com_content':
			$component = 'com_categories';
			$extension = 'categories';
			break;
		}

		// if (count($parts) > 1)
		// {
		// 	$section = $parts[1];
		// }

		// Try to find the component helper.
		$eName	= str_replace('com_', '', $component);
		$file	= JPath::clean(JPATH_ADMINISTRATOR.'/components/'.$component.'/helpers/'.$eName.'ms.php');

		if (file_exists($file))
		{
			require_once $file;

			$prefix	= ucfirst(str_replace('com_', '', $component));
			$cName	= $prefix.'Helper';
			if (class_exists($cName))
			{

				if (is_callable(array($cName, 'addSubmenu')))
				{
					$lang = JFactory::getLanguage();
					// loading language file from the administrator/language directory then
					// loading language file from the administrator/components/*extension*/language directory
					$lang->load($component, JPATH_BASE, null, false, false)
					||	$lang->load($component, JPath::clean(JPATH_ADMINISTRATOR.'/components/'.$component), null, false, false)
					||	$lang->load($component, JPATH_BASE, $lang->getDefault(), false, false)
					||	$lang->load($component, JPath::clean(JPATH_ADMINISTRATOR.'/components/'.$component), $lang->getDefault(), false, false);

					// call_user_func(array($cName, 'addSubmenu'), 'categories'.(isset($section)?'.'.$section:''));
					call_user_func(array($cName, 'addSubmenu'), $extension . (isset($section)?'.'.$section:''));
				}
			}
		}
	}

	/**
	 * Configure the Submenu links.
	 *
	 * @param   string	The extension being used for the categories.
	 *
	 * @return  void
	 * @since   1.6
	 */
	public static function addSubmenuCat($extension)
	{
		// Avoid nonsense situation.
		if ($extension == 'com_categories')
		{
			return;
		}

		$parts = explode('.', $extension);
		$component = $parts[0];

		if (count($parts) > 1)
		{
			$section = $parts[1];
		}

		// Try to find the component helper.
		$eName	= str_replace('com_', '', $component);
		$file	= JPath::clean(JPATH_ADMINISTRATOR.'/components/'.$component.'/helpers/'.$eName.'.php');

		if (file_exists($file))
		{
			require_once $file;

			$prefix	= ucfirst(str_replace('com_', '', $component));
			$cName	= $prefix.'Helper';

			if (class_exists($cName))
			{

				if (is_callable(array($cName, 'addSubmenu')))
				{
					$lang = JFactory::getLanguage();
					// loading language file from the administrator/language directory then
					// loading language file from the administrator/components/*extension*/language directory
					$lang->load($component, JPATH_BASE, null, false, false)
					||	$lang->load($component, JPath::clean(JPATH_ADMINISTRATOR.'/components/'.$component), null, false, false)
					||	$lang->load($component, JPATH_BASE, $lang->getDefault(), false, false)
					||	$lang->load($component, JPath::clean(JPATH_ADMINISTRATOR.'/components/'.$component), $lang->getDefault(), false, false);

					call_user_func(array($cName, 'addSubmenu'), 'categories'.(isset($section)?'.'.$section:''));
				}
			}
		}
	}
}
