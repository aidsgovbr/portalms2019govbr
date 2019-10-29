<?php
/**
 * @package SP Page Builder
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2016 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

class SppagebuilderAddonSu_social_share extends SppagebuilderAddons{

	public function render(){

		// Prepare compatibility mode prefix
		$prefix     = su_cmpt();
		
		$facebook   = ( $this->addon->settings->facebook == 1 ) ? 'yes' : 'no';
		$twitter    = ( $this->addon->settings->twitter == 1 ) ? 'yes' : 'no';
		$googleplus = ( $this->addon->settings->googleplus == 1 ) ? 'yes' : 'no';
		$vk         = ( $this->addon->settings->vk == 1 ) ? 'yes' : 'no';
		$linkedin   = ( $this->addon->settings->linkedin == 1 ) ? 'yes' : 'no';
		$pinterest  = ( $this->addon->settings->pinterest == 1 ) ? 'yes' : 'no';
		$tumblr     = ( $this->addon->settings->tumblr == 1 ) ? 'yes' : 'no';
		$pocket     = ( $this->addon->settings->pocket == 1 ) ? 'yes' : 'no';
		$ok         = ( $this->addon->settings->ok == 1 ) ? 'yes' : 'no';
		
		$class      = $this->addon->settings->class;

		// Output
		$output = '<div class="bdt-addon bdt-addon-social-share ' . $class .'">';
		$output .= su_do_shortcode('['.$prefix.'social_share facebook="'.$facebook.'" twitter="'.$twitter.'" googleplus="'.$googleplus.'" vk="'.$vk.'" linkedin="'.$linkedin.'" pinterest="'.$pinterest.'" tumblr="'.$tumblr.'" pocket="'.$pocket.'" ok="'.$ok.'"]');
		$output .= '</div>';

		return $output;
	}
}
