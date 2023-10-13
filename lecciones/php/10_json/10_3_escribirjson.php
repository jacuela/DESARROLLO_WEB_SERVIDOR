<?php


//EJEMPLO 1. UN ARRAY CON UN ELEMENTO
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


####### METEMOS UN SEGUNDO ELEMENTO
// ESTA FOORMA DE HACERLO NO FUNCIONA, PORQUE FORMA MAL EL JSON
// PROBAR, Y LUEGO COMENTAR PARA HACERLA BIEN
$persona = array(
    "nombre" => "Alicia",
    "email" => "alicia@test.com",
    "telefono" => "600222222"
);

//Conviero el array a json. Le añado el paramereo de formato bonito. No obligatorio
$json_persona = json_encode($persona, JSON_PRETTY_PRINT);

print "<pre>";
print_r($json_persona);
print "</pre>";

//Vamos a trasladar este json de la lista de personas a disco
$file = 'bbdd/datos1.json';    //la carpeta bbdd debe existir

//Escribimos en disco, pero añadiendo. ¿Qué ocurre?? ¿Lo forma bien??? MIRAR EL RESULTADO
file_put_contents($file, $json_persona, FILE_APPEND | LOCK_EX);
