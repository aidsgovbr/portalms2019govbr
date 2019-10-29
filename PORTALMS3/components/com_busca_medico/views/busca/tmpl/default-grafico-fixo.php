<?php
/**
 * @version     1.0.0
 * @package     com_busca_medico
 * @copyright   Copyright (C) 2015. Todos os direitos reservados.
 * @license     GNU General Public License versão 2 ou posterior; consulte o arquivo License. txt
 * @author      Fábio Nery Pinto <contato@fabionery.com.br> - http://www.fabionery.com.br
 */
// no direct access
defined('_JEXEC') or die;
// Get the document object.
$doc = JFactory::getDocument();
JHtml::stylesheet(JUri::base() . 'components/com_busca_medico/assets/css/styles.css', false, true, false);
?>
<div id="preloader" style="display: none;">
	<div id="status">&nbsp;
	<div style="text-align: center;">
		Carregando dados...
	</div>
	</div>
	
</div>
<div id="principal-busca">
	<div class="nbusca row-fluid" style="padding-bottom: 0;">
		<div class="span6"><strong>UF:</strong> <?php echo $this->item[0]['SG_UF']; ?></div>
		<div class="span6">
			<?php if ($_POST['cod_cidades']): ?>
			<strong>MUNICÍPIO: <?php echo $this->item[0]['NO_MUNICIPIO']; ?> </strong>
			<?php endif ?>
		</div>
	</div>
	<table class="category table table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th id="categorylist_header_title">
					<a href="#" onclick="Joomla.tableOrdering('a.title','asc','');return false;" class="hasTooltip" title="" data-original-title="<strong>Tecnologia</strong><br />Clique para classificar por essa coluna">Nome</a>				
				</th>
				<?php if (!$_POST['cod_cidades']): ?>
				<th id="categorylist_header_title">
					<a href="#" onclick="Joomla.tableOrdering('a.title','asc','');return false;" class="hasTooltip" title="" data-original-title="<strong>Tecnologia</strong><br />Clique para classificar por essa coluna">Município</a>				
				</th>
			<?php endif ?>

			<th id="categorylist_header_indicacao" style="width: 18%;">
				<a href="#" onclick="Joomla.tableOrdering('a.indicacao','asc','');return false;" class="hasTooltip" title="" data-original-title="<strong>Indicação</strong><br />Clique para classificar por essa coluna">CRM/UF</a>					
			</th>

		<!-- <th style="text-align: center;" id="categorylist_header_status">
			<a href="#" onclick="Joomla.tableOrdering('a.status_resumido','asc','');return false;" class="hasTooltip" title="" data-original-title="<strong>Status</strong><br />Clique para classificar por essa coluna">% Parto Normal</a>					
		</th>
		<th style="text-align: center;" id="categorylist_header_status">
			<a href="#" onclick="Joomla.tableOrdering('a.status_resumido','asc','');return false;" class="hasTooltip" title="" data-original-title="<strong>Status</strong><br />Clique para classificar por essa coluna">% Parto Cesário</a>					
		</th> -->
	</tr>
</thead>
<form name="enviaresultado" action="resultado" method="post" accept-charset="utf-8">
	<tbody>
		<?php foreach ($this->item as $key => $value) { 
			//Busca_medicoViewBusca::teste()
			?>
			<tr class="cat-list-row0">
				<td headers="categorylist_header_title" class="list-title">
					<!-- <a class="btn-link" id="enviaform" style="text-align: left;" ><?php //echo $value['NOMEPROFISSIONAL']; ?></a> -->
					<a class="enviaform" href="index.php/component/busca_medico/resultado?nu=<?php echo $value['CODIGOSUS']; ?>" ><?php echo $value['NOMEPROFISSIONAL']; ?></a>

				</td>
				<?php if (!$_POST['cod_cidades']): ?>
				<td headers="categorylist_header_indicacao" class="list-title">
					<?php echo $value['NO_MUNICIPIO']; ?>					
				</td>
				<?php endif ?>
				<td headers="categorylist_header_indicacao" class="list-title">
					<?php echo $value['NUMEROREGISTROFORMATADO']; ?>					
				</td>

				<!-- <td style="text-align: center;" headers="categorylist_header_status" class="list-title">
					--				
				</td>
				<input type="hidden" name="co_uf_ibge" value="<?php //echo $value['CODUF']; ?>">
				<td style="text-align: center;" headers="categorylist_header_status" class="list-title">
					--				
				</td> -->

			</tr>
			<?php } // end foreach ?>
			<script type="text/javascript">
			// function divFunction(cod_sus){
			// 	document.getElementsByName('co_profissional_sus').value = cod_sus;
			// 	alert(document.getElementsByName('co_profissional_sus').value);
			// 	document.enviaresultado.submit();
			// 	return true;
			// }
			</script>
			<!-- <input type="hidden" name="co_profissional_sus" value=""> -->
			<?php echo JHtml::_('form.token'); ?>
		</form>

	</tbody>
</table>
</div>
<script type="text/javascript" charset="utf-8" async defer>
jQuery(function() {
	jQuery("a.enviaform").on("click", function() {
		jQuery('#principal-busca').fadeOut();
		jQuery('#preloader').show();
		// jQuery('#status').fadeOut(); // will first fade out the loading animation
		jQuery('#preloader').delay(350).fadeIn('slow'); // will fade out the white DIV that covers the website.
		jQuery('#principal-busca').delay(350).css({'overflow':'visible'});
	});
});
</script>