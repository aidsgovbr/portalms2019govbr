<?php
	// Prepare compatibility mode prefix
	$prefix                 = su_cmpt();
	
	$field['animation']     = ( isset( $field['animation'] ) ) ? $field['animation'] : '';
	$classes                = classNames( "qx-element qx-element-{$type} {$field['class']}", $visibilityClasses, ["wow {$field['animation']}" => $field['animation']]);
	
	$field['profile_image'] = ( $field['profile_image'] == 1 ) ? 'yes' : 'no' ;
	$field['date']          = ( $field['date'] == 1 ) ? 'yes' : 'no' ;
	$field['arrows']        = ( $field['arrows'] == 1 ) ? 'yes' : 'no' ;
	$field['pagination']    = ( $field['pagination'] == 1 ) ? 'yes' : 'no' ;
	$field['autoplay']      = ( $field['autoplay'] == 1 ) ? 'yes' : 'no' ;
	$field['loop']          = ( $field['loop'] == 1 ) ? 'yes' : 'no' ;
?>

<div id="<?php echo $id; ?>" class="<?php echo $classes; ?>">
	<?php echo su_do_shortcode('['.$prefix.'twitter source="'.$field['source'].'" search="'.$field['search'].'" transitionin="'.$field['transitionin'].'" transitionout="'.$field['transitionout'].'" font_size="'.$field['font_size'].'" profile_image="'.$field['profile_image'].'" date="'.$field['date'].'" limit="'.$field['limit'].'" arrows="'.$field['arrows'].'" pagination="'.$field['pagination'].'" autoplay="'.$field['autoplay'].'" speed="'.$field['speed'].'" delay="'.$field['delay'].'" loop="'.$field['loop'].'"]'); ?>
</div>