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

use RegularLabs\Library\Protect as RL_Protect;

class Protect
{
	static $name = 'BetterPreview';

	public static function _(&$string)
	{
		RL_Protect::protectFields($string);
		RL_Protect::protectSourcerer($string);
		RL_Protect::protectByRegex($string, '\{nocdn\}.*?\{/nocdn\}');
	}
}
