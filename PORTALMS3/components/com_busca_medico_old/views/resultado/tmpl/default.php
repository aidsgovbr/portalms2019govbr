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
// var_dump($this->parto_total);
JHtml::stylesheet(JUri::base() . 'components/com_busca_medico/assets/css/styles.css', false, true, false);
?>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
<!-- Preloader -->
<div id="preloader">
    <div id="status">&nbsp;</div>
</div>
<h1 class="borderHeading" style="font-size: 1.05em;">
	<?php echo $this->item[0]['NOMEPROFISSIONAL']; ?> - CRM	
	<?php echo $this->item[0]['NUMEROREGISTROFORMATADO']; ?> 
</h1>
<div class="row-fluid" style="padding-bottom: 0">
	<div>
			<b>Nome Completo:</b>  <?php echo $this->item[0]['NOMEPROFISSIONAL']; ?><br/>
			<b>Especialidade:</b>  <?php echo $this->item[0]['ESPECIALIDADE']; ?>
			<!-- <li style="list-style: none !important;" class="conitec_article01"><b>Especialidade:</b> Reumatologia</li> -->
		<div class="row-fluid" style="padding-bottom: 0">
			<div class="span6" style="min-height: 0;"><b>Estado:</b> <?php echo $this->item[0]['UF']; ?> </div>
			<div class="span6" style="min-height: 0;"><b>Município:</b> <?php echo $this->item[0]['MUNICIPIO']; ?> </div>
		</div>
		<div class="row-fluid" style="padding-bottom: 0">
			<div class="span6" style="min-height: 0;"><b>CRM:</b> <?php echo $this->item[0]['NUMEROREGISTROFORMATADO']; ?> </div>
			<div class="span6" style="min-height: 0;"><b>CNS:</b> <?php echo $this->item[0]['CODIGOCNS']; ?> </div>
		</div>
	</div>
</div>
<hr>
<div class="row-fluid" style="padding-bottom: 0">
	<div class="span12" style="min-height: 0;">
		<strong>Estabelecimento(s)</strong>
	</div>
</div>
	<?php foreach ($this->estabelecimento as $key => $value): ?>
<div class="row-fluid" style="padding-bottom: 0;">
	<?php //var_dump($value); ?>
	<div class="span12" style="min-height: 0;">
		<a href="#myModal<?php echo $key ?>" role="button" data-toggle="modal"><?php echo $value['DESCRICAO']; ?></a>
		<div id="myModal<?php echo $key ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-header">
		    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		    <h3 id="myModalLabel"><?php echo $value['DESCRICAO']; ?></h3>
		  </div>
		  <div class="modal-body row-fluid">
		    <div class="span12">
		    	<strong>Endereço</strong>: <?php echo $value['LOGADOURO'].", ".$value['ENDERECO'].", ".$value['BAIRRO']; ?><br />
		    	<strong>UF</strong>: <?php echo $value['UF']; ?><br />
		    	<strong>Município</strong>: <?php echo $value['MUNICIPIO']; ?><br />
		    	<strong>Telefone</strong>: <?php echo $value['TELEFONE']; ?><br />

		    </div>
		    
		    	<?php
		    	// editando cep
		    	$cep = $value['CEP'];
		    	$cep = substr($cep, 0, 5)."-".substr($cep, -3, 3);
		    	?>
		    	<p>
		    		<a class="googlemaps" href="https://www.google.com.br/maps/place/<?php echo $cep; ?>" target="_blank">Google Maps</a>
		    </p>
		  </div>
		  <div class="modal-footer">
		    <button class="btn" data-dismiss="modal" aria-hidden="true">fechar</button>
		  </div>
		</div>
	</div>
</div>
<?php endforeach ?>
<hr>
<p>Resumo de atendimento dos últimos 3 anos apresentados em gráficos:</p>
<script type="text/javascript" src="https://www.google.com/jsapi?autoload={'modules':[{'name':'visualization','version':'1.1','packages':['corechart']}]}"></script>
	<div class="row-fluid">
		<div class="span5">
			<div id="pizza" style="width: 400px; height: 250px;"></div>
		</div>
		<div class="span7">
			<div id="linha" style="width: 400px; height: 250px;"></div> 
		</div>
	</div>
	<?php
	// Busca_medicoViewResultado::grafico();
	?>
	<script type='text/javascript'>//<![CDATA[ 

			google.setOnLoadCallback(drawChart);
      google.setOnLoadCallback(drawVisualization);
      
      function drawChart() {

          var data = google.visualization.arrayToDataTable([
              ['Tipo', 'Qtd'],
              ['Normal', <?php echo (isset($this->parto_total[0]['TOTNORMAL']))? $this->parto_total[0]['TOTNORMAL'] : "0" ; ?>],
              ['Cesária', <?php echo (isset($this->parto_total[0]['TOTCESARIA']))? $this->parto_total[0]['TOTCESARIA'] : "0" ; ?>]
          ]);

          var options = {
              title: 'Partos AIH - Total Geral',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('pizza'));
        chart.draw(data, options);
      }
      
				function drawVisualization() {
				  // Some raw data (not necessarily accurate)
				  var data = google.visualization.arrayToDataTable([
				    ['Ano', 'Normal', 'Cesária'],
				    ['2011',  <?php echo (isset($this->parto_por_ano[0]['N2011']))? $this->parto_por_ano[0]['N2011'] : "0" ; ?>,      <?php echo (isset($this->parto_por_ano[0]['C2011']))? $this->parto_por_ano[0]['C2011'] : "0"; ?>],
				    ['2012',  <?php echo (isset($this->parto_por_ano[0]['N2012']))? $this->parto_por_ano[0]['N2012'] : "0" ; ?>,      <?php echo (isset($this->parto_por_ano[0]['C2012']))? $this->parto_por_ano[0]['C2012'] : "0"; ?>],
				    ['2013',  <?php echo (isset($this->parto_por_ano[0]['N2013']))? $this->parto_por_ano[0]['N2013'] : "0" ; ?>,      <?php echo (isset($this->parto_por_ano[0]['C2013']))? $this->parto_por_ano[0]['C2013'] : "0"; ?>],
				    ['2014',  <?php echo (isset($this->parto_por_ano[0]['N2014']))? $this->parto_por_ano[0]['N2014'] : "0" ; ?>,      <?php echo (isset($this->parto_por_ano[0]['C2014']))? $this->parto_por_ano[0]['C2014'] : "0"; ?>],
				  ]);
				
				  var options = {
				    title : 'Partos AIH - Total Ano',
				    vAxis: {title: "Qtd"},
				    hAxis: {title: "Ano"},
				    seriesType: "line",
				  };
				
				  var chart = new google.visualization.ComboChart(document.getElementById('linha'));
				  chart.draw(data, options);
				} 
//]]>  

</script>

<script type="text/javascript">
	//<![CDATA[
		jQuery(window).ready(function() { // makes sure the whole site is loaded
			jQuery('#status').fadeOut(); // will first fade out the loading animation
			jQuery('#preloader').delay(350).fadeOut('slow'); // will fade out the white DIV that covers the website.
			jQuery('body').delay(350).css({'overflow':'visible'});
		})
	//]]>
</script> 