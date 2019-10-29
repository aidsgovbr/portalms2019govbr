<?php
	// Prepare compatibility mode prefix
	$prefix             = su_cmpt();
	
	$field['animation'] = ( isset( $field['animation'] ) ) ? $field['animation'] : '';
	$classes            = classNames( "qx-element qx-element-{$type} {$field['class']}", $visibilityClasses, ["wow {$field['animation']}" => $field['animation']]);
	
	$facebook = $twitter = $googleplus = $pinterest = $github = $linkedin = $border = $content = '';

	if ( $field['border'] == 1 ) {
		$border .= ($field['border_width']) ? $field['border_width'].'px' : '';
		$border .= ($field['border_style']) ? ' '.$field['border_style'] : '';
		$border .= ($field['border_color']) ? ' '.$field['border_color'] : '';
	}

	if ($field['icon_1_url']) {
		$facebook = ' icon_1="icon: facebook" icon_1_title="Facebook" icon_1_url="'.$field['icon_1_url'].'"';
	}
	if ($field['icon_2_url']) {
		$twitter = ' icon_2="icon: twitter" icon_2_title="Twitter" icon_2_url="'.$field['icon_2_url'].'"';
	}
	if ($field['icon_3_url']) {
		$googleplus = ' icon_3="icon: google-plus" icon_3_title="Google-Plus" icon_3_url="'.$field['icon_3_url'].'"';
	}
	if ($field['icon_4_url']) {
		$pinterest = ' icon_4="icon: pinterest" icon_4_title="Pinterest" icon_4_url="'.$field['icon_4_url'].'"';
	}
	if ($field['icon_5_url']) {
		$github = ' icon_5="icon: github" icon_5_title="Github" icon_5_url="'.$field['icon_5_url'].'"';
	}
	if ($field['icon_6_url']) {
		$linkedin = ' icon_6="icon: linkedin" icon_6_title="Linkedin" icon_6_url="'.$field['icon_6_url'].'"';
	}
	$social = $facebook.$twitter.$googleplus.$pinterest.$github.$linkedin;

	if ($field['content']) {
		$content = su_clean_shortcodes($field['content']).'[/'.$prefix.'member]';
	}
	
?>

<div id="<?php echo $id; ?>" class="<?php echo $classes; ?>">
	<?php echo su_do_shortcode('['.$prefix.'member style="'.$field['style'].'" background="'.$field['background'].'" color="'.$field['color'].'" border="'.$border.'" shadow="'.$field['shadow'].'" radius="'.$field['radius'].'" text_align="'.$field['text_align'].'" photo="'.$field['photo'].'" name="'.$field['name'].'" role="'.$field['role'].'" '.$social.' url="'.$field['url'].'"]'.$content); ?>
</div>
