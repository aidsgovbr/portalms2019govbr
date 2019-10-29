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
use RegularLabs\Library\Document as RL_Document;

class Sefs
{
	public static function purge()
	{
		if ( ! RL_Document::isClient('administrator'))
		{
			die('No Access!');
		}

		// need to set the user agent, to prevent breaking when debugging is switched on
		$_SERVER['HTTP_USER_AGENT'] = '';

		$db = JFactory::getDbo();

		$query = $db->getQuery(true)
			->delete('#__betterpreview_sefs');
		$db->setQuery($query);
		$db->execute();

		die();
	}
}
