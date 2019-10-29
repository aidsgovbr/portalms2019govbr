<?php
/**
 * @package SP Page Builder
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2016 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

class SppagebuilderAddonSu_custom_carousel extends SppagebuilderAddons{

	public function render(){

		// Prepare compatibility mode prefix
		$prefix      = su_cmpt();
		
		$margin      = (isset($this->addon->settings->margin) && $this->addon->settings->margin) ? $this->addon->settings->margin : '10';
		$speed       = (isset($this->addon->settings->speed) && $this->addon->settings->speed) ? $this->addon->settings->speed/1000 : '0.35';
		$delay       = (isset($this->addon->settings->delay) && $this->addon->settings->delay) ? $this->addon->settings->delay/1000 : '4';
		$large       = (isset($this->addon->settings->large) && $this->addon->settings->large) ? $this->addon->settings->large : '5';
		$medium      = (isset($this->addon->settings->medium) && $this->addon->settings->medium) ? $this->addon->settings->medium : '3';
		$small       = (isset($this->addon->settings->small) && $this->addon->settings->small) ? $this->addon->settings->small : '1';
		
		$pagination  = ( $this->addon->settings->pagination == 1 ) ? 'yes' : 'no';
		$arrows      = ( $this->addon->settings->arrows == 1 ) ? 'yes' : 'no';
		$autoplay    = ( $this->addon->settings->autoplay == 1 ) ? 'yes' : 'no';
		$center_zoom = ( $this->addon->settings->center_zoom == 1 ) ? 'yes' : 'no';
		$hoverpause  = ( $this->addon->settings->hoverpause == 1 ) ? 'yes' : 'no';
		$lazyload    = ( $this->addon->settings->lazyload == 1 ) ? 'yes' : 'no';
		$loop        = ( $this->addon->settings->loop == 1 ) ? 'yes' : 'no';
		
		$class       = $this->addon->settings->class;
		$style       = $this->addon->settings->style;
		$padding     = $this->addon->settings->padding;
		$border      = $this->addon->settings->border;
		$background  = $this->addon->settings->background;

		// Output
		$output   = array();
		$output[] = '<div class="bdt-addon bdt-addon-custom-carousel ' . $class .'">';
		$output[] = '['.$prefix.'custom_carousel style="'.$style.'" margin="'.$margin.'" padding="'.$padding.'" border="'.$border.'" background="'.$background.'" pagination="'.$pagination.'" arrows="'.$arrows.'" autoplay="'.$autoplay.'" center_zoom="'.$center_zoom.'" hoverpause="'.$hoverpause.'" lazyload="'.$lazyload.'" loop="'.$loop.'" speed="'.$speed.'" delay="'.$delay.'" small="'.$small.'" medium="'.$medium.'" large="'.$large.'"]';

		foreach($this->addon->settings->carousel_item as $key => $item) {
	 		$output[] = '['.$prefix.'carousel_item]'.su_clean_shortcodes($item->content).'[/'.$prefix.'carousel_item]';
		}

		$output[] = '[/'.$prefix.'custom_carousel]</div>';

		return su_do_shortcode(implode("\n", $output));
	}
}
