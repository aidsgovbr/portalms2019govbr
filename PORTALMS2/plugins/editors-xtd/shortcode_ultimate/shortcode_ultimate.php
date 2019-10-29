<?php
/**
 * @package     Shortcode Ultimate
 * @subpackage  Editors-xtd insert shortcode
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/**
 * Editor SHortcode Ultimate button
 *
 * @package     Shortcode Ultimate
 * @subpackage  Editors-xtd insert shortcode
 * @since       1.0
 */
class PlgButtonShortcode_Ultimate extends JPlugin
{
	/**
	 * Load the language file on instantiation.
	 *
	 * @var    boolean
	 * @since  3.1
	 */
	protected $autoloadLanguage = true;

	/**
	 * Display the button.
	 *
	 * @param   string   $name    The name of the button to display.
	 * @param   string   $asset   The name of the asset being edited.
	 * @param   integer  $author  The id of the author owning the asset being edited.
	 *
	 * @return  array    A two element array of (shortcode, textToInsert) or false if not authorised.
	 */
	public function onDisplay($name, $asset, $author)
	{
		$app = JFactory::getApplication();
		$user = JFactory::getUser();
		$extension = $app->input->get('option');

		$plugin = JPluginHelper::getPlugin('system', 'bdthemes_shortcodes');
		$params = new JRegistry($plugin->params);


		if ($asset == '')
		{
			$asset = $extension;
		}

		if (	($user->authorise('core.edit', $asset)
			||	$user->authorise('core.create', $asset)
			||	(count($user->getAuthorisedCategories($asset, 'core.create')) > 0)
			||	($user->authorise('core.edit.own', $asset) && $author == $user->id)
			||	(count($user->getAuthorisedCategories($extension, 'core.edit')) > 0)
			||	(count($user->getAuthorisedCategories($extension, 'core.edit.own')) > 0 && $author == $user->id)) && class_exists('plgSystemBdthemes_Shortcodes'))
		{	


			if ($params->get('shortcode_intro', 1) ) {
				// For showing intro in shortcode ultimate button.
				$doc = JFactory::getDocument();
				$doc->addScript(BDT_SU_URI . '/js/intro-su-button.js');
			}

			JHtml::_('behavior.modal');
            $link = 'index.php?option=com_bdthemes_shortcodes&amp;view=config&amp;tmpl=component&amp;e_name=' . $name . '&amp;asset=' . $asset . '&amp;author=' . $author;                       
			$button = new JObject;
			$button->class = 'btn btn-default';
			$button->link = $link;
			$button->text = JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_INSERT_SHORTCODE');
			$button->title = JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_INSERT_SHORTCODE_DESC');
			$button->name = 'apply sug-button';
			$button->modal = true;
			$button->options = "{handler: 'iframe', size: {x: 960, y: 640}}";
			return $button;
		}
		else
		{
			return false;
		}
	}
}
