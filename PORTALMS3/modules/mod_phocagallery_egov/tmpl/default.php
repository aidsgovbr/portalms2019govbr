<?php // no direct access
defined('_JEXEC') or die('Restricted access');

if ($phocagallery_module_width !='') {
	$pgWidth ='width:'.$phocagallery_module_width.'px;';
} else {
	$pgWidth = '';
}

?>

<div id ="phocagallery-module-ri" style="<?php echo $pgWidth;?>">
	<div class="intro"><?php echo $categoria; ?></div>

	<?php
	foreach ($output as $i => $value) {
		if ($value != '' || $value) {
		echo ($i % 2) == 0 ? '<div class="row-fluid">' : "";
			echo $value;
		echo ($i % 2) == 1 ? '</div>' : "";
		}
	}
	?>

	<div class="outstanding-footer-verde" style="font-size: 12px;">
		<a class="preto" href="<?php echo $linkDestaque; ?>" title="Galeria de Imagens Destaque">
		+ DESSA GALERIA | </a>
		<a class="preto" href="<?php echo $linkCategorias; ?>" title="OUTRAS GALERIAS">
		OUTRAS GALERIAS
		</a>
	</div>
</div>

<div style="clear:both"></div>

<?php if ($tmpl['detail_window'] == 6) { ?>
	<script type="text/javascript">
		var gjaksMod<?php echo $randName ?> = new SZN.LightBox(dataJakJsMod<?php echo $randName ?>, optgjaksMod<?php echo $randName ?>);
	</script>
<?php } ?>