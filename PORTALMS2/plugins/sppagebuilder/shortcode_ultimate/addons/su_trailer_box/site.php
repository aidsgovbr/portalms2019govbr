<?php
/**
 * @package SP Page Builder
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2016 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

class SppagebuilderAddonSu_trailer_box extends SppagebuilderAddons{

	public function render(){

		// Prepare compatibility mode prefix
		$prefix      = su_cmpt();
		
		$image       = (isset($this->addon->settings->image) && $this->addon->settings->image) ? $this->addon->settings->image : JURI::root().'plugins/system/bdthemes_shortcodes/images/no-image.jpg';
		$title       = (isset($this->addon->settings->title) && $this->addon->settings->title) ? $this->addon->settings->title : 'Trailer Box Title';
		$url         = (isset($this->addon->settings->url) && $this->addon->settings->url) ? $this->addon->settings->url : '#';
		$content     = (isset($this->addon->settings->content) && $this->addon->settings->content) ? $this->addon->settings->content.'[/'.$prefix.'trailer_box]' : '';
		
		$class       = $this->addon->settings->class;
		$style       = $this->addon->settings->style;
		$color       = $this->addon->settings->color;
		$background  = $this->addon->settings->background;
		$title_color = $this->addon->settings->title_color;
		$title_size  = $this->addon->settings->title_size;
		$align       = $this->addon->settings->align;
		$radius      = $this->addon->settings->radius;
		$target      = $this->addon->settings->target;

		// Output
		$output = '<div class="bdt-addon bdt-addon-trailer-box ' . $class .'">';
		$output .= su_do_shortcode('['.$prefix.'trailer_box style="'.$style.'" image="'.$image.'" color="'.$color.'" background="'.$background.'" title="'.$title.'" title_color="'.$title_color.'" title_size="'.$title_size.'" align="'.$align.'" radius="'.$radius.'" url="'.$url.'" target="'.$target.'"]'.su_clean_shortcodes($content));
		$output .= '</div>';

		return $output;
	}
}
