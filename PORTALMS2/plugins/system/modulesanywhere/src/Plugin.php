<?php
/**
 * @package         Modules Anywhere
 * @version         7.3.2
 * 
 * @author          Peter van Westen <info@regularlabs.com>
 * @link            http://www.regularlabs.com
 * @copyright       Copyright © 2017 Regular Labs All Rights Reserved
 * @license         http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */

/*
 * This class is used as template (extend) for most Regular Labs plugins
 * This class is not placed in the Regular Labs Library as a re-usable class because
 * it also needs to be working when the Regular Labs Library is not installed
 */

namespace RegularLabs\ModulesAnywhere;

defined('_JEXEC') or die;

if (is_file(JPATH_LIBRARIES . '/regularlabs/autoload.php'))
{
	require_once JPATH_LIBRARIES . '/regularlabs/autoload.php';
}

use JFactory;
use JPlugin;
use JPluginHelper;
use JText;
use RegularLabs\Library\Document as RL_Document;
use RegularLabs\Library\Language as RL_Language;
use RegularLabs\Library\Protect as RL_Protect;

class Plugin extends JPlugin
{
	private $_init   = false;
	private $_helper = null;

	public $_has_tags           = false;
	public $_enable_in_frontend = true;
	public $_enable_in_admin    = false;
	public $_can_disable_by_url = true;
	public $_protected_formats  = [];
	public $_page_types         = [];

	public function onAfterInitialise()
	{
		$this->run('onAfterInitialise');
	}

	public function onAfterRoute()
	{
		$this->run('onAfterRoute');
	}

	public function onContentPrepare($context, &$article, &$params)
	{
		if ($context == 'com_zoo.element.textarea')
		{
			return;
		}

		if ($success = $this->run('onContentPrepare', $article, $context, $params))
		{
			$article = $success;
		}
	}

	public function onContentPrepareForm($form, $data)
	{
		$this->run('onContentPrepareForm', $form, $data);
	}

	public function onAfterDispatch()
	{
		$this->run('onAfterDispatch');
	}

	public function onAfterRender()
	{
		$this->run('onAfterRender');
	}

	private function run()
	{
		if (!$this->passChecks())
		{
			return null;
		}

		if (!$this->getHelper())
		{
			return false;
		}

		$arguments = func_get_args();
		$event     = array_shift($arguments);

		if (empty($event))
		{
			return false;
		}

		if (!method_exists($this->_helper, $event))
		{
			return false;
		}

		return call_user_func_array(array($this->_helper, $event), $arguments);
	}

	/**
	 * Create the helper object
	 *
	 * @return object|null The plugins helper object
	 */
	private function getHelper()
	{
		// Already initialized, so return
		if ($this->_init)
		{
			return $this->_helper;
		}

		$this->_init = true;

		if (!$this->passChecks())
		{
			return null;
		}

		RL_Language::load('plg_' . $this->_type . '_' . $this->_name);

		$this->init();

		$this->_helper = new Helper;

		return $this->_helper;
	}

	private function passChecks()
	{
		if (!$this->isFrameworkEnabled())
		{
			return false;
		}

		if (!self::passPageTypes())
		{
			return false;
		}

		// allow in frontend?
		if (!$this->_enable_in_frontend && !RL_Document::isAdmin())
		{
			return false;
		}

		// allow in admin?
		if (!$this->_enable_in_admin && RL_Document::isAdmin() && (!isset(Params::get()->enable_admin) || !Params::get()->enable_admin))
		{
			return false;
		}

		if ($this->_can_disable_by_url && RL_Protect::isDisabledByUrl($this->_alias))
		{
			return false;
		}

		if (RL_Protect::isRestrictedPage($this->_has_tags, $this->_protected_formats))
		{
			return false;
		}

		if (!$this->extraChecks())
		{
			return false;
		}

		return true;
	}

	public function passPageTypes()
	{
		if (empty($this->_page_types))
		{
			return true;
		}

		if (in_array('*', $this->_page_types))
		{
			return true;
		}

		if (empty(JFactory::$document))
		{
			return true;
		}

		if (RL_Document::isFeed())
		{
			return in_array('feed', $this->_page_types);
		}

		if (RL_Document::isPDF())
		{
			return in_array('pdf', $this->_page_types);
		}

		$page_type = JFactory::getDocument()->getType();

		if (in_array($page_type, $this->_page_types))
		{
			return true;
		}

		return false;
	}

	public function extraChecks()
	{
		return true;
	}

	public function init()
	{
		return;
	}

	/**
	 * Check if the Regular Labs Library is enabled
	 *
	 * @return bool
	 */
	private function isFrameworkEnabled()
	{
		// Return false if Regular Labs Library is not installed
		if (!$this->isFrameworkInstalled())
		{
			return false;
		}

		if (!JPluginHelper::isEnabled('system', 'regularlabs'))
		{
			$this->throwError($this->_lang_prefix . '_REGULAR_LABS_LIBRARY_NOT_ENABLED');

			return false;
		}

		return true;
	}

	/**
	 * Check if the Regular Labs Library is installed
	 *
	 * @return bool
	 */
	private function isFrameworkInstalled()
	{
		if (
			!is_file(JPATH_PLUGINS . '/system/regularlabs/regularlabs.xml')
			|| !is_file(JPATH_LIBRARIES . '/regularlabs/autoload.php')
		)
		{
			$this->throwError($this->_lang_prefix . '_REGULAR_LABS_LIBRARY_NOT_INSTALLED');

			return false;
		}

		// Check if some newer methods exist to see if framework is installed correctly and uptodate enough
		if (!method_exists('RegularLabs\Library\Document', 'isPDF')
			|| !method_exists('RegularLabs\Library\Document', 'isFeed')
			|| !method_exists('RegularLabs\Library\Document', 'isAdmin')
		)
		{
			$this->throwError($this->_lang_prefix . '_REGULAR_LABS_LIBRARY_NOT_INSTALLED');

			return false;
		}

		return true;
	}

	/**
	 * Place an error in the message queue
	 */
	private function throwError($text)
	{
		// Return if page is not an admin page or the admin login page
		if (
			!JFactory::getApplication()->isAdmin()
			|| JFactory::getUser()->get('guest')
		)
		{
			return;
		}

		// load the admin language file
		JFactory::getLanguage()->load('plg_' . $this->_type . '_' . $this->_name, JPATH_PLUGINS . '/' . $this->_type . '/' . $this->_name);

		$text = JText::_($text) . ' ' . JText::sprintf($this->_lang_prefix . '_EXTENSION_CAN_NOT_FUNCTION', JText::_($this->_title));

		// Check if message is not already in queue
		$messagequeue = JFactory::getApplication()->getMessageQueue();
		foreach ($messagequeue as $message)
		{
			if ($message['message'] == $text)
			{
				return;
			}
		}

		JFactory::getApplication()->enqueueMessage($text, 'error');
	}
}

