<?php
/**
 * @package         Modules Anywhere
 * @version         7.3.2
 * 
 * @author          Peter van Westen <info@regularlabs.com>
 * @link            http://www.regularlabs.com
 * @copyright       Copyright © 2017 Regular Labs All Rights Reserved
 * @license         http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */

defined('_JEXEC') or die;

if (!is_file(__DIR__ . '/vendor/autoload.php'))
{
	return;
}

require_once __DIR__ . '/vendor/autoload.php';

use RegularLabs\ModulesAnywhere\Plugin;

/**
 * Plugin that loads modules
 */
class PlgSystemModulesAnywhere extends Plugin
{
	public $_alias       = 'modulesanywhere';
	public $_title       = 'MODULES_ANYWHERE';
	public $_lang_prefix = 'MA';

	public $_has_tags = true;
}
