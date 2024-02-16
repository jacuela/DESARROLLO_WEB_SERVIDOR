<?php


print("<p><strong>Lista de array asociativo. Se accede con [key]</strong></p>");

$lista1 = array();

array_push(
    $lista1,
    [
        "nombre" => "Juan",
        "apellidos" => "Cano"
    ]
);

array_push(
    $lista1,
    [
        "nombre" => "Pepa",
        "apellidos" => "Pig"
    ]
);



print("<pre>");
print_r($lista1);
print("</pre>");


print("<p><strong>JSON a pelo</strong></p>");

$json = json_encode($lista1);

print("<pre>");
print_r($json);
print("</pre>");


print("<p><strong>Lista de Objetos. Se accede con ->key </strong></p>");

$lista3 = json_decode($json);

print("<pre>");
print_r($lista3);
print("</pre>");
