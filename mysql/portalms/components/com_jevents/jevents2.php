<?php

$dir = "C:\\xampp\htdocs\portalms";

define( '_JEXEC', 1 );
define( 'JPATH_BASE', $dir);
define( 'DS', '/' ); // barra padrao UNIX
//define( 'DS', '\\' ); // barra padrao windows

require_once( JPATH_BASE  .DS . 'configuration.php'); 
require_once ( JPATH_BASE .DS . 'includes'.DS.'defines.php' );
require_once ( JPATH_BASE .DS . 'includes'.DS.'framework.php' );

$db  = JFactory::getDbo();
$query = $db->getQuery(true);	
$db->setQuery("SELECT * FROM `pmgov2013_jevents_vevdetail` 
INNER JOIN `pmgov2013_jevents_vevent` ON `pmgov2013_jevents_vevent`.`detail_id` = `pmgov2013_jevents_vevdetail`.`evdet_id`
WHERE  `pmgov2013_jevents_vevent`.`catid`=1191 ORDER BY `pmgov2013_jevents_vevdetail`.`modified` DESC");	

$results = $db->loadObjectList();

//echo "<pre>";
//print_r($results); die();

foreach ($results as $item) {
	echo $item->modified . "<br/>";
	echo $item->summary  . "<br/>";
	echo $item->description  . "<br/>";
	echo "<hr/>";
}



	// Criação do download
	if(!empty($_GET['download'])) :	
	
		$fileName =	"agenda.txt"; 
		$path = JPATH_BASE ."//tmp";		

		$conteudo = "testeconteudo123";
				
		//TENTA ABRIR O ARQUIVO TXT
		if (!$fp = fopen($path."/".$fileName,"w")){
		$retorno = "ERRO AO ABRIR";
		}else{
			if (!fwrite($fp,$conteudo)){
				$retorno = "ERRO AO ESCREVER";
			}else{
				//FECHA O ARQUIVO
				fclose($fp);
				
				// FAZ DOWNLOAD
				header("Content-Type: application/force-download");
				header("Content-type: application/octet-stream;");
				header("Content-Length: " . filesize( $path."/".$fileName) );
				header("Content-disposition: attachment; filename=" . $fileName );
				header("Pragma: no-cache");
				header("Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0");
				header("Expires: 0");
    		
				readfile( $path."/".$fileName);
				flush();								
			}			
		}		
		//die();
		
		// Envia o arquivo Download
		//readfile($local_arquivo);
		//exit;
	
		include_once(JPATH_SITE."/components/com_jevents/jevents.defines.php");
		$datamodel =new JEventsDataModel();		
		$data = $datamodel->queryModel->listIcalEventsByMonth( $view->year, $view->month);					
		foreach($data as $dtaItem){
			//print_r($dtaItem->_description);
			$dataOut[$dtaItem->_publish_up]['data_evento'] = $dtaItem->_publish_up;
			$dataOut[$dtaItem->_publish_up]['titulo'] = $dtaItem->_title;
			$dataOut[$dtaItem->_publish_up]['conteudo'] = $dtaItem->_content;
		}		
	
	endif;