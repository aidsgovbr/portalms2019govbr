<?php
/**
 * @package SP Page Builder
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2016 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

class SppagebuilderAddonSu_file_download extends SppagebuilderAddons{

	public function render(){

		// Prepare compatibility mode prefix
		$prefix                  = su_cmpt();
		
		$icon                    = (isset($this->addon->settings->icon) && $this->addon->settings->icon) ? trim(str_replace('fa-', '', 'icon:'.$this->addon->settings->icon)) : 'icon: download';
		$download_speed          = (isset($this->addon->settings->download_speed) && $this->addon->settings->download_speed) ? $this->addon->settings->download_speed : '500';
		$button_text             = (isset($this->addon->settings->button_text) && $this->addon->settings->button_text) ? $this->addon->settings->button_text : 'Download Now';
		$button_color            = (isset($this->addon->settings->button_color) && $this->addon->settings->button_color) ? $this->addon->settings->button_color : '#f5f5f5';
		$button_hover_color      = (isset($this->addon->settings->button_hover_color) && $this->addon->settings->button_hover_color) ? $this->addon->settings->button_hover_color : '#ffffff';
		$button_background       = (isset($this->addon->settings->button_background) && $this->addon->settings->button_background) ? $this->addon->settings->button_background : '#ff6a56';
		$button_hover_background = (isset($this->addon->settings->button_hover_background) && $this->addon->settings->button_hover_background) ? $this->addon->settings->button_hover_background : '#ff543d';
		
		$show_title              = ( $this->addon->settings->show_title == 1 ) ? 'yes' : 'no' ;
		$show_count              = ( $this->addon->settings->show_count == 1 ) ? 'yes' : 'no' ;
		$show_like_count         = ( $this->addon->settings->show_like_count == 1 ) ? 'yes' : 'no' ;
		$show_download_count     = ( $this->addon->settings->show_download_count == 1 ) ? 'yes' : 'no' ;
		$show_file_size          = ( $this->addon->settings->show_file_size == 1 ) ? 'yes' : 'no' ;
		$resumable               = ( $this->addon->settings->resumable == 1 ) ? 'yes' : 'no' ;
		
		$id                      = $this->addon->settings->id;
		$url                     = $this->addon->settings->url;
		$custom_title            = $this->addon->settings->custom_title;
		$save_as                 = $this->addon->settings->save_as;
		$button_class            = $this->addon->settings->button_class;
		$class                   = $this->addon->settings->class;

		// Output
		$output  = '<div class="bdt-addon bdt-addon-file-download ' . $class .'">';
		$output  .= su_do_shortcode('['.$prefix.'file_download id="'.$id.'" url="'.$url.'" show_title="'.$show_title.'" custom_title="'.$custom_title.'" save_as="'.$save_as.'" color="inherit" background="inherit" icon="'.$icon.'" show_count="'.$show_count.'" show_like_count="'.$show_like_count.'" show_download_count="'.$show_download_count.'" show_file_size="'.$show_file_size.'" resumable="'.$resumable.'" download_speed="'.$download_speed.'" button_text="'.$button_text.'" button_color="'.$button_color.'" button_hover_color="'.$button_hover_color.'" button_background="'.$button_background.'" button_hover_background="'.$button_hover_background.'"  button_class="'.$button_class.'"]');
		$output .= "</div>";

		return $output;
	}
}
