<?php
	// Prepare compatibility mode prefix
	$prefix             = su_cmpt();
	$field['animation'] = ( isset( $field['animation'] ) ) ? $field['animation'] : '';
	$classes            = classNames( "qx-element qx-element-{$type} {$field['class']} {$field['style']}", $visibilityClasses, ["wow {$field['animation']}" => $field['animation']]);
?>

<div id="<?php echo $id; ?>" class="<?php echo $classes; ?>">
	<?php echo su_do_shortcode('['.$prefix.'heading style="'.$field['style'].'" heading="'.$field['heading'].'" color="'.$field['color'].'" style_color="'.$field['style_color'].'" align="'.$field['align'].'" width="'.$field['width'].'" size="'.$field['size'].'" margin="'.$field['margin'].'"]'.$field['content'].'[/'.$prefix.'heading]');?>
</div>