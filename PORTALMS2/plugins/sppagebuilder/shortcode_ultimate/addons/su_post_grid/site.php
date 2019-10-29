<?php
/**
 * @package SP Page Builder
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2016 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

class SppagebuilderAddonSu_post_grid extends SppagebuilderAddons{

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
		$thumb_width           = (isset($this->addon->settings->thumb_width) && $this->addon->settings->thumb_width) ? $this->addon->settings->thumb_width : '360';
		$thumb_height          = (isset($this->addon->settings->thumb_height) && $this->addon->settings->thumb_height) ? $this->addon->settings->thumb_height : '320';
		$intro_text_limit      = (isset($this->addon->settings->intro_text_limit) && $this->addon->settings->intro_text_limit) ? $this->addon->settings->intro_text_limit : '60';
		
		$show_more             = ( $this->addon->settings->show_more == 1 ) ? 'yes' : 'no';
		$filter                = ( $this->addon->settings->filter == 1 ) ? 'yes' : 'no';
		$filter_deeplink       = ( $this->addon->settings->filter_deeplink == 1 ) ? 'yes' : 'no';
		$filter_counter        = ( $this->addon->settings->filter_counter == 1 ) ? 'yes' : 'no';
		$include_article_image = ( $this->addon->settings->include_article_image == 1 ) ? 'yes' : 'no';
		$show_search           = ( $this->addon->settings->show_search == 1 ) ? 'yes' : 'no';
		$show_category         = ( $this->addon->settings->show_category == 1 ) ? 'yes' : 'no';
		$date                  = ( $this->addon->settings->date == 1 ) ? 'yes' : 'no';
		$show_thumb            = ( $this->addon->settings->show_thumb == 1 ) ? 'yes' : 'no';
		
		$layout                = $this->addon->settings->layout;
		$show_more_action      = $this->addon->settings->show_more_action;
		$order                 = $this->addon->settings->order;
		$order_by              = $this->addon->settings->order_by;
		$loading_animation     = $this->addon->settings->loading_animation;
		$filter_animation      = $this->addon->settings->filter_animation;
		$caption_style         = $this->addon->settings->caption_style;
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
		$output = '<div class="bdt-addon bdt-addon-post-grid ' . $class .'">';
		$output .= su_do_shortcode('['.$prefix.'post_grid source="'.$source.'" layout="'.$layout.'" limit="'.$limit.'" show_more="'.$show_more.'" show_more_item="'.$show_more_item.'" show_more_action="'.$show_more_action.'" show_search="'.$show_search.'" intro_text_limit="'.$intro_text_limit.'" order="'.$order.'" order_by="'.$order_by.'" loading_animation="'.$loading_animation.'" filter_animation="'.$filter_animation.'" caption_style="'.$caption_style.'" horizontal_gap="'.$horizontal_gap.'" vertical_gap="'.$vertical_gap.'" filter="'.$filter.'" filter_style="'.$filter_style.'" filter_align="'.$filter_align.'" filter_deeplink="'.$filter_deeplink.'" filter_counter="'.$filter_counter.'" category="'.$show_category.'" date="'.$date.'" include_article_image="'.$include_article_image.'" show_thumb="'.$show_thumb.'" thumb_width="'.$thumb_width.'" thumb_height="'.$thumb_height.'" small="'.$small.'" medium="'.$medium.'" large="'.$large.'"]');
		$output .= '</div>';

		return $output;
	}
	public function css() {
		$addon_id = '#sppb-addon-' . $this->addon->id;

		$text_style = 'color: inherit;';
		$date_style = 'color: inherit;';

		$css = $addon_id . ' .cbp-l-grid-blog-desc {';
		$css .= $text_style;
		$css .= '}';

		$css .= $addon_id . ' .cbp-l-grid-blog-date {';
		$css .= $date_style;
		$css .= '}';

		return $css;
	}
}
