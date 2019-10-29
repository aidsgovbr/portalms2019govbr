<?php
/**
 * @package SP Page Builder
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2016 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

class SppagebuilderAddonSu_box extends SppagebuilderAddons{

	public function render(){

		// Prepare compatibility mode prefix
		$prefix      = su_cmpt();
		
		$title       = (isset($this->addon->settings->title) && $this->addon->settings->title) ? $this->addon->settings->title : JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BOX_TITLE_DEFAULT');
		$title_color = (isset($this->addon->settings->title_color) && $this->addon->settings->title_color) ? $this->addon->settings->title_color : '#FFFFFF';
		$box_color   = (isset($this->addon->settings->box_color) && $this->addon->settings->box_color) ? $this->addon->settings->box_color : '#333333';
		$content     = (isset($this->addon->settings->content) && $this->addon->settings->content) ? $this->addon->settings->content.'[/'.$prefix.'box]' : '';
		
		$class       = $this->addon->settings->class;
		$style       = $this->addon->settings->style;
		$radius      = $this->addon->settings->radius;

		// Output
		$output = '<div class="bdt-addon bdt-addon-box ' . $class .'">';
		$output .= su_do_shortcode('['.$prefix.'box style="'.$style.'" title="'.$title.'" title_color="'.$title_color.'" box_color="'.$box_color.'" radius="'.$radius.'"]'.$content);
		$output .= '</div>';

		return $output;
	}
}
