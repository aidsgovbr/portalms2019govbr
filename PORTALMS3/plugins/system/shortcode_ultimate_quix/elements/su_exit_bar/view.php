<?php
	// Prepare compatibility mode prefix
	$prefix             = su_cmpt();
	$field['animation'] = ( isset( $field['animation'] ) ) ? $field['animation'] : '';
	$classes            = classNames( "qx-element qx-element-{$type} {$field['class']}", $visibilityClasses, ["wow {$field['animation']}" => $field['animation']]);
	
	$cycle              = (isset($field['cycle']) && $field['cycle']) ? $field['cycle'] : '0';
	$expiration_day     = (isset($field['expiration_day']) && $field['expiration_day']) ? $field['expiration_day'] : '7';
	$content            = (isset($field['content']) && $field['content']) ? $field['content'].'[/'.$prefix.'exit_bar]' : '';
	
	$always_visible     = ( $field['always_visible'] == 1 ) ? 'yes' : 'no';
	$auto               = ( $field['auto'] == 1 ) ? 'yes' : 'no';
	
	$class              = $field['class'];
	$background         = $field['background'];
	$color              = $field['color'];
	$title              = $field['title'];
	$title_color        = $field['title_color'];
	$width              = $field['width'];
?>

<div id="<?php echo $id; ?>" class="<?php echo $classes; ?>">
	<?php echo su_do_shortcode('['.$prefix.'exit_bar background="'.$background.'" color="'.$color.'" title="'.$title.'" title_color="'.$title_color.'" width="'.$width.'" expiration_day="'.$expiration_day.'" always_visible="'.$always_visible.'" auto="'.$auto.'" cycle="'.$cycle.'"]'.su_clean_shortcodes($content)); ?>
</div>