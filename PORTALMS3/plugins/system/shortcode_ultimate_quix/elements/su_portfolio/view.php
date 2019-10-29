<?php
	// Prepare compatibility mode prefix
	$prefix                         = su_cmpt();
	
	$field['animation']             = ( isset( $field['animation'] ) ) ? $field['animation'] : '';
	$classes                        = classNames( "qx-element qx-element-{$type} {$field['class']}", $visibilityClasses, ["wow {$field['animation']}" => $field['animation']]);
	
	$field['show_more']             = ( $field['show_more'] == 1 ) ? 'yes' : 'no' ;
	$field['thumb_resize']          = ( $field['thumb_resize'] == 1 ) ? 'yes' : 'no' ;
	$field['filter']                = ( $field['filter'] == 1 ) ? 'yes' : 'no' ;
	$field['filter_deeplink']       = ( $field['filter_deeplink'] == 1 ) ? 'yes' : 'no' ;
	$field['show_link']             = ( $field['show_link'] == 1 ) ? 'yes' : 'no' ;
	$field['show_zoom']             = ( $field['show_zoom'] == 1 ) ? 'yes' : 'no' ;
	$field['include_article_image'] = ( $field['include_article_image'] == 1 ) ? 'yes' : 'no' ;
	
	$source                         = (isset($field['source'])) ? $field['source'] : '';
	$j_category                     = rtrim(implode(',', $field['j_category']), ',');
	$k2_category                    = rtrim(implode(',', $field['k2_category']), ',');

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
	<?php echo su_do_shortcode('['.$prefix.'portfolio source="'.$source.'" layout="'.$field['layout'].'" style="'.$field['style'].'" limit="'.$field['limit'].'" show_more="'.$field['show_more'].'" show_more_item="'.$field['show_more_item'].'" show_more_action="'.$field['show_more_action'].'" order="'.$field['order'].'" order_by="'.$field['order_by'].'" loading_animation="'.$field['loading_animation'].'" filter_animation="'.$field['filter_animation'].'" horizontal_gap="'.$field['horizontal_gap'].'" vertical_gap="'.$field['vertical_gap'].'" thumb_resize="'.$field['thumb_resize'].'" filter="'.$field['filter'].'" filter_deeplink="'.$field['filter_deeplink'].'" filter_style="'.$field['filter_style'].'" filter_align="'.$field['filter_align'].'" show_link="'.$field['show_link'].'" show_zoom="'.$field['show_zoom'].'" include_article_image="'.$field['include_article_image'].'" small="'.$field['small'].'" medium="'.$field['medium'].'" large="'.$field['large'].'"]'); ?>
</div>



