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

namespace RegularLabs\Plugin\System\BetterPreview\Component\Content\Category;

defined('_JEXEC') or die;

use RegularLabs\Plugin\System\BetterPreview\Component\Preview as Main_Preview;

class Preview extends Main_Preview
{

	function renderPreview(&$article, $context)
	{
		if ($context != 'com_content.category' || isset($article->introtext))
		{
			return;
		}

		parent::render($article, $context);
	}

	function states()
	{
		parent::initStates(
			'categories',
			['parent' => 'parent_id'],
			'categories',
			['parent' => 'parent_id']
		);
	}
}
