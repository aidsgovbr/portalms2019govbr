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

namespace RegularLabs\Plugin\System\BetterPreview\Component\Categories\Category;

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
	public static function getCategory()
	{
		if (JFactory::getApplication()->input->get('extension', 'com_content') != 'com_content'
			|| ! JFactory::getApplication()->input->get('id')
		)
		{
			return false;
		}

		$item = parent::getItem(
			JFactory::getApplication()->input->get('id'),
			'categories',
			['name' => 'title', 'parent' => 'parent_id', 'language' => 'language'],
			['type' => 'JCATEGORY']
		);

		$item->url = ContentHelperRoute::getCategoryRoute($item->id, $item->language);

		return $item;
	}

	public static function getCategoryParents($item)
	{
		if (empty($item)
			|| JFactory::getApplication()->input->get('extension', 'com_content') != 'com_content'
			|| ! JFactory::getApplication()->input->get('id')
		)
		{
			return false;
		}

		$parents = parent::getParents(
			$item,
			'categories',
			['name' => 'title', 'parent' => 'parent_id', 'language' => 'language'],
			['type' => 'JCATEGORY'],
			true
		);

		foreach ($parents as &$parent)
		{
			$parent->url = ContentHelperRoute::getCategoryRoute($parent->id, $item->language);
		}

		return $parents;
	}
}
