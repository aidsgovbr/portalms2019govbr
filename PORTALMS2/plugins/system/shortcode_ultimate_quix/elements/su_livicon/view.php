<?php
	// Prepare compatibility mode prefix
	$prefix             = su_cmpt();
	
	$field['animation'] = ( isset( $field['animation'] ) ) ? $field['animation'] : '';
	$classes            = classNames( "qx-element qx-element-{$type} {$field['class']}", $visibilityClasses, ["wow {$field['animation']}" => $field['animation']]);

	$border = '';

	if ( $field['border'] == 1 ) {
		$border .= ($field['border_width']) ? $field['border_width'].'px' : '';
		$border .= ($field['border_style']) ? ' '.$field['border_style'] : '';
		$border .= ($field['border_color']) ? ' '.$field['border_color'] : '';
	}

	$field['animate'] = ( $field['animate'] == 1 ) ? 'yes' : 'no' ;
	$field['loop']    = ( $field['loop'] == 1 ) ? 'yes' : 'no' ;
	$field['parent']  = ( $field['parent'] == 1 ) ? 'yes' : 'no' ;
	
	$padding          = $field['padding'];
	
	$css_padding      = '';
	$css_padding      .= ( isset( $padding['top'] ) AND $padding['top'] ) ? $padding['top'] . '' : '0';
	$css_padding      .= ( isset( $padding['right'] ) AND $padding['right'] ) ? ' ' . $padding['right'] . '' : ' 0';
	$css_padding      .= ( isset( $padding['bottom'] ) AND $padding['bottom'] ) ? ' ' . $padding['bottom'] . '' : ' 0';
	$css_padding      .= ( isset( $padding['left'] ) AND $padding['left'] ) ? ' ' . $padding['left'] . '' : ' 0';
	
	$margin           = $field['margin'];
	
	$css_margin       = '';
	$css_margin       .= ( isset( $margin['top'] ) AND $margin['top'] ) ? $margin['top'] . '' : '0';
	$css_margin       .= ( isset( $margin['right'] ) AND $margin['right'] ) ? ' ' . $margin['right'] . '' : ' 0';
	$css_margin       .= ( isset( $margin['bottom'] ) AND $margin['bottom'] ) ? ' ' . $margin['bottom'] . '' : ' 0';
	$css_margin       .= ( isset( $margin['left'] ) AND $margin['left'] ) ? ' ' . $margin['left'] . '' : ' 0';

?>

<div id="<?php echo $id; ?>" class="<?php echo $classes; ?>">
	<?php echo su_do_shortcode('['.$prefix.'livicon icon="'.$field['icon'].'" size="'.$field['size'].'" background_color="'.$field['background_color'].'" color="'.$field['color'].'" hover_color="'.$field['hover_color'].'" event_type="'.$field['event_type'].'" animate="'.$field['animate'].'" loop="'.$field['loop'].'" parent="'.$field['parent'].'" duration="'.$field['duration'].'" iteration="'.$field['iteration'].'" url="'.$field['url'].'" target="'.$field['target'].'" border="'.$border.'" radius="'.$field['radius'].'" padding="'.$css_padding.'" margin="'.$css_margin.'"]')?>
</div>