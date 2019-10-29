<?php
/**
 * @package SP Page Builder
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2016 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

class SppagebuilderAddonSu_image_compare extends SppagebuilderAddons{

	public function render(){

		// Prepare compatibility mode prefix
		$prefix       = su_cmpt();
		
		$before_text  = (isset($this->addon->settings->before_text) && $this->addon->settings->before_text) ? $this->addon->settings->before_text : 'Original';
		$after_text   = (isset($this->addon->settings->after_text) && $this->addon->settings->after_text) ? $this->addon->settings->after_text : 'Modified';
		$width        = (isset($this->addon->settings->width) && $this->addon->settings->width) ? $this->addon->settings->width : '640';
		$height       = (isset($this->addon->settings->height) && $this->addon->settings->height) ? $this->addon->settings->height : '380';
		
		$border       = ( $this->addon->settings->border == 1 ) ? 'yes' : 'no';
		$arrows       = ( $this->addon->settings->arrows == 1 ) ? 'yes' : 'no';
		
		$before_image = $this->addon->settings->before_image;
		$after_image  = $this->addon->settings->after_image;
		$orientation  = $this->addon->settings->orientation;
		$slide_on     = $this->addon->settings->slide_on;
		$class        = $this->addon->settings->class;


		// Output
		$output = '<div class="bdt-addon bdt-addon-image-compare ' . $class .'">';
		$output .= su_do_shortcode('['.$prefix.'image_compare before_image="'.$before_image.'" after_image="'.$after_image.'" before_text="'.$before_text.'" after_text="'.$after_text.'" orientation="'.$orientation.'" slide_on="'.$slide_on.'" width="'.$width.'" height="'.$height.'" border="'.$border.'" arrows="'.$arrows.'"]');
		$output .= '</div>';

		return $output;
	}
}
