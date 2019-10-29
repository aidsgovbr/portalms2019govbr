<?php
/**
 * @package SP Page Builder
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2016 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

class SppagebuilderAddonSu_accordion extends SppagebuilderAddons{

	public function render(){

		// Prepare compatibility mode prefix
		$prefix   = su_cmpt();
		
		$class    = $this->addon->settings->class;

		// Output
		$output   = array();
		$output[] = '<div class="bdt-addon bdt-addon-accordion ' . $class .'">';
		$output[] = '['.$prefix.'accordion]';

		foreach($this->addon->settings->items as $key => $item) {

			$title  = (isset($item->title) && $item->title) ? $item->title : JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SPOILER_TITLE_DEFAULT');
			
			$open   = (isset($item->open) && $item->open == 1) ? 'yes' : 'no';
			
			$style  = $item->style;
			$icon   = $item->icon;
			$align  = $item->align;
			$anchor = $item->anchor;

	 		$output[] = '['.$prefix.'spoiler style="'.$style.'" icon="'.$icon.'" align="'.$align.'" title="'.$title.'" open="'.$open.'" anchor="'.$anchor.'"]'.su_clean_shortcodes($item->content).'[/'.$prefix.'spoiler]';
		}

		$output[] = '[/'.$prefix.'accordion]</div>';

		return su_do_shortcode(implode("\n", $output));
	}
}
