<?php
	// Prepare compatibility mode prefix
	$prefix             = su_cmpt();
	$field['animation'] = ( isset( $field['animation'] ) ) ? $field['animation'] : '';
	$classes            = classNames( "qx-element qx-element-{$type} {$field['class']}", $visibilityClasses, ["wow {$field['animation']}" => $field['animation']]);
	
	$tags               = (isset($field['tags']) && $field['tags']) ? $field['tags'] : 'Hello, Text';
	$fancy_type         = (isset($field['fancy_type']) && $field['fancy_type']) ? $field['fancy_type'] : '1';
?>

<div id="<?php echo $id; ?>" class="<?php echo $classes; ?>">
	<?php echo su_do_shortcode('['.$prefix.'fancy_text tags="'.$tags.'" type="'.$fancy_type.'"]'); ?>
</div>
