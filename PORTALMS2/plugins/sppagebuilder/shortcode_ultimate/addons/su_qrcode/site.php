<?php
/**
 * @package SP Page Builder
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2016 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

class SppagebuilderAddonSu_qrcode extends SppagebuilderAddons{

	public function render(){

		// Prepare compatibility mode prefix
		$prefix = su_cmpt();
		
		$size   = (isset($this->addon->settings->size) && $this->addon->settings->size) ? $this->addon->settings->size : '200';
		$margin = (isset($this->addon->settings->margin) && $this->addon->settings->margin) ? $this->addon->settings->margin : '0';
		
		$class  = $this->addon->settings->class;
		$data   = $this->addon->settings->data;
		$title  = $this->addon->settings->title;
		$align  = $this->addon->settings->align;
		$link   = $this->addon->settings->link;
		$target = $this->addon->settings->target;

		// Output
		$output = '<div class="bdt-addon bdt-addon-qrcode ' . $class .'">';
		$output .= su_do_shortcode('['.$prefix.'qrcode data="'.$data.'" title="'.$title.'" size="'.$size.'" margin="'.$margin.'" align="'.$align.'" link="'.$link.'" target="'.$target.'"]');
		$output .= '</div>';

		return $output;
	}
}
