<?php
	// Prepare compatibility mode prefix
	$prefix              = su_cmpt();
	
	$field['animation']  = ( isset( $field['animation'] ) ) ? $field['animation'] : '';
	$classes             = classNames( "qx-element qx-element-{$type} {$field['class']}", $visibilityClasses, ["wow {$field['animation']}" => $field['animation']]);
	
	$field['responsive'] = ( $field['responsive'] == 1 ) ? 'yes' : 'no' ;
	
?>

<div id="<?php echo $id; ?>" class="<?php echo $classes; ?>">
	<?php echo su_do_shortcode('['.$prefix.'screenr url="'.$field['url'].'" width="'.$field['width'].'" height="'.$field['height'].'" responsive="'.$field['responsive'].'"]'); ?>
</div>