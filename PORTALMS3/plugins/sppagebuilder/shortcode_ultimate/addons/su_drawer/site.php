<?php
/**
 * @package SP Page Builder
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2016 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

class SppagebuilderAddonSu_drawer extends SppagebuilderAddons{

	public function render(){

		// Prepare compatibility mode prefix
		$prefix           = su_cmpt();
		
		$open_title       = (isset($this->addon->settings->open_title) && $this->addon->settings->open_title) ? $this->addon->settings->open_title : 'Reveal it';
		$close_title      = (isset($this->addon->settings->close_title) && $this->addon->settings->close_title) ? $this->addon->settings->close_title : 'Close me';
		$duration         = (isset($this->addon->settings->duration) && $this->addon->settings->duration) ? $this->addon->settings->duration : '1000';
		$content          = (isset($this->addon->settings->content) && $this->addon->settings->content) ? $this->addon->settings->content.'[/'.$prefix.'drawer]' : '';
		$open_icon        = (isset($this->addon->settings->open_icon) && $this->addon->settings->open_icon) ? trim(str_replace('fa-', '', 'icon:'.$this->addon->settings->open_icon)) : '';
		$close_icon       = (isset($this->addon->settings->close_icon) && $this->addon->settings->close_icon) ? trim(str_replace('fa-', '', 'icon:'.$this->addon->settings->close_icon)) : '';
		
		$title_background = $this->addon->settings->title_background;
		$title_color      = $this->addon->settings->title_color;
		$background       = $this->addon->settings->background;
		$padding          = $this->addon->settings->padding;
		$animation        = $this->addon->settings->animation;
		$class            = $this->addon->settings->class;


		// Output
		$output  = '<div class="bdt-addon bdt-addon-drawer ' . $class .'">';
		$output  .= su_do_shortcode('['.$prefix.'drawer open_title="'.$open_title.'" close_title="'.$close_title.'" open_icon="'.$open_icon.'" close_icon="'.$close_icon.'" title_background="'.$title_background.'" title_color="'.$title_color.'" background="'.$background.'" color="inherit" padding="'.$padding.'" animation="'.$animation.'" duration="'.$duration.'"]'.$content);
		$output .= '</div>';

		return $output;
	}
}
