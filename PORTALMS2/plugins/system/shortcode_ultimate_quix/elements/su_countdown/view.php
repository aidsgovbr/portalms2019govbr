<?php
	// Prepare compatibility mode prefix
	$prefix             = su_cmpt();
	$field['animation'] = ( isset( $field['animation'] ) ) ? $field['animation'] : '';
	$classes            = classNames( "qx-element qx-element-{$type} {$field['class']}", $visibilityClasses, ["wow {$field['animation']}" => $field['animation']]);

	$padding     = $field['padding'];
	
	$css_padding = '';
	$css_padding .= ( isset( $padding['top'] ) AND $padding['top'] ) ? $padding['top'] . '' : '0';
	$css_padding .= ( isset( $padding['right'] ) AND $padding['right'] ) ? ' ' . $padding['right'] . '' : ' 0';
	$css_padding .= ( isset( $padding['bottom'] ) AND $padding['bottom'] ) ? ' ' . $padding['bottom'] . '' : ' 0';
	$css_padding .= ( isset( $padding['left'] ) AND $padding['left'] ) ? ' ' . $padding['left'] . '' : ' 0';
	
	$margin      = $field['margin'];
	
	$css_margin  = '';
	$css_margin  .= ( isset( $margin['top'] ) AND $margin['top'] ) ? $margin['top'] . '' : '0';
	$css_margin  .= ( isset( $margin['right'] ) AND $margin['right'] ) ? ' ' . $margin['right'] . '' : ' 0';
	$css_margin  .= ( isset( $margin['bottom'] ) AND $margin['bottom'] ) ? ' ' . $margin['bottom'] . '' : ' 0';
	$css_margin  .= ( isset( $margin['left'] ) AND $margin['left'] ) ? ' ' . $margin['left'] . '' : ' 0';

?>

<div id="<?php echo $id; ?>" class="<?php echo $classes; ?>">
	<?php echo su_do_shortcode('['.$prefix.'countdown count_date="'.$field['count_date'].'" count_time="'.$field['count_time'].'" align="'.$field['align'].'" count_size="'.$field['count_size'].'" count_color="'.$field['count_color'].'" background="'.$field['background'].'" text_color="'.$field['text_color'].'" text_align="'.$field['text_align'].'" text_size="'.$field['text_size'].'" padding="'.$css_padding.'" margin="'.$css_margin.'" radius="'.$field['radius'].'" divider="'.$field['divider'].'" divider_color="'.$field['divider_color'].'"]'.su_clean_shortcodes($field['content']).'[/'.$prefix.'countdown]'); ?>
</div>