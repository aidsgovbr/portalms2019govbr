<?php
	// Prepare compatibility mode prefix
	$prefix              = su_cmpt();
	
	$field['animation']  = ( isset( $field['animation'] ) ) ? $field['animation'] : '';
	$classes             = classNames( "qx-element qx-element-{$type} {$field['class']}", $visibilityClasses, ["wow {$field['animation']}" => $field['animation']]);
	
	$config              = JFactory::getConfig();
	
	$instagram_name      = (isset($field['instagram_name']) && $field['instagram_name']) ? $field['instagram_name'] : 'Instagram Photos';
	$facebook_album_url  = (isset($field['facebook_album_url']) && $field['facebook_album_url']) ? $field['facebook_album_url'] : 'https://www.facebook.com/media/set/?set=a.10153495891665541.1073741843.76810820540&type=3';
	$facebook_album_name = (isset($field['facebook_album_name']) && $field['facebook_album_name']) ? $field['facebook_album_name'] : 'Facebook Album Photos';
	$google_user_url     = (isset($field['google_user_url']) && $field['google_user_url']) ? $field['google_user_url'] : 'https://plus.google.com/115903745545816833607';
	$google_user_name    = (isset($field['google_user_name']) && $field['google_user_name']) ? $field['google_user_name'] : 'Google User Photos';
	$header_title        = (isset($field['header_title']) && $field['header_title']) ? $field['header_title'] : $config->get( 'sitename' );
	$header_sub_title    = (isset($field['header_sub_title']) && $field['header_sub_title']) ? $field['header_sub_title'] : 'Your subtitle here';
	$header_image        = (isset($field['header_image']) && $field['header_image']) ? $field['header_image'] : JURI::root().'plugins/system/bdthemes_shortcodes/images/bdthemes-logo-round.svg';
	$header_bg_image     = (isset($field['header_bg_image']) && $field['header_bg_image']) ? $field['header_bg_image'] : JURI::root().'plugins/system/bdthemes_shortcodes/images/fabric.png';
	$header_link         = (isset($field['header_link']) && $field['header_link']) ? $field['header_link'] : 'https://bdthemes.com';
	$google_plus_link    = (isset($field['google_plus_link']) && $field['google_plus_link']) ? $field['google_plus_link'] : 'https://plus.google.com/+BdThemes';
	$twitter_link        = (isset($field['twitter_link']) && $field['twitter_link']) ? $field['twitter_link'] : 'http://twitter.com/bdthemescom';
	$facebook_link       = (isset($field['facebook_link']) && $field['facebook_link']) ? $field['facebook_link'] : 'http://facebook.com/bdthemes';
	$limit               = (isset($field['limit']) && $field['limit']) ? $field['limit'] : '15';
	
	$load_more           = ( $field['load_more'] == 1 ) ? 'yes' : 'no';
	
	$link_type           = $field['link_type'];

?>

<div id="<?php echo $id; ?>" class="<?php echo $classes; ?>">
	<?php echo su_do_shortcode('['.$prefix.'social_gallery instagram_name="'.$instagram_name.'" facebook_album_url="'.$facebook_album_url.'" facebook_album_name="'.$facebook_album_name.'" google_user_url="'.$google_user_url.'" google_user_name="'.$google_user_name.'" header_title="'.$header_title.'" header_sub_title="'.$header_sub_title.'" header_image="'.$header_image.'" header_bg_image="'.$header_bg_image.'" header_link="'.$header_link.'" google_plus_link="'.$google_plus_link.'" twitter_link="'.$twitter_link.'" facebook_link="'.$facebook_link.'" limit="'.$limit.'" link_type="'.$link_type.'" load_more="'.$load_more.'"]'); ?>
</div>