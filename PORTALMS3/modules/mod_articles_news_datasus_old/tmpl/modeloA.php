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


	if(!empty($list)):
		$firstItem = array_shift($list);
?>


<div class="newsflash_datasus_divA">
	<div class="newsflash_datasus_highlight">
		<div class="newsflash_datasus_title">
			<?php
			 	$link = $firstItem->alias?$firstItem->alias:'?id='.$firstItem->id;
			?>
			<a href="<?php echo $link ?>">
				<?php echo $firstItem->title; ?>
			</a>
		</div>
		<div class="newsflash_datasus_intro">

			<?php

				$helper->clearImage($firstItem->introtext);

				echo $helper->simplify($firstItem->introtext);

			?>

		</div>
		<?php
			if(!empty($list)):
				$secondItem = array_shift($list);
		?>
	</div>

	<div class="newsflash_datasus_2columns">
		<div class="newsflash_datasus_col1">


			<p class="newsflash_datasus_title">
				<?php
				 	$link =  JUri::base() . ($secondItem->alias)? ('/'.$secondItem->alias) : ('?id='.$secondItem->id);
				?>
				<a href="<?php echo $link ?>">
					<?php echo $secondItem->title; ?>
				</a>
			</p>
			<?php 
				echo '<img src="'.$helper->getImageSrc($secondItem).'" />';
			?>

			<p class="newsflash_datasus_intro"><?php echo $helper->simplify($secondItem->introtext); ?></p>

		</div>

		<div class="newsflash_datasus_col2">
			<ul>

				<?php
					foreach($list as $item):

						$helper->clearImage($item->introtext);
				?>
				
				<li>				

					<p class="newsflash_datasus_title">
						<?php
						 	$link =  JUri::base() . ($item->alias)? ('/'.$item->alias) : ('?id='.$item->id);
						?>
						<a href="<?php echo $link ?>">
							<?php echo $item->title; ?>
						</a>
					</p>

					<p class="newsflash_datasus_intro"><?php echo $helper->simplify($item->introtext); ?></p>

				</li>
				

				<?php 
					endforeach; 
				?>

			</ul>
		</div>

		
	</div>

	<?php endif; ?>

</div>

<div class="newsflash_datasus_footer outstanding-header">

	<?php
		if( $params->get('readmore')):
	?>
	<div class="readmore">
		<a href="<?php echo $params->get('readmore') ?>" > 
			<?php echo $params->get('readmoretext') ?> 
		</a>
		
		<i class="icon-angle-right icon-light"></i>
	</div>

	<?php
		endif;
	?>

</div>

<?php
	endif;
