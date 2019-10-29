<?php
	// Prepare compatibility mode prefix
	$prefix             = su_cmpt();
	
	$field['animation'] = ( isset( $field['animation'] ) ) ? $field['animation'] : '';
	$classes            = classNames( "qx-element qx-element-{$type} {$field['class']}", $visibilityClasses, ["wow {$field['animation']}" => $field['animation']]);
	
	$field['gap']       = ( $field['gap'] == 1 ) ? 'yes' : 'no' ;

?>

<div id="<?php echo $id; ?>" class="<?php echo $classes; ?>">
	<?php echo su_do_shortcode('['.$prefix.'instagram user="'.$field['user'].'" hash_tag="'.$field['hash_tag'].'" client_id="'.$field['client_id'].'" limit="'.$field['limit'].'" column="'.$field['column'].'" medium="'.$field['medium'].'" small="'.$field['small'].'" link_type="'.$field['link_type'].'" gap="'.$field['gap'].'"]'); ?>
</div>