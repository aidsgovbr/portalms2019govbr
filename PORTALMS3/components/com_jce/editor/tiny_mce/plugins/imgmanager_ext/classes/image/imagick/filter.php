<?php
/**
 * @package   	JCE
 * @copyright 	Copyright (c) 2009-2013 Ryan Demmer. All rights reserved.
 * @copyright   Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license   	GNU/GPL 2 or later - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * JCE is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 * 
 * Based on JImage library from Joomla.Platform 11.3
 */

defined('_JEXEC') or die;

/**
 * Class to manipulate an image.
 */
abstract class WFImageImagickFilter
{
	/**
	 * @var    resource  The image resource handle.
	 * @since  11.3
	 */
	protected $handle;

	/**
	 * Class constructor.
	 *
	 * @param   resource  $handle  The image resource on which to apply the filter.
	 *
	 * @since   11.3
	 * @throws  InvalidArgumentException
	 */
	public function __construct($handle)
	{
		// Make sure the file handle is valid.
		if (!is_object($handle) || ($handle instanceof Imagick === false)) {
			throw new InvalidArgumentException('The image handle is invalid for the image filter.');
		}

		$this->handle = $handle;
	}

	/**
	 * Method to apply a filter to an image resource.
	 *
	 * @param   array  $options  An array of options for the filter.
	 *
	 * @return  void
	 *
	 * @since   11.3
	 */
	abstract public function execute(array $options = array());
}
