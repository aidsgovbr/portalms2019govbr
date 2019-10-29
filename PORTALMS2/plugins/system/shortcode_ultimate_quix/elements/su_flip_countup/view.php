<?php
	// Prepare compatibility mode prefix
	$prefix             = su_cmpt();
	$field['animation'] = ( isset( $field['animation'] ) ) ? $field['animation'] : '';
	$classes            = classNames( "qx-element qx-element-{$type} {$field['class']}", $visibilityClasses, ["wow {$field['animation']}" => $field['animation']]);
	
	$field['time_name'] = ( $field['time_name'] == 1 ) ? 'yes' : 'no' ;

?>

<div id="<?php echo $id; ?>" class="<?php echo $classes; ?>">
	<?php echo su_do_shortcode('['.$prefix.'flip_countup datetime="'.$field['datetime'].'" count_size="'.$field['count_size'].'" count_color="'.$field['count_color'].'" text="'.$field['text'].'" time_name="'.$field['time_name'].'" prefix="'.$field['prefix'].'" suffix="'.$field['suffix'].'" layout="'.$field['layout'].'" align="'.$field['align'].'"]'); ?>
</div>