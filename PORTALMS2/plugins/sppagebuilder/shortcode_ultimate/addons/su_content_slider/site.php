<?php
/**
 * @package SP Page Builder
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2016 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

class SppagebuilderAddonSu_content_slider extends SppagebuilderAddons{

	public function render(){

		// Prepare compatibility mode prefix
		$prefix         = su_cmpt();
		
		$speed          = (isset($this->addon->settings->speed) && $this->addon->settings->speed) ? $this->addon->settings->speed/1000 : '0.6';
		$delay          = (isset($this->addon->settings->delay) && $this->addon->settings->delay) ? $this->addon->settings->delay/1000 : '4';
		$margin         = (isset($this->addon->settings->margin) && $this->addon->settings->margin) ? $this->addon->settings->margin : '4';
		
		$arrows         = ( $this->addon->settings->arrows == 1 ) ? 'yes' : 'no';
		$pagination     = ( $this->addon->settings->pagination == 1 ) ? 'yes' : 'no';
		$autoplay       = ( $this->addon->settings->autoplay == 1 ) ? 'yes' : 'no';
		$autoheight     = ( $this->addon->settings->autoheight == 1 ) ? 'yes' : 'no';
		$hoverpause     = ( $this->addon->settings->hoverpause == 1 ) ? 'yes' : 'no';
		$lazyload       = ( $this->addon->settings->lazyload == 1 ) ? 'yes' : 'no';
		$loop           = ( $this->addon->settings->loop == 1 ) ? 'yes' : 'no';
		
		$class          = $this->addon->settings->class;
		$style          = $this->addon->settings->style;
		$transitionin   = $this->addon->settings->transitionin;
		$transitionout  = $this->addon->settings->transitionout;
		$arrow_position = $this->addon->settings->arrow_position;

		// Output
		$output   = array();
		$output[] = '<div class="bdt-addon bdt-addon-content-slider ' . $class .'">';
		$output[] = '['.$prefix.'content_slider style="'.$style.'" transitionin="'.$transitionin.'" transitionout="'.$transitionout.'" margin="'.$margin.'" arrows="'.$arrows.'" arrow_position="'.$arrow_position.'" pagination="'.$pagination.'" autoplay="'.$autoplay.'" autoheight="'.$autoheight.'" hoverpause="'.$hoverpause.'" lazyload="'.$lazyload.'" loop="'.$loop.'" speed="'.$speed.'" delay="'.$delay.'"]';

		foreach($this->addon->settings->slide_item as $key => $item) {
	 		$output[] = '['.$prefix.'content_slide]'.su_clean_shortcodes($item->content).'[/'.$prefix.'content_slide]';
		}

		$output[] = '[/'.$prefix.'content_slider]</div>';

		return su_do_shortcode(implode("\n", $output));
	}
}
