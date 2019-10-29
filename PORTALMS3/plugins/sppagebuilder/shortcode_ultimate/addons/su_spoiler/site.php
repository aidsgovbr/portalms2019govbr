<?php
/**
 * @package SP Page Builder
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2016 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

class SppagebuilderAddonSu_spoiler extends SppagebuilderAddons{

	public function render(){

		// Prepare compatibility mode prefix
		$prefix  = su_cmpt();
		
		$title   = (isset($this->addon->settings->title) && $this->addon->settings->title) ? $this->addon->settings->title : 'Spoiler Title';
		$content = (isset($this->addon->settings->content) && $this->addon->settings->content) ? $this->addon->settings->content.'[/'.$prefix.'spoiler]' : '';
		
		$open    = ( $this->addon->settings->open == 1 ) ? 'yes' : 'no';
		
		$class   = $this->addon->settings->class;
		$style   = $this->addon->settings->style;
		$icon    = $this->addon->settings->icon;
		$align   = $this->addon->settings->align;
		$anchor  = $this->addon->settings->anchor;

		// Output
		$output = '<div class="bdt-addon bdt-addon-spoiler ' . $class .'">';
		$output .= su_do_shortcode('['.$prefix.'spoiler style="'.$style.'" icon="'.$icon.'" align="'.$align.'" title="'.$title.'" open="'.$open.'" anchor="'.$anchor.'"]'.$content);
		$output .= '</div>';

		return $output;
	}
}
