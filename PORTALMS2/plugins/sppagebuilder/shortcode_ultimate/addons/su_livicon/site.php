<?php
/**
 * @package SP Page Builder
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2016 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

class SppagebuilderAddonSu_livicon extends SppagebuilderAddons{

	public function render(){

		// Prepare compatibility mode prefix
		$prefix           = su_cmpt();
		
		$icon             = (isset($this->addon->settings->icon) && $this->addon->settings->icon) ? $this->addon->settings->icon : 'heart';
		$size             = (isset($this->addon->settings->size) && $this->addon->settings->size) ? $this->addon->settings->size : '32';
		$background_color = (isset($this->addon->settings->background_color) && $this->addon->settings->background_color) ? $this->addon->settings->background_color : '#eeeeee';
		$color            = (isset($this->addon->settings->color) && $this->addon->settings->color) ? $this->addon->settings->color : '#666666';
		$hover_color      = (isset($this->addon->settings->hover_color) && $this->addon->settings->hover_color) ? $this->addon->settings->hover_color : '#000000';
		$duration         = (isset($this->addon->settings->duration) && $this->addon->settings->duration) ? $this->addon->settings->duration/1000 : '0.6';
		$iteration        = (isset($this->addon->settings->iteration) && $this->addon->settings->iteration) ? $this->addon->settings->iteration : '1';
		$border           = (isset($this->addon->settings->border) && $this->addon->settings->border) ? $this->addon->settings->border : 'none';
		$radius           = (isset($this->addon->settings->radius) && $this->addon->settings->radius) ? $this->addon->settings->radius : '3px';
		$padding          = (isset($this->addon->settings->padding) && $this->addon->settings->padding) ? $this->addon->settings->padding : '15px';
		
		$animate          = ( $this->addon->settings->animate == 1 ) ? 'yes' : 'no';
		$loop             = ( $this->addon->settings->loop == 1 ) ? 'yes' : 'no';
		$parent           = ( $this->addon->settings->parent == 1 ) ? 'yes' : 'no';
		
		$class            = $this->addon->settings->class;
		$event_type       = $this->addon->settings->event_type;
		$url              = $this->addon->settings->url;
		$target           = $this->addon->settings->target;
		$margin           = $this->addon->settings->margin;

		// Output
		$output = '<div class="bdt-addon bdt-addon-livicon ' . $class .'">';
		$output .= su_do_shortcode('['.$prefix.'livicon icon="'.$icon.'" size="'.$size.'" background_color="'.$background_color.'" color="'.$color.'" hover_color="'.$hover_color.'" event_type="'.$event_type.'" animate="'.$animate.'" loop="'.$loop.'" parent="'.$parent.'" duration="'.$duration.'" iteration="'.$iteration.'" url="'.$url.'" target="'.$target.'" border="'.$border.'" radius="'.$radius.'" padding="'.$padding.'" margin="'.$margin.'"]');
		$output .= '</div>';

		return $output;
	}
}
