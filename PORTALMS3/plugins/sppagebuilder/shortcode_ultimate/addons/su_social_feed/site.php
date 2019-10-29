<?php
/**
 * @package SP Page Builder
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2016 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

class SppagebuilderAddonSu_social_feed extends SppagebuilderAddons{

	public function render(){

		// Prepare compatibility mode prefix
		$prefix     = su_cmpt();
		
		$width      = (isset($this->addon->settings->width) && $this->addon->settings->width) ? $this->addon->settings->width : '320';
		$height     = (isset($this->addon->settings->height) && $this->addon->settings->height) ? $this->addon->settings->height : '480';
		$limit      = (isset($this->addon->settings->limit) && $this->addon->settings->limit) ? $this->addon->settings->limit : '10';
		
		$facebook   = ( $this->addon->settings->facebook == 1 ) ? 'yes' : 'no';
		$twitter    = ( $this->addon->settings->twitter == 1 ) ? 'yes' : 'no';
		$instagram  = ( $this->addon->settings->instagram == 1 ) ? 'yes' : 'no';
		$vkontakte  = ( $this->addon->settings->vkontakte == 1 ) ? 'yes' : 'no';
		$pinterest  = ( $this->addon->settings->pinterest == 1 ) ? 'yes' : 'no';
		
		$class      = $this->addon->settings->class;
		$order      = $this->addon->settings->order;
		$active_tab = $this->addon->settings->active_tab;
		$position   = $this->addon->settings->position;
		$link_text  = $this->addon->settings->link_text;

		// Output
		$output = '<div class="bdt-addon bdt-addon-social-feed ' . $class .'">';
		$output .= su_do_shortcode('['.$prefix.'social_feed width="'.$width.'" height="'.$height.'" facebook="'.$facebook.'" twitter="'.$twitter.'" instagram="'.$instagram.'" vkontakte="'.$vkontakte.'" pinterest="'.$pinterest.'" order="'.$order.'" active_tab="'.$active_tab.'" limit="'.$limit.'" position="'.$position.'" link_text="'.$link_text.'"]');
		$output .= '</div>';

		return $output;
	}
}
