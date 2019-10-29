<?php
/**
 * @package SP Page Builder
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2016 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

class SppagebuilderAddonSu_icon extends SppagebuilderAddons{

	public function render(){

		// Prepare compatibility mode prefix
		$prefix = su_cmpt();
		
		$url    = $this->addon->settings->url;
		$color  = $this->addon->settings->color;
		$size   = $this->addon->settings->size;
		$class  = $this->addon->settings->class;


		if ($this->addon->settings->icon_type == 'fontawesome') {
			$icon = (isset($this->addon->settings->icon_fontawesome) && $this->addon->settings->icon_fontawesome) ? trim(str_replace('fa-', '', 'icon:'.$this->addon->settings->icon_fontawesome)) : 'icon:home';
		}elseif ($this->addon->settings->icon_type == 'lineicon') {
			$icon = (isset($this->addon->settings->icon_lineicon) && $this->addon->settings->icon_lineicon) ? 'licon:'.$this->addon->settings->icon_lineicon : 'licon:home';
		}else {
			$icon = $this->addon->settings->icon_image ;			
		}

		// Output
		$output  = '<div class="bdt-addon bdt-addon-icon ' . $class .'">';
		$output  .= su_do_shortcode('['.$prefix.'icon icon="'.$icon.'" url="'.$url.'" background="transparent" color="'.$color.'" size="'.$size.'" padding="0px" margin="0px"]');
		$output .= '</div>';

		return $output;
	}
	public function css() {
		$addon_id = '#sppb-addon-' . $this->addon->id;

		$style = 'display: inline-block;';

		$css = $addon_id .' {';
		$css .= $style;
		$css .= '}';

		return $css;
	}
}
