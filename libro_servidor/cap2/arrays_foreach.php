<?php 
	$arr2 = array (
		"1111A" => "Juan Vera Ochoa",
		"1112A" => "Maria Mesa Cabeza",
		"1113A" => "Ana Puertas Peral"
	);		
	foreach ($arr2 as $nombre) {
		echo "$nombre <br>";		
	}
	foreach ($arr2 as $codigo => $nombre) {
		echo "Código: $codigo Nombre: $nombre <br>";		
	}