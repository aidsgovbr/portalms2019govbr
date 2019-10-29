<?php
	// Prepare compatibility mode prefix
	$prefix             = su_cmpt();
	$field['animation'] = ( isset( $field['animation'] ) ) ? $field['animation'] : '';
	$classes            = classNames( "qx-element qx-element-{$type} {$field['class']}", $visibilityClasses, ["wow {$field['animation']}" => $field['animation']]);
	
	$field['filter']    = ( $field['filter'] == 1 ) ? 'yes' : 'no' ;
	
	$source             = (isset($field['source'])) ? $field['source'] : '';
	$j_category         = rtrim(implode(',', $field['j_category']), ',');
	$k2_category        = rtrim(implode(',', $field['k2_category']), ',');

	if (!isset($field['source'])) {
		if ( $field['source_type'] == 'category' ) {
		  $source = 'category: '.$j_category;
		}
		elseif ( $field['source_type'] == 'k2-category' ) {
		  $source = 'k2-category: '.$k2_category;
		}
	}
  
?>

<div id="<?php echo $id; ?>" class="<?php echo $classes; ?>">
	<?php echo su_do_shortcode('['.$prefix.'faq source="'.$source.'" limit="'.$field['limit'].'" order="'.$field['order'].'" order_by="'.$field['order_by'].'" loading_animation="'.$field['loading_animation'].'" filter="'.$field['filter'].'" filter_animation="'.$field['filter_animation'].'"]'); ?>
</div>
