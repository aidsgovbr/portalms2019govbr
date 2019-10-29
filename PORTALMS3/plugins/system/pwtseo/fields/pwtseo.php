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

use Joomla\Registry\Registry;

/**
 * Perfect SEO field
 * The field that is added to the content form
 *
 * @since  1.0
 */
class JFormFieldPWTSeo extends JFormField
{
	/**
	 * A Registry object holding the parameters for the plugin
	 *
	 * @var    Registry
	 * @since  1.0
	 */
	private $params;

	/**
	 * Constructor for the field, we use this to get the plugin params in our field
	 *
	 * @param   JForm $form The form to attach to the form field object
	 *
	 * @since 1.0
	 */
	public function __construct($form = null)
	{
		$this->params = new Joomla\Registry\Registry(JPluginHelper::getPlugin('system', 'pwtseo')->params);

		parent::__construct($form);
	}

	/**
	 * Get the label of the PWTSeo Field. We abuse this to create our own layout.
	 *
	 * @return string The label - the left side of the panel
	 * @since 1.0
	 */
	protected function getLabel()
	{
		return '';
	}

	/**
	 * Get the html/view of the input field. We abuse this to create our own layout.
	 *
	 * @return string The input - the right side of the panel
	 * @since 1.0
	 */
	protected function getInput()
	{
		ob_start();

		/**
		if ($this->params->get('show_mobile_serp', 0))
		{
			echo $this->form->renderFieldset('mobile-serp');
		}
		*/

		include JPATH_PLUGINS . '/system/pwtseo/tmpl/serp.php';


		$this->form->loadFile(JPATH_PLUGINS . '/system/pwtseo/form/form.xml', false);

		echo $this->form->renderFieldset('left-side');

		if ($this->params->get('advanced_mode'))
		{
			echo $this->form->renderFieldset('advanced_og');
		}
		else
		{
			echo $this->form->renderFieldset('basic_og');
		}

		echo $this->form->renderFieldset('right-side');

		include JPATH_PLUGINS . '/system/pwtseo/tmpl/requirements.php';

		$sHTML = ob_get_clean();

		return $sHTML;
	}
}