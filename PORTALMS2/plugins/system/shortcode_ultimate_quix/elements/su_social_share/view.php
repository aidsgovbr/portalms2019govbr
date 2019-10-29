<?php
	// Prepare compatibility mode prefix
	$prefix              = su_cmpt();
	
	$field['animation']  = ( isset( $field['animation'] ) ) ? $field['animation'] : '';
	$classes             = classNames( "qx-element qx-element-{$type} {$field['class']}", $visibilityClasses, ["wow {$field['animation']}" => $field['animation']]);
	
	$field['facebook']   = ( $field['facebook'] == 1 ) ? 'yes' : 'no' ;
	$field['twitter']    = ( $field['twitter'] == 1 ) ? 'yes' : 'no' ;
	$field['googleplus'] = ( $field['googleplus'] == 1 ) ? 'yes' : 'no' ;
	$field['vk']         = ( $field['vk'] == 1 ) ? 'yes' : 'no' ;
	$field['linkedin']   = ( $field['linkedin'] == 1 ) ? 'yes' : 'no' ;
	$field['pinterest']  = ( $field['pinterest'] == 1 ) ? 'yes' : 'no' ;
	$field['tumblr']     = ( $field['tumblr'] == 1 ) ? 'yes' : 'no' ;
	$field['pocket']     = ( $field['pocket'] == 1 ) ? 'yes' : 'no' ;
	$field['ok']         = ( $field['ok'] == 1 ) ? 'yes' : 'no' ;

?>

<div id="<?php echo $id; ?>" class="<?php echo $classes; ?>">
	<?php echo su_do_shortcode('['.$prefix.'social_share facebook="'.$field['facebook'].'" twitter="'.$field['twitter'].'" googleplus="'.$field['googleplus'].'" vk="'.$field['vk'].'" linkedin="'.$field['linkedin'].'" pinterest="'.$field['pinterest'].'" tumblr="'.$field['tumblr'].'" pocket="'.$field['pocket'].'" ok="'.$field['ok'].'"]'); ?>
</div>