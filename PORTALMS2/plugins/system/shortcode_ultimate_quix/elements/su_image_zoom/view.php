<?php
	// Prepare compatibility mode prefix
	$prefix               = su_cmpt();
	
	$field['animation']   = ( isset( $field['animation'] ) ) ? $field['animation'] : '';
	$classes              = classNames( "qx-element qx-element-{$type} {$field['class']}", $visibilityClasses, ["wow {$field['animation']}" => $field['animation']]);
	
	$field['smooth_move'] = ( $field['smooth_move'] == 1 ) ? 'yes' : 'no' ;
	$field['preload']     = ( $field['preload'] == 1 ) ? 'yes' : 'no' ;
?>

<div id="<?php echo $id; ?>" class="<?php echo $classes; ?>">
	<?php echo su_do_shortcode('['.$prefix.'image_zoom image="'.$field['photo'].'" type="'.$field['type'].'" smooth_move="'.$field['smooth_move'].'" preload="'.$field['preload'].'" zoom_size="'.$field['zoom_size'].'" offset="'.$field['offset'].'" position="'.$field['position'].'" description="'.$field['description'].'" width="'.$field['width'].'"]'); ?>
</div>