<?php
/**
 * @package         Articles Anywhere
 * @version         7.5.1
 * 
 * @author          Peter van Westen <info@regularlabs.com>
 * @link            http://www.regularlabs.com
 * @copyright       Copyright © 2018 Regular Labs All Rights Reserved
 * @license         http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */

namespace RegularLabs\Plugin\System\ArticlesAnywhere;

use JFactory;
use JModelLegacy;

defined('_JEXEC') or die;

class CurrentItem
{
	var    $config;
	static $item;

	public function __construct(Config $config)
	{
		$this->config = $config;
	}

	public function get()
	{
		if ( ! is_null(self::$item))
		{
			return self::$item;
		}

		$input = JFactory::getApplication()->input;

		if ($input->get('option') != 'com_content' || $input->get('view') != 'article')
		{
			return null;
		}

		if ( ! $id = $input->get('id'))
		{
			return null;
		}

		if ( ! class_exists('ContentModelArticle'))
		{
			require_once JPATH_SITE . '/components/com_content/models/article.php';
		}

		$model = JModelLegacy::getInstance('article', 'contentModel');

		if ( ! method_exists($model, 'getItem'))
		{
			return null;
		}

		$item = $model->getItem($id);

		if (empty($item->id))
		{
			return null;
		}

		self::$item = $item;

		return self::$item;
	}
}
