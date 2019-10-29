<?php
	// Prepare compatibility mode prefix
	$prefix             = su_cmpt();
	
	$field['animation'] = ( isset( $field['animation'] ) ) ? $field['animation'] : '';
	$classes            = classNames( "qx-element qx-element-{$type} {$field['class']}", $visibilityClasses, ["wow {$field['animation']}" => $field['animation']]);
	
	$field['icon']      = ( $field['icon'] == 1 ) ? 'yes' : 'no' ;
?>

<div id="<?php echo $id; ?>" class="<?php echo $classes; ?>">
	<?php echo su_do_shortcode('['.$prefix.'note style="'.$field['style'].'" type="'.$field['type'].'" icon="'.$field['icon'].'" radius="'.$field['radius'].'"]'.su_clean_shortcodes($field['content']).'[/'.$prefix.'note]'); ?>
</div>
