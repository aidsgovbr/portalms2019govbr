<?php
/**
 * @package         Articles Anywhere
 * @version         6.3.0
 * 
 * @author          Peter van Westen <info@regularlabs.com>
 * @link            http://www.regularlabs.com
 * @copyright       Copyright © 2017 Regular Labs All Rights Reserved
 * @license         http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */

namespace RegularLabs\Plugin\System\ArticlesAnywhere;

use JHelperTags;

defined('_JEXEC') or die;

class Article
{
	static $article = null;

	public static function get($key = null)
	{
		if (is_null($key))
		{
			return self::$article ?: (object) [];
		}

		return isset(self::$article->{$key}) ? self::$article->{$key} : null;
	}

	public static function set($article)
	{
		self::$article = $article;
	}

	public static function getTags($id = null)
	{
		$id = $id ?: self::get('id');

		if(empty($id)) {
			return [];
		}

		$tags    = new JHelperTags;
		$tags->getItemTags('com_content.article', $id);

		return $tags->itemTags;
	}

	public static function getTagIds($id = null)
	{
		$tags = self::getTags($id);

		if(empty($tags)) {
			return [];
		}

		return array_map(function($tag){
			return $tag->id;
		}, $tags);
	}

}
