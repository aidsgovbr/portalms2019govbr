<?php
/**
 * @package SP Page Builder
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2016 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

class SppagebuilderAddonSu_social_locker extends SppagebuilderAddons{

	public function render(){

		// Prepare compatibility mode prefix
		$prefix      = su_cmpt();
		
		$title       = (isset($this->addon->settings->title) && $this->addon->settings->title) ? $this->addon->settings->title : JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SL_LOCKED');
		$message     = (isset($this->addon->settings->message) && $this->addon->settings->message) ? $this->addon->settings->message : JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SL_LOCKED_MSG');
		$timer       = (isset($this->addon->settings->timer) && $this->addon->settings->timer) ? $this->addon->settings->timer : '0';
		$content     = (isset($this->addon->settings->content) && $this->addon->settings->content) ? $this->addon->settings->content.'[/'.$prefix.'social_locker]' : '';
		
		$close       = ( $this->addon->settings->close == 1 ) ? 'yes' : 'no';
		$mobile      = ( $this->addon->settings->mobile == 1 ) ? 'yes' : 'no';
		$demo_mode   = ( $this->addon->settings->demo_mode == 1 ) ? 'yes' : 'no';
		$guest_only  = ( $this->addon->settings->guest_only == 1 ) ? 'yes' : 'no';
		$facebook    = ( $this->addon->settings->facebook == 1 ) ? 'yes' : 'no';
		$google_plus = ( $this->addon->settings->google_plus == 1 ) ? 'yes' : 'no';
		$twitter     = ( $this->addon->settings->twitter == 1 ) ? 'yes' : 'no';
		
		$class       = $this->addon->settings->class;
		$style       = $this->addon->settings->style;
		$overlap     = $this->addon->settings->overlap;
		$url         = $this->addon->settings->url;

		// Output
		$output = '<div class="bdt-addon bdt-addon-social-locker ' . $class .'">';
		$output .= su_do_shortcode('['.$prefix.'social_locker style="'.$style.'" overlap="'.$overlap.'" title="'.$title.'" message="'.$message.'" timer="'.$timer.'" close="'.$close.'" mobile="'.$mobile.'" demo_mode="'.$demo_mode.'" guest_only="'.$guest_only.'" facebook="'.$facebook.'" google_plus="'.$google_plus.'" twitter="'.$twitter.'" url="'.$url.'"]'.$content);
		$output .= '</div>';

		return $output;
	}
}
