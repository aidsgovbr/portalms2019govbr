<?php
	// Prepare compatibility mode prefix
	$prefix  = su_cmpt();
	
	$classes = classNames( "qx-element qx-element-{$type} {$field['class']}", $visibilityClasses);
?>

<div id="<?php echo $id; ?>" class="<?php echo $classes; ?>">
	<?php echo su_do_shortcode('['.$prefix.'spacer size="'.$field['size'].'" medium="'.$field['medium'].'" small="'.$field['small'].'"]'); ?>
</div>