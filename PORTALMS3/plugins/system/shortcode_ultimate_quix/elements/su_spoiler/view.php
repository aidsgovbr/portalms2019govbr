<?php
	// Prepare compatibility mode prefix
	$prefix             = su_cmpt();
	$field['animation'] = ( isset( $field['animation'] ) ) ? $field['animation'] : '';
	$classes            = classNames( "qx-element qx-element-{$type} {$field['class']}", $visibilityClasses, ["wow {$field['animation']}" => $field['animation']]);
	
	$field['open']      = ( $field['open'] == 1 ) ? 'yes' : 'no' ;
	
	$content            = ($field['content']) ? su_clean_shortcodes($field['content']).'[/'.$prefix.'spoiler]' : '' ;

?>

<div id="<?php echo $id; ?>" class="<?php echo $classes; ?>">
	<?php echo su_do_shortcode('['.$prefix.'spoiler style="'.$field['style'].'" icon="'.$field['icon'].'" align="'.$field['align'].'" title="'.$field['title'].'" open="'.$field['open'].'" anchor="'.$field['anchor'].'"]'.$content); ?>
</div>