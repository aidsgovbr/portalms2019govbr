<?php
	// Prepare compatibility mode prefix
	$prefix              = su_cmpt();
	
	$field['animation']  = ( isset( $field['animation'] ) ) ? $field['animation'] : '';
	$classes             = classNames( "qx-element qx-element-{$type} {$field['class']}", $visibilityClasses, ["wow {$field['animation']}" => $field['animation']]);
	
	$field['show_label'] = ( $field['show_label'] == 1 ) ? 'yes' : 'no' ;
	$field['navigation'] = ( $field['navigation'] == 1 ) ? 'yes' : 'no' ;
	$field['intro_text'] = ( $field['intro_text'] == 1 ) ? 'yes' : 'no' ;
	$field['autoplay']   = ( $field['autoplay'] == 1 ) ? 'yes' : 'no' ;
?>

<div id="<?php echo $id; ?>" class="<?php echo $classes; ?>">
	<?php echo su_do_shortcode('['.$prefix.'news_ticker source="'.$field['source'].'" limit="'.$field['limit'].'" show_label="'.$field['show_label'].'" label="'.$field['label'].'" navigation="'.$field['navigation'].'" intro_text="'.$field['intro_text'].'" intro_text_limit="'.$field['intro_text_limit'].'" order="'.$field['order'].'" order_by="'.$field['order_by'].'" transition="'.$field['transition'].'" autoplay="'.$field['autoplay'].'" delay="'.$field['delay'].'" target="'.$field['target'].'"]'); ?>
</div>
 