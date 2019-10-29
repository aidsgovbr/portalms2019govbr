<?php
/**
 * @package SP Page Builder
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2016 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

class SppagebuilderAddonSu_pricing_table extends SppagebuilderAddons{

	public function render(){

		// Prepare compatibility mode prefix
		$prefix = su_cmpt();
		
		$class  = $this->addon->settings->class;
		$style  = $this->addon->settings->style;

		// Output
		$output   = array();
		$output[] = '<div class="bdt-addon bdt-addon-pricing-table ' . $class .'">';
		$output[] = '['.$prefix.'pricing_table style="'.$style.'"]';

		foreach($this->addon->settings->pricing_plan as $key => $plan) {

			$name                 = (isset($plan->name) && $plan->name) ? $plan->name : 'Standard';
			$price                = (isset($plan->price) && $plan->price) ? $plan->price : '19.99';
			$before               = (isset($plan->before) && $plan->before) ? $plan->before : '$';
			$period               = (isset($plan->period) && $plan->period) ? $plan->period : 'per month';
			$icon                 = (isset($plan->icon) && $plan->icon) ? trim(str_replace('fa-', '', 'icon:'.$plan->icon)) : '';
			$icon_color           = (isset($plan->icon_color) && $plan->icon_color) ? $plan->icon_color : '#666666';
			$btn_url              = (isset($plan->btn_url) && $plan->btn_url) ? $plan->btn_url : '#';
			$btn_text             = (isset($plan->btn_text) && $plan->btn_text) ? $plan->btn_text : 'Sign up Now';
			$btn_color            = (isset($plan->btn_color) && $plan->btn_color) ? $plan->btn_color : '#ffffff';
			$btn_background       = (isset($plan->btn_background) && $plan->btn_background) ? $plan->btn_background : '#4FC1E9';
			$btn_background_hover = (isset($plan->btn_background_hover) && $plan->btn_background_hover) ? $plan->btn_background_hover : '#1AA0D1';
			$badge_background     = (isset($plan->badge_background) && $plan->badge_background) ? $plan->badge_background : '#1AA0D1';
			$color                = (isset($plan->color) && $plan->color) ? $plan->color : '#1AA0D1';
			$background           = (isset($plan->background) && $plan->background) ? $plan->background : '#FFFFFF';
			$content              = (isset($plan->content) && $plan->content) ? $plan->content : '';
			
			$featured             = ( $plan->featured == 1 ) ? 'yes' : 'no';
			
			$old_price            = $plan->old_price;
			$after                = $plan->after;
			$btn_target           = $plan->btn_target;
			$badge                = $plan->badge;

	 		$output[] = '['.$prefix.'plan name="'.$name.'" price="'.$price.'" old_price="'.$old_price.'" before="'.$before.'" after="'.$after.'" period="'.$period.'" featured="'.$featured.'" icon="'.$icon.'" icon_color="'.$icon_color.'" btn_url="'.$btn_url.'" btn_target="'.$btn_target.'" btn_text="'.$btn_text.'" btn_color="'.$btn_color.'" btn_background="'.$btn_background.'" btn_background_hover="'.$btn_background_hover.'" badge="'.$badge.'" badge_background="'.$badge_background.'" color="'.$color.'" background="'.$background.'"]'.su_clean_shortcodes($plan->content).'[/'.$prefix.'plan]';
		}

		$output[] = '[/'.$prefix.'pricing_table]</div>';

		return su_do_shortcode(implode("\n", $output));
	}
}
