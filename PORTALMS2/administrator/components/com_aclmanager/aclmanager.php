<?php
/**
 * @package		ACL Manager for Joomla
 * @copyright	Copyright (c) 2011-2017 Sander Potjer
 * @license		GNU General Public License version 3 or later
 * @link        https://www.aclmanager.net
 */

// No direct access.
defined('_JEXEC') or die;

// Access check.
$view	= JFactory::getApplication()->input->get('view','home');
if($view != 'notauthorised') {
	if (!JFactory::getUser()->authorise('core.manage', 'com_aclmanager')) {
		return JError::raiseWarning(404, JText::_('JERROR_ALERTNOAUTHOR'));
	}
}

if(($view == 'diagnostic') && (!JFactory::getUser()->authorise('aclmanager.diagnostic', 'com_aclmanager'))) {
	return JError::raiseWarning(404, JText::_('JERROR_ALERTNOAUTHOR'));
}

// Load language and fall back language
$jlang = JFactory::getLanguage();
$jlang->load('com_aclmanager.sys', JPATH_ADMINISTRATOR, 'en-GB', true);
$jlang->load('com_aclmanager.sys', JPATH_ADMINISTRATOR, $jlang->getDefault(), true);
$jlang->load('com_aclmanager.sys', JPATH_ADMINISTRATOR, null, true);
$jlang->load('com_aclmanager', JPATH_ADMINISTRATOR, 'en-GB', true);
$jlang->load('com_aclmanager', JPATH_ADMINISTRATOR, $jlang->getDefault(), true);
$jlang->load('com_aclmanager', JPATH_ADMINISTRATOR, null, true);

// Additional language files datatables
$jlang->load('com_users', JPATH_ADMINISTRATOR, 'en-GB', true);
$jlang->load('com_users', JPATH_ADMINISTRATOR, $jlang->getDefault(), true);
$jlang->load('com_users', JPATH_ADMINISTRATOR, null, true);
$jlang->load('mod_menu', JPATH_ADMINISTRATOR, 'en-GB', true);
$jlang->load('mod_menu', JPATH_ADMINISTRATOR, $jlang->getDefault(), true);
$jlang->load('mod_menu', JPATH_ADMINISTRATOR, null, true);

// Include dependancies
jimport('joomla.application.component.controller');

$controller	= JControllerLegacy::getInstance('Aclmanager');
$controller->execute(JFactory::getApplication()->input->get('task'));
$controller->redirect();