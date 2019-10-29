<?php
/**
 * @package SP Page Builder
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2016 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

class SppagebuilderAddonSu_calltoaction extends SppagebuilderAddons{

	public function render(){

		// Prepare compatibility mode prefix
		$prefix                  = su_cmpt();
		
		$title                   = (isset($this->addon->settings->title) && $this->addon->settings->title) ? $this->addon->settings->title : JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CA_TITLE');
		$button_text             = (isset($this->addon->settings->button_text) && $this->addon->settings->button_text) ? $this->addon->settings->button_text : JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CA_BTN_TXT');
		$button_link             = (isset($this->addon->settings->button_link) && $this->addon->settings->button_link) ? $this->addon->settings->button_link : '#';
		$content                 = (isset($this->addon->settings->content) && $this->addon->settings->content) ? $this->addon->settings->content.'[/'.$prefix.'calltoaction]' : '';
		$align                   = $this->addon->settings->align;
		$title_color             = $this->addon->settings->title_color;
		$target                  = $this->addon->settings->target;
		$button_background       = $this->addon->settings->button_background;
		$button_background_hover = $this->addon->settings->button_background_hover;
		$button_radius           = $this->addon->settings->button_radius;
		$class                   = $this->addon->settings->class;

		// Output
		$output  = '<div class="bdt-addon bdt-addon-calltoaction ' . $class .'">';
		$output  .= su_do_shortcode('['.$prefix.'calltoaction align="'.$align.'" title="'.$title.'" title_color="'.$title_color.'" button_text="'.$button_text.'" button_link="'.$button_link.' target="'.$target.'" button_background="'.$button_background.'" button_background_hover="'.$button_background_hover.'" color="inherit" background="inherit" button_radius="'.$button_radius.'"]'.$content);
		$output .= '</div>';

		return $output;
	}
}
