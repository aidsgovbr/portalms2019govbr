<?php
/**
 * @package SP Page Builder
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2016 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

class SppagebuilderAddonSu_weather extends SppagebuilderAddons{

	public function render(){

		// Prepare compatibility mode prefix
		$prefix     = su_cmpt();
		
		$location   = (isset($this->addon->settings->location) && $this->addon->settings->location) ? $this->addon->settings->location : 'Boston, MA';
		$country    = (isset($this->addon->settings->country) && $this->addon->settings->country) ? $this->addon->settings->country : 'USA';
		$forecast   = (isset($this->addon->settings->forecast) && $this->addon->settings->forecast) ? $this->addon->settings->forecast : '4';
		$color      = (isset($this->addon->settings->color) && $this->addon->settings->color) ? $this->addon->settings->color : '#ffffff';
		$background = (isset($this->addon->settings->background) && $this->addon->settings->background) ? $this->addon->settings->background : '#8DD438';
		$padding    = (isset($this->addon->settings->padding) && $this->addon->settings->padding) ? $this->addon->settings->padding : '25px';
		$margin     = (isset($this->addon->settings->margin) && $this->addon->settings->margin) ? $this->addon->settings->margin : '0px';
		
		$city_only  = ( $this->addon->settings->city_only == 1 ) ? 'yes' : 'no';
		
		$class      = $this->addon->settings->class;
		$api        = $this->addon->settings->api;
		$view       = $this->addon->settings->view;
		$units      = $this->addon->settings->units;

		// Output
		$output = '<div class="bdt-addon bdt-addon-weather ' . $class .'">';
		$output .= su_do_shortcode('['.$prefix.'weather location="'.$location.'" country="'.$country.'" city_only="'.$city_only.'" forecast="'.$forecast.'" api="'.$api.'" view="'.$view.'" units="'.$units.'" color="inherit" background="inherit"]');
		$output .= '</div>';

		return $output;
	}
}
