<?php
	// Prepare compatibility mode prefix
	$prefix                = su_cmpt();
	
	$field['animation']    = ( isset( $field['animation'] ) ) ? $field['animation'] : '';
	$classes               = classNames( "qx-element qx-element-{$type} {$field['class']}", $visibilityClasses, ["wow {$field['animation']}" => $field['animation']]);
	
	$field['close_button'] = ( $field['close_button'] == 1 ) ? 'yes' : 'no' ;

	$border = '';

	if ( $field['border'] == 1 ) {
		$border .= ($field['border_width']) ? $field['border_width'].'px' : '';
		$border .= ($field['border_style']) ? ' '.$field['border_style'] : '';
		$border .= ($field['border_color']) ? ' '.$field['border_color'] : '';
	}

?>

<div id="<?php echo $id; ?>" class="<?php echo $classes; ?>">
	<?php echo su_do_shortcode('['.$prefix.'modal effect="'.$field['effect'].'" button_text="'.$field['button_text'].'" button_class="'.$field['button_class'].'" close_button="'.$field['close_button'].'" title="'.$field['title'].'" title_background="'.$field['title_background'].'" title_color="'.$field['title_color'].'" background="'.$field['background'].'" color="'.$field['color'].'" border="'.$border.'" shadow="'.$field['shadow'].'" height="'.$field['height'].'" width="'.$field['width'].'" overlay_background="'.$field['overlay_background'].'"]'.su_clean_shortcodes($field['content']).'[/'.$prefix.'modal]'); ?>
</div>