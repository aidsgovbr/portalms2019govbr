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
use JRoute;
use RegularLabs\Library\Document as RL_Document;

if (RL_Document::isClient('administrator'))
{
	die;
}

// need to set the user agent, to prevent breaking when debugging is switched on
$_SERVER['HTTP_USER_AGENT'] = '';

$helper = new GenerateSefs;
$helper->render();

class GenerateSefs
{
	var $params = null;

	public function render()
	{
		// log into frontend
		if ( ! JFactory::getUser()->id)
		{
			$this->logIn();
		}

		// Get a minimum of 50 urls to update
		$urls = $this->getUrlsToUpdate(50);

		if (empty($urls))
		{
			die('no sefs to update');
		}

		$this->insertSefRecords($urls);

		die('sefs updated');
	}

	private function logIn()
	{
		$db = JFactory::getDbo();

		$query = $db->getQuery(true)
			->select('userid')
			->from('#__session')
			->where('session_id = ' . $db->quote(JFactory::getApplication()->input->get('session')))
			->where('client_id = 1')
			->where('guest = 0');
		$db->setQuery($query);
		$userid = $db->loadResult();

		$user = JFactory::getUser($userid);

		if ($user instanceof \Exception)
		{
			return;
		}

		$session = JFactory::getSession();
		$session->set('user', $user);
		JFactory::getApplication()->checkSession();
	}

	private function getUrlsToUpdate($min = 50)
	{
		$params = Params::get();

		// get all outdated urls (older than timeout setting, maximum 500)
		$urls = $this->getOldUrls(500, $params->index_timeout . ' hours');

		if (count($urls) >= $min)
		{
			return $urls;
		}

		// Less than minimum number of urls found, so let's get more (older than an hour, maximum 50)
		$urls = $this->getOldUrls($min, '1 hour');

		if (count($urls) >= $min)
		{
			return $urls;
		}

		// still not much to do? lets also add/update some random menu urls
		$menuitems = $this->getRandomMenuUrls(($min - count($urls)));
		$urls      = array_merge($urls, $menuitems);

		return $urls;
	}

	private function getOldUrls($max, $min_age = '1 day')
	{
		$date = JFactory::getDate('now - ' . $min_age);

		$db = JFactory::getDbo();

		$query = $db->getQuery(true)
			->select('a.url')
			->from('#__betterpreview_sefs as a')
			->where('a.created < ' . $db->quote($date->toSql()))
			->order('a.created ASC');
		$db->setQuery($query, 0, $max);
		$urls = $db->loadColumn();

		if ( ! $urls)
		{
			$urls = [];
		}

		return $urls;
	}

	private function getRandomMenuUrls($max)
	{
		$db = JFactory::getDbo();

		$query = $db->getQuery(true)
			->select('CONCAT(a.link, \'&Itemid=\', a.id)')
			->from('#__menu as a')
			->where('a.client_id = 0')
			->where('a.type != ' . $db->quote('alias'))
			->where('a.type != ' . $db->quote('url'))
			->where('a.link != ' . $db->quote(''))
			->order('RAND()');
		$db->setQuery($query, 0, $max);
		$menuitems = $db->loadColumn();

		if (empty($menuitems))
		{
			return [];
		}

		$query = $db->getQuery(true)
			->select('a.url')
			->from('#__betterpreview_sefs as a')
			->where('a.url IN (\'' . implode('\',\'', $menuitems) . '\')');
		$db->setQuery($query);
		$sefs = $db->loadColumn();

		if ( ! empty($sefs))
		{
			return $menuitems;
		}

		return array_diff($menuitems, $sefs);
	}

	private function deleteSefRecords($urls)
	{
		$db = JFactory::getDbo();

		$query = $db->getQuery(true)
			->delete('#__betterpreview_sefs')
			->where($db->quoteName('url') . ' IN (\'' . implode('\',\'', $urls) . '\')');
		$db->setQuery($query);
		$db->execute();
	}

	private function insertSefRecords($urls)
	{
		// Delete urls from sef database so they will get renewed
		$this->deleteSefRecords($urls);

		$sefs = $this->getSefUrls($urls);

		if (empty($sefs))
		{
			return;
		}

		$date = JFactory::getDate();

		$db = JFactory::getDbo();

		$query = $db->getQuery(true)
			->insert('#__betterpreview_sefs')
			->columns([$db->quoteName('url'), $db->quoteName('sef'), $db->quoteName('created')]);

		foreach ($sefs as $url => $sef)
		{
			$query->values($db->quote($url) . ',' . $db->quote($sef) . ',' . $db->quote($date->toSql()));
		}

		$db->setQuery($query);
		$db->execute();
	}

	private function getSefUrls($urls)
	{
		$sefs = [];
		foreach ($urls as $url)
		{
			if ( ! $sef = $this->getSefUrl($url))
			{
				continue;
			}

			$sefs[$url] = $sef;
		}

		return $sefs;
	}

	private function getSefUrl($url)
	{
		if ( ! $url)
		{
			return false;
		}

		if (substr($url, 0, 4) == 'http')
		{
			return $url;
		}

		$sef = JRoute::_($url);

		if ($sef == $url || $sef == '/' . $url)
		{
			return false;
		}

		return $sef;
	}
}
