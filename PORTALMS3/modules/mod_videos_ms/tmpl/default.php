<?php
/**
 * @package     Videos_MS
 * @subpackage  mod_videos_ms
 *
 * @copyright   Copyright (C) 2013 TiagoGarcia, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access.
defined('_JEXEC') or die;

?>
<?php
$appParams = JFactory::getApplication()->getParams();
$document = JFactory::getDocument();
$largura = $params->get('largura');
$altura = $params->get('altura');
//var_dump($list);
?>
<div class="module videos_ms">

	<?php foreach ($list as $i => $value):
	if ($i == 0){
		//verificar se exibe título
		if ($params->get('titulo_video')) {
			echo '<h4>'.$value->titulo.'</h4>';
		}

	switch ($value->tipo_video) {
		case 'youtube':
		$link = explode("v=", $value->link);
		echo '<object width="'.$largura.'" height="'.$altura.'"><param name="movie" value="http://www.youtube.com/v/'.$link[1].'"></param><param name="allowFullScreen" value="true"></param><embed src="http://www.youtube.com/v/'.$link[1].'" type="application/x-shockwave-flash" allowfullscreen="true" width="'.$largura.'" height="'.$altura.'"></embed></object>';
		break;

		case 'flv':
		$link = explode("v=", $value->link);
		echo "<div style=\"display: block; height: 305px;\">";
		echo '<a class="tamanhoVideo" href="'.JURI::root().'/'.$link[$i].'" id="player110" style="display: block; width: '.$largura.'px; height: 150px;" title=""><object width="'.$largura.'" height="'.$altura.'" id="player110_api" data="'.JURI::root().'/components/com_video_gallery/assets/swf/flowplayer-3.2.7.swf" type="application/x-shockwave-flash"><param name="allowfullscreen" value="true"><param name="allowscriptaccess" value="always"><param name="quality" value="high"><param name="cachebusting" value="false"><param name="bgcolor" value="#000000"><param name="wmode" value="transparent"><param name="flashvars" value="config={&quot;clip&quot;:{&quot;autoPlay&quot;:false,&quot;autoBuffering&quot;:true,&quot;url&quot;:&quot;'.JURI::root().'/'.$link[$i].'&quot;},&quot;playerId&quot;:&quot;player110&quot;,&quot;playlist&quot;:[{&quot;autoPlay&quot;:false,&quot;autoBuffering&quot;:true,&quot;url&quot;:&quot;'.JURI::root().'/'.$link[$i].'&quot;}]}"></object></a>';
		echo "</div>";
		break;

		default:
		break;
	}
	//verificar se descrição
		if ($params->get('descricao_video')) {
			echo $value->descricao;
		}
	?>
	<?php } ?>
<?php endforeach ?>

<?php if ($params->get('mostrar_leia_mais') == 1): ?>
	<div class="outstanding-footer-verde">
		<a class="outstanding-link" href="<?php echo $params->get('link_leia_mais'); ?>">
			<span class="text"><?php echo $params->get('text_leia_mais'); ?></span>
			<span class="icon-box">
				<i class="icon-angle-right icon-light"><span class="hide">&nbsp;</span></i>
			</span>
		</a>
	</div>
<?php endif ?>
</div>
