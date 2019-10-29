<?php
	// Prepare compatibility mode prefix
	$prefix                 = su_cmpt();
	
	$field['animation']     = ( isset( $field['animation'] ) ) ? $field['animation'] : '';
	$classes                = classNames( "qx-element qx-element-{$type} {$field['class']}", $visibilityClasses, ["wow {$field['animation']}" => $field['animation']]);
	
	$field['pie_animation'] = ( isset( $field['pie_animation'] ) ) ? $field['pie_animation'] : '';
	
?>

<div id="<?php echo $id; ?>" class="<?php echo $classes; ?>">
	<?php echo su_do_shortcode('['.$prefix.'progress_pie percent="'.$field['percent'].'" before="'.$field['before'].'" text="'.$field['text'].'" after="'.$field['after'].'" text_size="'.$field['text_size'].'px" line_width="'.$field['line_width'].'" line_cap="'.$field['line_cap'].'" bar_color="'.$field['bar_color'].'" fill_color="'.$field['fill_color'].'" text_color="'.$field['text_color'].'" animation="'.$field['pie_animation'].'" duration="'.$field['duration'].'" delay="'.$field['delay'].'" dash_array="'.$field['dash_array'].'"]'); ?>
</div>