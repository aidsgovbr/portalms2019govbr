<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_feed_extended
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/**
 * Helper for mod_feed
 *
 * @package     Joomla.Site
 * @subpackage  mod_feed_extended
 * @since       1.5
 */
class ModFeedExtendedHelper
{
	/**
	 * Retrieve feed information
	 *
	 * @param   JRegistry  $params  module parameters
	 *
	 * @return  JFeedReader|string
	 */
	public static function getFeed($params)
	{
		
        JLoader::register('JFeedExtensionFactory',  JPATH_LIBRARIES . '/datasus/jfeed_extension/'. 'jfeed_extension_factory.php');

		// Module params
		$rssurl	= $params->get('rssurl', '');
		$rssitems = $params->get('rssitems', '');

		// Get RSS parsed object
		try
		{
			$feed = new JFeedExtensionFactory;
			$rssDoc = $feed->getFeed($rssurl, $rssitems);
		}
		catch (InvalidArgumentException $e)
		{
			return JText::_('MOD_FEED_ERR_FEED_NOT_RETRIEVED');
		}
		catch (RunTimeException $e)
		{
			return JText::_('MOD_FEED_ERR_FEED_NOT_RETRIEVED');
		}
		catch (LogicException $e)
		{
			return JText::_('MOD_FEED_ERR_FEED_NOT_RETRIEVED');
		}

		if (empty($rssDoc))
		{
			return JText::_('MOD_FEED_ERR_FEED_NOT_RETRIEVED');
		}

		if ($rssDoc)
		{
			return $rssDoc;
		}
	}
}
