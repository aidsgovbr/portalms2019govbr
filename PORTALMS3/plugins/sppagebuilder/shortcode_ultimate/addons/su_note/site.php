<?php
/**
 * @package SP Page Builder
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2016 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

class SppagebuilderAddonSu_note extends SppagebuilderAddons{

	public function render(){

		// Prepare compatibility mode prefix
		$prefix  = su_cmpt();
		
		$radius  = (isset($this->addon->settings->radius) && $this->addon->settings->radius) ? $this->addon->settings->radius : '3px';
		$content = (isset($this->addon->settings->content) && $this->addon->settings->content) ? $this->addon->settings->content.'[/'.$prefix.'note]' : '';
		
		$icon    = ( $this->addon->settings->icon == 1 ) ? 'yes' : 'no';
		
		$class   = $this->addon->settings->class;
		$style   = $this->addon->settings->style;
		$type    = $this->addon->settings->type;

		// Output
		$output = '<div class="bdt-addon bdt-addon-note ' . $class .'">';
		$output .= su_do_shortcode('['.$prefix.'note style="'.$style.'" type="'.$type.'" icon="'.$icon.'" radius="'.$radius.'"]'.su_clean_shortcodes($content));
		$output .= '</div>';

		return $output;
	}
}
