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
use JText;

class PreLoader
{
	public static function _()
	{
		$fid = JFactory::getApplication()->input->get('fid');

		$template = file_get_contents(__DIR__ . '/Layout/PreLoader.html');
		$template = str_replace(
			[
				'{loading}',
				'parent.fid',
			],
			[
				JText::_('BP_LOADING'),
				'parent.' . $fid,
			],
			$template
		);

		echo $template;

		die;
	}
}
