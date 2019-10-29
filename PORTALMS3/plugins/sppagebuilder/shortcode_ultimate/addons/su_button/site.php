<?php
/**
 * @package SP Page Builder
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2016 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

class SppagebuilderAddonSu_button extends SppagebuilderAddons{

	public function render(){

		// Prepare compatibility mode prefix
		$prefix           = su_cmpt();
		
		$url              = (isset($this->addon->settings->url) && $this->addon->settings->url) ? $this->addon->settings->url : '#';
		$color            = (isset($this->addon->settings->color) && $this->addon->settings->color) ? $this->addon->settings->color : '#FFFFFF';
		$background       = (isset($this->addon->settings->background) && $this->addon->settings->background) ? $this->addon->settings->background : '#2D89EF';
		$size             = (isset($this->addon->settings->size) && $this->addon->settings->size) ? $this->addon->settings->size : '3';
		$radius           = (isset($this->addon->settings->radius) && $this->addon->settings->radius) ? $this->addon->settings->radius : '3px';
		$icon             = (isset($this->addon->settings->icon) && $this->addon->settings->icon) ? trim(str_replace('fa-', '', 'icon:'.$this->addon->settings->icon)) : '';
		$icon_color       = (isset($this->addon->settings->icon_color) && $this->addon->settings->icon_color) ? $this->addon->settings->icon_color : '#FFFFFF';
		$content          = (isset($this->addon->settings->content) && $this->addon->settings->content) ? $this->addon->settings->content.'[/'.$prefix.'button]' : '';
		
		$wide             = ( $this->addon->settings->wide == 1 ) ? 'yes' : 'no';
		$center           = ( $this->addon->settings->center == 1 ) ? 'yes' : 'no';
		
		$class            = $this->addon->settings->class;
		$style            = $this->addon->settings->style;
		$target           = $this->addon->settings->target;
		$background_hover = $this->addon->settings->background_hover;
		$desc             = $this->addon->settings->desc;
		$onclick          = $this->addon->settings->onclick;
		$padding          = $this->addon->settings->padding;
		$margin           = $this->addon->settings->margin;

		// Output
		$output = '<div class="bdt-addon bdt-addon-button ' . $class .'">';
		$output .= su_do_shortcode('['.$prefix.'button style="'.$style.'" url="'.$url.' target="'.$target.'" color="'.$color.'" background="'.$background.'" background_hover="'.$background_hover.'" size="'.$size.'" wide="'.$wide.'" center="'.$center.'" radius="'.$radius.'" icon="'.$icon.'" icon_color="'.$icon_color.'" desc="'.$desc.'" onclick="'.$onclick.'" padding="'.$padding.'" margin="'.$margin.'"]'.$content);
		$output .= '</div>';

		return $output;
	}
}
