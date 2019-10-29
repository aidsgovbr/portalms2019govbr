<?php
/**
 * @package SP Page Builder
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2016 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

class SppagebuilderAddonSu_super_tabs extends SppagebuilderAddons{

	public function render(){

		// Prepare compatibility mode prefix
		$prefix      = su_cmpt();
		
		$style_color = (isset($this->addon->settings->style_color) && $this->addon->settings->style_color) ? $this->addon->settings->style_color : '#4FC1E9';
		$active      = (isset($this->addon->settings->active) && $this->addon->settings->active) ? $this->addon->settings->active : '1';
		$speed       = (isset($this->addon->settings->speed) && $this->addon->settings->speed) ? $this->addon->settings->speed : '800';
		
		$vertical    = ( $this->addon->settings->vertical == 1 ) ? 'yes' : 'no';
		$deeplink    = ( $this->addon->settings->deeplink == 1 ) ? 'yes' : 'no';
		
		$class       = $this->addon->settings->class;
		$style       = $this->addon->settings->style;
		$animation   = $this->addon->settings->animation;
		$align       = $this->addon->settings->align;
		$position    = $this->addon->settings->position;

		// Output
		$output   = array();
		$output[] = '<div class="bdt-addon bdt-addon-super-tabs ' . $class .'">';
		$output[] = '['.$prefix.'super_tabs style="'.$style.'" style_color="'.$style_color.'" animation="'.$animation.'" active="'.$active.'" align="'.$align.'" vertical="'.$vertical.'" position="'.$position.'" speed="'.$speed.'" deeplink="'.$deeplink.'" ]';

		foreach($this->addon->settings->tab_item as $key => $item) {

			$title = (isset($item->title) && $item->title) ? $item->title : 'Default';
			$icon  = (isset($item->icon) && $item->icon) ? trim(str_replace('fa-', '', 'icon:'.$item->icon)) : '';

	 		$output[] = '['.$prefix.'super_tab title="'.$title.'" icon="'.$icon.'"]'.su_clean_shortcodes($item->content).'[/'.$prefix.'super_tab]';
		}

		$output[] = '[/'.$prefix.'super_tabs]</div>';

		return su_do_shortcode(implode("\n", $output));
	}
}
