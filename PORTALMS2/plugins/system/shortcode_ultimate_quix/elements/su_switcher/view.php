<?php
	// Prepare compatibility mode prefix
	$prefix                = su_cmpt();

	$field['pl_animation'] = ( isset( $field['pl_animation'] ) ) ? $field['pl_animation'] : '';
	$classes               = classNames( "qx-element qx-element-{$type} {$field['class']}", $visibilityClasses, ["wow {$field['pl_animation']}" => $field['pl_animation']]);
?>

<?php $switcher_return = array(); ?>

<?php $switcher_return[] = '['.$prefix.'switcher style="'.$field['style'].'" position="'.$field['position'].'" align="'.$field['align'].'" active="'.$field['active'].'" animation="'.$field['animation'].'"]'; ?>

<?php foreach($field['switcher_item'] as $key => $item): ?>
	<?php
		$icon = '';
		if (strpos($item['icon'], 'icon:') !== false) {
			$icon = $item['icon'];
		} elseif (strpos($item['icon'], 'fa fa-') !== false) {
			$icon = trim(str_replace('fa fa-', '', $item['icon']));
			$icon = 'icon: '. $icon;
		}
	?>
	<?php $switcher_return[] = '['.$prefix.'switcher_item title="'.$item['title'].'" icon="'.$icon.'"]'.su_clean_shortcodes($item['content']).'[/'.$prefix.'switcher_item]'; ?>
<?php endforeach; ?>


<?php $switcher_return[] = '[/'.$prefix.'switcher]'; ?>

<div id="<?php echo $id; ?>" class="<?php echo $classes; ?>">
	<?php echo su_do_shortcode(implode("\n", $switcher_return)); ?>
</div>
