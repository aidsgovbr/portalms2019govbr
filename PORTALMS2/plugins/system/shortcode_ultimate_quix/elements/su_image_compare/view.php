<?php
	// Prepare compatibility mode prefix
	$prefix             = su_cmpt();
	
	$field['animation'] = ( isset( $field['animation'] ) ) ? $field['animation'] : '';
	$classes            = classNames( "qx-element qx-element-{$type} {$field['class']}", $visibilityClasses, ["wow {$field['animation']}" => $field['animation']]);
	
	$field['border']    = ( $field['border'] == 1 ) ? 'yes' : 'no' ;
	$field['arrows']    = ( $field['arrows'] == 1 ) ? 'yes' : 'no' ;
?>

<div id="<?php echo $id; ?>" class="<?php echo $classes; ?>">
	<?php echo su_do_shortcode('['.$prefix.'image_compare before_image="'.$field['before_image'].'" after_image="'.$field['after_image'].'" before_text="'.$field['before_text'].'" after_text="'.$field['after_text'].'" orientation="'.$field['orientation'].'" slide_on="'.$field['slide_on'].'" width="'.$field['width'].'" height="'.$field['height'].'" border="'.$field['border'].'" arrows="'.$field['arrows'].'"]'); ?>
</div>