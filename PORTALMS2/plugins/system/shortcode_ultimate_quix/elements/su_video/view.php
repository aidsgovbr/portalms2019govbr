<?php
	// Prepare compatibility mode prefix
	$prefix             = su_cmpt();
	$field['animation'] = ( isset( $field['animation'] ) ) ? $field['animation'] : '';
	$classes            = classNames( "qx-element qx-element-{$type} {$field['class']}", $visibilityClasses, ["wow {$field['animation']}" => $field['animation']]);
	
	$field['controls']  = ( $field['controls'] == 1 ) ? 'yes' : 'no' ;
	$field['autoplay']  = ( $field['autoplay'] == 1 ) ? 'yes' : 'no' ;
	$field['loop']      = ( $field['loop'] == 1 ) ? 'yes' : 'no' ;

?>

<div id="<?php echo $id; ?>" class="<?php echo $classes; ?>">
	<?php echo su_do_shortcode('['.$prefix.'video style="'.$field['style'].'" url="'.$field['url'].'" poster="'.$field['poster'].'" title="'.$field['title'].'" width="'.$field['width'].'" height="'.$field['height'].'" controls="'.$field['controls'].'" autoplay="'.$field['autoplay'].'" loop="'.$field['loop'].'" volume="'.$field['volume'].'"]'); ?>
</div>