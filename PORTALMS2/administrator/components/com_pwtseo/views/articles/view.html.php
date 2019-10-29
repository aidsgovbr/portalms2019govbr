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
 * Articles view. This gives an overview of the SEO score for articles and provides a link to the article edit page to improve the score.
 *
 * @since    1.0
 */
class PWTSEOViewArticles extends JViewLegacy
{
	/**
	 * A list of articles. This list includes all articles regardless of score or SEO keyword.
	 *
	 * @var    array
	 * @since  1.0
	 */
	protected $items;

	/**
	 * The JForm filter object.
	 *
	 * @var    JForm
	 * @since  1.0
	 */
	public $filterForm;

	/**
	 * List of active filters.
	 *
	 * @var    array
	 * @since  1.0
	 */
	public $activeFilters;

	/**
	 * The model state.
	 *
	 * @var    object
	 * @since  1.0
	 */
	protected $state;

	/**
	 * Pagination class.
	 *
	 * @var    JPagination
	 * @since  1.0
	 */
	protected $pagination;

	/**
	 * The sidebar to show
	 *
	 * @var    string
	 * @since  1.0
	 */
	protected $sidebar;

	/**
	 * Execute and display a template script.
	 *
	 * @param   string $tpl The name of the template file to parse; automatically searches through the template paths.
	 *
	 * @return  mixed  A string if successful, otherwise a JError object.
	 *
	 * @see     fetch()
	 * @since   1.0
	 */
	public function display($tpl = null)
	{
		$model               = $this->getModel();
		$this->items         = $model->getItems();
		$this->filterForm    = $model->getFilterForm();
		$this->activeFilters = $model->getActiveFilters();
		$this->state         = $model->getState();
		$this->pagination    = $model->getPagination();

		$this->toolbar();

		PWTSEOHelper::addSubmenu('articles');
		$this->sidebar = JHtmlSidebar::render();

		return parent::display($tpl);
	}

	/**
	 * Displays a toolbar for a specific page.
	 *
	 * @return  void
	 *
	 * @since   1.0
	 */
	private function toolbar()
	{
		JToolBarHelper::title(JText::_('COM_PWTSEO_ARTICLES_HEADER'), 'bars');
		$user  = JFactory::getUser();

		// Get the toolbar object instance
		$bar = JToolbar::getInstance('toolbar');

		if ($user->authorise('core.edit', 'com_content'))
		{
			$title = JText::_('JTOOLBAR_BATCH');

			$layout = new JLayoutFile('joomla.toolbar.batch');

			$dhtml = $layout->render(array('title' => $title));
			$bar->appendButton('Custom', $dhtml, 'batch');
		}

		// Options button.
		if (JFactory::getUser()->authorise('core.admin', 'com_pwtseo'))
		{
			JToolBarHelper::preferences('com_pwtseo');
		}
	}
}
