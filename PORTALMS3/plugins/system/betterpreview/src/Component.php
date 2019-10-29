<?php
/**
 * @package         Better Preview
 * @version         6.0.6
 * 
 * @author          Peter van Westen <info@regularlabs.com>
 * @link            http://www.regularlabs.com
 * @copyright       Copyright © 2017 Regular Labs All Rights Reserved
 * @license         http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */

namespace RegularLabs\Plugin\System\BetterPreview;

defined('_JEXEC') or die;

use JFactory;
use JFile;
use RegularLabs\Library\ArrayHelper as RL_Array;

class Component
{
	public static function getClass($type = 'Link')
	{
		if ( ! $namespace = self::getNameSpace($type))
		{
			return false;
		}

		return new $namespace;
	}

	private static function getNameSpace($type = 'Link')
	{
		$option = JFactory::getApplication()->input->get('option');
		$view   = JFactory::getApplication()->input->get('view', JFactory::getApplication()->input->get('controller'));
		$task   = JFactory::getApplication()->input->get('task');

		$namespace = 'RegularLabs\\Plugin\\System\\BetterPreview\\';

		if (empty($option))
		{
			return ($type != 'Preview') ? false : $namespace . $type;
		}

		$option = strlen($option) > 4 && substr($option, 0, 4) == 'com_' ? substr($option, 4) : $option;

		$parts = [ucfirst($option), ucfirst($view), ucfirst($task)];
		$parts = RL_Array::clean($parts);

		while ( ! empty($parts))
		{
			$last = end($parts);

			if (empty($last))
			{
				array_pop($parts);
				continue;
			}

			$file = __DIR__ . '/Component/' . implode('/', $parts) . '/' . $type . '.php';

			if (JFile::exists($file))
			{
				return $namespace . 'Component\\' . implode('\\', $parts) . '\\' . $type;
			}

			array_pop($parts);
		}

		return ($type != 'Preview') ? false : $namespace . $type;
	}
}
