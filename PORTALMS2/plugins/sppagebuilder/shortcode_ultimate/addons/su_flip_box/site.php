<?php
/**
 * @package SP Page Builder
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2016 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

class SppagebuilderAddonSu_flip_box extends SppagebuilderAddons{

	public function render(){

		// Prepare compatibility mode prefix
		$prefix          = su_cmpt();
		
		$ff_background   = (isset($this->addon->settings->ff_background) && $this->addon->settings->ff_background) ? $this->addon->settings->ff_background : '#ffffff';
		$ff_color        = (isset($this->addon->settings->ff_color) && $this->addon->settings->ff_color) ? $this->addon->settings->ff_color : '#444444';
		$ff_border       = (isset($this->addon->settings->ff_border) && $this->addon->settings->ff_border) ? $this->addon->settings->ff_border : 'none';
		$ff_shadow       = (isset($this->addon->settings->ff_shadow) && $this->addon->settings->ff_shadow) ? $this->addon->settings->ff_shadow : 'none';
		$ff_padding      = (isset($this->addon->settings->ff_padding) && $this->addon->settings->ff_padding) ? $this->addon->settings->ff_padding : '15px';
		$ff_radius       = (isset($this->addon->settings->ff_radius) && $this->addon->settings->ff_radius) ? $this->addon->settings->ff_radius : '0px';
		$ff_content      = (isset($this->addon->settings->ff_content) && $this->addon->settings->ff_content) ? $this->addon->settings->ff_content.'[/'.$prefix.'flip_front]' : '';
		$fb_background   = (isset($this->addon->settings->fb_background) && $this->addon->settings->fb_background) ? $this->addon->settings->fb_background : '#ffffff';
		$fb_color        = (isset($this->addon->settings->fb_color) && $this->addon->settings->fb_color) ? $this->addon->settings->fb_color : '#444444';
		$fb_border       = (isset($this->addon->settings->fb_border) && $this->addon->settings->fb_border) ? $this->addon->settings->fb_border : 'none';
		$fb_shadow       = (isset($this->addon->settings->fb_shadow) && $this->addon->settings->fb_shadow) ? $this->addon->settings->fb_shadow : 'none';
		$fb_padding      = (isset($this->addon->settings->fb_padding) && $this->addon->settings->fb_padding) ? $this->addon->settings->fb_padding : '15px';
		$fb_radius       = (isset($this->addon->settings->fb_radius) && $this->addon->settings->fb_radius) ? $this->addon->settings->fb_radius : '0px';
		$fb_content      = (isset($this->addon->settings->fb_content) && $this->addon->settings->fb_content) ? $this->addon->settings->fb_content.'[/'.$prefix.'flip_back]' : '';
		
		$class           = $this->addon->settings->class;
		$animation_style = $this->addon->settings->animation_style;
		$ff_text_align   = $this->addon->settings->ff_text_align;
		$fb_text_align   = $this->addon->settings->fb_text_align;

		// Output
		$output = '<div class="bdt-addon bdt-addon-flip-box ' . $class .'">';
		$output .= su_do_shortcode('['.$prefix.'flip_box animation_style="'.$animation_style.'"]
						['.$prefix.'flip_front background="'.$ff_background.'" color="'.$ff_color.'" border="'.$ff_border.'" shadow="'.$ff_shadow.'" text_align="'.$ff_text_align.'" padding="'.$ff_padding.'" radius="'.$ff_radius.'"]'.su_clean_shortcodes($ff_content).'

						['.$prefix.'flip_back background="'.$fb_background.'" color="'.$fb_color.'" border="'.$fb_border.'" shadow="'.$fb_shadow.'" text_align="'.$fb_text_align.'" padding="'.$fb_padding.'" radius="'.$fb_radius.'"]'.su_clean_shortcodes($fb_content).'
					[/'.$prefix.'flip_box]');
		$output .= '</div>';
		return $output;
	}
}
