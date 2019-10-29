<?php
	header( 'Cache-Control: no-cache' );
	header( 'Content-type: application/xml; charset="utf-8"', true );

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


	$cod_estados = $_REQUEST['cod_estados'];
	// $cod_estados = mysql_real_escape_string( $_REQUEST['cod_estados'] );

	$cidades = array();
	if ($ora_conexao = oci_connect($ora_user,$ora_senha,$ora_bd) ){
	$N = "N";
	$query = "select co_municipio_ibge, co_uf_ibge, sg_uf,no_municipio from dbgeral.tb_municipio where co_uf_ibge='$cod_estados' order by no_municipio
	";
	// $query .= "where co_uf_ibge =". $cod_estados;
	$s = oci_parse($ora_conexao, $query);
	oci_execute($s);
	}else{
	echo "Erro na conexão com o Oracle.";
	}

	while ( $row = oci_fetch_assoc($s) ) {
		$cidades[] = array(
			'cod_cidades'	=> $row['CO_MUNICIPIO_IBGE'],
			'nome'			=> $row['NO_MUNICIPIO'],
		);
	}

	echo( json_encode( $cidades ) );