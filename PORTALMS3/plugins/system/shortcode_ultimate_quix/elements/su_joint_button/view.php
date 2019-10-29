<?php
	// Prepare compatibility mode prefix
	$prefix             = su_cmpt();
	$field['animation'] = ( isset( $field['animation'] ) ) ? $field['animation'] : '';
	$classes            = classNames( "qx-element qx-element-{$type} {$field['class']}", $visibilityClasses, ["wow {$field['animation']}" => $field['animation']]);
	
	$field['left_btn']['target']  = (($field['left_btn']['target']) == 1 ) ? 'blank' : 'self';
	$field['right_btn']['target'] = (($field['right_btn']['target']) == 1 ) ? 'blank' : 'self';

?>

<div id="<?php echo $id; ?>" class="<?php echo $classes; ?>">
	<?php echo su_do_shortcode('['.$prefix.'joint_button left_btn_text="'.$field['left_btn']['text'].'" left_btn_url="'.$field['left_btn']['url'].'" left_btn_target="'.$field['left_btn']['target'].'" left_btn_bg="'.$field['left_btn_bg'].'" left_btn_hover_bg="'.$field['left_btn_hover_bg'].'" left_btn_color="'.$field['left_btn_color'].'" left_btn_icon="'.$field['left_btn_icon'].'" middle_txt="'.$field['middle_txt'].'" right_btn_text="'.$field['right_btn']['text'].'" right_btn_url="'.$field['right_btn']['url'].'" right_btn_target="'.$field['right_btn']['target'].'" right_btn_bg="'.$field['right_btn_bg'].'" right_btn_hover_bg="'.$field['right_btn_hover_bg'].'" right_btn_color="'.$field['right_btn_color'].'" right_btn_icon="'.$field['right_btn_icon'].'" width="'.$field['width'].'" align="'.$field['align'].'" radius="'.$field['radius'].'"]'); ?>
</div>