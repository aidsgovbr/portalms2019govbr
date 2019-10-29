<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_search
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/**
 * Search component helper.
 *
 * @package     Joomla.Administrator
 * @subpackage  com_search
 * @since       1.5
 */
class SearchHelperQuero extends SearchHelper
{

	/**
	 * Checks an object for search terms (after stripping fields of HTML)
	 *
	 * @param   object  $object      The object to check
	 * @param   string  $searchTerm  Search words to check for
	 * @param   array   $fields      List of object variables to check against
	 *
	 * @return  boolean True if searchTerm is in object, false otherwise
	 */
	public static function checkNoHtmlOutros($object, $searchTerm, $fields)
	{
		$searchRegex = array(
			'#<script[^>]*>.*?</script>#si',
			'#<style[^>]*>.*?</style>#si',
			'#<!.*?(--|]])>#si',
			'#<[^>]*>#i'
		);
		$terms = explode(' ', $searchTerm);

		if (empty($fields))
		{
			return false;
		}

		foreach ($fields as $field)
		{
			// filed, sao os 4 campos, title, introtex, metakey, etc.
			if (!isset($object->$field))
			{
				continue;
			}

			$text = self::remove_accents($object->$field);

			foreach ($searchRegex as $regex)
			{
				$text = preg_replace($regex, '', $text);
			}

			foreach ($terms as $term)
			{
				$term = self::remove_accents($term);

				if (JString::stristr($text, $term) === false)
				{
					return true;
				}
			}

		}

		return false;
	}
}
