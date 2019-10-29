<?php
/**
 * @package     Instagram
 * @subpackage  mod_instagram
 */

// No direct access.
defined('_JEXEC') or die;

// Configurações
define('ID_USER', $params->get('usuario'));
define('TOKEN_USER', $params->get('chave_key'));
define('QNT_IMAGENS', $params->get('qtd_imagens', '4'));
define('TAMANHO_IMAGENS', $params->get('miniatura', 'thumbnail')); //thumbnail | low_resolution | standard_resolution
$miniatura = $params->get('miniatura');
if ($miniatura == 'thumbnail') {
	$miniatura = "142";
}
if ($miniatura == 'low_resolution') {
	$miniatura = "media";
}
if ($miniatura == 'standard_resolution') {
	$miniatura = "grande";
}

//DEFINE A COR E BORDA DA DIV
define('BG_GERAL', $params->get('cor_background','#FFFFFF'));
define('COR_BORDA', $params->get('cor_borda','#F6F6F6'));

//DEFINE A LARGURA E ALTURA DA DIV
define('LARGURA', $params->get('largura','313'));
define('ALTURA', $params->get('altura','313'));

//DEFINE O SPAN DA DIV, CASO DEIXE VAZIO ELE USA OS VALORES DE LARGURA E ALTURA.
define('SPAN', $params->get('span'));

//DEFINE A IMAGEM TERÁ LINK PARA O INSTAGRAM OU NÃO. (true | false)
$link = ($params->get('link') == 1 ) ? 'true' : 'false';
define('LINK', $link);

?>
<script src="modules/mod_instagram/media/js/instafeed.min.js" type="text/javascript"></script><noscript>&nbsp;<!-- item para fins de acessibilidade --></noscript>
<script type="text/javascript">
var userFeed = new Instafeed({
	get: 'user',
	userId: <?php echo ID_USER; ?>,
	accessToken: <?php echo "'".TOKEN_USER."'"; ?>,
	links: <?php echo $link; ?>,
	limit: <?php echo QNT_IMAGENS; ?>,
	resolution: <?php echo "'".TAMANHO_IMAGENS."'"; ?> ,
	useHttp: true

});
userFeed.run();
</script>

<style>
div#instafeed img{
	margin: 3px;
	width: <?php echo $miniatura; ?>px;
}
.geralInsta{
	background-color: <?php echo BG_GERAL; ?>;
	border: 2px solid <?php echo COR_BORDA; ?>;
}
.tamanhoDiv{
	width: <?php echo LARGURA.'px'; ?>;
	height: <?php echo ALTURA.'px'; ?>;
}
</style>



<div class="geralInsta <?php echo $tamanho = (SPAN == '')? 'tamanhoDiv' : SPAN ;?> <?php echo $moduleclass_sfx; ?>">
	<div id="instafeed"></div>
</div>

