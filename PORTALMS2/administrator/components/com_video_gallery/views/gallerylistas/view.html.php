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

jimport('joomla.application.component.view');

/**
 * View class for a list of Video_gallery.
 */
class Video_galleryViewGallerylistas extends JViewLegacy {

    protected $items;
    protected $pagination;
    protected $state;

    /**
     * Display the view
     */
    public function display($tpl = null) {
        $this->state = $this->get('State');
        $this->items = $this->get('Items');
        $this->pagination = $this->get('Pagination');

        // Check for errors.
        if (count($errors = $this->get('Errors'))) {
            throw new Exception(implode("\n", $errors));
        }

        Video_galleryHelper::addSubmenu('gallerylistas');

        $this->addToolbar();

        $this->sidebar = JHtmlSidebar::render();
        parent::display($tpl);
    }

    /**
     * Add the page title and toolbar.
     *
     * @since	1.6
     */
    protected function addToolbar() {
        require_once JPATH_COMPONENT . '/helpers/video_gallery.php';

        $state = $this->get('State');
        $canDo = Video_galleryHelper::getActions($state->get('filter.category_id'));

        JToolBarHelper::title(JText::_('COM_VIDEO_GALLERY_TITLE_GALLERYLISTAS'), 'gallerylistas.png');

        //Check if the form exists before showing the add/edit buttons
        $formPath = JPATH_COMPONENT_ADMINISTRATOR . '/views/listagaleria';
        if (file_exists($formPath)) {

            if ($canDo->get('core.create')) {
                JToolBarHelper::addNew('listagaleria.add', 'JTOOLBAR_NEW');
            }

            if ($canDo->get('core.edit') && isset($this->items[0])) {
                JToolBarHelper::editList('listagaleria.edit', 'JTOOLBAR_EDIT');
            }
        }

        if ($canDo->get('core.edit.state')) {

            if (isset($this->items[0]->state)) {
                JToolBarHelper::divider();
                JToolBarHelper::custom('gallerylistas.publish', 'publish.png', 'publish_f2.png', 'JTOOLBAR_PUBLISH', true);
                JToolBarHelper::custom('gallerylistas.unpublish', 'unpublish.png', 'unpublish_f2.png', 'JTOOLBAR_UNPUBLISH', true);
            } else if (isset($this->items[0])) {
                //If this component does not use state then show a direct delete button as we can not trash
                JToolBarHelper::deleteList('', 'gallerylistas.delete', 'JTOOLBAR_DELETE');
            }

            if (isset($this->items[0]->state)) {
                JToolBarHelper::divider();
                JToolBarHelper::archiveList('gallerylistas.archive', 'JTOOLBAR_ARCHIVE');
            }
            if (isset($this->items[0]->checked_out)) {
                JToolBarHelper::custom('gallerylistas.checkin', 'checkin.png', 'checkin_f2.png', 'JTOOLBAR_CHECKIN', true);
            }
        }

        //Show trash and delete for components that uses the state field
        if (isset($this->items[0]->state)) {
            if ($state->get('filter.state') == -2 && $canDo->get('core.delete')) {
                JToolBarHelper::deleteList('', 'gallerylistas.delete', 'JTOOLBAR_EMPTY_TRASH');
                JToolBarHelper::divider();
            } else if ($canDo->get('core.edit.state')) {
                JToolBarHelper::trash('gallerylistas.trash', 'JTOOLBAR_TRASH');
                JToolBarHelper::divider();
            }
        }

        if ($canDo->get('core.admin')) {
            JToolBarHelper::preferences('com_video_gallery');
        }

        //Set sidebar action - New in 3.0
        JHtmlSidebar::setAction('index.php?option=com_video_gallery&view=gallerylistas');

        $this->extra_sidebar = '';
        
		JHtmlSidebar::addFilter(

			JText::_('JOPTION_SELECT_PUBLISHED'),

			'filter_published',

			JHtml::_('select.options', JHtml::_('jgrid.publishedOptions'), "value", "text", $this->state->get('filter.state'), true)

		);

		//Filter for the field tipo_video
		$select_label = JText::sprintf('COM_VIDEO_GALLERY_FILTER_SELECT_LABEL', 'Tipo Video');
		$options = array();
		$options[0] = new stdClass();
		$options[0]->value = "youtube";
		$options[0]->text = "Youtube";
		$options[1] = new stdClass();
		$options[1]->value = "flv";
		$options[1]->text = "FLV";
		JHtmlSidebar::addFilter(
			$select_label,
			'filter_tipo_video',
			JHtml::_('select.options', $options , "value", "text", $this->state->get('filter.tipo_video'), true)
		);

    }

	protected function getSortFields()
	{
		return array(
		'a.id' => JText::_('JGRID_HEADING_ID'),
		'a.ordering' => JText::_('JGRID_HEADING_ORDERING'),
		'a.state' => JText::_('JSTATUS'),
		'a.created_by' => JText::_('COM_VIDEO_GALLERY_GALLERYLISTAS_CREATED_BY'),
		'a.titulo' => JText::_('COM_VIDEO_GALLERY_GALLERYLISTAS_TITULO'),
		'a.tipo_video' => JText::_('COM_VIDEO_GALLERY_GALLERYLISTAS_TIPO_VIDEO'),
		);
	}

}
