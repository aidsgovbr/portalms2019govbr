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

JLoader::register('PWTSEOHelper', __DIR__ . '/helpers/pwtseo.php');

// Execute the task
$controller = JControllerLegacy::getInstance('pwtseo');
$controller->execute(JFactory::getApplication()->input->get('task'));
$controller->redirect();
