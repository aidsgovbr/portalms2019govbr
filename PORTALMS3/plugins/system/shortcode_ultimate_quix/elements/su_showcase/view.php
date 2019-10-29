<?php
	// Prepare compatibility mode prefix
	$prefix             = su_cmpt();
	
	$field['animation'] = ( isset( $field['animation'] ) ) ? $field['animation'] : '';
	$classes            = classNames( "qx-element qx-element-{$type} {$field['class']}", $visibilityClasses, ["wow {$field['animation']}" => $field['animation']]);

	$field['show_more']             = ( $field['show_more'] == 1 ) ? 'yes' : 'no' ;
	$field['thumb_resize']          = ( $field['thumb_resize'] == 1 ) ? 'yes' : 'no' ;
	$field['filter']                = ( $field['filter'] == 1 ) ? 'yes' : 'no' ;
	$field['filter_deeplink']       = ( $field['filter_deeplink'] == 1 ) ? 'yes' : 'no' ;
	$field['page_deeplink']         = ( $field['page_deeplink'] == 1 ) ? 'yes' : 'no' ;
	$field['filter_counter']        = ( $field['filter_counter'] == 1 ) ? 'yes' : 'no' ;
	$field['popup_category']        = ( $field['popup_category'] == 1 ) ? 'yes' : 'no' ;
	$field['popup_date']            = ( $field['popup_date'] == 1 ) ? 'yes' : 'no' ;
	$field['popup_image']           = ( $field['popup_image'] == 1 ) ? 'yes' : 'no' ;
	$field['popup_detail_button']   = ( $field['popup_detail_button'] == 1 ) ? 'yes' : 'no' ;
	$field['include_article_image'] = ( $field['include_article_image'] == 1 ) ? 'yes' : 'no' ;

	$source      = (isset($field['source'])) ? $field['source'] : '';
	$j_category  = rtrim(implode(',', $field['j_category']), ',');
	$k2_category = rtrim(implode(',', $field['k2_category']), ',');

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
	<?php echo su_do_shortcode('['.$prefix.'showcase source="'.$source.'" layout="'.$field['layout'].'" limit="'.$field['limit'].'" show_more="'.$field['show_more'].'" show_more_item="'.$field['show_more_item'].'" show_more_action="'.$field['show_more_action'].'" order="'.$field['order'].'" order_by="'.$field['order_by'].'" loading_animation="'.$field['loading_animation'].'" filter_animation="'.$field['filter_animation'].'" caption_style="'.$field['caption_style'].'" horizontal_gap="'.$field['horizontal_gap'].'" vertical_gap="'.$field['vertical_gap'].'" thumb_resize="'.$field['thumb_resize'].'" filter="'.$field['filter'].'" filter_align="'.$field['filter_align'].'" filter_deeplink="'.$field['filter_deeplink'].'" page_deeplink="'.$field['page_deeplink'].'" filter_style="'.$field['filter_style'].'" filter_counter="'.$field['filter_counter'].'" item_link="'.$field['item_link'].'" popup_position="'.$field['popup_position'].'" popup_category="'.$field['popup_category'].'" popup_date="'.$field['popup_date'].'" popup_image="'.$field['popup_image'].'" popup_detail_button="'.$field['popup_detail_button'].'" include_article_image="'.$field['include_article_image'].'" small="'.$field['small'].'" medium="'.$field['medium'].'" large="'.$field['large'].'"]'); ?>
</div>