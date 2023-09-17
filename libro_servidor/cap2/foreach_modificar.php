<?php
	$arr1 = array(
		"Viernes" => 22,
		"Sábado" => 34
	);
	/* no modifica el array */
	foreach ($arr1 as $cantidad) {
		$cantidad = $cantidad * 2;		
	}
	print_r($arr1);
	echo "<br>";
	/* modifica el array */
	foreach ($arr1 as &$cantidad) {
		$cantidad = $cantidad * 2;			
	}	
	print_r($arr1);