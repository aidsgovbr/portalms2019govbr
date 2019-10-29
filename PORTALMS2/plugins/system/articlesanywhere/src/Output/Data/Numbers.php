<?php
/**
 * @package         Articles Anywhere
 * @version         7.5.1
 * 
 * @author          Peter van Westen <info@regularlabs.com>
 * @link            http://www.regularlabs.com
 * @copyright       Copyright © 2018 Regular Labs All Rights Reserved
 * @license         http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */

namespace RegularLabs\Plugin\System\ArticlesAnywhere\Output\Data;

defined('_JEXEC') or die;

class Numbers
{
	private $current            = true;
	private $total_before_limit = 1;
	private $total              = 1;
	private $count              = 1;
	private $even               = false;
	private $uneven             = true;
	private $first              = true;
	private $last               = true;

	public function __construct($total_before_limit, $total)
	{
		$this->total_before_limit = $total_before_limit;
		$this->total              = $total;
	}

	public function setCount($count)
	{
		$this->count  = $count;
		$this->even   = ($count % 2) == 0;
		$this->uneven = ($count % 2) != 0;
		$this->first  = $count == 1;
		$this->last   = $count == $this->total;

		return $this;
	}

	public function setCurrent($is_current = true)
	{
		$this->current = $is_current;

		return $this;
	}

	public function getAll()
	{
		return [
			'current'            => $this->current,
			'total_before_limit' => $this->total_before_limit,
			'total'              => $this->total,
			'count'              => $this->count,
			'even'               => $this->even,
			'uneven'             => $this->uneven,
			'first'              => $this->first,
			'last'               => $this->last,
		];
	}

	public function exists($key)
	{
		$key = $this->getKey($key);

		return isset($this->{$key});
	}

	public function get($key)
	{
		$key = $this->getKey($key);

		return isset($this->{$key}) ? $this->{$key} : null;
	}

	public function isEvery($number = 1)
	{
		return $this->count % $number == 0;
	}

	public function isColumn($number = 1, $column_count = 1)
	{
		// Make sure the number is below the total column count
		// number will be 0 when it is equal to the column count
		// ie: col_1_of_3 = 1, col_3_of_3 = 0
		$number = $number % $column_count;

		return $this->count % $column_count == $number;
	}

	public function getKey($key)
	{
		if (isset($this->{$key}))
		{
			return $key;
		}

		// Search for key aliases
		switch ($key)
		{
			case 'counter':
				return 'count';

			case 'totalcount':
				return 'total';

			case 'is_current':
				return 'current';

			case 'is_even':
				return 'even';

			case 'is_uneven':
				return 'uneven';

			case 'is_first':
				return 'first';

			case 'is_last':
				return 'last';

			case 'total_without_limit':
			case 'total_no_limit':
				return 'total_before_limit';

			default:
				return $key;
		}
	}
}
