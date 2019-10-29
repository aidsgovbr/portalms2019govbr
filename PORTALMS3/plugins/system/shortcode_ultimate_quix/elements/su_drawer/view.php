<?php
	// Prepare compatibility mode prefix
	$prefix                = su_cmpt();
	$field['pl_animation'] = ( isset( $field['pl_animation'] ) ) ? $field['pl_animation'] : '';
	$classes               = classNames( "qx-element qx-element-{$type} {$field['class']}", $visibilityClasses, ["wow {$field['pl_animation']}" => $field['pl_animation']]);

	$open_icon = '';
	if (strpos($field['open_icon'], 'icon:') !== false) {
		$open_icon = $field['open_icon'];
	} elseif (strpos($field['open_icon'], 'fa fa-') !== false) {
		$open_icon = trim(str_replace('fa fa-', '', $field['open_icon']));
		$open_icon = 'icon: '. $open_icon;
	}

	$close_icon = '';
	if (strpos($field['close_icon'], 'icon:') !== false) {
		$close_icon = $field['close_icon'];
	} elseif (strpos($field['close_icon'], 'fa fa-') !== false) {
		$close_icon = trim(str_replace('fa fa-', '', $field['close_icon']));
		$close_icon = 'icon: '. $close_icon;
	}
	$content = ($field['content']) ? su_clean_shortcodes($field['content']).'[/'.$prefix.'drawer]' : '';

?>

<div id="<?php echo $id; ?>" class="<?php echo $classes; ?>">
	<?php echo su_do_shortcode('['.$prefix.'drawer open_title="'.$field['open_title'].'" close_title="'.$field['close_title'].'" open_icon="'.$open_icon.'" close_icon="'.$close_icon.'" title_background="'.$field['title_background'].'" title_color="'.$field['title_color'].'" padding="'.$field['padding'].'" animation="'.$field['animation'].'" background="'.$field['background'].'" color="'.$field['color'].'"]'.$content); ?>
</div>