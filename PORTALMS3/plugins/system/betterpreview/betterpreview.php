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

defined('_JEXEC') or die;

// Do not instantiate plugin on install pages
// to prevent installation/update breaking because of potential breaking changes
if (
	in_array(JFactory::getApplication()->input->get('option'), ['com_installer', 'com_regularlabsmanager'])
	&& JFactory::getApplication()->input->get('action') != ''
)
{
	return;
}

if ( ! is_file(__DIR__ . '/vendor/autoload.php'))
{
	return;
}

require_once __DIR__ . '/vendor/autoload.php';

use RegularLabs\Plugin\System\BetterPreview\Plugin;

class PlgSystemBetterPreview extends Plugin
{
	public $_alias       = 'betterpreview';
	public $_title       = 'BETTER_PREVIEW';
	public $_lang_prefix = 'BP';

	public $_enable_in_admin = true;
	public $_page_types      = ['html'];

	/*
	 * Below are the events that this plugin uses
	 * All handling is passed along to the parent run method
	 */
	public function onAfterRoute()
	{
		$this->run();
	}

	public function onContentPrepare()
	{
		$this->run();
	}

	public function onAfterRender()
	{
		$this->run();
	}
}
