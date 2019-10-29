<?php
/**
 * @package SP Page Builder
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2016 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

class SppagebuilderAddonSu_dummy_text extends SppagebuilderAddons{

	public function render(){

		// Prepare compatibility mode prefix
    	$prefix = su_cmpt();

		$amount = (isset($this->addon->settings->amount) && $this->addon->settings->amount) ? $this->addon->settings->amount : '1';
		
		$cache  = ( $this->addon->settings->cache == 1 ) ? 'yes' : 'no';
		
		$class  = $this->addon->settings->class;
		$what   = $this->addon->settings->what;

		// Output
		$output = '<div class="bdt-addon bdt-addon-dummy-text ' . $class .'">';
		$output .= su_do_shortcode('['.$prefix.'dummy_text what="'.$what.'" cache="'.$cache.'" amount="'.$amount.'"]');
		$output .= '</div>';

		return $output;
	}
}
