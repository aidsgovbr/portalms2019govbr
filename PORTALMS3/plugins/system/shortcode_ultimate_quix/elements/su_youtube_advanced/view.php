<?php
	// Prepare compatibility mode prefix
	$prefix                  = su_cmpt();
	
	$field['animation']      = ( isset( $field['animation'] ) ) ? $field['animation'] : '';
	$classes                 = classNames( "qx-element qx-element-{$type} {$field['class']}", $visibilityClasses, ["wow {$field['animation']}" => $field['animation']]);
	
	$field['controls']       = ( $field['controls'] == 1 ) ? 'yes' : 'no' ;
	$field['autohide']       = ( $field['autohide'] == 1 ) ? 'yes' : 'no' ;
	$field['showinfo']       = ( $field['showinfo'] == 1 ) ? 'yes' : 'no' ;
	$field['responsive']     = ( $field['responsive'] == 1 ) ? 'yes' : 'no' ;
	$field['autoplay']       = ( $field['autoplay'] == 1 ) ? 'yes' : 'no' ;
	$field['loop']           = ( $field['loop'] == 1 ) ? 'yes' : 'no' ;
	$field['rel']            = ( $field['rel'] == 1 ) ? 'yes' : 'no' ;
	$field['fs']             = ( $field['fs'] == 1 ) ? 'yes' : 'no' ;
	$field['modestbranding'] = ( $field['modestbranding'] == 1 ) ? 'yes' : 'no' ;

?>

<div id="<?php echo $id; ?>" class="<?php echo $classes; ?>">
	<?php echo su_do_shortcode('['.$prefix.'youtube_advanced url="'.$field['url'].'" playlist="'.$field['playlist'].'" width="'.$field['width'].'" height="'.$field['height'].'" controls="'.$field['controls'].'" autohide="'.$field['autohide'].'" showinfo="'.$field['showinfo'].'" responsive="'.$field['responsive'].'" autoplay="'.$field['autoplay'].'" loop="'.$field['loop'].'" rel="'.$field['rel'].'" fs="'.$field['fs'].'" modestbranding="'.$field['modestbranding'].'" theme="'.$field['theme'].'" wmode="'.$field['wmode'].'"]'); ?>
</div>