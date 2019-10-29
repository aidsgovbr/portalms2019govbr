<?php
/**
 * @package SP Page Builder
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2016 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

class SppagebuilderAddonSu_news_ticker extends SppagebuilderAddons{

	public function render(){

		// Prepare compatibility mode prefix
		$prefix           = su_cmpt();
		
		$limit            = (isset($this->addon->settings->limit) && $this->addon->settings->limit) ? $this->addon->settings->limit : '12';
		$label            = (isset($this->addon->settings->label) && $this->addon->settings->label) ? $this->addon->settings->label : 'LATEST NEWS';
		$intro_text_limit = (isset($this->addon->settings->intro_text_limit) && $this->addon->settings->intro_text_limit) ? $this->addon->settings->intro_text_limit : '200';
		$delay            = (isset($this->addon->settings->delay) && $this->addon->settings->delay) ? $this->addon->settings->delay/1000 : '4';
		
		$show_label       = ( $this->addon->settings->show_label == 1 ) ? 'yes' : 'no';
		$navigation       = ( $this->addon->settings->navigation == 1 ) ? 'yes' : 'no';
		$intro_text       = ( $this->addon->settings->intro_text == 1 ) ? 'yes' : 'no';
		$autoplay         = ( $this->addon->settings->autoplay == 1 ) ? 'yes' : 'no';
		
		$class            = $this->addon->settings->class;
		$order            = $this->addon->settings->order;
		$order_by         = $this->addon->settings->order_by;
		$transition       = $this->addon->settings->transition;
		$target           = $this->addon->settings->target;

		if ( $this->addon->settings->source_type == 'category' ) {
			$j_category = rtrim(implode(',', $this->addon->settings->j_category), ',');
			$source     = 'category: '.$j_category;
		}
		elseif ( $this->addon->settings->source_type == 'k2-category' ) {
			$k2_category = rtrim(implode(',', $this->addon->settings->k2_category), ',');
			$source      = 'k2-category: '.$k2_category;
		}

		// Output
		$output = '<div class="bdt-addon bdt-addon-news-ticker ' . $class .'">';
		$output .= su_do_shortcode('['.$prefix.'news_ticker source="'.$source.'" limit="'.$limit.'" show_label="'.$show_label.'" label="'.$label.'" navigation="'.$navigation.'" intro_text="'.$intro_text.'" intro_text_limit="'.$intro_text_limit.'" order="'.$order.'" order_by="'.$order_by.'" transition="'.$transition.'" autoplay="'.$autoplay.'" delay="'.$delay.'" target="'.$target.'"]');
		$output .= '</div>';

		return $output;
	}
}
