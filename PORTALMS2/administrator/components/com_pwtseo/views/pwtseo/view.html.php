<?php
/**
 * @package    Pwtseo
 *
 * @author     Perfect Web Team <extensions@perfectwebteam.com>
 * @copyright  Copyright (C) 2016 - 2018 Perfect Web Team. All rights reserved.
 * @license    GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 * @link       https://extensions.perfectwebteam.com
 */

defined('_JEXEC') or die;

/**
 * Main component view. This will display a dashboard and serves as a main entry point
 *
 * @since  1.0
 */
class PWTSEOViewPWTSEO extends JViewLegacy
{
	/**
	 * If we have also PWT Sitemap installed, we add a check if there is a menu-item
	 *
	 * @var     boolean
	 *
	 * @since   1.0.2
	 */
	protected $bHasSitemap;

	/**
	 * If we have a clientid, we check with google if there are sitemaps associated with this website
	 *
	 * @var     array
	 *
	 * @since   1.0.2
	 */
	protected $aSitemaps;

	/**
	 * Display the view
	 *
	 * @param   string $tpl The name of the template file to parse; automatically searches through the template paths.
	 *
	 * @return  mixed  A string if successful, otherwise an Error object.
	 *
	 * @since   1.0
	 */
	public function display($tpl = null)
	{
		PWTSEOHelper::addSubmenu('pwtseo');
		$this->sidebar = JHtmlSidebar::render();

		$this->addToolbar();

		$params = JComponentHelper::getParams('com_pwtseo');

		if ($params->get('clientid') && $params->get('clientsecret'))
		{
			try
			{
				$oAuth = new \JGoogleAuthOauth2;
				$oURI  = JUri::getInstance();

				$oAuth->setOption('clientid', trim($params->get('clientid')));
				$oAuth->setOption('clientsecret', trim($params->get('clientsecret')));
				$oAuth->setOption('sendheaders', true);
				$oAuth->setOption('scope', 'https://www.googleapis.com/auth/webmasters.readonly');

				// The redirecturi is specified because of possible mismatches
				$oAuth->setOption('redirecturi', $oURI->getScheme() . '://' . $oURI->getHost() . '/administrator/index.php?option=com_pwtseo');

				if (!$oAuth->isAuthenticated())
				{
					$oAuth->authenticate();
				}

				$host = $params->get('domain', $oURI->getHost());
				$url  = 'https://www.googleapis.com/webmasters/v3/sites/' .
					preg_replace('/https?:\/\//i', '', $host) . '/sitemaps';

				$response = $oAuth->query($url);

				if ($response->code === 200)
				{
					$body            = json_decode($response->body);
					$this->aSitemaps = $body->sitemap;
				}
				else
				{
					$this->aSitemaps = false;
				}
			}
			catch (Exception $e)
			{
				JFactory::getApplication()->enqueueMessage(
					JText::sprintf('COM_PWTSEO_ERRORS_OAUTH_ERROR', $e->getMessage()),
					'error'
				);
			}
		}

		$bHasPWTSitemap = (bool) JComponentHelper::isInstalled('com_pwtsitemap');

		if ($bHasPWTSitemap)
		{
			// Using JMenu covers unpublished menu-items. Due to complexity, we ignore access setting.
			$this->bHasSitemap
				= (bool) JMenu::getInstance('site')->getItems(
					array(
						'link'
					),
					array(
						'index.php?option=com_pwtsitemap&view=sitemap&layout=sitemapxml&format=xml'
					)
				);
		}

		return parent::display($tpl);
	}

	/**
	 * Displays a toolbar for a specific page.
	 *
	 * @return  void
	 *
	 * @since   1.0
	 *
	 * @throws  Exception
	 */
	private function addToolbar()
	{
		$canDo = JHelperContent::getActions('com_pwtseo');

		JToolbarHelper::title(JText::_('COM_PWTSEO_PWTSEO'), 'bars');

		if ($canDo->get('core.admin') || $canDo->get('core.options'))
		{
			JToolbarHelper::preferences('com_pwtseo');
		}
	}
}
