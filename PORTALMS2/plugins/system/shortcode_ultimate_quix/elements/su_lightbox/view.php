<?php
	// Prepare compatibility mode prefix
	$prefix             = su_cmpt();
	$field['animation'] = ( isset( $field['animation'] ) ) ? $field['animation'] : '';
	$classes            = classNames( "qx-element qx-element-{$type} {$field['class']}", $visibilityClasses, ["wow {$field['animation']}" => $field['animation']]);

	$content     = ($field['content']) ? su_clean_shortcodes($field['content']).'[/'.$prefix.'lightbox]' : '' ;

?>

<div id="<?php echo $id; ?>" class="<?php echo $classes; ?>">
	<?php echo su_do_shortcode('['.$prefix.'lightbox src="'.$field['src'].'" type="'.$field['type'].'"]'.$content); ?>
</div>