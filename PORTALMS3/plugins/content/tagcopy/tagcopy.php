<?php
/**
 * @package     Joomla.Plugin
 * @subpackage  Content.Tagcopy
 *
 * @copyright   Copyright (C) 2013 AtomTech, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Tiago Garcia
 */

defined('_JEXEC') or die;

/**
 * Joomla Tagcopy plugin.
 *
 * @package     Joomla.Plugin
 * @subpackage  Content.Tagcopy
 * @since       3.1
 */
class PlgContentTagcopy extends JPlugin
{

	/*
	* URL curta direto do administrativo, ao criar um
	* artigo e salvar. Obs a url gerada é do front-end.
	*/
	public function onContentAfterSave($context, $article, $isNew)
	{
		$app = JFactory::getApplication();

		// Check that we are in the site application.
		if (!$app->isAdmin() || $context != 'com_content.article') {
			return true;
		}

		// verifica se esta dentro do conteudo de artigo e dentro de uma categoria permitida.
		if ($context == 'com_content.article') {
			// pega os nomes das Tags/Marcadores
			$id = $article->id;
			$db2 = JFactory::getDbo();
			$aTags = $article->newTags;
			$newTags = array();

			foreach ($aTags as $tag){
				// verifica as categorias filhas
				$query = $db2->getQuery(true);
				$query->select('a.title');
				$query->from($db2->quoteName('#__tags') . ' AS a');
				$query->where($db2->quoteName('a.id') . ' = ' . $tag);

				$db2->setQuery($query);
				$tag = $db2->loadColumn();

				if ($db2->getErrorNum())
				{
					JError::raiseWarning(500, $db2->getErrorMsg());
					return null;
				}
				$newTags = array_merge($tag, $newTags);
			}

			// recupera o artigo no banco.
			$newTags = implode(", ", $newTags);

			$db = JFactory::getDbo();
			$query = $db->getQuery(true);

			$query->clear();
			$query->update($db->quoteName('#__content'));
			$query->set($db->quoteName('metakey').' = '.$db->quote($newTags));
			$query->where($db->quoteName('id').' = '.$db->quote($id));
			$db->setQuery((string) $query);

			try
			{
				$db->execute();
			}
			catch (RuntimeException $e)
			{
				JError::raiseWarning(500, $db->getErrorMsg());
				return null;
			}

		}
		return true;
	}

}