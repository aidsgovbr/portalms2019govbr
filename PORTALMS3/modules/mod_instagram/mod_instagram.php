<?php
/**
 * @package     Instagram
 * @subpackage  mod_instagram
 *
 * @author      Tiago Garcia <tiago@gmail.com>
 * @copyright   Copyright (C) 2015 TiagoGarcia, Inc. All rights reserved.
 * @license
 */

// No direct access.
defined('_JEXEC') or die;

// Initialise variables.
$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));

// Render the module.
require JModuleHelper::getLayoutPath('mod_instagram', $params->get('layout', 'default'));

