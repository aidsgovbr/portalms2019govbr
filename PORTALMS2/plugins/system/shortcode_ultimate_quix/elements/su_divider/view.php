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

	$field['top']             = ( $field['top'] == 1 ) ? 'yes' : 'no' ;
	$field['force_fullwidth'] = ( $field['force_fullwidth'] == 1 ) ? 'yes' : 'no' ;
	$field['center']          = ( $field['center'] == 1 ) ? 'yes' : 'no' ;
?>
<div id="<?php echo $id; ?>" class="<?php echo $classes; ?>">
<?php echo su_do_shortcode('['.$prefix.'divider style="'.$field['style'].'" color="'.$field['color'].'" align="'.$field['align'].'" icon_align="'.$field['icon_align'].'" icon="'.$icon.'" icon_style="'.$field['icon_style'].'" icon_color="'.$field['icon_color'].'" icon_size="'.$field['icon_size'].'" top="'.$field['top'].'" width="'.$field['width'].'" force_fullwidth="'.$field['force_fullwidth'].'" margin_top="'.$field['margin_top'].'" margin_bottom="'.$field['margin_bottom'].'" visible="'.$field['visible'].'" hidden="'.$field['hidden'].'" center="'.$field['center'].'"]'); ?>
</div>