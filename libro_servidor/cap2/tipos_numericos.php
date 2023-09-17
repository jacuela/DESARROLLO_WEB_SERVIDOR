<?php
	echo PHP_INT_SIZE.'<br>';
	echo PHP_INT_MIN.'<br>';
	echo PHP_INT_MAX.'<br>';
	$a = 0b100; // en binario
	$a = 0100;  // octal
	$a = 0x100; // hexadecimal
	$a = 3/2;   // la división entre enteros no da problemas
	echo $a.'<br>';	// 1.5	
	$b = 7.5;
	$a = (int) $b; // casting a int
	echo $a.'<br>';	// 7, se trunca		
	$b = 7e2; // notación científica
	$b = 7E2;	