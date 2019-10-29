<?php
/**
 * @package SP Page Builder
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2016 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

class SppagebuilderAddonSu_timeline extends SppagebuilderAddons{

	public function render(){

		// Prepare compatibility mode prefix
		$prefix         = su_cmpt();
		
		$limit          = (isset($this->addon->settings->limit) && $this->addon->settings->limit) ? $this->addon->settings->limit : '20';
		
		$image          = ( $this->addon->settings->image == 1 ) ? 'yes' : 'no';
		$highlight_year = ( $this->addon->settings->highlight_year == 1 ) ? 'yes' : 'no';
		$read_more      = ( $this->addon->settings->read_more == 1 ) ? 'yes' : 'no';
		$intro_text     = ( $this->addon->settings->intro_text == 1 ) ? 'yes' : 'no';
		$date           = ( $this->addon->settings->date == 1 ) ? 'yes' : 'no';
		$time           = ( $this->addon->settings->time == 1 ) ? 'yes' : 'no';
		$title          = ( $this->addon->settings->title == 1 ) ? 'yes' : 'no';
		$link_title     = ( $this->addon->settings->link_title == 1 ) ? 'yes' : 'no';
		
		$class          = $this->addon->settings->class;
		$order          = $this->addon->settings->order;
		$order_by       = $this->addon->settings->order_by;
		$before_text    = $this->addon->settings->before_text;
		$after_text     = $this->addon->settings->after_text;

		if ( $this->addon->settings->source_type == 'category' ) {
			$j_category = rtrim(implode(',', $this->addon->settings->j_category), ',');
			$source     = 'category: '.$j_category;
		}
		elseif ( $this->addon->settings->source_type == 'k2-category' ) {
			$k2_category = rtrim(implode(',', $this->addon->settings->k2_category), ',');
			$source      = 'k2-category: '.$k2_category;
		}

		// Output
		$output = '<div class="bdt-addon bdt-addon-timeline ' . $class .'">';
		$output .= su_do_shortcode('['.$prefix.'timeline source="'.$source.'" limit="'.$limit.'" order="'.$order.'" order_by="'.$order_by.'" image="'.$image.'" highlight_year="'.$highlight_year.'" read_more="'.$read_more.'" intro_text="'.$intro_text.'" date="'.$date.'" time="'.$time.'" title="'.$title.'" link_title="'.$link_title.'" before_text="'.$before_text.'" after_text="'.$after_text.'"]');
		$output .= '</div>';

		return $output;
	}
}
