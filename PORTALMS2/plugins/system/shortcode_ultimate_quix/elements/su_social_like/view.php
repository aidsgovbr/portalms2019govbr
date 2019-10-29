<?php
	// Prepare compatibility mode prefix
	$prefix             = su_cmpt();
	
	$field['animation'] = ( isset( $field['animation'] ) ) ? $field['animation'] : '';
	$classes            = classNames( "qx-element qx-element-{$type} {$field['class']}", $visibilityClasses, ["wow {$field['animation']}" => $field['animation']]);
	
?>

<div id="<?php echo $id; ?>" class="<?php echo $classes; ?>">
	<?php echo su_do_shortcode('['.$prefix.'social_like button="'.$field['button'].'" button_animation="'.$field['button_animation'].'"]'); ?>
</div>