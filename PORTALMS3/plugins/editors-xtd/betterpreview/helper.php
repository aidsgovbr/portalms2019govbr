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

defined('_JEXEC') or die;

use RegularLabs\Library\Document as RL_Document;
use RegularLabs\Plugin\System\BetterPreview\Component as BP_Component;

/**
 ** Plugin that places the button
 */
class PlgButtonBetterPreviewHelper
	extends \RegularLabs\Library\EditorButtonHelper
{
	var $button = null;

	public function __construct($name, &$params)
	{
		$this->button = BP_Component::getClass('Button');
		$this->link   = BP_Component::getClass('Link');

		parent::__construct($name, $params);
	}

	/**
	 * Display the button
	 *
	 * @param string $editor_name
	 * @param object $editor
	 *
	 * @return JObject|null A button object
	 */
	public function render($editor_name, $editor)
	{
		$content = $editor->getContent($editor_name);

		$url = $this->getUrl($editor_name);

		if ( ! $url)
		{
			return null;
		}

		$button = new JObject;

		$user    = JFactory::getUser();
		$session = JFactory::getSession();

		$fid    = uniqid('betterPreviewData_');
		$script = '
			function ' . $fid . '()
			{
				form = document.adminForm;
				text = ' . $content . ';
				isjform = 1;
				overrides = { text: text };
				' . $this->button->getExtraJavaScript($content) . '
				return {
					url: "' . $url . '",
					user: ' . (int) $user->get('id', 0) . ',
					session_id: "' . $session->getId() . '",
					form: form,
					isjform: isjform,
					overrides: overrides
				};
			}
			';

		if ($this->params->button_primary)
		{
			$script .= '
				(function($){
					$(document).ready(function()
					{
						$(".icon-betterpreview").each(function(){
							if($(this).parent().hasClass("modal-button")) {
								$(this).parent().addClass("btn-primary");
							}
						});
					});
				})(jQuery);
				';
		}

		RL_Document::scriptDeclaration($script);

		$link = 'index.php?bp_preloader=1&tmpl=component&fid=' . $fid;

		$text = $this->getButtonText();

		$icon = $this->params->button_icon;
		if ($icon == 'betterpreview')
		{
			$icon = $this->getIcon($icon);
		}

		$width = $this->params->preview_window_width ? (int) $this->params->preview_window_width : 'window.getSize().x-100';

		if ( ! defined('BETTERPREVIEW_INIT') && $this->params->display_toolbar_button)
		{
			JHTML::_('behavior.modal');

			define('BETTERPREVIEW_INIT', 1);
			// Generate html for toolbar button
			$html    = [];
			$html[]  = '<a href="' . $link . '" class="btn btn-small betterpreview_link modal' . ($this->params->button_primary ? ' btn-primary' : '') . '"'
				. ' rel="{handler: \'iframe\', size: {x: ' . $width . ', y: window.getSize().y-100}}">';
			$html[]  = '<span class="icon-' . $icon . '"></span> ';
			$html[]  = $text;
			$html[]  = '</a>';
			$toolbar = JToolBar::getInstance('toolbar');
			$toolbar->appendButton('Custom', implode('', $html));
		}

		if ($this->params->display_editor_button)
		{
			$button->modal   = true;
			$button->class   = 'btn';
			$button->link    = $link;
			$button->text    = $text;
			$button->name    = $this->getIcon();
			$button->options = $this->getPopupOptions($width);
		}

		return $button;
	}

	function getUrl($editor_name)
	{
		$url = $this->button->getURL($editor_name);

		if ( ! $url)
		{
			return false;
		}

		if ($itemId = $this->button->getItemId($url))
		{
			$url .= '&Itemid=' . $itemId;
		}

		$url = $this->link->getUrlFromCache($url);

		if ($url[0] != '/')
		{
			$url = JUri::root() . $url;
		}

		return JRoute::_($url);
	}

	function getButtonText()
	{
		$text = $this->params->button_text;

		if ($text == 'Preview')
		{
			return JText::_('BP_PREVIEW');
		}

		return parent::getButtonText();
	}
}
