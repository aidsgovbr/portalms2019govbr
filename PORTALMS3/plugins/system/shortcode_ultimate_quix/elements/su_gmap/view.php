<?php
	// Prepare compatibility mode prefix
	$prefix             = su_cmpt();
	$field['animation'] = ( isset( $field['animation'] ) ) ? $field['animation'] : '';
	$classes            = classNames( "qx-element qx-element-{$type} {$field['class']}", $visibilityClasses, ["wow {$field['animation']}" => $field['animation']]);
	
	$border = '';

	if ( $field['border'] == 1 ) {
		$border .= ($field['border_width']) ? $field['border_width'].'px' : '';
		$border .= ($field['border_style']) ? ' '.$field['border_style'] : '';
		$border .= ($field['border_color']) ? ' '.$field['border_color'] : '';
	}

	$field['zoom_control']        = ($field['zoom_control'] == 1 ) ? 'yes' : 'no';
	$field['street_view_control'] = ($field['street_view_control'] == 1 ) ? 'yes' : 'no';
	$field['location_marker']     = ($field['location_marker'] == 1 ) ? 'yes' : 'no';
	$field['responsive']          = ($field['responsive'] == 1 ) ? 'yes' : 'no';
?>

<div id="<?php echo $id; ?>" class="<?php echo $classes; ?>" style="width: 100%;">
	<?php echo su_do_shortcode('['.$prefix.'gmap_advanced style="'.$field['style'].'" height="'.$field['height'].'" border="'.$border .'" lat="'.$field['lat'].'" lng="'.$field['lng'].'" zoom_control_style="'.$field['zoom_control_style'].'" zoom_control="'.$field['zoom_control'].'" zoom="'.$field['zoom'].'" street_view_control="'.$field['street_view_control'].'" location_marker="'.$field['location_marker'].'" custom_marker="'.$field['custom_marker'].'" address="'.$field['address'].'" responsive="'.$field['responsive'].'"]'); ?>
</div>