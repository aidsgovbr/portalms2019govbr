<?php
/**
 * @package    Pwtseo
 *
 * @author     Perfect Web Team <extensions@perfectwebteam.com>
 * @copyright  Copyright (C) 2016 - 2018 Perfect Web Team. All rights reserved.
 * @license    GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 * @link       https://extensions.perfectwebteam.com
 */

defined('_JEXEC') or die;

/**
 * PWTSEO helper for the backend.
 *
 * @since    1.0
 */
class PWTSEOHelper
{
	/**
	 * Render submenu.
	 *
	 * @param   string $vName The name of the current view.
	 *
	 * @return  void
	 *
	 * @since   1.0
	 */
	public static function addSubmenu($vName)
	{
		JHtmlSidebar::addEntry(
			JText::_('COM_PWTSEO_DASHBOARD_LABEL'),
			'index.php?option=com_pwtseo',
			$vName == 'pwtseo'
		);

		JHtmlSidebar::addEntry(
			JText::_('COM_PWTSEO_ARTICLES_LABEL'),
			'index.php?option=com_pwtseo&view=articles',
			$vName == 'articles'
		);
	}

	/**
	 * Returns a human readable version of the given context
	 *
	 * @param   string $sContext The context to get the label for
	 *
	 * @return  string The human readable label
	 *
	 * @since   1.0
	 */
	public static function getContextLabel($sContext)
	{
		$aArr = array(
			'com_content.article' => JText::_('COM_PWTSEO_CONTEXT_CONTENT_ARTICLES_LABEL')
		);

		return isset($aArr[$sContext]) ? $aArr[$sContext] : '';
	}
}
