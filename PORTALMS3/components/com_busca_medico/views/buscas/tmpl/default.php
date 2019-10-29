<?php
/**
 * @package     Busca
 * @subpackage  com_busca_medico
 *
 * @copyright   Copyright (C) 2013 TiagoGarcia, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access.
defined('_JEXEC') or die;
// Get the application.
$app = JFactory::getApplication();
// Get the document object.
$doc = JFactory::getDocument();
JHtml::stylesheet(JUri::base() . 'components/com_busca_medico/assets/css/styles.css', false, true, false);
JHtml::script(Juri::base() . 'components/com_busca_medico/assets/js/cidades-estados-1.2-utf8.js');
?>
<div id="preloader" style="display: none;">
	<div id="status">&nbsp;
		<div style="text-align: center;">
			Carregando dados...
		</div>
	</div>
	
</div>
<div id="principal-busca">
	<h1 class="borderHeading">Busca avançada de médicos</h1>
<p>Busca a Profissionais de Saúde, Médicos Ginecologistas e Obstetras, nas bases de dados do Cadastro Nacional de Estabelecimentos de Saúde (CNES) e de Autorização de Internação Hospitalar, para os Gestores Municipais e ou Estaduais (AIH).</p>
	<div>
		<div class="row-fluid">
			<!-- <form action="index.php/resultado-da-busca-por-medico" method="get" accept-charset="utf-8"> -->
			<form id="formulario" action="index.php/component/busca_medico/busca" method="get" accept-charset="utf-8">
				<div class="span9">
					<select class="input-xlarge" name="cod_estados" id="cod_estados" required>
						<option value="">-- Selecione um Estado --</option>
						<?php
						$ora_user = "PORTALSAUDEWEB"; 
						$ora_senha = "PORTALSAUDEWEB2106 "; 
						$ora_bd = "(DESCRIPTION=
							(ADDRESS_LIST=
								(ADDRESS=(PROTOCOL=TCP) 
									(HOST=srvoradf20-scan.saude.gov)(PORT=1521)
									)
)
(CONNECT_DATA=(SERVICE_NAME=DFDO1.SAUDE.GOV))
)";
if ($ora_conexao = oci_connect($ora_user,$ora_senha,$ora_bd) ){

	$N = "N";
	$query = "select co_uf_ibge, sg_uf from dbgeral.tb_uf order by sg_uf
	";
	$s = oci_parse($ora_conexao, $query);
	oci_execute($s);
}else{
	echo "Erro na conexão com o Oracle.";
}
while ($row = oci_fetch_assoc($s)) {
	echo '<option value="'.$row['CO_UF_IBGE'].'">'.$row['SG_UF'].'</option>';
}
?>
</select>
<select class="input-xlarge" name="cod_cidades" id="cod_cidades">
	<option value="">-- Selecione um Município --</option>
</select>
<script type="text/javascript">
jQuery(function(){
	jQuery('#cod_estados').change(function(){
		if( jQuery(this).val() ) {
			jQuery('#cod_cidades').hide();
			jQuery('.carregando').show();
			jQuery.getJSON('<?php echo Juri::base(); ?>/components/com_busca_medico/assets/json/cidades.ajax.php?search=',{cod_estados: jQuery(this).val(), ajax: 'true'}, function(j){
				var options = '<option value="">-- Selecione um Município --</option>';	
				for (var i = 0; i < j.length; i++) {
					options += '<option value="' + j[i].cod_cidades + '">' + j[i].nome + '</option>';
				}	
				jQuery('#cod_cidades').html(options).show();
				jQuery('.carregando').hide();
			});
		} else {
			jQuery('#cod_cidades').html('<option value="">– Escolha um estado –</option>');
		}
	});
});
</script>
<input name="crm" class="input-xxlarge" type="text" placeholder="Busca por CRM">
<input type="hidden" name="task" value="submit" />
<?php echo JHtml::_('form.token'); ?>

</div>
<div class="span3">
	<button type="submit" class="btn-large btn btn-primary btn-block pull-right">Buscar</button>
</div>
</form>
</div>
<p><strong>Informações Pesquisadas:</strong></p>
<p>- Parto Normal</p>
<p>- Parto Normal em Gestação de Alto Risco</p>
<p>- Parto Normal em Centro de Parto Normal (CPN)</p>
<p>- Parto Cesariano;</p>
<p>- Parto Cesariano em Gestação de Alto Risco;</p>
<p>- Parto Cesariano com Laqueadura Tubaria;</p>
<br>
<p>* Partos efetuados nos anos de 2012/2013/2014</p>
</div>
</div>
<script type="text/javascript" charset="utf-8" async defer>
jQuery(function() {
	jQuery("#formulario").submit(function() {
		jQuery('#principal-busca').fadeOut();
		jQuery('#preloader').show();
		// jQuery('#status').fadeOut(); // will first fade out the loading animation
		jQuery('#preloader').delay(350).fadeIn('slow'); // will fade out the white DIV that covers the website.
		jQuery('#principal-busca').delay(350).css({'overflow':'visible'});
		return;
	});
});
</script>