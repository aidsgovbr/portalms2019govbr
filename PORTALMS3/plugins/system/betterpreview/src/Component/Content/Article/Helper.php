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

if ( ! class_exists('ContentHelperRoute'))
{
	require_once JPATH_SITE . '/components/com_content/helpers/route.php';
}

use ContentHelperRoute;
use JFactory;
use RegularLabs\Plugin\System\BetterPreview\Component\Helper as Main_Helper;

class Helper extends Main_Helper
{
	public static function getArticle()
	{
		if (JFactory::getApplication()->input->get('layout', 'edit') != 'edit'
			|| ! JFactory::getApplication()->input->get('id')
		)
		{
			return false;
		}

		$item = self::getItem(
			JFactory::getApplication()->input->get('id'),
			'content',
			['name' => 'title', 'published' => 'state', 'language' => 'language', 'parent' => 'catid'],
			['type' => 'RL_ARTICLE']
		);

		$item->url = ContentHelperRoute::getArticleRoute($item->id, $item->parent, $item->language);

		return $item;
	}

	public static function getArticleParents($item)
	{
		if (empty($item)
			|| JFactory::getApplication()->input->get('layout', 'edit') != 'edit'
			|| ! JFactory::getApplication()->input->get('id')
		)
		{
			return false;
		}

		$parents = self::getParents(
			$item,
			'categories',
			['name' => 'title', 'parent' => 'parent_id', 'language' => 'language'],
			['type' => 'JCATEGORY'],
			1
		);

		foreach ($parents as &$parent)
		{
			$parent->url = ContentHelperRoute::getCategoryRoute($parent->id, $item->language);
		}

		return $parents;
	}
}
