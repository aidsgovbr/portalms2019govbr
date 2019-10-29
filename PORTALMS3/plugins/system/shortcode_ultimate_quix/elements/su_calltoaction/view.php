<?php
	// Prepare compatibility mode prefix
	$prefix                    = su_cmpt();
	$field['animation']        = ( isset( $field['animation'] ) ) ? $field['animation'] : '';
	$classes                   = classNames( "qx-element qx-element-{$type} {$field['class']}", $visibilityClasses, ["wow {$field['animation']}" => $field['animation']]);
	
	$field['button']['target'] = ( $field['button']['target'] == 1 ) ? 'blank' : 'self' ;

	$content = '';	
	if ($field['content']) {
		$content = su_clean_shortcodes($field['content']).'[/'.$prefix.'calltoaction]';
	}

?>

<div id="<?php echo $id; ?>" class="<?php echo $classes; ?>">
	<?php echo su_do_shortcode('['.$prefix.'calltoaction align="'.$field['align'].'" title="'.$field['title'].'" title_color="'.$field['title_color'].'" button_text="'.$field['button']['text'].'" button_link="'.$field['button']['url'].'" target="'.$field['button']['target'].'" button_color="'.$field['button_color'].'" button_background="'.$field['button_background'].'" button_background_hover="'.$field['button_background_hover'].'" color="'.$field['color'].'" background="'.$field['background'].'" radius="'.$field['radius'].'" button_radius="'.$field['button_radius'].'"]'.$content); ?>
</div>