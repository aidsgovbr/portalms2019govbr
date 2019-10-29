<?php
/**
 * @package SP Page Builder
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2016 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

class SppagebuilderAddonSu_tabs extends SppagebuilderAddons{

	public function render(){

		// Prepare compatibility mode prefix
		$prefix   = su_cmpt();
		
		$active   = (isset($this->addon->settings->active) && $this->addon->settings->active) ? $this->addon->settings->active : '1';
		
		$vertical = ( $this->addon->settings->vertical == 1 ) ? 'yes' : 'no';
		
		$class    = $this->addon->settings->class;
		$style    = $this->addon->settings->style;
		$align    = $this->addon->settings->align;

		// Output
		$output   = array();
		$output[] = '<div class="bdt-addon bdt-addon-tabs ' . $class .'">';
		$output[] = '['.$prefix.'tabs style="'.$style.'" active="'.$active.'" align="'.$align.'" vertical="'.$vertical.'"]';

		foreach($this->addon->settings->tab_item as $key => $item) {

			$title    = (isset($item->title) && $item->title) ? $item->title : 'Default';
			$disabled = (isset($item->disabled) && $item->disabled == 1) ? 'yes' : 'no';
			$icon     = (isset($item->icon) && $item->icon) ? trim(str_replace('fa-', '', 'icon:'.$item->icon)) : '';
			
			$anchor   = $item->anchor;
			$url      = $item->url;
			$target   = ($item->url != '' ) ? $item->target : '';

	 		$output[] = '['.$prefix.'tab title="'.$title.'" disabled="'.$disabled.'" icon="'.$icon.'" anchor="'.$anchor.'" url="'.$url.'" target="'.$target.'"]'.su_clean_shortcodes($item->content).'[/'.$prefix.'tab]';
		}

		$output[] = '[/'.$prefix.'tabs]</div>';

		return su_do_shortcode(implode("\n", $output));
	}
}
