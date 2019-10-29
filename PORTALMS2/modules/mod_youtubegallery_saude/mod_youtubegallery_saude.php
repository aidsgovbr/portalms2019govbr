<?php
/**
 * youtubegallery Joomla! 3.0 Native Component
 * @version 3.5.9 (MODIFICADA - projeto portal padrão)
 * @author DesignCompass corp< <support@joomlaboat.com>
 * @link http://www.joomlaboat.com
 * @GNU General Public License
 **/


defined('_JEXEC') or die('Restricted access');

if(!defined('DS'))
	define('DS',DIRECTORY_SEPARATOR);

require_once(JPATH_SITE.DS.'components'.DS.'com_youtubegallery'.DS.'includes'.DS.'render.php');
require_once(JPATH_SITE.DS.'components'.DS.'com_youtubegallery'.DS.'includes'.DS.'misc.php');

$listid=(int)$params->get( 'listid' );
$themeid=(int)$params->get( 'themeid' );

require JModuleHelper::getLayoutPath('mod_youtubegallery_saude', $params->get('layout', 'default'));

?>
