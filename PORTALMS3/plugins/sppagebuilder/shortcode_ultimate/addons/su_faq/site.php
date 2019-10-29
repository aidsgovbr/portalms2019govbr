<?php
/**
 * @package SP Page Builder
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2016 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

class SppagebuilderAddonSu_faq extends SppagebuilderAddons{

	public function render(){

		// Prepare compatibility mode prefix
		$prefix           = su_cmpt();
		
		$limit            = (isset($this->addon->settings->limit) && $this->addon->settings->limit) ? $this->addon->settings->limit : '12';
		
		$link_to_article  = ( $this->addon->settings->link_to_article == 1 ) ? 'yes' : 'no';
		$filter           = ( $this->addon->settings->filter == 1 ) ? 'yes' : 'no';
		
		$order            = $this->addon->settings->order;
		$order_by         = $this->addon->settings->order_by;
		$filter_animation = $this->addon->settings->filter_animation;
		$target           = $this->addon->settings->target;
		$class            = $this->addon->settings->class;


		if ( $this->addon->settings->source_type == 'category' ) {
			$j_category = rtrim(implode(',', $this->addon->settings->j_category), ',');
			$source     = 'category: '.$j_category;
		}
		elseif ( $this->addon->settings->source_type == 'k2-category' ) {
			$k2_category = rtrim(implode(',', $this->addon->settings->k2_category), ',');
			$source      = 'k2-category: '.$k2_category;
		}

		// Output
		$output  = '<div class="bdt-addon bdt-addon-faq ' . $class .'">';
		$output  .= su_do_shortcode('['.$prefix.'faq source="'.$source.'" limit="'.$limit.'" order="'.$order.'" order_by="'.$order_by.'" filter="'.$filter.'" filter_animation="'.$filter_animation.'" link_to_article="'.$link_to_article.'" target="'.$target.'"]');
		$output .= '</div>';

		return $output;
	}
}
