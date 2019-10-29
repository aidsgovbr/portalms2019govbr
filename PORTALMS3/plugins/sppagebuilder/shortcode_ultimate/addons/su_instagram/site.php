<?php
/**
 * @package SP Page Builder
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2016 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

class SppagebuilderAddonSu_instagram extends SppagebuilderAddons{

	public function render(){

		// Prepare compatibility mode prefix
		$prefix          = su_cmpt();
		
		$limit           = (isset($this->addon->settings->limit) && $this->addon->settings->limit) ? $this->addon->settings->limit : '10';
		
		$load_more       = ( $this->addon->settings->load_more == 1 ) ? 'yes' : 'no';
		
		$class           = $this->addon->settings->class;
		$layout          = $this->addon->settings->layout;
		$instagram_id    = $this->addon->settings->instagram_id;
		$hash_tag        = $this->addon->settings->hash_tag;
		$instagram_token = $this->addon->settings->instagram_token;
		$link_type       = $this->addon->settings->link_type;

		// Output
		$output = '<div class="bdt-addon bdt-addon-instagram ' . $class .'">';
		$output .= su_do_shortcode('['.$prefix.'instagram layout="'.$layout.'" instagram_id="'.$instagram_id.'" hash_tag="'.$hash_tag.'" instagram_token="'.$instagram_token.'" limit="'.$limit.'" link_type="'.$link_type.'" load_more="'.$load_more.'"]');
		$output .= '</div>';

		return $output;
	}
}
