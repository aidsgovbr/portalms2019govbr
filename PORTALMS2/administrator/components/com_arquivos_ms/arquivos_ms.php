<?php
/**
 * @version     1.0.0
 * @package     com_arquivos_ms
 * @copyright   Copyright (C) 2013. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Fábio <fabio.nery@saude.gov.br> - http://www.saude.gov.br
 */


// no direct access
defined('_JEXEC') or die;

// Access check.
if (!JFactory::getUser()->authorise('core.manage', 'com_arquivos_ms'))
{
	throw new Exception(JText::_('JERROR_ALERTNOAUTHOR'));
}

// Include dependancies
jimport('joomla.application.component.controller');

$controller	= JControllerLegacy::getInstance('Arquivos_ms');
$controller->execute(JFactory::getApplication()->input->get('task'));
$controller->redirect();
