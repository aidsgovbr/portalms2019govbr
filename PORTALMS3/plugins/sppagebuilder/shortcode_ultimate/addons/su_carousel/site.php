<?php
/**
 * @package SP Page Builder
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2016 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

class SppagebuilderAddonSu_carousel extends SppagebuilderAddons{

	public function render(){

		// Prepare compatibility mode prefix
		$prefix           = su_cmpt();
		
		$limit            = (isset($this->addon->settings->limit) && $this->addon->settings->limit) ? $this->addon->settings->limit : '5';
		$items            = (isset($this->addon->settings->items) && $this->addon->settings->items) ? $this->addon->settings->items : '4';
		$medium           = (isset($this->addon->settings->medium) && $this->addon->settings->medium) ? $this->addon->settings->medium : '3';
		$small            = (isset($this->addon->settings->small) && $this->addon->settings->small) ? $this->addon->settings->small : '1';
		$image_width      = (isset($this->addon->settings->image_width) && $this->addon->settings->image_width) ? $this->addon->settings->image_width : '360';
		$image_height     = (isset($this->addon->settings->image_height) && $this->addon->settings->image_height) ? $this->addon->settings->image_height : '320';
		$margin           = (isset($this->addon->settings->margin) && $this->addon->settings->margin) ? $this->addon->settings->margin : '10';
		$delay            = (isset($this->addon->settings->delay) && $this->addon->settings->delay) ? $this->addon->settings->delay/1000 : '4';
		$speed            = (isset($this->addon->settings->speed) && $this->addon->settings->speed) ? $this->addon->settings->speed/1000 : '0.35';
		$intro_text_limit = (isset($this->addon->settings->intro_text_limit) && $this->addon->settings->intro_text_limit) ? $this->addon->settings->intro_text_limit : '60';
		
		$image            = ( $this->addon->settings->image == 1 ) ? 'yes' : 'no';
		$thumb_resize     = ( $this->addon->settings->thumb_resize == 1 ) ? 'yes' : 'no';
		$title            = ( $this->addon->settings->title == 1 ) ? 'yes' : 'no';
		$title_link       = ( $this->addon->settings->title_link == 1 ) ? 'yes' : 'no';
		$intro_text       = ( $this->addon->settings->intro_text == 1 ) ? 'yes' : 'no';
		$category         = ( $this->addon->settings->category == 1 ) ? 'yes' : 'no';
		$date             = ( $this->addon->settings->date == 1 ) ? 'yes' : 'no';
		$arrows           = ( $this->addon->settings->arrows == 1 ) ? 'yes' : 'no';
		$pagination       = ( $this->addon->settings->pagination == 1 ) ? 'yes' : 'no';
		$autoplay         = ( $this->addon->settings->autoplay == 1 ) ? 'yes' : 'no';
		$hoverpause       = ( $this->addon->settings->hoverpause == 1 ) ? 'yes' : 'no';
		$lazyload         = ( $this->addon->settings->lazyload == 1 ) ? 'yes' : 'no';
		$loop             = ( $this->addon->settings->loop == 1 ) ? 'yes' : 'no';
		
		$style            = $this->addon->settings->style;
		$order            = $this->addon->settings->order;
		$order_by         = $this->addon->settings->order_by;
		$title_limit      = $this->addon->settings->title_limit;
		$background       = $this->addon->settings->background;
		$title_color      = $this->addon->settings->title_color;
		$arrow_position   = $this->addon->settings->arrow_position;
		$class            = $this->addon->settings->class;

		if ( $this->addon->settings->source_type == 'category' ) {
			$j_category = rtrim(implode(',', $this->addon->settings->j_category), ',');
			$source     = 'category: '.$j_category;
		}
		elseif ( $this->addon->settings->source_type == 'k2-category' ) {
			$k2_category = rtrim(implode(',', $this->addon->settings->k2_category), ',');
			$source      = 'k2-category: '.$k2_category;
		}
		elseif ( $this->addon->settings->source_type == 'directory' ) {
			$source = 'directory: '.$this->addon->settings->dir_path;
		}		

		// Output
		$output  = '<div class="bdt-addon bdt-addon-carousel ' . $class .'">';
		$output  .= su_do_shortcode('['.$prefix.'carousel style="'.$style.'" source="'.$source.'" limit="'.$limit.'" order="'.$order.'" order_by="'.$order_by.'" items="'.$items.'" medium="'.$medium.'" small="'.$small.'" image="'.$image.'" image_height="'.$image_height.'" image_width="'.$image_width.'" thumb_resize="'.$thumb_resize.'" title="'.$title.'" title_link="'.$title_link.'" title_limit="'.$title_limit.'" intro_text="'.$intro_text.'" intro_text_limit="'.$intro_text_limit.'" category="'.$category.'" date="'.$date.'" background="'.$background.'" title_color="'.$title_color.'" margin="'.$margin.'" arrows="'.$arrows.'" arrow_position="'.$arrow_position.'" pagination="'.$pagination.'" autoplay="'.$autoplay.'" hoverpause="'.$hoverpause.'" lazyload="'.$lazyload.'" loop="'.$loop.'" delay="'.$delay.'" speed="'.$speed.'"]');
		$output .= '</div>';

		return $output;
	}
}
