<?php
	$arr1 = [
		0 => 444,
		1 => 222,
		2 => 333,
	];
	print_r($arr1);
	echo "<br>" . "pos 0: " . $arr1[0] . "<br>";
	$arr1[0] = 555;
	print_r($arr1);
	echo "<br>";
	$arr2 = array (
		"1111A" => "Juan Vera Ochoa",
		"1112A" => "Maria Mesa Cabeza",
		"1113A" => "Ana Puertas Peral"
	);		
	$arr2["1113A"] = "Ana Puertas Segundo";
