<?php
/**
 * @package SP Page Builder
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2016 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

class SppagebuilderAddonSu_user_content extends SppagebuilderAddons{

	public function render(){

		// Prepare compatibility mode prefix
		$prefix     = su_cmpt();
		
		$message = (isset($this->addon->settings->message) && $this->addon->settings->message) ? $this->addon->settings->message : JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_USER_CONTENT_MESSAGE');
		$color = (isset($this->addon->settings->color) && $this->addon->settings->color) ? $this->addon->settings->color : '#ffcc00';
		$color = (isset($this->addon->settings->color) && $this->addon->settings->color) ? $this->addon->settings->color : '#ffcc00';
		$login_text = (isset($this->addon->settings->login_text) && $this->addon->settings->login_text) ? $this->addon->settings->login_text : JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LOGIN');
		$content    = (isset($this->addon->settings->content) && $this->addon->settings->content) ? $this->addon->settings->content.'[/'.$prefix.'user_content]' : '';
		
		$class      = $this->addon->settings->class;
		$login_url      = $this->addon->settings->login_url;

		// Output
		$output = '<div class="bdt-addon bdt-addon-user-content ' . $class .'">';
		$output .= su_do_shortcode('['.$prefix.'user_content message="'.$message.'" color="'.$color.'" login_text="'.$login_text.'" login_url="'.$login_url.'"]'.$content);
		$output .= '</div>';

		return $output;
	}
}
