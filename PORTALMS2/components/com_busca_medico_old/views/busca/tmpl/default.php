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

// echo $this->pagination->create_links();
// $this->setState('limitstart', JRequest::getVar('limitstart', JRequest::getVar('start', 0, '', 'int'), '', 'int'));
// var_dump($this->item); die;
JHtml::stylesheet(JUri::base() . 'components/com_busca_medico/assets/css/styles.css', false, true, false);
$estado = $_GET['cod_estados'];
$municipio = $_GET['cod_cidades'];
$crm = $_GET['crm'];
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
		<div class="span6 text-right">
			<?php if ($_GET['cod_cidades'] != ''): ?>
			<strong>MUNICÍPIO: <?php echo $this->item[0]['MUNICIPIO']; ?> </strong>
			<?php endif ?>
		</div>
	</div>
	<table class="category table table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th id="categorylist_header_title">
					<a href="#" onclick="Joomla.tableOrdering('a.title','asc','');return false;" class="hasTooltip" title="" data-original-title="<strong>Tecnologia</strong><br />Clique para classificar por essa coluna">Nome</a>				
				</th>
				<?php if ($_GET['cod_cidades'] == ''): ?>
				<th id="categorylist_header_title">
					<a href="#" onclick="Joomla.tableOrdering('a.title','asc','');return false;" class="hasTooltip" title="" data-original-title="<strong>Tecnologia</strong><br />Clique para classificar por essa coluna">Município</a>				
				</th>
			<?php endif ?>

			<th id="categorylist_header_indicacao" style="width: 18%;">
				<a href="#" onclick="Joomla.tableOrdering('a.indicacao','asc','');return false;" class="hasTooltip" title="" data-original-title="<strong>Indicação</strong><br />Clique para classificar por essa coluna">CRM/UF</a>					
			</th>
			<th id="categorylist_header_indicacao" style="width: 18%;">
				<a href="#" onclick="Joomla.tableOrdering('a.indicacao','asc','');return false;" class="hasTooltip" title="" data-original-title="<strong>% Parto Normal</strong><br />Clique para classificar por essa coluna">% Parto Normal</a>					
			</th>
			<th id="categorylist_header_indicacao" style="width: 18%;">
				<a href="#" onclick="Joomla.tableOrdering('a.indicacao','asc','');return false;" class="hasTooltip" title="" data-original-title="<strong>% Parto Cesária</strong><br />Clique para classificar por essa coluna">% Parto Cesária</a>					
			</th>

		<!-- <th style="text-align: center;" id="categorylist_header_status">
			<a href="#" onclick="Joomla.tableOrdering('a.status_resumido','asc','');return false;" class="hasTooltip" title="" data-original-title="<strong>Status</strong><br />Clique para classificar por essa coluna">% Parto Normal</a>					
		</th>
		<th style="text-align: center;" id="categorylist_header_status">
			<a href="#" onclick="Joomla.tableOrdering('a.status_resumido','asc','');return false;" class="hasTooltip" title="" data-original-title="<strong>Status</strong><br />Clique para classificar por essa coluna">% Parto Cesário</a>					
		</th> -->
	</tr>
