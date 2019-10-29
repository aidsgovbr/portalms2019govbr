<?php
/**
 * @package SP Page Builder
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2016 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

class SppagebuilderAddonSu_modal extends SppagebuilderAddons{

	public function render(){

		// Prepare compatibility mode prefix
		$prefix             = su_cmpt();
		
		$button_text        = (isset($this->addon->settings->button_text) && $this->addon->settings->button_text) ? $this->addon->settings->button_text : 'Open Modal';
		$title              = (isset($this->addon->settings->title) && $this->addon->settings->title) ? $this->addon->settings->title : 'Modal Title';
		$title_background   = (isset($this->addon->settings->title_background) && $this->addon->settings->title_background) ? $this->addon->settings->title_background : 'rgba(0,0,0,0.1)';
		$title_color        = (isset($this->addon->settings->title_color) && $this->addon->settings->title_color) ? $this->addon->settings->title_color : '#222222';
		$background         = (isset($this->addon->settings->background) && $this->addon->settings->background) ? $this->addon->settings->background : '#ffffff';
		$color              = (isset($this->addon->settings->color) && $this->addon->settings->color) ? $this->addon->settings->color : '#666666';
		$border             = (isset($this->addon->settings->border) && $this->addon->settings->border) ? $this->addon->settings->border : 'none';
		$shadow             = (isset($this->addon->settings->shadow) && $this->addon->settings->shadow) ? $this->addon->settings->shadow : '0 0 0 #000000';
		$overlay_background = (isset($this->addon->settings->overlay_background) && $this->addon->settings->overlay_background) ? $this->addon->settings->overlay_background : 'rgba(0,0,0,0.4)';
		$content            = (isset($this->addon->settings->content) && $this->addon->settings->content) ? $this->addon->settings->content.'[/'.$prefix.'modal]' : '';
		
		$close_button       = ( $this->addon->settings->close_button == 1 ) ? 'yes' : 'no';
		
		$class              = $this->addon->settings->class;
		$effect             = $this->addon->settings->effect;
		$button_class       = $this->addon->settings->button_class;
		$height             = $this->addon->settings->height;
		$width              = $this->addon->settings->width;

		// Output
		$output = '<div class="bdt-addon bdt-addon-modal ' . $class .'">';
		$output .= su_do_shortcode('['.$prefix.'modal effect="'.$effect.'" button_text="'.$button_text.'" button_class="'.$button_class.'" close_button="'.$close_button.'" title="'.$title.'" title_background="'.$title_background.'" title_color="'.$title_color.'" background="'.$background.'" color="'.$color.'" border="'.$border.'" shadow="'.$shadow.'" height="'.$height.'" width="'.$width.'" overlay_background="'.$overlay_background.'"]'.su_clean_shortcodes($content));
		$output .= '</div>';

		return $output;
	}
}
