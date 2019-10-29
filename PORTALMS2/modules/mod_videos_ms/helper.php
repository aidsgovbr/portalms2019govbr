<?php
/**
 * @package     videos_ms
 * @subpackage  mod_videos_ms
 *
 * @copyright   Copyright (C) 2013 TiagoGarcia, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
// No direct access.
defined('_JEXEC') or die;

/**
 * VideosMs module helper.
 *
 * @package     Shortner
 * @subpackage  mod_videosms
 * @since       3.0.3
 */
abstract class ModVideos_msHelper
{
	/**
	 * Get a list of the AreaDate items.
	 *
	 * @param   JRegistry  &$params  The module options.
	 *
	 * @return  array
	 *
	 * @since   3.0.3
	 */
	public static function getList(& $params)
	{
		// Initialiase variables.
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);

		// Prepare query.
		$query->select('a.*')
			->from($db->quoteName('#__video_gallery_lista') . ' AS a')
			->where('a.state = 1')
			->where('a.destaque = 1')
			->where('a.categoria = '. (int) $params->get('category_id'))
			->order('a.created DESC');

		// Inject the query and load the items.
		$db->setQuery($query);
		$items = $db->loadObjectList();

		// Check for a database error.
		if ($db->getErrorNum())
		{
			JError::raiseWarning(500, $db->getErrorMsg());
			return null;
		}
		// var_dump($items);
		return $items;
	}
}
