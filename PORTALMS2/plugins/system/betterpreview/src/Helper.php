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

namespace RegularLabs\Plugin\System\BetterPreview;

defined('_JEXEC') or die;

use JFactory;
use JText;
use RegularLabs\Library\Document as RL_Document;

/**
 * Plugin that replaces stuff
 */
class Helper
{
	var $isadmin   = false;
	var $ispreview = false;
	var $class     = null;

	public function __construct()
	{
		$this->isadmin   = RL_Document::isAdmin();
		$this->ispreview = JFactory::getApplication()->input->get('bp_preview');
	}

	public function onAfterRoute()
	{
		if (JFactory::getApplication()->input->get('bp_generatesefs'))
		{
			require_once 'GenerateSefs.php';

			return false;
		}

		// only in admin and not on preview pages
		if ( ! ($this->isadmin || $this->ispreview))
		{
			return false;
		}

		if (JFactory::getApplication()->input->get('bp_purgesefs'))
		{
			Sefs::purge();

			return false;
		}

		if (JFactory::getApplication()->input->get('bp_preloader'))
		{
			PreLoader::_();

			return false;
		}

		$params = Params::get();

		if ($this->isadmin && ! $params->display_title_link && ! $params->display_status_link)
		{
			return false;
		}

		if ( ! $class = $this->getClass())
		{
			return false;
		}

		switch (true)
		{
			case ($this->ispreview):
				// Check for request forgeries.
				$class->checkSession() or jexit(JText::_('JINVALID_TOKEN'));
				$class->purgeCache();
				$class->setLanguage();
				$class->states();
				break;

			case ($this->isadmin) :
				Document::loadScriptsAndCSS();
				break;
		}
	}

	public function onContentPrepare($context, &$article)
	{
		if ( ! $this->ispreview)
		{
			return;
		}

		if ( ! $class = $this->getClass())
		{
			return;
		}

		$class->render($article, $context);
	}

	public function onAfterRender()
	{
		if ( ! $class = $this->getClass())
		{
			return;
		}

		switch (true)
		{
			case ($this->ispreview):
				$class->restoreStates();
				$class->addMessages();
				break;

			case ($this->isadmin) :
				$class->convertLinks();
				break;
		}
	}

	public function getClass()
	{
		if ( ! is_null($this->class))
		{
			return $this->class;
		}

		$type        = $this->ispreview ? 'Preview' : 'Link';
		$this->class = Component::getClass($type);

		return $this->class;
	}
}
