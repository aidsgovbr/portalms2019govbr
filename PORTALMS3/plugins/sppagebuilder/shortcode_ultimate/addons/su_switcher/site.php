<?php
/**
 * @package SP Page Builder
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2016 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

class SppagebuilderAddonSu_switcher extends SppagebuilderAddons{

	public function render(){

		// Prepare compatibility mode prefix
		$prefix    = su_cmpt();
		
		$active    = (isset($this->addon->settings->active) && $this->addon->settings->active) ? $this->addon->settings->active : '1';
		
		$class     = $this->addon->settings->class;
		$style     = $this->addon->settings->style;
		$position  = $this->addon->settings->position;
		$align     = $this->addon->settings->align;
		$animation = $this->addon->settings->animation;

		// Output
		$output   = array();
		$output[] = '<div class="bdt-addon bdt-addon-super-tabs ' . $class .'">';
		$output[] = '['.$prefix.'switcher style="'.$style.'" position="'.$position.'" align="'.$align.'" active="'.$active.'" animation="'.$animation.'"]';

		foreach($this->addon->settings->switcher_item as $key => $item) {

			$title = (isset($item->title) && $item->title) ? $item->title : 'Default';
			$icon  = (isset($item->icon) && $item->icon) ? trim(str_replace('fa-', '', 'icon:'.$item->icon)) : '';

	 		$output[] = '['.$prefix.'switcher_item title="'.$title.'" icon="'.$icon.'"]'.su_clean_shortcodes($item->content).'[/'.$prefix.'switcher_item]';
		}

		$output[] = '[/'.$prefix.'switcher]</div>';

		return su_do_shortcode(implode("\n", $output));
	}
}
