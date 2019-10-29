<?php
	// Prepare compatibility mode prefix
	$prefix             = su_cmpt();
	$field['animation'] = ( isset( $field['animation'] ) ) ? $field['animation'] : '';
	$classes            = classNames( "qx-element qx-element-{$type} {$field['class']}", $visibilityClasses, ["wow {$field['animation']}" => $field['animation']]);
	
	$src                = (isset($field['src']) && $field['src']) ? $field['src'] : 'https://mozilla.github.io/pdf.js/web/compressed.tracemonkey-pldi-09.pdf';
	$thumbnail          = (isset($field['thumbnail']) && $field['thumbnail']) ? $field['thumbnail'] : 'plugins/system/bdthemes_shortcodes/images/pdf-thumb.svg';
	$height             = (isset($field['height']) && $field['height']) ? $field['height'] : '750';
	$duration           = (isset($field['duration']) && $field['duration']) ? $field['duration'] : '800';
	$background         = (isset($field['background']) && $field['background']) ? $field['background'] : '#777777';
	
	$webgl              = ( $field['webgl'] == 1 ) ? 'yes' : 'no' ;
	$downloadable       = ( $field['downloadable'] == 1 ) ? 'yes' : 'no' ;
	$sound              = ( $field['sound'] == 1 ) ? 'yes' : 'no' ;
	$mouse_scroll       = ( $field['mouse_scroll'] == 1 ) ? 'yes' : 'no' ;
	
	$fb_type            = $field['fb_type'];
	$title              = $field['title'];
	$tags               = $field['tags'];
?>

<div id="<?php echo $id; ?>" class="<?php echo $classes; ?>">
	<?php echo su_do_shortcode('['.$prefix.'flipbook type="'.$fb_type.'" src="'.$src.'" thumbnail="'.$thumbnail.'" title="'.$title.'" tags="'.$tags.'" webgl="'.$webgl.'" background="'.$background.'" height="'.$height.'" duration="'.$duration.'" downloadable="'.$downloadable.'" sound="'.$sound.'" mouse_scroll="'.$mouse_scroll.'"]'); ?>
</div>