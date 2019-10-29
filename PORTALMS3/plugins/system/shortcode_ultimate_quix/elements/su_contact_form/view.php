<?php
	// Prepare compatibility mode prefix
	$prefix             = su_cmpt();
	$field['animation'] = ( isset( $field['animation'] ) ) ? $field['animation'] : '';
	$classes            = classNames( "qx-element qx-element-{$type} style-{$field['style']} {$field['class']}", $visibilityClasses, ["wow {$field['animation']}" => $field['animation']]);
	
	
	$field['name']      = ( $field['name'] == 1 ) ? 'yes' : 'no' ;
	$field['reset']     = ( $field['reset'] == 1 ) ? 'yes' : 'no' ;

	$margin     = $field['margin'];
	
	$css_margin = '';
	$css_margin .= ( isset( $margin['top'] ) AND $margin['top'] ) ? $margin['top'] . '' : '0';
	$css_margin .= ( isset( $margin['right'] ) AND $margin['right'] ) ? ' ' . $margin['right'] . '' : ' 0';
	$css_margin .= ( isset( $margin['bottom'] ) AND $margin['bottom'] ) ? ' ' . $margin['bottom'] . '' : ' 0';
	$css_margin .= ( isset( $margin['left'] ) AND $margin['left'] ) ? ' ' . $margin['left'] . '' : ' 0';

?>
<div id="<?php echo $id; ?>" class="<?php echo $classes; ?>">
	<?php echo su_do_shortcode('['.$prefix.'contact_form email="'.$field['email'].'" name="'.$field['name'].'" reset="'.$field['reset'].'" submit_button_text="'.$field['submit_button_text'].'" margin="'.$css_margin.'"]'); ?>
</div>