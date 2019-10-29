<?php
	$icon_list_border = '';

	if ( $field['icon_list_border'] == 1 ) {
		$icon_list_border .= ($field['icon_list_border_width']) ? $field['icon_list_border_width'].'px' : '';
		$icon_list_border .= ($field['icon_list_border_style']) ? ' '.$field['icon_list_border_style'] : '';
		$icon_list_border .= ($field['icon_list_border_color']) ? ' '.$field['icon_list_border_color'] : '';
	}
?>

#<?php echo $id;?> {
  <?php Css::prop( 'background', $field['background'] );?>
  <?php Css::padding($field['icon_list_padding']);?>
  <?php Css::prop( 'border', $icon_list_border );?>
}