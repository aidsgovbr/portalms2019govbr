<?php
/**
 * @version     1.0.0
 * @package     com_arquivos_ms
 * @copyright   Copyright (C) 2013. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Fábio <fabio.nery@saude.gov.br> - http://www.saude.gov.br
 */

// No direct access
defined('_JEXEC') or die;

/**
 * Arquivos_ms helper.
 */
class Arquivos_msHelper
{
	/**
	 * Configure the Linkbar.
	 */
	public static function addSubmenu($vName = '')
	{
		JHtmlSidebar::addEntry(
			JText::_('COM_ARQUIVOS_MS_TITLE_ARQUIVOSS'),
			'index.php?option=com_arquivos_ms&view=arquivoss',
			$vName == 'arquivoss'
		);
		JHtmlSidebar::addEntry(
			JText::_('COM_ARQUIVOS_MS_TITLE_MSS'),
			'index.php?option=com_arquivos_ms&view=mss',
			$vName == 'mss'
		);

	}

	/**
	 * Gets a list of the actions that can be performed.
	 *
	 * @return	JObject
	 * @since	1.6
	 */
	public static function getActions()
	{
		$user	= JFactory::getUser();
		$result	= new JObject;

		$assetName = 'com_arquivos_ms';

		$actions = array(
			'core.admin', 'core.manage', 'core.create', 'core.edit', 'core.edit.own', 'core.edit.state', 'core.delete'
		);

		foreach ($actions as $action) {
			$result->set($action, $user->authorise($action, $assetName));
		}

		return $result;
	}
}
