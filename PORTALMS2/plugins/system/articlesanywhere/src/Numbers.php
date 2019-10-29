<?php
/**
 * @package         Articles Anywhere
 * @version         6.3.0
 * 
 * @author          Peter van Westen <info@regularlabs.com>
 * @link            http://www.regularlabs.com
 * @copyright       Copyright © 2017 Regular Labs All Rights Reserved
 * @license         http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */

namespace RegularLabs\Plugin\System\ArticlesAnywhere;

defined('_JEXEC') or die;

class Numbers
{
	static $current = true;
	static $total   = 1;
	static $count   = 1;
	static $even    = false;
	static $uneven  = true;
	static $first   = true;
	static $last    = true;

	public static function update($total, $count)
	{
		self::$total  = $total;
		self::$count  = $count;
		self::$even   = ($count % 2) == 0;
		self::$uneven = ($count % 2) != 0;
		self::$first  = $count == 1;
		self::$last   = $count == $total;
	}

	public static function getAll()
	{
		return [
			'current' => self::$current,
			'total'   => self::$total,
			'count'   => self::$count,
			'even'    => self::$even,
			'uneven'  => self::$uneven,
			'first'   => self::$first,
			'last'    => self::$last,
		];
	}

	public static function exists($key)
	{
		return isset(self::$$key);
	}

	public static function get($key)
	{
		return isset(self::$$key) ? self::$$key : null;
	}

	public static function set($key, $value)
	{
		self::$$key = $value;
	}

}
