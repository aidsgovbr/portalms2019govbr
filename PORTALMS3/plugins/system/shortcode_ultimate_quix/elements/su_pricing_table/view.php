<?php
	// Prepare compatibility mode prefix
	$prefix             = su_cmpt();

	$field['animation'] = ( isset( $field['animation'] ) ) ? $field['animation'] : '';
	$classes            = classNames( "qx-element qx-element-{$type} {$field['class']}", $visibilityClasses, ["wow {$field['animation']}" => $field['animation']]);
	$plan_return        = array(); 
?>

<?php $plan_return[] = '['.$prefix.'pricing_table style="'.$field['style'].'"]'; ?>

<?php foreach($field['pricing_plan'] as $key => $plan): ?>

	<?php $plan['featured'] = ( $plan['featured'] == 1 ) ? 'yes' : 'no' ; ?>
	<?php 
		$icon = '';
		if (strpos($plan['icon'], 'icon:') !== false) {
			$icon = $plan['icon'];
		} elseif (strpos($plan['icon'], 'fa fa-') !== false) {
			$icon = trim(str_replace('fa fa-', '', $plan['icon']));
			$icon = 'icon: '. $icon;
		} else {
			$icon = $plan['icon'];
		}
	?>

	<?php $plan_return[] = '['.$prefix.'plan name="'.$plan['title'].'" price="'.$plan['price'].'" before="'.$plan['before'].'" after="'.$plan['after'].'" period="'.$plan['period'].'" featured="'.$plan['featured'].'" icon="'.$icon.'" icon_color="'.$plan['icon_color'].'" btn_url="'.$plan['btn_url'].'" btn_target="'.$plan['btn_target'].'" btn_text="'.$plan['btn_text'].'" btn_color="'.$plan['btn_color'].'" btn_background="'.$plan['btn_background'].'" btn_background_hover="'.$plan['btn_background_hover'].'" badge="'.$plan['badge'].'" badge_background="'.$plan['badge_background'].'" color="'.$plan['text_color'].'" background="'.$plan['background'].'"]'.su_clean_shortcodes($plan['content']).'[/'.$prefix.'plan]'; ?>
<?php endforeach; ?>


<?php $plan_return[] = '[/'.$prefix.'pricing_table]'; ?>

<div id="<?php echo $id; ?>" class="<?php echo $classes; ?>">
	<?php echo su_do_shortcode(implode("\n", $plan_return)); ?>
</div>
