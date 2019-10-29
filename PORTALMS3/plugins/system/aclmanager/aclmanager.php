<?php
/**
 * @package		ACL Manager for Joomla
 * @copyright 	Copyright (c) 2011-2017 Sander Potjer
 * @license 	GNU General Public License version 3 or later
 * @link        https://www.aclmanager.net
 */

// No direct access.
defined('_JEXEC') or die;

jimport('joomla.plugin.plugin');
jimport('joomla.filesystem.file');

class plgSystemAclmanager extends JPlugin
{
	/**
	 * @var    String  base update url, to decide whether to process the event or not
	 * @since  2.5.0
	 */
	private $baseUrl = 'https://www.aclmanager.net/update';

	/**
	 * @var    String  your extension identifier, to retrieve its params
	 * @since  2.5.0
	 */
	private $extension = 'com_aclmanager';

	function onAfterRoute() {
		$app 						= JFactory::getApplication();
		$user 						= JFactory::getUser();
		$option						= JRequest::getCmd('option');
		$component					= JRequest::getCmd('component');
		$view						= JRequest::getCmd('view');
		$params 					= JComponentHelper::getParams('com_aclmanager');
		$acl_categorymanager 		= $params->get('acl_categorymanager',1);
		$acl_content_only_editable 	= $params->get('acl_onlyallowed',1);
		$acl_modules 				= $params->get('acl_modules',1);
		$acl_modules_only_editable	= $params->get('acl_modules_only_editable',1);

		if($app->isAdmin()) {
			// Joomla version
			$jversion 	= new JVersion;
			$jversion 	= str_replace('.', '', $jversion->RELEASE);
			$jversion	= substr($jversion, 0, 1);

			define('__OVERRIDE2__',dirname(__FILE__).'/overrides/com_content/models/file/');
			define('__OVERRIDE3__',dirname(__FILE__).'/overrides/com_content/models/');

			// Article Manager overrides
			if($option == 'com_content') {
				// Only show editable articles if set
				if($acl_content_only_editable) {
					if(($view == 'articles') || (!$view)) {
						$this->loadOriginalClassAsCore('/components/com_content/models/', 'articles.php');
						include_once dirname(__FILE__).'/overrides/com_content/models/articles.php';
					} elseif($view == 'featured') {
						$this->loadOriginalClassAsCore('/components/com_content/models/', 'articles.php');
						$this->loadOriginalClassAsCore('/components/com_content/models/', 'featured.php');
						include_once dirname(__FILE__).'/overrides/com_content/models/featured.j'.$jversion.'.php';
					}
				}
			}

			// Module Manager overrides
			if($option == 'com_modules') {
				// Add ACL to Module Manager if set in Joomla 2.x
				if($acl_modules && ($jversion == 2)) {
					$this->loadOriginalClassAsCore('/components/com_modules/controllers/', 'module.php');
					include_once dirname(__FILE__).'/overrides/com_modules/controllers/module.j'.$jversion.'.php';
					$this->loadOriginalClassAsCore('/components/com_modules/models/', 'module.php');
					include_once dirname(__FILE__).'/overrides/com_modules/models/module.j'.$jversion.'.php';
					$this->loadOriginalClassAsCore('/components/com_modules/views/module/', 'view.html.php');
					include_once dirname(__FILE__).'/overrides/com_modules/views/module/view.html.j'.$jversion.'.php';
					$this->loadOriginalClassAsCore('/components/com_modules/views/modules/', 'view.html.php');
					include_once dirname(__FILE__).'/overrides/com_modules/views/modules/view.html.j'.$jversion.'.php';
				}

				// Only show editable modules if set
				if($acl_modules_only_editable) {
					if(($view == 'modules') || (!$view)) {
						$this->loadOriginalClassAsCore('/components/com_modules/models/', 'modules.php');
						include_once dirname(__FILE__).'/overrides/com_modules/models/modules.php';
					}
				}
			}

			// Access check for extensions without ACL support
			if($acl_categorymanager) {
				$corecomponents = array('com_admin','com_config','com_cpanel','com_login','com_mailto','com_massmail','com_wrapper','com_ajax','com_contenthistory');
			} else {
				$corecomponents = array('com_admin','com_config','com_categories','com_cpanel','com_login','com_mailto','com_massmail','com_wrapper','com_ajax','com_contenthistory');
			}
			if ((in_array($option, $corecomponents)) || empty($option)) {
				$core = true;
			} else {
				$core = false;
			}

			// Check for ACL Support
			$extensionfolder = is_dir(JPATH_ADMINISTRATOR . '/components/'.$option);
			$accessfile = JPATH_ADMINISTRATOR.'/components/'.$option.'/access.xml';
			$configfile = JPATH_ADMINISTRATOR.'/components/'.$option.'/config.xml';
			$permissions = false;

			// Check if extension has ACL support
			if(!$core) {
				if((is_file($accessfile)) && (is_file($configfile))) {
					$permissions = true;
				} elseif (is_file($configfile)) {
					$xml = simplexml_load_file($configfile);
					foreach($xml->children()->fieldset as $fieldset)
					{
						if ('permissions' == (string) $fieldset['name']) {
							$permissions = true;
						}
					}
				}
			}

			// Check if user has access
			if($user->id && $extensionfolder && !$permissions && !$core) {
				if (!JFactory::getUser()->authorise('core.manage', $option)) {
					JRequest::setVar('option', 'com_aclmanager');
					JRequest::setVar('view', 'notauthorised' );
					return JError::raiseWarning(404, JText::_('JERROR_ALERTNOAUTHOR'));
				}
			}

			// Load ACL Manager language files for fallback in options
			if(($option == 'com_config') && ($component == 'com_aclmanager')) {
				$jlang = JFactory::getLanguage();
				$jlang->load('com_aclmanager', JPATH_ADMINISTRATOR, 'en-GB', true);
				$jlang->load('com_aclmanager', JPATH_ADMINISTRATOR, $jlang->getDefault(), true);
				$jlang->load('com_aclmanager', JPATH_ADMINISTRATOR, null, true);
			}
		}
    }

