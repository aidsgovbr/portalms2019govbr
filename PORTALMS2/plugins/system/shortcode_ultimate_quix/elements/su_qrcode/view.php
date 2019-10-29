<?php
	// Prepare compatibility mode prefix
	$prefix             = su_cmpt();
	
	$field['animation'] = ( isset( $field['animation'] ) ) ? $field['animation'] : '';
	$classes            = classNames( "qx-element qx-element-{$type} {$field['class']}", $visibilityClasses, ["wow {$field['animation']}" => $field['animation']]);
?>

<div id="<?php echo $id; ?>" class="<?php echo $classes; ?>">
	<?php echo su_do_shortcode('['.$prefix.'qrcode data="'.$field['data'].'" title="'.$field['title'].'" size="'.$field['size'].'" margin="'.$field['margin'].'" align="'.$field['align'].'" link="'.$field['link'].'" target="'.$field['target'].'" color="'.$field['color'].'" background="'.$field['background'].'"]'); ?>
</div>