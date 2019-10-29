<?php
/**
 * @package SP Page Builder
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2016 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

class SppagebuilderAddonSu_youtube_advanced extends SppagebuilderAddons{

	public function render(){

		// Prepare compatibility mode prefix
		$prefix         = su_cmpt();
		
		$url            = (isset($this->addon->settings->url) && $this->addon->settings->url) ? $this->addon->settings->url : 'false';
		$width          = (isset($this->addon->settings->width) && $this->addon->settings->width) ? $this->addon->settings->width : '600';
		$height         = (isset($this->addon->settings->height) && $this->addon->settings->height) ? $this->addon->settings->height : '400';
		
		$showinfo       = ( $this->addon->settings->showinfo == 1 ) ? 'yes' : 'no';
		$responsive     = ( $this->addon->settings->responsive == 1 ) ? 'yes' : 'no';
		$autoplay       = ( $this->addon->settings->autoplay == 1 ) ? 'yes' : 'no';
		$loop           = ( $this->addon->settings->loop == 1 ) ? 'yes' : 'no';
		$rel            = ( $this->addon->settings->rel == 1 ) ? 'yes' : 'no';
		$fs             = ( $this->addon->settings->fs == 1 ) ? 'yes' : 'no';
		$modestbranding = ( $this->addon->settings->modestbranding == 1 ) ? 'yes' : 'no';
		
		$class          = $this->addon->settings->class;
		$playlist       = $this->addon->settings->playlist;
		$controls       = $this->addon->settings->controls;
		$autohide       = $this->addon->settings->autohide;
		$theme          = $this->addon->settings->theme;
		$wmode          = $this->addon->settings->wmode;

		// Output
		$output = '<div class="bdt-addon bdt-addon-youtube-advanced ' . $class .'">';
		$output .= su_do_shortcode('['.$prefix.'youtube_advanced url="'.$url.'" playlist="'.$playlist.'" width="'.$width.'" height="'.$height.'" controls="'.$controls.'" autohide="'.$autohide.'" showinfo="'.$showinfo.'" responsive="'.$responsive.'" autoplay="'.$autoplay.'" loop="'.$loop.'" rel="'.$rel.'" fs="'.$fs.'" modestbranding="'.$modestbranding.'" theme="'.$theme.'" wmode="'.$wmode.'"]');
		$output .= '</div>';

		return $output;
	}
}
