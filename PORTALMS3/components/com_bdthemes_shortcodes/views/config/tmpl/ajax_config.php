<?php

/**
 * BDThemes Shortcodes Component
 * @package		Shortcode Ultimate Joomla 3.0
 * @subpackage	BDThemes Schortcodes
 * @copyright Copyright (C) 2011-2014 BDThemes Ltd. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-3.0.html GNU/GPL
 * @author BDThemes
 * @author url http://bdthemes.com
 */

defined('_JEXEC') or die;

require_once BDT_SU_CONFIG . '/inc/tools.php';
require_once BDT_SU_CONFIG . '/inc/wp_override.php';
require_once BDT_SU_CONFIG . '/data.php';
require_once BDT_SU_CONFIG . '/generator.php';
require_once BDT_SU_CONFIG . '/inc/generator-views.php';


$generator = new Su_Generator();
$action = $_REQUEST["action"];

switch ($action) {
	case 'su_generator_settings':
		$generator->settings();
		break;
	case 'su_generator_add_preset':
		$generator->ajax_add_preset();
	 exit;
		break;
	case 'su_generator_preview':
		$generator->preview();
		break;
	case 'su_generator_show_shortcode':
		$generator->show_shortcode();
		break;
	case 'su_generator_get_icons':
		$generator->ajax_get_icons();
		break;
	case 'su_generator_get_licons':
		$generator->ajax_get_licons();
		break;
	default :
		break;
}