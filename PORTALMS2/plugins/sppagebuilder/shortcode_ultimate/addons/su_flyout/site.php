<?php
/**
 * @package SP Page Builder
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2016 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

class SppagebuilderAddonSu_flyout extends SppagebuilderAddons{

	public function render(){

		// Prepare compatibility mode prefix
		$prefix         = su_cmpt();
		
		$offset         = (isset($this->addon->settings->offset) && $this->addon->settings->offset) ? $this->addon->settings->offset : '0, 0';
		$content        = (isset($this->addon->settings->content) && $this->addon->settings->content) ? $this->addon->settings->content.'[/'.$prefix.'flyout]' : '';
		
		$show_close     = ( $this->addon->settings->show_close == 1 ) ? 'yes' : 'no';
		$adblock_notice = ( $this->addon->settings->adblock_notice == 1 ) ? 'yes' : 'no';
		
		$class          = $this->addon->settings->class;
		$style          = $this->addon->settings->style;
		$dimension      = $this->addon->settings->dimension;
		$position       = $this->addon->settings->position;
		$transition_in  = $this->addon->settings->transition_in;
		$transition_out = $this->addon->settings->transition_out;
		$close_style    = $this->addon->settings->close_style;

		// Output
		$output = '<div class="bdt-addon bdt-addon-flyout ' . $class .'">';
		$output .= su_do_shortcode('['.$prefix.'flyout style="'.$style.'" dimension="'.$dimension.'" position="'.$position.'" offset="'.$offset.'" transition_in="'.$transition_in.'" transition_out="'.$transition_out.'" show_close="'.$show_close.'" close_style="'.$close_style.'" adblock_notice="'.$adblock_notice.'" ]'.su_clean_shortcodes($content));
		$output .= '</div>';

		return $output;
	}
}
