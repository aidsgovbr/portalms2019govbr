<?php
/**
 * @package SP Page Builder
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2016 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

class SppagebuilderAddonSu_blockquote extends SppagebuilderAddons{

	public function render(){

		// Prepare compatibility mode prefix
		$prefix  = su_cmpt();
		
		$content = (isset($this->addon->settings->content) && $this->addon->settings->content) ? $this->addon->settings->content.'[/'.$prefix.'blockquote]' : '';
		
		$pull    = ( $this->addon->settings->pull == 1 ) ? 'yes' : 'no';
		$italic  = ( $this->addon->settings->italic == 1 ) ? 'yes' : 'no';
		
		$class   = $this->addon->settings->class;
		$font    = $this->addon->settings->font;
		$cite    = $this->addon->settings->cite;
		$url     = $this->addon->settings->url;
		$align   = $this->addon->settings->align;

		// Output
		$output = '<div class="bdt-addon bdt-addon-blockquote ' . $class .'">';
		$output .= su_do_shortcode('['.$prefix.'blockquote font="'.$font.'" cite="'.$cite.'" url="'.$url.'" align="'.$align.'" pull="'.$pull.'" italic="'.$italic.'"]'.$content);
		$output .= '</div>';

		return $output;
	}
}
