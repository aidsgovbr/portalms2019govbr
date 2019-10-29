<?php
/**
 * @package     Joomla Shortcode Ultimate
 * @subpackage  Content.shortcode_ultimate
 * @copyright Copyright (C) 2012-2017 BDThemes Ltd. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-3.0.html GNU/GPL
 * @author BDThemes
 * @author url http://bdthemes.com
 */

defined('_JEXEC') or die;


class PlgContentShortcode_ultimate extends JPlugin {

	public function onContentPrepare($context, &$article, &$params, $page = 0) {
	    $article->text = su_wpautop($article->text);
	    $article->text = su_shortcode_unautop($article->text);
	    $article->text = su_do_shortcode($article->text);
	}
}
