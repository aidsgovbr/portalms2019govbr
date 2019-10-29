<?php
	// Prepare compatibility mode prefix
	$prefix             = su_cmpt();
	$field['animation'] = ( isset( $field['animation'] ) ) ? $field['animation'] : '';
	$classes            = classNames( "qx-element qx-element-{$type} {$field['class']}", $visibilityClasses, ["wow {$field['animation']}" => $field['animation']]);
	
	$field['pull']      = ( $field['pull'] == 1 ) ? 'yes' : 'no' ;
	$field['italic']    = ( $field['italic'] == 1 ) ? 'blank' : 'self' ;
	
	$content            = ($field['content']) ? su_clean_shortcodes($field['content']).'[/'.$prefix.'blockquote]' : '' ;

?>

<div id="<?php echo $id; ?>" class="<?php echo $classes; ?>">
	<?php echo su_do_shortcode('['.$prefix.'blockquote font="'.$field['font'].'" cite="'.$field['cite'].'" url="'.$field['url'].'" align="'.$field['align'].'" pull="'.$field['pull'].'" italic="'.$field['italic'].'"]'.$content); ?>
</div>