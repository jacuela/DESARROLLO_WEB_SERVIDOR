<?php

//Ejercicio para aprender a leer un archivo json que se encuentra en disco.
//Necesitamos conocer la estructura del json para acceder a los datos


//mostrar todos los datos de profesores
$file = 'bbdd/profesores.json';
$jsonData = file_get_contents("./{$file}", FILE_USE_INCLUDE_PATH); 
$profesores = json_decode($jsonData); //leo como objeto los json

print (gettype($profesores));  //devuelve array porque es un array de json

print "<h3>Listados de profesors</h3>";

foreach ($profesores as $profesor){
    print ("Nombre: $profesor->nombre <br>");
    print ("Email: $profesor->email <br>");
    print ("Edad: $profesor->edad <br>");
    print ("Salario: $profesor->salario <br>");
    print ("Dirección: {$profesor->direccion->calle} nº{$profesor->direccion->numero} {$profesor->direccion->ciudad} <br>");
    print ("Materias: <br>");
    print ("<ul>");
    foreach ($profesor->materias as $materia){
        print ("<li>$materia</li>");
    }
    print ("</ul>");
    print ("<hr>");
}

//Profesores con salario >=2000€ usando una función
profesores_salario($profesores,2000);


//funcion que muestre profesores con un salario mayor al indicado
function profesores_salario($datos, $salariomin){

    print ("<h3>Profesores que cobran más de $salariomin €</h3>");
    foreach ($datos as $profesor){
        if ($profesor->salario >=$salariomin){
            print "- $profesor->nombre $profesor->salario €<br>";
        }
    }
}







