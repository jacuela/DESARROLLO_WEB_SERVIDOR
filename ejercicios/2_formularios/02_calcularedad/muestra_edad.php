<?php

print "<h1>F02_Calcular Edad</h1>";

//require_once('../util/utilidades.php');

//En este ejercicio los datos ya nos llegan depurados del formulario por GET
//Podemos directamente cogerlos de $_GET
$nombre = $_GET["nombre"];
$edad = $_GET["edad"];

print "<div class='salida'>Hola $nombre</div>";
print "<div class='salida'>Tienes $edad años</div>";


//Volvemos al formulario
print "<p><a href='02_calcularedad.php'>Volver al formulario</a></p>";
