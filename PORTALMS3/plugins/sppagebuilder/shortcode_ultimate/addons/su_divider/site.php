<?php
/**
 * @package SP Page Builder
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2016 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

class SppagebuilderAddonSu_divider extends SppagebuilderAddons{

	public function render(){

		// Prepare compatibility mode prefix
		$prefix          = su_cmpt();
		
		$color           = (isset($this->addon->settings->color) && $this->addon->settings->color) ? $this->addon->settings->color : '#EEEEEE';
		$icon            = (isset($this->addon->settings->icon) && $this->addon->settings->icon) ? trim(str_replace('fa-', '', 'icon:'.$this->addon->settings->icon)) : '';
		$icon_color      = (isset($this->addon->settings->icon_color) && $this->addon->settings->icon_color) ? $this->addon->settings->icon_color : '#b5b5b5';
		$icon_size       = (isset($this->addon->settings->icon_size) && $this->addon->settings->icon_size) ? $this->addon->settings->icon_size : '16';
		$width           = (isset($this->addon->settings->width) && $this->addon->settings->width) ? $this->addon->settings->width : '100';
		
		$top             = ( $this->addon->settings->top == 1 ) ? 'yes' : 'no';
		$force_fullwidth = ( $this->addon->settings->force_fullwidth == 1 ) ? 'yes' : 'no';
		$center          = ( $this->addon->settings->center == 1 ) ? 'yes' : 'no';
		
		$class           = $this->addon->settings->class;
		$style           = $this->addon->settings->style;
		$align           = $this->addon->settings->align;
		$icon_align      = $this->addon->settings->icon_align;
		$icon_style      = $this->addon->settings->icon_style;
		$visible         = $this->addon->settings->visible;
		$hidden          = $this->addon->settings->hidden;

		// Output
		$output = '<div class="bdt-addon bdt-addon-divider ' . $class .'">';
		$output .= su_do_shortcode('['.$prefix.'divider style="'.$style.'" color="'.$color.'" align="'.$align.'" icon_align="'.$icon_align.'" icon="'.$icon.'" icon_style="'.$icon_style.'" icon_color="'.$icon_color.'" icon_size="'.$icon_size.'" top="'.$top.'" width="'.$width.'" force_fullwidth="'.$force_fullwidth.'" visible="'.$visible.'" hidden="'.$hidden.'" center="'.$center.'"]');
		$output .= '</div>';

		return $output;
	}

	public function css() {
		$addon_id = '#sppb-addon-' . $this->addon->id;

		$css = '';
		$css .= $addon_id . ' .su-divider i {box-sizing: initial;}';

		return $css;
	}
}
