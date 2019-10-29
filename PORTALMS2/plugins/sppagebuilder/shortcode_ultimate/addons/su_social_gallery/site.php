<?php
/**
 * @package SP Page Builder
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2016 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

class SppagebuilderAddonSu_social_gallery extends SppagebuilderAddons{

	public function render(){

		// Prepare compatibility mode prefix
		$prefix              = su_cmpt();
		
		$config              = JFactory::getConfig();
		
		$instagram_name      = (isset($this->addon->settings->instagram_name) && $this->addon->settings->instagram_name) ? $this->addon->settings->instagram_name : 'Instagram Photos';
		$facebook_album_url  = (isset($this->addon->settings->facebook_album_url) && $this->addon->settings->facebook_album_url) ? $this->addon->settings->facebook_album_url : 'https://www.facebook.com/media/set/?set=a.10153495891665541.1073741843.76810820540&type=3';
		$facebook_album_name = (isset($this->addon->settings->facebook_album_name) && $this->addon->settings->facebook_album_name) ? $this->addon->settings->facebook_album_name : 'Facebook Album Photos';
		$google_user_url     = (isset($this->addon->settings->google_user_url) && $this->addon->settings->google_user_url) ? $this->addon->settings->google_user_url : 'https://plus.google.com/115903745545816833607';
		$google_user_name    = (isset($this->addon->settings->google_user_name) && $this->addon->settings->google_user_name) ? $this->addon->settings->google_user_name : 'Google User Photos';
		$header_title        = (isset($this->addon->settings->header_title) && $this->addon->settings->header_title) ? $this->addon->settings->header_title : $config->get( 'sitename' );
		$header_sub_title    = (isset($this->addon->settings->header_sub_title) && $this->addon->settings->header_sub_title) ? $this->addon->settings->header_sub_title : 'Your subtitle here';
		$header_image        = (isset($this->addon->settings->header_image) && $this->addon->settings->header_image) ? $this->addon->settings->header_image : JURI::root().'plugins/system/bdthemes_shortcodes/images/bdthemes-logo-round.svg';
		$header_bg_image     = (isset($this->addon->settings->header_bg_image) && $this->addon->settings->header_bg_image) ? $this->addon->settings->header_bg_image : JURI::root().'plugins/system/bdthemes_shortcodes/images/fabric.png';
		$header_link         = (isset($this->addon->settings->header_link) && $this->addon->settings->header_link) ? $this->addon->settings->header_link : 'https://bdthemes.com';
		$google_plus_link    = (isset($this->addon->settings->google_plus_link) && $this->addon->settings->google_plus_link) ? $this->addon->settings->google_plus_link : 'https://plus.google.com/+BdThemes';
		$twitter_link        = (isset($this->addon->settings->twitter_link) && $this->addon->settings->twitter_link) ? $this->addon->settings->twitter_link : 'http://twitter.com/bdthemescom';
		$facebook_link       = (isset($this->addon->settings->facebook_link) && $this->addon->settings->facebook_link) ? $this->addon->settings->facebook_link : 'http://facebook.com/bdthemes';
		$limit               = (isset($this->addon->settings->limit) && $this->addon->settings->limit) ? $this->addon->settings->limit : '15';
		
		$load_more           = ( $this->addon->settings->load_more == 1 ) ? 'yes' : 'no';
		
		$class               = $this->addon->settings->class;
		$link_type           = $this->addon->settings->link_type;

		// Output
		$output = '<div class="bdt-addon bdt-addon-social-gallery ' . $class .'">';
		$output .= su_do_shortcode('['.$prefix.'social_gallery instagram_name="'.$instagram_name.'" facebook_album_url="'.$facebook_album_url.'" facebook_album_name="'.$facebook_album_name.'" google_user_url="'.$google_user_url.'" google_user_name="'.$google_user_name.'" header_title="'.$header_title.'" header_sub_title="'.$header_sub_title.'" header_image="'.$header_image.'" header_bg_image="'.$header_bg_image.'" header_link="'.$header_link.'" google_plus_link="'.$google_plus_link.'" twitter_link="'.$twitter_link.'" facebook_link="'.$facebook_link.'" limit="'.$limit.'" link_type="'.$link_type.'" load_more="'.$load_more.'"]');
		$output .= '</div>';

		return $output;
	}
}
