<?php
/**
 * @package SP Page Builder
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2016 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

class SppagebuilderAddonSu_portfolio extends SppagebuilderAddons{

	public function render(){

		// Prepare compatibility mode prefix
		$prefix                = su_cmpt();
		
		$limit                 = (isset($this->addon->settings->limit) && $this->addon->settings->limit) ? $this->addon->settings->limit : '12';
		$show_more_item        = (isset($this->addon->settings->show_more_item) && $this->addon->settings->show_more_item) ? $this->addon->settings->show_more_item : '12';
		$horizontal_gap        = (isset($this->addon->settings->horizontal_gap) && $this->addon->settings->horizontal_gap) ? $this->addon->settings->horizontal_gap : '10';
		$vertical_gap          = (isset($this->addon->settings->vertical_gap) && $this->addon->settings->vertical_gap) ? $this->addon->settings->vertical_gap : '10';
		$large                 = (isset($this->addon->settings->large) && $this->addon->settings->large) ? $this->addon->settings->large : '4';
		$medium                = (isset($this->addon->settings->medium) && $this->addon->settings->medium) ? $this->addon->settings->medium : '3';
		$small                 = (isset($this->addon->settings->small) && $this->addon->settings->small) ? $this->addon->settings->small : '1';
		
		$show_more             = ( $this->addon->settings->show_more == 1 ) ? 'yes' : 'no';
		$thumb_resize          = ( $this->addon->settings->thumb_resize == 1 ) ? 'yes' : 'no';
		$filter                = ( $this->addon->settings->filter == 1 ) ? 'yes' : 'no';
		$filter_deeplink       = ( $this->addon->settings->filter_deeplink == 1 ) ? 'yes' : 'no';
		$show_link             = ( $this->addon->settings->show_link == 1 ) ? 'yes' : 'no';
		$show_zoom             = ( $this->addon->settings->show_zoom == 1 ) ? 'yes' : 'no';
		$include_article_image = ( $this->addon->settings->include_article_image == 1 ) ? 'yes' : 'no';
		
		$layout                = $this->addon->settings->layout;
		$style                 = $this->addon->settings->style;
		$show_more_action      = $this->addon->settings->show_more_action;
		$order                 = $this->addon->settings->order;
		$order_by              = $this->addon->settings->order_by;
		$loading_animation     = $this->addon->settings->loading_animation;
		$filter_animation      = $this->addon->settings->filter_animation;
		$filter_style          = $this->addon->settings->filter_style;
		$filter_align          = $this->addon->settings->filter_align;
		$class                 = $this->addon->settings->class;
		


		if ( $this->addon->settings->source_type == 'category' ) {
			$j_category = rtrim(implode(',', $this->addon->settings->j_category), ',');
			$source     = 'category: '.$j_category;
		}
		elseif ( $this->addon->settings->source_type == 'k2-category' ) {
			$k2_category = rtrim(implode(',', $this->addon->settings->k2_category), ',');
			$source      = 'k2-category: '.$k2_category;
		}

		// Output
		$output  = '<div class="bdt-addon bdt-addon-portfolio ' . $class .'">';
		$output  .= su_do_shortcode('['.$prefix.'portfolio source="'.$source.'" layout="'.$layout.'" style="'.$style.'" limit="'.$limit.'" show_more="'.$show_more.'" show_more_item="'.$show_more_item.'" show_more_action="'.$show_more_action.'" order="'.$order.'" order_by="'.$order_by.'" loading_animation="'.$loading_animation.'" filter_animation="'.$filter_animation.'" horizontal_gap="'.$horizontal_gap.'" vertical_gap="'.$vertical_gap.'" thumb_resize="'.$thumb_resize.'" filter="'.$filter.'" filter_deeplink="'.$filter_deeplink.'" filter_style="'.$filter_style.'" filter_align="'.$filter_align.'" show_link="'.$show_link.'" show_zoom="'.$show_zoom.'" include_article_image="'.$include_article_image.'" small="'.$small.'" medium="'.$medium.'" large="'.$large.'"]');
		$output .= '</div>';

		return $output;
	}
}
