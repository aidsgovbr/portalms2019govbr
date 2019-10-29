<?php
	// Prepare compatibility mode prefix
	$prefix         = su_cmpt();
	$classes        = classNames( "qx-element qx-element-{$type} {$field['class']}", $visibilityClasses);
	
	$content        = ($field['content']) ? su_clean_shortcodes($field['content']).'[/'.$prefix.'splash]' : '' ;

	$field['close'] = ( $field['close'] == 1 ) ? 'yes' : 'no' ;
	$field['esc']   = ( $field['esc'] == 1 ) ? 'blank' : 'self' ;
	
	$padding        = $field['padding'];
	
	$css_padding    = '';
	$css_padding    .= ( isset( $padding['top'] ) AND $padding['top'] ) ? $padding['top'] . '' : '0';
	$css_padding    .= ( isset( $padding['right'] ) AND $padding['right'] ) ? ' ' . $padding['right'] . '' : ' 0';
	$css_padding    .= ( isset( $padding['bottom'] ) AND $padding['bottom'] ) ? ' ' . $padding['bottom'] . '' : ' 0';
	$css_padding    .= ( isset( $padding['left'] ) AND $padding['left'] ) ? ' ' . $padding['left'] . '' : ' 0';
	
?>

<div id="<?php echo $id; ?>" class="<?php echo $classes; ?>">
	<?php echo su_do_shortcode('['.$prefix.'splash style="'.$field['style'].'" padding="'.$css_padding.'" width="'.$field['width'].'" opacity="'.$field['opacity'].'" url="'.$field['url'].'" onclick="'.$field['onclick'].'" delay="'.$field['delay'].'" close="'.$field['close'].'" esc="'.$field['esc'].'"]'.$content); ?>
</div>