	function onAfterRender()
	{
		$params 				= JComponentHelper::getParams('com_aclmanager');
		$acl_categorymanager 	= $params->get('acl_categorymanager',1);

		if (($acl_categorymanager) && (!JFactory::getUser()->authorise('core.manage', 'com_categories'))) {
			$output = JResponse::getBody();
			$output = preg_replace("/<a.*?com_categories.*?>(.*?)<\/a>/","",$output);
			JResponse::setBody($output);
			return true;
		}
	}

	/*
	 * Loading class with a modified name, "OriginalClassName"+"Core"
	 */
	private function loadOriginalClassAsCore($path, $file){

		if ($file = JPath::find(JPATH_BASE.$path, $file)) {
			// Read file
			$bufferFile = JFile::read($file);

			// Append "Core" to the class name (ex. ClassNameCore)
			$rx = '/class *[a-z0-0]* *(extends|{)/i';
			preg_match($rx, $bufferFile, $classes);
			$parts = explode(' ',$classes[0]);
			$originalClass = $parts[1];
			$replaceClass = $originalClass.'Core';

			// Replace original class name by Core
			$bufferFile = str_replace($originalClass, $replaceClass, $bufferFile);

			// Correct constants
			$bufferFile = str_replace('__FILE__', '__OVERRIDE2__', $bufferFile);
			$bufferFile = str_replace('__DIR__', '__OVERRIDE3__', $bufferFile);

			// Load base class
			$bufferFile = str_replace('<?php','',$bufferFile);
			eval($bufferFile);

			return true;
		}
		return false;
	}

	/**
	 * Handle adding Download ID to package download request
	 *
	 * @param   string  $url        url from which package is going to be downloaded
	 * @param   array   $headers    headers to be sent along the download request (key => value format)
	 *
	 * @return  boolean true        Always true, regardless of success
	 *
	 * @since   2.5.0
	 */
	public function onInstallerBeforePackageDownload(&$url, &$headers)
	{
		// are we trying to update our extension?
		if (strpos($url, $this->baseUrl) !== 0)
		{
			return true;
		}

		// Get the Download ID from component params
		JLoader::import('joomla.application.component.helper');
		$downloadId = JComponentHelper::getComponent($this->extension)->params->get('downloadid', '');

		// Set Download ID first
		if (empty($downloadId))
		{
			JFactory::getApplication()->enqueueMessage('To enable ACL Manager updates you need to enter the <strong>Download ID</strong> from an active ACL Manager subscription in the <a href="index.php?option=com_config&view=component&component=com_aclmanager">ACL Manager options</a>. You can find your Download ID in the <a href="https://www.aclmanager.net/members/subscriptions">member area of the ACL Manager website</a>.', 'error');
		}
		// Append the Download ID
		else
		{
			$separator = strpos($url, '?') !== false ? '&' : '?';
			$url .= $separator . 'dlid=' . $downloadId;
		}

		return true;
	}
}