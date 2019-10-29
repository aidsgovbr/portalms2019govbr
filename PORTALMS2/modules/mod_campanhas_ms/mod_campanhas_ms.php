<?php
/**
 * @package     Campanhas_MS
 * @subpackage  mod_campanhas_ms
 *
 * @copyright   Copyright (C) 2013 TiagoGarcia, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access.
defined('_JEXEC') or die;

// Include the campanhas_ms functions only once.
require_once __DIR__ . '/helper.php';

// Get module data.
$list = ModCampanhas_msHelper::getList($params);

// Initialise variables.
$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));

// Render the module.
require JModuleHelper::getLayoutPath('mod_campanhas_ms', $params->get('layout', 'default'));
