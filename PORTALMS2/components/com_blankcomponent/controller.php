<?php
/**
* Author:	Omar Muhammad
* Email:	admin@omar84.com
* Website:	http://omar84.com
* Component:Blank Component
* Version:	3.0.0
* Date:		03/11/2012
* copyright	Copyright (C) 2012 http://omar84.com. All Rights Reserved.
* @license	http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
**/
// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.controller');
JLoader::register('FinderHelperLanguage', JPATH_ADMINISTRATOR . '/components/com_finder/helpers/language.php');

class BlankComponentController extends JControllerLegacy
{

	public function display($cachable = false, $urlparams = array())
	{
		$input = JFactory::getApplication()->input;
		$cachable = true;

		// Load plug-in language files.
		FinderHelperLanguage::loadPluginLanguage();

		// Set the default view name and format from the Request.
		$viewName = $input->get('view', 'search', 'word');
		$input->set('view', $viewName);


		// JRequest::setVar('view','default'); // force it to be the search view


		// Don't cache view for search queries
		if ($input->get('q') || $input->get('f') || $input->get('t'))
		{
			$cachable = false;
		}

		$safeurlparams = array(
			'f' 	=> 'INT',
			'lang' 	=> 'CMD'
		);

		return parent::display($cachable, $safeurlparams);
	}

}
