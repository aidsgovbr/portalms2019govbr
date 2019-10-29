<?php
	// Prepare compatibility mode prefix
	$prefix             = su_cmpt();
	$field['animation'] = ( isset( $field['animation'] ) ) ? $field['animation'] : '';
	$classes            = classNames( "qx-element qx-element-{$type} {$field['class']}", $visibilityClasses, ["wow {$field['animation']}" => $field['animation']]);
	
	if ( $field['border'] == 1 ) {
		$border .= ($field['border_width']) ? $field['border_width'].'px' : '';
		$border .= ($field['border_style']) ? ' '.$field['border_style'] : '';
		$border .= ($field['border_color']) ? ' '.$field['border_color'] : '';
	}

	$content     = ($field['content']) ? su_clean_shortcodes($field['content']).'[/'.$prefix.'photo_panel]' : '' ;

?>

<div id="<?php echo $id; ?>" class="<?php echo $classes; ?>">
	<?php echo su_do_shortcode('['.$prefix.'photo_panel background="'.$field['background'].'" color="'.$field['color'].'" border="'.$border.'" shadow="'.$field['shadow'].'" radius="'.$field['radius'].'" text_align="'.$field['text_align'].'" photo="'.$field['photo'].'" alt="'.$field['alt'].'" url="'.$field['url'].'"]'.$content); ?>
</div>