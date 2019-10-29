<?php
	// Prepare compatibility mode prefix
	$prefix               = su_cmpt();

	$field['animation']   = ( isset( $field['animation'] ) ) ? $field['animation'] : '';
	$classes              = classNames( "qx-element qx-element-{$type} {$field['class']}", $visibilityClasses, ["wow {$field['animation']}" => $field['animation']]);
	
	$field['close']       = ( $field['close'] == 1 ) ? 'yes' : 'no' ;
	$field['mobile']      = ( $field['mobile'] == 1 ) ? 'yes' : 'no' ;
	$field['demo_mode']   = ( $field['demo_mode'] == 1 ) ? 'yes' : 'no' ;
	$field['guest_only']  = ( $field['guest_only'] == 1 ) ? 'yes' : 'no' ;
	$field['facebook']    = ( $field['facebook'] == 1 ) ? 'yes' : 'no' ;
	$field['google_plus'] = ( $field['google_plus'] == 1 ) ? 'yes' : 'no' ;
	$field['twitter']     = ( $field['twitter'] == 1 ) ? 'yes' : 'no' ;

?>

<div id="<?php echo $id; ?>" class="<?php echo $classes; ?>">
	<?php echo su_do_shortcode('['.$prefix.'social_locker style="'.$field['style'].'" overlap="'.$field['overlap'].'" title="'.$field['title'].'" message="'.$field['message'].'" timer="'.$field['timer'].'" close="'.$field['close'].'" mobile="'.$field['mobile'].'" demo_mode="'.$field['demo_mode'].'" guest_only="'.$field['guest_only'].'" facebook="'.$field['facebook'].'" google_plus="'.$field['google_plus'].'" twitter="'.$field['twitter'].'" url="'.$field['url'].'"]'.su_clean_shortcodes($field['content']).'[/'.$prefix.'social_locker]'); ?>
</div>