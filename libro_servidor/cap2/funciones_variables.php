<?php
	$var1 = 4;
	$var2 = NULL;
	$var3 = FALSE;
	$var4 = 0;
	echo "var 1";
	var_dump(isset($var1));    // TRUE
	var_dump(is_null($var1));  // FALSE
	var_dump(empty($var1));    // FALSE
	echo "var 2";
	var_dump(isset($var2));	   // FALSE
	var_dump(is_null($var2));  // TRUE
	var_dump(empty($var2));    // TRUE
	echo "var 3";
	var_dump(isset($var3));    // TRUE
	var_dump(is_null($var3));  // FALSE
	var_dump(empty($var3));    // TRUE
	echo "var 4";
	var_dump(empty($var4));    // TRUE, EL 0 COMO BOOLEAN ES FALSE
	echo "unset";
	unset($var1);
	var_dump(isset($var1));	   // FALSE
