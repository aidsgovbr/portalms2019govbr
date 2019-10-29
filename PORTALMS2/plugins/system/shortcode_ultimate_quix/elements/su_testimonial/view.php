<?php
	// Prepare compatibility mode prefix
	$prefix             = su_cmpt();

	$field['animation'] = ( isset( $field['animation'] ) ) ? $field['animation'] : '';
	$classes            = classNames( "qx-element qx-element-{$type} {$field['class']}", $visibilityClasses, ["wow {$field['animation']}" => $field['animation']]);
	
	$field['italic']    = ( $field['italic'] == 1 ) ? 'yes' : 'no' ;
	
?>

<div id="<?php echo $id; ?>" class="<?php echo $classes; ?>">
	<?php echo su_do_shortcode('['.$prefix.'testimonial style="'.$field['style'].'" name="'.$field['name'].'" title="'.$field['title'].'" photo="'.$field['photo'].'" company="'.$field['company'].'" url="'.$field['url'].'" target="'.$field['target'].'" italic="'.$field['italic'].'" radius="'.$field['radius'].'" color="'.$field['color'].'" background="'.$field['background'].'" border_color="'.$field['border_color'].'"]'.su_clean_shortcodes($field['content']).'[/'.$prefix.'testimonial]');
	 ?>
</div>