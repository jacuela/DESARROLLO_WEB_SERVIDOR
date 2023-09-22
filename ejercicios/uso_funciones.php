<?php

require_once('funciones/utilidades.php');

//#######################################################
//Probando ecuaciñón de 2º grado
$a=2;     //4
$b=1;     //2
$c=0;     //1

$solucion = ecuacion_grado_2($a, $b, $c);

print ("La ecuación $a x2+$b x+$c = 0 tiene las siguientes soluciones:<br>");
if (is_bool($solucion)){
    print "No hay soluciones"."<br>";

}
else{
    //var_dump($solucion);
    foreach ($solucion as $indice=>$valor){
        print "Solucion".($indice+1) .":".$valor."<br>";

    }

}


//#######################################################
//Probando palíndromo
