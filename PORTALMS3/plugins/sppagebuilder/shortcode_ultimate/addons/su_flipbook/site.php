<?php
/**
 * @package SP Page Builder
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2016 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

class SppagebuilderAddonSu_flipbook extends SppagebuilderAddons{

	public function render(){

		// Prepare compatibility mode prefix
		$prefix       = su_cmpt();
		
		$src          = (isset($this->addon->settings->src) && $this->addon->settings->src) ? $this->addon->settings->src : 'https://mozilla.github.io/pdf.js/web/compressed.tracemonkey-pldi-09.pdf';
		$thumbnail    = (isset($this->addon->settings->thumbnail) && $this->addon->settings->thumbnail) ? $this->addon->settings->thumbnail : 'plugins/system/bdthemes_shortcodes/images/pdf-thumb.svg';
		$height       = (isset($this->addon->settings->height) && $this->addon->settings->height) ? $this->addon->settings->height : '750';
		$duration     = (isset($this->addon->settings->duration) && $this->addon->settings->duration) ? $this->addon->settings->duration : '800';
		
		$webgl        = ( $this->addon->settings->webgl == 1 ) ? 'yes' : 'no' ;
		$downloadable = ( $this->addon->settings->downloadable == 1 ) ? 'yes' : 'no' ;
		$sound        = ( $this->addon->settings->sound == 1 ) ? 'yes' : 'no' ;
		$mouse_scroll = ( $this->addon->settings->mouse_scroll == 1 ) ? 'yes' : 'no' ;
		
		$type         = $this->addon->settings->fb_type;
		$title        = $this->addon->settings->title;
		$tags         = $this->addon->settings->tags;
		$class        = $this->addon->settings->class;

		// Output
		$output  = '<div class="bdt-addon bdt-addon-flipbook ' . $class .'">';
		$output  .= su_do_shortcode('['.$prefix.'flipbook type="'.$type.'" src="'.$src.'" thumbnail="'.$thumbnail.'" title="'.$title.'" tags="'.$tags.'" webgl="'.$webgl.'" background="inherit" height="'.$height.'" duration="'.$duration.'" downloadable="'.$downloadable.'" sound="'.$sound.'" mouse_scroll="'.$mouse_scroll.'"]');
		$output .= '</div>';

		return $output;
	}
}
