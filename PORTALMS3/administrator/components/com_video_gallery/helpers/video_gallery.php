<?php

/**
 * @version     1.0.0
 * @package     com_video_gallery
 * @copyright   Copyright (C) 2014. Todos os direitos reservados.
 * @license     GNU General Public License versão 2 ou posterior; consulte o arquivo License. txt
 * @author      Fábio Nery Pinto <contato@fabionery.com.br> - http://www.fabionery.com.br
 */
// No direct access
defined('_JEXEC') or die;

/**
 * Video_gallery helper.
 */
class Video_galleryHelper {

    /**
     * Configure the Linkbar.
     */
    public static function addSubmenu($vName = '') {
        		JHtmlSidebar::addEntry(
			JText::_('COM_VIDEO_GALLERY_TITLE_GALLERYLISTAS'),
			'index.php?option=com_video_gallery&view=gallerylistas',
			$vName == 'gallerylistas'
		);
		JHtmlSidebar::addEntry(
			JText::_('JCATEGORIES') . ' (' . JText::_('COM_VIDEO_GALLERY_TITLE_GALLERYLISTAS') . ')',
			"index.php?option=com_categories&extension=com_video_gallery",
			$vName == 'categories'
		);
		if ($vName=='categories') {
			JToolBarHelper::title('Galeria de Vídeos: JCATEGORIES (COM_VIDEO_GALLERY_TITLE_GALLERYLISTAS)');
		}

    }

    /**
     * Gets a list of the actions that can be performed.
     *
     * @return	JObject
     * @since	1.6
     */
    public static function getActions() {
        $user = JFactory::getUser();
        $result = new JObject;

        $assetName = 'com_video_gallery';

        $actions = array(
            'core.admin', 'core.manage', 'core.create', 'core.edit', 'core.edit.own', 'core.edit.state', 'core.delete'
        );

        foreach ($actions as $action) {
            $result->set($action, $user->authorise($action, $assetName));
        }

        return $result;
    }


}
