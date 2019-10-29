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
$url = JUri::base() . 'modules/mod_articles_news_datasus/css/modeloB.css';
$document->addStyleSheet($url);


if(!empty($list)):
	$firstItem = array_shift($list);
?>


<div class="newsflash_datasus_divB">
	<div class="newsflash_datasus_highlight">
		<div class="newsflash_datasus_col1">
			<div class="newsflash_datasus_title">
				<?php $link = $firstItem->link; ?>
				<a href="<?php echo $link ?>">
					<?php echo $firstItem->title; ?>
				</a>
			</div>

			<?php
			echo '<img src="'.$helper->getImageSrc($firstItem).'" />';
			?>
		</div>

		<div class="newsflash_datasus_col2">
			<?php if(!empty($list)):
				$secondItem = array_shift($list);
				$helper->clearImage($secondItem->introtext); ?>

			<p class="newsflash_datasus_title">
				<?php $link = $secondItem->link; ?>
				<a href="<?php echo $link ?>">
					<?php echo $secondItem->title; ?>
				</a>
			</p>
			<p class="newsflash_datasus_intro"><?php echo $helper->simplify($secondItem->introtext); ?></p>

			<?php endif; ?>
		</div>
	</div>

	<div class="newsflash_datasus_2columns">
		<div class="newsflash_datasus_col1">
			<ul>
				<?php
				$count = ceil(count($list)/2);

				for($i=0; $i < $count; $i++):

					$item = $list[$i];

				$helper->clearImage($item->introtext);
				?>
				<li>

					<p class="newsflash_datasus_title">
						<?php
						$link = $item->link;
						?>
						<a href="<?php echo $link ?>">
							<?php echo $item->title; ?>
						</a>
					</p>

					<p class="newsflash_datasus_intro"><?php echo $helper->simplify($item->introtext); ?></p>

				</li>

				<?php
				endfor;
				?>

			</ul>
		</div>

		<div class="newsflash_datasus_col2">
			<ul>

				<?php
				for($i=$count; $i < count($list); $i++):

					$item = $list[$i];
					$helper->clearImage($item->introtext);
				?>

				<li>
					<p class="newsflash_datasus_title">
						<?php
						$link = $item->link;
						?>
						<a href="<?php echo $link ?>">
							<?php echo $item->title; ?>
						</a>
					</p>
					<p class="newsflash_datasus_intro"><?php echo $helper->simplify($item->introtext); ?></p>
				</li>


				<?php
				endfor;
				?>

			</ul>
		</div>
	</div>
</div>


<div class="newsflash_datasus_footer outstanding-header">
	<?php	if( $params->get('anotheranchor')): ?>

	<div class="readmore anotheranchor">
		<a href="<?php echo $params->get('anotheranchor') ?>" >
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
		<a href="<?php echo $params->get('readmore') ?>" >
			<?php echo $params->get('readmoretext') ?>
		</a>
	</div>

	<?php
	endif;
	?>

</div>
<?php
endif;
