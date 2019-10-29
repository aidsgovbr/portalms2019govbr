<?php
	// Prepare compatibility mode prefix
	$prefix             = su_cmpt();
	$field['animation'] = ( isset( $field['animation'] ) ) ? $field['animation'] : '';
	$classes            = classNames( "qx-element qx-element-{$type} {$field['class']}", $visibilityClasses, ["wow {$field['animation']}" => $field['animation']]);

	$expiration_day     = (isset($field['expiration_day']) && $field['expiration_day']) ? $field['expiration_day'] : '7';
	$cycle              = (isset($field['cycle']) && $field['cycle']) ? $field['cycle'] : '0';
	$content            = (isset($field['content']) && $field['content']) ? $field['content'].'[/'.$prefix.'exit_popup]' : '';

	$always_visible     = ( $field['always_visible'] == 1 ) ? 'yes' : 'no';
	$auto               = ( $field['auto'] == 1 ) ? 'yes' : 'no';

	$background         = $field['background'];
	$color              = $field['color'];
	$border             = $field['border'];
	$shadow             = $field['shadow'];
	$height             = $field['height'];
	$width              = $field['width'];
	$overlay_background = $field['overlay_background'];
	$radius             = $field['radius'];
?>

<div id="<?php echo $id; ?>" class="<?php echo $classes; ?>">
	<?php echo su_do_shortcode('['.$prefix.'exit_popup background="'.$background.'" color="'.$color.'" border="'.$border.'" radius="'.$radius.'" shadow="'.$shadow.'" height="'.$height.'" width="'.$width.'" overlay_background="'.$overlay_background.'" expiration_day="'.$expiration_day.'" always_visible="'.$always_visible.'" auto="'.$auto.'" cycle="'.$cycle.'"]'.su_clean_shortcodes($content)); ?>
</div>