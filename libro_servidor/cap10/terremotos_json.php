<?php 
    $fichero = new DOMDocument();
	$fichero->load( "http://www.ign.es/ign/RssTools/sismologia.xml");
	$salida = array(); 
	$terremotos = $fichero->getElementsByTagName("item");
    foreach($terremotos as $entry) {
		$nuevo = array();
		$nuevo["title"] = $entry->getElementsByTagName("title")[0]->nodeValue;
		$nuevo["lat"] =  $entry->getElementsByTagName("lat")[0]->nodeValue;
		$nuevo["lng"] =  $entry->getElementsByTagName("long")[0]->nodeValue;		
		$salida[] = $nuevo;
    }
	echo json_encode($salida);
