<?php
	// Prepare compatibility mode prefix
	$prefix                      = su_cmpt();
	
	$field['animation']          = ( isset( $field['animation'] ) ) ? $field['animation'] : '';
	$classes                     = classNames( "qx-element qx-element-{$type} {$field['class']}", $visibilityClasses, ["wow {$field['animation']}" => $field['animation']]);
	
	$field['show_percent']       = ( $field['show_percent'] == 1 ) ? 'yes' : 'no' ;
	$field['progress_animation'] = ( isset( $field['progress_animation'] ) ) ? $field['progress_animation'] : '';

?>

<div id="<?php echo $id; ?>" class="<?php echo $classes; ?>">
	<?php echo su_do_shortcode('['.$prefix.'progress_bar style="'.$field['style'].'" percent="'.$field['percent'].'" show_percent="'.$field['show_percent'].'" text="'.$field['text'].'" text_color="'.$field['text_color'].'" bar_color="'.$field['bar_color'].'" fill_color="'.$field['fill_color'].'" animation="'.$field['progress_animation'].'" duration="'.$field['duration'].'" delay="'.$field['delay'].'"]'); ?>
</div>