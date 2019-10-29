<?php
/**
 * @package SP Page Builder
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2016 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

class SppagebuilderAddonSu_icon_list_item extends SppagebuilderAddons{

	public function render(){

		// Prepare compatibility mode prefix
		$prefix          = su_cmpt();
		
		$title           = (isset($this->addon->settings->title) && $this->addon->settings->title) ? $this->addon->settings->title : 'Icon List Heading';
		$icon_background = (isset($this->addon->settings->icon_background) && $this->addon->settings->icon_background) ? $this->addon->settings->icon_background : 'transparent';
		$icon_size       = (isset($this->addon->settings->icon_size) && $this->addon->settings->icon_size) ? $this->addon->settings->icon_size : '24';
		$icon_padding    = (isset($this->addon->settings->icon_padding) && $this->addon->settings->icon_padding) ? $this->addon->settings->icon_padding : '20px';
		$content         = (isset($this->addon->settings->content) && $this->addon->settings->content) ? su_clean_shortcodes($this->addon->settings->content).'[/'.$prefix.'icon_list_item]' : '';
		
		$connector       = ( $this->addon->settings->connector == 1 ) ? 'yes' : 'no';
		
		$title_color     = $this->addon->settings->title_color;
		$title_size      = $this->addon->settings->title_size;
		$icon_color      = $this->addon->settings->icon_color;
		$icon_animation  = $this->addon->settings->icon_animation;
		$icon_border     = $this->addon->settings->icon_border;
		$icon_shadow     = $this->addon->settings->icon_shadow;
		$icon_radius     = $this->addon->settings->icon_radius;
		$icon_align      = $this->addon->settings->icon_align;
		$url             = $this->addon->settings->url;
		$target          = $this->addon->settings->target;
		$linkto          = $this->addon->settings->linkto;
		$class           = $this->addon->settings->class;


		if ($this->addon->settings->icon_type == 'fontawesome') {
			$icon = (isset($this->addon->settings->icon_fontawesome) && $this->addon->settings->icon_fontawesome) ? trim(str_replace('fa-', '', 'icon:'.$this->addon->settings->icon_fontawesome)) : 'icon:home';
		}elseif ($this->addon->settings->icon_type == 'lineicon') {
			$icon = (isset($this->addon->settings->icon_lineicon) && $this->addon->settings->icon_lineicon) ? 'licon:'.$this->addon->settings->icon_lineicon : 'licon:home';
		}else {
			$icon = $this->addon->settings->icon_image ;			
		}

		// Output
		$output  = '<div class="bdt-addon bdt-addon-icon-list-item ' . $class .'">';
		$output  .= su_do_shortcode('['.$prefix.'icon_list_item title="'.$title.'" title_color="'.$title_color.'" title_size="'.$title_size.'" icon="'.$icon.'" icon_color="'.$icon_color.'" icon_background="'.$icon_background.'" icon_size="'.$icon_size.'" icon_animation="'.$icon_animation.'" icon_border="'.$icon_border.'" icon_shadow="'.$icon_shadow.'" icon_padding="'.$icon_padding.'" icon_radius="'.$icon_radius.'" icon_align="'.$icon_align.'" connector="'.$connector.'" target="'.$target.'" url="'.$url.'" linkto="'.$linkto.'"]'.$content);
		$output .= '</div>';

		return $output;
	}
}
