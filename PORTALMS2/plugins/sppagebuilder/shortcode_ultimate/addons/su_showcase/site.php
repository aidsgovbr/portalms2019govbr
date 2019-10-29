<?php
/**
 * @package SP Page Builder
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2016 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

class SppagebuilderAddonSu_showcase extends SppagebuilderAddons{

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
		$filter_counter        = ( $this->addon->settings->filter_counter == 1 ) ? 'yes' : 'no';
		$page_deeplink         = ( $this->addon->settings->page_deeplink == 1 ) ? 'yes' : 'no';
		$popup_category        = ( $this->addon->settings->popup_category == 1 ) ? 'yes' : 'no';
		$popup_date            = ( $this->addon->settings->popup_date == 1 ) ? 'yes' : 'no';
		$popup_image           = ( $this->addon->settings->popup_image == 1 ) ? 'yes' : 'no';
		$popup_detail_button   = ( $this->addon->settings->popup_detail_button == 1 ) ? 'yes' : 'no';
		$include_article_image = ( $this->addon->settings->include_article_image == 1 ) ? 'yes' : 'no';
		
		$layout                = $this->addon->settings->layout;
		$show_more_action      = $this->addon->settings->show_more_action;
		$order                 = $this->addon->settings->order;
		$order_by              = $this->addon->settings->order_by;
		$loading_animation     = $this->addon->settings->loading_animation;
		$filter_animation      = $this->addon->settings->filter_animation;
		$caption_style         = $this->addon->settings->caption_style;
		$filter_style          = $this->addon->settings->filter_style;
		$filter_align          = $this->addon->settings->filter_align;
		$item_link             = $this->addon->settings->item_link;
		$popup_position        = $this->addon->settings->popup_position;
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
		$output  = '<div class="bdt-addon bdt-addon-showcase ' . $class .'">';
		$output  .= su_do_shortcode('['.$prefix.'showcase source="'.$source.'" layout="'.$layout.'" limit="'.$limit.'" show_more="'.$show_more.'" show_more_item="'.$show_more_item.'" show_more_action="'.$show_more_action.'" order="'.$order.'" order_by="'.$order_by.'" loading_animation="'.$loading_animation.'" filter_animation="'.$filter_animation.'" caption_style="'.$caption_style.'" horizontal_gap="'.$horizontal_gap.'" vertical_gap="'.$vertical_gap.'" thumb_resize="'.$thumb_resize.'" filter="'.$filter.'" filter_align="'.$filter_align.'" filter_deeplink="'.$filter_deeplink.'" page_deeplink="'.$page_deeplink.'" filter_style="'.$filter_style.'" filter_counter="'.$filter_counter.'" item_link="'.$item_link.'" popup_position="'.$popup_position.'" popup_category="'.$popup_category.'" popup_date="'.$popup_date.'" popup_image="'.$popup_image.'" popup_detail_button="'.$popup_detail_button.'" include_article_image="'.$include_article_image.'" medium="'.$medium.'" large="'.$large.'"]');
		$output .= '</div>';

		return $output;
	}
}
