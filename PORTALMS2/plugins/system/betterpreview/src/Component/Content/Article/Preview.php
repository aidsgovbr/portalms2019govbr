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

namespace RegularLabs\Plugin\System\BetterPreview\Component\Content\Article;

defined('_JEXEC') or die;

use JFactory;
use RegularLabs\Plugin\System\BetterPreview\Component\Preview as Main_Preview;

class Preview extends Main_Preview
{
	public function render(&$article, $context)
	{
		if ($context != 'com_content.article' || ! isset($article->id) || $article->id != JFactory::getApplication()->input->get('id'))
		{
			return;
		}

		parent::render($article, $context);
	}

	public function states()
	{
		parent::initStates(
			'content',
			[
				'published'    => 'state',
				'publish_up'   => 'publish_up',
				'publish_down' => 'publish_down',
				'parent'       => 'catid',
				'hits'         => 'hits',
			],
			'categories',
			[
				'parent' => 'parent_id',
			]
		);
	}
}
