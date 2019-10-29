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

use Joomla\Utilities\ArrayHelper;

/**
 * The article controller
 *
 * @since  1.0.2
 */
class PWTSEOControllerArticle extends JControllerForm
{
	/**
	 * Method to run batch operations.
	 *
	 * @param   object  $model  The model.
	 *
	 * @return  boolean   True if successful, false otherwise and internal error is set.
	 *
	 * @since   1.0.2
	 */
	public function batch()
	{
		JSession::checkToken() or jexit(JText::_('JINVALID_TOKEN'));

		$filter = JFilterInput::getInstance();

		/** @var ContentModelArticle $model */
		JModelLegacy::addIncludePath(JPATH_ROOT . '/administrator/components/com_content/models');
		$model = JModelLegacy::getInstance('Article', 'ContentModel', array());

		$vars = $this->input->post->get('batch', array(), 'array');
		$cid  = $this->input->post->get('cid', array(), 'array');

		$data = array('metadesc' => $filter->clean($vars['metadesc'], 'HTML'));
		
		$errors = false;

		foreach ($cid as $id)
		{
			$data['id'] = (int) $id;

			if (!isset($vars['override_metadesc']) || $vars['override_metadesc'] !== '1')
			{
				$modelData = $model->getItem($id);

				if (strlen($modelData->metadesc) > 0)
				{
					continue;
				}
			}

			if (!$model->save($data))
			{
				$errors = true;
				JFactory::getApplication()->enqueueMessage(JText::_sprintf('COM_PWT_ERRORS_FAILED_TO_SAVE_METADESC', $id));
			}
		}

		if (!$errors)
		{
			JFactory::getApplication()->enqueueMessage(JText::_('COM_PWT_BATCH_APPLIED_METADESC'));
		}
		
		$this->setRedirect(JRoute::_('index.php?option=com_pwtseo&view=articles' . $this->getRedirectToListAppend(), false));

		return true;
	}
}
