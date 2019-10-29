<?php
/**
 * @package     Module
 * @subpackage  mod_slideshow_responsive_phoca
 * @copyright   Copyright (C) 2014 MS, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Tiago Garcia.
 */

// No direct access.
defined('_JEXEC') or die;

require_once __DIR__ . '/helper.php';

$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));

// carrega os dados da listagem
$items = modSlideshowResponsivePhoca::getList($params);

require(JModuleHelper::getLayoutPath('mod_slideshow_responsive_phoca'));
