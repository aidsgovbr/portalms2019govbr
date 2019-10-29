<?php
	// Prepare compatibility mode prefix
	$prefix             = su_cmpt();

	$field['animation'] = ( isset( $field['animation'] ) ) ? $field['animation'] : '';
	$classes            = classNames( "qx-element qx-element-{$type} {$field['class']}", $visibilityClasses, ["wow {$field['animation']}" => $field['animation']]);

	$content            = (isset($field['content']) && $field['content']) ? $field['content'].'[/'.$prefix.'frame]' : '';

	$align              = $field['align'];

?>

<div id="<?php echo $id; ?>" class="<?php echo $classes; ?>">
	<?php echo su_do_shortcode('['.$prefix.'frame align="'.$align.'"]'.su_clean_shortcodes($content)); ?>
</div>