</thead>
<form name="enviaresultado" action="resultado" method="get" accept-charset="utf-8">
	<tbody>
		<?php foreach ($this->item as $key => $value) { 
			//calculando o percentual do parto
			if ($value['TOTGERAL'] == NULL) {
				$percentnormal = 0;
				$percentcesaria = 0;
			} else{
				$totnormal = $value['TOTNORMAL'];
				$totgeral = $value['TOTGERAL'];
				$totcesaria = $value['TOTNORMAL'];
				$percentnormal = (($totnormal / $totgeral) * 100);
				$percentcesaria = (($totcesaria / $totgeral) * 100);
				$percentnormal = number_format($percentnormal, 1);
				$percentcesaria = number_format($percentcesaria, 1);
			}
			//Busca_medicoViewBusca::teste()
			?>
			<tr class="cat-list-row0">
				<td headers="categorylist_header_title" class="list-title">
					<!-- <a class="btn-link" id="enviaform" style="text-align: left;" ><?php //echo $value['NOMEPROFISSIONAL']; ?></a> -->
					<a class="enviaform" href="index.php/component/busca_medico/resultado?nu=<?php echo $value['CODIGOSUS']; ?>" ><?php echo $value['NOMEPROFISSIONAL']; ?></a>

				</td>
				<?php if ($_GET['cod_cidades'] == ''): ?>
				<td headers="categorylist_header_indicacao" class="list-title">
					<?php echo $value['MUNICIPIO']; ?>					
				</td>
				<?php endif ?>
				<td headers="categorylist_header_indicacao" class="list-title">
					<?php echo $value['NUMEROREGISTROFORMATADO']; ?>					
				</td>
				<td style="text-align: center;" class="list-title">
					<?php echo $percentnormal; ?>					
				</td>
				<td style="text-align: center;" class="list-title">
					<?php echo $percentcesaria; ?>					
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
<div class="pagination pagination-centered">

  <ul>
    <?php
    /******  build the pagination links ******/
    // if not on page 1, don't show back links
    if ($this->item[0]['PAGINA'] > 1) {
        // show << link to go back to page 1
        # TRYING TO CHANGE HERE AND IN OTHER ECHOS  
        #echo "<li><a href=\"{$_SERVER['PHP_SELF']}?currentpage=1\">&laquo;</a></li>";
        echo " <li><a href='{$_SERVER['PHP_SELF']}?currentpage=1'><<</a></li> ";
        // get previous page num
        $prevpage = $this->item[0]['PAGINA'] - 1;
        // show < link to go back to 1 page
        #echo " <li><a href='{$_SERVER['PHP_SELF']}?currentpage=$prevpage'><</a> ";
        echo " <li><a href='{$_SERVER['PHP_SELF']}?currentpage=$prevpage'><</a></li> ";
    } // end if

    # range of num links to show
    $range = 3;

    # loop to show links to range of pages around current page
    for ($x = ($this->item[0]['PAGINA'] - $range); $x < (($this->item[0]['PAGINA'] + $range)  + 1); $x++) {
        // if it's a valid page number...
        if (($x > 0) && ($x <= $this->item[0]['TOTALPAG'])) {
        // if we're on current page...
            if ($x == $this->item[0]['PAGINA']) {
            // 'highlight' it but don't make a link
                echo " <li class=\"disabled\"><a href=\"#\">$x</a></li> ";
        // if not current page...
        }
        else {
            // make it a link
            echo " <li><a class=\"paginacao\" href='{$_SERVER['PHP_SELF']}?currentpage=$x&cod_estados=$estado&cod_cidades=$municipio&crm=$crm'>$x</a></li> ";
        } // end else
    } // end if 
} // end for


    // if not on last page, show forward and last page links        
    if ($this->item[0]['PAGINA'] != $this->item[0]['TOTALPAG']) {
        // get next page
        $nextpage = $this->item[0]['PAGINA'] + 1;
        // echo forward link for next page 
        echo " <li><a class=\"paginacao\" href='{$_SERVER['PHP_SELF']}?currentpage=$nextpage&cod_estados=$estado&cod_cidades=$municipio&crm=$crm'>></a></li> ";
        // echo forward link for lastpage
        echo " <li><a href='{$_SERVER['PHP_SELF']}?currentpage=$this->item[0]['TOTALPAG']'>>></a></li> ";
     } // end if
     # end build pagination links 
?>
  </ul>
</div>
</div>

<form id="paginacaoForm" name="paginacaoForm" action="busca" method="get" accept-charset="utf-8">
	<input type="hidden" name="cod_estados" value="<?php echo $_GET['cod_estados']; ?>" placeholder="">
	<?php if ($_GET['cod_cidades'] != ''){ ?>
		<input type="hidden" name="cod_cidades" value="<?php echo $_GET['cod_cidades']; ?>" placeholder="">
	<?php } ?>
	<?php if ($_GET['crm']){ ?>
		<input type="hidden" name="crm" value="<?php echo $_GET['crm']; ?>" placeholder="">
	<?php } ?>
	<?php echo JHtml::_('form.token'); ?>
</form>
<!-- <div class="pagination">
	<p class="counter"> <?php //echo $this->pagination->getPagesCounter(); ?> </p>
	<?php //echo $this->pagination->getPagesLinks(); ?>
</div> -->
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