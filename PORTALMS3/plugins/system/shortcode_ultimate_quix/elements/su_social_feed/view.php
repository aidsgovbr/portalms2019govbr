<?php
	// Prepare compatibility mode prefix
	$prefix             = su_cmpt();
	
	$field['animation'] = ( isset( $field['animation'] ) ) ? $field['animation'] : '';
	$classes            = classNames( "qx-element qx-element-{$type} {$field['class']}", $visibilityClasses, ["wow {$field['animation']}" => $field['animation']]);
	
	$field['facebook']  = ( $field['facebook'] == 1 ) ? 'yes' : 'no' ;
	$field['twitter']   = ( $field['twitter'] == 1 ) ? 'yes' : 'no' ;
	$field['instagram'] = ( $field['instagram'] == 1 ) ? 'yes' : 'no' ;
	$field['vkontakte'] = ( $field['vkontakte'] == 1 ) ? 'yes' : 'no' ;
	$field['pinterest'] = ( $field['pinterest'] == 1 ) ? 'yes' : 'no' ;

?>

<div id="<?php echo $id; ?>" class="<?php echo $classes; ?>">
	<?php echo su_do_shortcode('['.$prefix.'social_feed width="'.$field['width'].'" height="'.$field['height'].'" facebook="'.$field['facebook'].'" twitter="'.$field['twitter'].'" instagram="'.$field['instagram'].'" vkontakte="'.$field['vkontakte'].'" pinterest="'.$field['pinterest'].'" order="'.$field['order'].'" active_tab="'.$field['active_tab'].'" limit="'.$field['limit'].'" position="'.$field['position'].'" link_text="'.$field['link_text'].'"]'); ?>
</div>