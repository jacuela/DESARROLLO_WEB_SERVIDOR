<?php

//EJEMPLO 2. UN ARRAY CON MULTIPLES ELEMENTOS
$lista_personas = [];
$persona = array(
    "nombre" => "Juan",
    "email" => "juan@test.com",
    "telefono" => "600111111"
);
array_push($lista_personas, $persona);

//Creamos el json
$json_lista_personas = json_encode($lista_personas, JSON_PRETTY_PRINT);

print "<pre>";
print_r($json_lista_personas);
print "<hr>";
print "</pre>";


//Vamos a trasladar este json de la lista de personas a disco
$file = 'bbdd/datos2.json';    //la carpeta bbdd debe existir
file_put_contents($file, $json_lista_personas);


//####### METEMOS UN SEGUNDO ELEMENTO
//- CARGAMOS TODOS LOS DATOS DEL ARCHIVO
//- CREAMOS UN ARRAY CON LOS DATOS
//- AÑADIMOS ELEMENTO EL ARRAY
//- CODIFICAMOS TODO EL JSON Y LO PASAMOS A DISCO

$jsonData = file_get_contents("./{$file}", FILE_USE_INCLUDE_PATH);
$lista_personas = json_decode($jsonData);

$persona = array(
    "nombre" => "Alicia",
    "email" => "alicia@test.com",
    "telefono" => "600222222"
);
array_push($lista_personas, $persona);

//Creamos el json
$json_lista_personas = json_encode($lista_personas, JSON_PRETTY_PRINT);

print "<pre>";
print_r($json_lista_personas);
print "<hr>";
print "</pre>";

//Vamos a trasladar este json de la lista de personas a disco
file_put_contents($file, $json_lista_personas);

