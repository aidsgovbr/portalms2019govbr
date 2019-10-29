<?php
	// Prepare compatibility mode prefix
	$prefix             = su_cmpt();
	$field['animation'] = ( isset( $field['animation'] ) ) ? $field['animation'] : '';
	$classes            = classNames( "qx-element qx-element-{$type} {$field['class']}", $visibilityClasses, ["wow {$field['animation']}" => $field['animation']]);
	
	$field['inline']    = ( $field['inline'] == 1 ) ? 'yes' : 'no' ;
	
	$content            = ($field['content']) ? su_clean_shortcodes($field['content']).'[/'.$prefix.'shadow]' : '' ;

?>

<div id="<?php echo $id; ?>" class="<?php echo $classes; ?>">
	<?php echo su_do_shortcode('['.$prefix.'shadow style="'.$field['style'].'" inline="'.$field['inline'].'"]'.$content); ?>
</div>