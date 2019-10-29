<?php
	// Prepare compatibility mode prefix
	$prefix             = su_cmpt();

	$field['animation'] = ( isset( $field['animation'] ) ) ? $field['animation'] : '';
	$classes            = classNames( "qx-element qx-element-{$type} {$field['class']}", $visibilityClasses, ["wow {$field['animation']}" => $field['animation']]);
	
	$url    = $field['url'];
	$color  = $field['color'];
	$size   = $field['size'];


	if ($field['icon_type'] == 'fontawesome') {
		$icon = (isset($field['icon_fontawesome']) && $field['icon_fontawesome']) ? trim(str_replace('fa fa-', '', 'icon:'.$field['icon_fontawesome'])) : 'icon:home';
	}elseif ($field['icon_type'] == 'lineicon') {
		$icon = (isset($field['icon_lineicon']) && $field['icon_lineicon']) ? 'licon:'.$field['icon_lineicon'] : 'licon:home';
	}else {
		$icon = $field['icon_image'] ;			
	}

?>

<div id="<?php echo $id; ?>" class="<?php echo $classes; ?>">
	<?php echo su_do_shortcode('['.$prefix.'icon icon="'.$icon.'" url="'.$url.'" background="transparent" color="'.$color.'" size="'.$size.'" padding="0px" margin="0px"]'); ?>
</div>