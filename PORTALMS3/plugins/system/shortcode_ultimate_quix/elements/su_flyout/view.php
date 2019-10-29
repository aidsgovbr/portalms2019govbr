<?php
	// Prepare compatibility mode prefix
	$prefix                  = su_cmpt();
	$field['animation']      = ( isset( $field['animation'] ) ) ? $field['animation'] : '';
	$classes                 = classNames( "qx-element qx-element-{$type} {$field['class']}", $visibilityClasses, ["wow {$field['animation']}" => $field['animation']]);
	
	$field['show_close']     = ( $field['show_close'] == 1 ) ? 'yes' : 'no' ;
	$field['adblock_notice'] = ( $field['adblock_notice'] == 1 ) ? 'yes' : 'no' ;
?>

<div id="<?php echo $id; ?>" class="<?php echo $classes; ?>">
	<?php echo su_do_shortcode('['.$prefix.'flyout style="'.$field['style'].'" dimension="'.$field['dimension'].'" position="'.$field['position'].'" offset="'.$field['offset'].'" transition_in="'.$field['transition_in'].'" transition_out="'.$field['transition_out'].'" show_close="'.$field['show_close'].'" close_style="'.$field['close_style'].'" adblock_notice="'.$field['adblock_notice'].'" ]'.su_clean_shortcodes($field['content']).'[/'.$prefix.'flyout]'); ?>
</div>