<?php
/**
 * @package     Datasus
 * @subpackage  mod_articles_news_datasus
 *
 * @copyright
 * @license
 */

defined('_JEXEC') or die;

$helper = new ModArticlesNewsDatasusHelper();

$document = JFactory::getDocument();
$url = JUri::base() . 'modules/mod_articles_news_datasus/css/modeloA.css';
$document->addStyleSheet($url);
// var_dump($document);
// var_dump($list);
if(!empty($list)):
	$firstItem = array_shift($list);
?>
<div class="row-fluid">
	<?php foreach ($list as $key => $value){
		// var_dump($value);
	if ($key == 0) { ?>
		<div class="span6 modc-manchete">
			<h2 class="chapeu">
				<?php echo $value->xreference; ?>
			</h2>
			<h4 class="chamada">
				<a href="<?php echo $value->link; ?>" title="<?php echo $value->title; ?>">
					<?php echo $value->title; ?>
				</a>
			</h4>
			<div class="img-manchete">
				<a href="<?php echo $value->link; ?>">
					<img src="<?php echo $helper->getImageSrc($value); ?>" alt="<?php echo $value->title; ?>" title="<?php echo $value->title; ?>" />
				</a>
			</div>
		</div>

		<?php
	} else{
		?>
		<div class="span6 modc-lista">
			<h2 class="chapeu">
				<?php echo $value->xreference; ?>
			</h2>
			<h4 class="chamada">
				<a href="<?php echo $value->link; ?>" title="<?php echo $value->title; ?>">
					<?php echo $value->title; ?>
				</a>
			</h4>
		</div>
		<?php
	} //fim ifelse
} //fim do foreach
?>
</div>
<div class="newsflash_datasus_footer outstanding-header">
	<?php	if( $params->get('anotheranchor')): ?>

	<div class="readmore anotheranchor">
		<a href="<?php echo $params->get('anotheranchor') ?>" title="Leia mais" >
			<?php echo $params->get('anotheranchortext') ?>
		</a>

		<i class="icon-angle-right icon-light"></i>
	</div>

	<?php
	endif;
	?>

	<?php
	if( $params->get('readmore')):
		?>
	<div class="readmore readmorelink">
		<a href="<?php echo $params->get('readmore') ?>" title="Leia mais" >
			<?php echo $params->get('readmoretext') ?>
		</a>
	</div>

	<?php
	endif;
	?>

</div>

<?php
endif;
