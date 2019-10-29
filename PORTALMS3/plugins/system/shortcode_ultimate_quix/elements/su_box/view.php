<?php
	// Prepare compatibility mode prefix
	$prefix             = su_cmpt();
	$field['animation'] = ( isset( $field['animation'] ) ) ? $field['animation'] : '';
	$classes            = classNames( "qx-element qx-element-{$type} {$field['class']}", $visibilityClasses, ["wow {$field['animation']}" => $field['animation']]);

	$content     = ($field['content']) ? su_clean_shortcodes($field['content']).'[/'.$prefix.'box]' : '' ;

?>

<div id="<?php echo $id; ?>" class="<?php echo $classes; ?>">
	<?php echo su_do_shortcode('['.$prefix.'box style="'.$field['style'].'" title="'.$field['title'].'" title_color="'.$field['title_color'].'" box_color="'.$field['box_color'].'" radius="'.$field['radius'].'"]'.$content); ?>
</div>