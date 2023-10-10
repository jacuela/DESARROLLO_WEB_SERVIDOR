<?php


//EJEMPLO 1. UN ARRAY CON UN OBJETO
$persona = array(
    "nombre" => "Juan",
    "email" => "juan@test.com",
    "telefono" => "600111111"
);

//Conviero el array a json. Le añado el paramereo de formato bonito. No obligatorio
$json_persona = json_encode($persona, JSON_PRETTY_PRINT);

print "<pre>";
print_r($json_persona);
print "</pre>";

//Vamos a trasladar este json de la lista de personas a disco
$file = 'bbdd/datos1.json';    //la carpeta bbdd debe existir

//Escribimos en disco. 
file_put_contents($file, $json_persona);





//EJEMPLO 2. UN ARRAY CON MULTIPLES OBJETOS
$lista_personas = [];
$persona = array(
    "nombre" => "Juan",
    "email" => "juan@test.com",
    "telefono" => "600111111"
);
array_push($lista_personas, $persona);
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
print "</pre>";


//Vamos a trasladar este json de la lista de personas a disco
$file = 'bbdd/datos2.json';    //la carpeta bbdd debe existir
file_put_contents($file, $json_lista_personas);

//Ojo con usar el APPEND pq puede crearme mal formado el json
//Probar a usar el mismo archivo para la persona y para la lista de personas
//file_put_contents($file, $json_lista_personas, FILE_APPEND | LOCK_EX);