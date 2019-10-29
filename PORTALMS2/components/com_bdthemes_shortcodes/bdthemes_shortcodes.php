<?php
/**
 * BDThemes Shortcodes Component
 *
 * @package		Shortcode Ultimate Joomla 3.0
 * @subpackage	BDThemes Schortcodes
 * @copyright Copyright (C) 2011-2014 BDThemes Ltd. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-3.0.html GNU/GPL
 * @author BDThemes
 * @author url http://bdthemes.com
 */

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

require_once JPATH_COMPONENT.DIRECTORY_SEPARATOR.'helpers'.DIRECTORY_SEPARATOR.'shortcode.php';
require_once JPATH_COMPONENT.DIRECTORY_SEPARATOR.'helpers'.DIRECTORY_SEPARATOR.'item.php';


// Include dependancies
jimport('joomla.application.component.controller');

$controller	= JControllerLegacy::getInstance('Bdthemes_shortcodes');

// Perform the Request task
$task = JFactory::getApplication()->input->get('task');
	
$controller->execute($task);
$controller->redirect();

?>