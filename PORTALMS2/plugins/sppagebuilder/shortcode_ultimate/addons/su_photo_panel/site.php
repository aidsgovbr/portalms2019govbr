<?php
/**
 * @package SP Page Builder
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2016 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

class SppagebuilderAddonSu_photo_panel extends SppagebuilderAddons{

	public function render(){

		// Prepare compatibility mode prefix
		$prefix     = su_cmpt();
		
		$background = (isset($this->addon->settings->background) && $this->addon->settings->background) ? $this->addon->settings->background : '#ffffff';
		$color      = (isset($this->addon->settings->color) && $this->addon->settings->color) ? $this->addon->settings->color : '#333333';
		$shadow     = (isset($this->addon->settings->shadow) && $this->addon->settings->shadow) ? $this->addon->settings->shadow : '0 1px 2px #eeeeee';
		$border     = (isset($this->addon->settings->border) && $this->addon->settings->border) ? $this->addon->settings->border : '1px solid #cccccc';
		$radius     = (isset($this->addon->settings->radius) && $this->addon->settings->radius) ? $this->addon->settings->radius : '0';
		$content    = (isset($this->addon->settings->content) && $this->addon->settings->content) ? $this->addon->settings->content.'[/'.$prefix.'photo_panel]' : '';
		
		$class      = $this->addon->settings->class;
		$text_align = $this->addon->settings->text_align;
		$photo      = $this->addon->settings->photo;
		$alt        = $this->addon->settings->alt;
		$url        = $this->addon->settings->url;

		// Output
		$output = '<div class="bdt-addon bdt-addon-photo-panel ' . $class .'">';
		$output .= su_do_shortcode('['.$prefix.'photo_panel background="'.$background.'" color="'.$color.'" border="'.$border.'" shadow="'.$shadow.'" radius="'.$radius.'" text_align="'.$text_align.'" photo="'.$photo.'" alt="'.$alt.'" url="'.$url.'"]'.$content);
		$output .= '</div>';

		return $output;
	}
}
