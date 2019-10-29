<?php
	// Prepare compatibility mode prefix
	$prefix             = su_cmpt();
	$field['animation'] = ( isset( $field['animation'] ) ) ? $field['animation'] : '';
	$classes            = classNames( "qx-element qx-element-{$type} {$field['class']}", $visibilityClasses, ["wow {$field['animation']}" => $field['animation']]);
	
	$content            = ($field['content']) ? su_clean_shortcodes($field['content']).'[/'.$prefix.'user_content]' : '' ;

?>

<div id="<?php echo $id; ?>" class="<?php echo $classes; ?>">
	<?php echo su_do_shortcode('['.$prefix.'user_content message="'.$field['message'].'" color="'.$field['color'].'" login_text="'.$field['login_text'].'" login_url="'.$field['login_url'].'"]'.$content); ?>
</div>