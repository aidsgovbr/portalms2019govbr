<?php
/**
 * @package SP Page Builder
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2016 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

class SppagebuilderAddonSu_exit_bar extends SppagebuilderAddons{

	public function render(){

		// Prepare compatibility mode prefix
		$prefix         = su_cmpt();
		
		$cycle          = (isset($this->addon->settings->cycle) && $this->addon->settings->cycle) ? $this->addon->settings->cycle : '0';
		$expiration_day = (isset($this->addon->settings->expiration_day) && $this->addon->settings->expiration_day) ? $this->addon->settings->expiration_day : '7';
		$content        = (isset($this->addon->settings->content) && $this->addon->settings->content) ? $this->addon->settings->content.'[/'.$prefix.'exit_bar]' : '';
		
		$always_visible = ( $this->addon->settings->always_visible == 1 ) ? 'yes' : 'no';
		$auto           = ( $this->addon->settings->auto == 1 ) ? 'yes' : 'no';
		
		$class          = $this->addon->settings->class;
		$background     = $this->addon->settings->background;
		$color          = $this->addon->settings->color;
		$title          = $this->addon->settings->title;
		$title_color    = $this->addon->settings->title_color;
		$width          = $this->addon->settings->width;

		// Output
		$output = '<div class="bdt-addon bdt-addon-exit-bar ' . $class .'">';
		$output .= su_do_shortcode('['.$prefix.'exit_bar background="'.$background.'" color="'.$color.'" title="'.$title.'" title_color="'.$title_color.'" width="'.$width.'" expiration_day="'.$expiration_day.'" always_visible="'.$always_visible.'" auto="'.$auto.'" cycle="'.$cycle.'"]'.$content);
		$output .= '</div>';

		return $output;
	}
}
