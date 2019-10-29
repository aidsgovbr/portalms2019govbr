<?php
	// Prepare compatibility mode prefix
	$prefix             = su_cmpt();

	$field['animation'] = ( isset( $field['animation'] ) ) ? $field['animation'] : '';
	$classes            = classNames( "qx-element qx-element-{$type} {$field['class']}", $visibilityClasses, ["wow {$field['animation']}" => $field['animation']]);
	
?>

<div id="<?php echo $id; ?>" class="<?php echo $classes; ?>">
	<?php echo su_do_shortcode('['.$prefix.'trailer_box style="'.$field['style'].'" image="'.$field['image'].'" color="'.$field['color'].'" background="'.$field['background'].'" title="'.$field['title'].'" title_color="'.$field['title_color'].'" title_size="'.$field['title_size'].'" align="'.$field['align'].'" radius="'.$field['radius'].'" url="'.$field['url'].'" target="'.$field['target'].'"]'.su_clean_shortcodes($field['content']).'[/'.$prefix.'trailer_box]'); ?>
</div>