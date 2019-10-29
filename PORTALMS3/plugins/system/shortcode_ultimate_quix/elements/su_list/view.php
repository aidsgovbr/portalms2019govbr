<?php
	// Prepare compatibility mode prefix
	$prefix             = su_cmpt();
	
	$field['animation'] = ( isset( $field['animation'] ) ) ? $field['animation'] : '';
	$classes            = classNames( "qx-element qx-element-{$type} {$field['class']}", $visibilityClasses, ["wow {$field['animation']}" => $field['animation']]);

	$icon = '';
	if (strpos($field['icon'], 'icon:') !== false) {
		$icon = $field['icon'];
	} elseif (strpos($field['icon'], 'fa fa-') !== false) {
		$icon = trim(str_replace('fa fa-', '', $field['icon']));
		$icon = 'icon: '. $icon;
	}

?>

<div id="<?php echo $id; ?>" class="<?php echo $classes; ?>">
	<?php echo su_do_shortcode('['.$prefix.'list icon="icon: '.$field['icon'].'" icon_color="'.$field['icon_color'].'"]'.su_clean_shortcodes($field['content']).'[/'.$prefix.'list]'); ?>
</div>