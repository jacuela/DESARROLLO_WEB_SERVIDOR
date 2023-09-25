<?php

$datos = ["Santiago", "Ramón y Cajal", 1852]; //dintintos tipos
print "$datos[1] nacio en $datos[2]"."<br>";

var_dump($datos);
print "<br>";
print_r($datos);

print "<pre>";
print_r($datos);
print "</pre>";



$matriz=[];
$matriz[]="primer elemento"; //si no indico indice, añado al final.
                //Esto es el antiguo $array_push(matriz,valor)


$matriz[]="segundo elemento"; 
var_dump($matriz);


//####### Matrices asociativas
print '<hr>';
$edades = ["Andrés" => 21, "Bárbara" => 19, "Camilo" => 21];

print "<p>Bárbara tiene $edades[Bárbara] años</p>\n";
print "<p>Camilo tiene {$edades["Camilo"]} años</p>\n";
print "<p>Bárbara tiene " . $edades["Bárbara"] . " años</p>\n";



//Recorrido
foreach ($edades as $clave=>$valor){
    print "$clave tiene $valor años."."<br>";
}

//Tamaño del array
print '<br>';
print "El array es de tamaño ".sizeof($edades);
print '<br>';

print "Lista de edades:"."<br>";
foreach ($edades as $valor){
    print "$valor años"."<br>";
}



//########Otras cosas
print '<hr>';
$matriz = [5 => 25, -1 => "negativo", "número 1" => "cinco"];

print "<pre>\n"; print_r($matriz); print "</pre>\n";
unset($matriz[5]); //eliminar un elemento
print "<pre>\n"; print_r($matriz); print "</pre>\n";

//unset($matriz); //borro contenido de la matriz
$matriz=[];
print "<pre>\n"; print_r($matriz); print "</pre>\n"; 

unset($matriz); //borro toda la matriz. No sale nada.
print "<pre>\n"; print_r($matriz); print "</pre>\n"; 

$javi="Javi";
print "$javi"."<br>";
unset($javi);
print "$javi"."<br>";




//#####copia y unión de matrices
print '<hr>';

//Copia de matrices
$cuadrados = [5 => 25, 9 => 81];
$cuadradosCopia = $cuadrados;  //copia por VALOR, no por REFERENCIA
$cuadrados[] = 100;  //en que posición añade el valor??????

print "<p>Matriz inicial (modificada):</p>\n";
print "<pre>"; print_r($cuadrados); print "</pre>";

print "<p>Copia de la matriz inicial (sin modificar):</p>";
print "<pre>"; print_r($cuadradosCopia); print "</pre>";

//Union de matrices
$nombres_1 = ["Alba"];
$nombres_2 = ["Antonio", "Bárbara", "Carlos"];
print "<pre>"; print_r($nombres_1 + $nombres_2); print "</pre>\n";


//Union de matrices asociativas
$dias1 = ["Lunes"=>1,"Martes"=>2,"Mierc"=>3,"Jueves"=>4,"Viernes"=>5];
$dias2 = ["Sabado"=>6,"Domingo"=>7];
$dias = $dias1+$dias2;
print "<pre>"; print_r($dias); print "</pre>\n";




