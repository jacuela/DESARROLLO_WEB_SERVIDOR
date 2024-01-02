<?php

## Miro las matrices para ver los datos
// print "<pre>";
// print "Matriz \$_REQUEST" . "<br>";
// print_r($_REQUEST);
// print "</pre>\n";


// print "<pre>";
// print "Matriz \$_GET" . "<br>";
// print_r($_GET);
// print "</pre>\n";

// print "<pre>";
// print "Matriz \$_POST" . "<br>";
// print_r($_POST);
// print "</pre>\n";

//print "<p><a href='formulario2.html'>Volver al formulario</a></p>";

## Recogemos los datos con POST
print "<h2>Mostramos datos</h2>";

print "<pre>";
print "Matriz \$_REQUEST" . "<br>";
print_r($_REQUEST);
print "</pre>\n";

$nombre = $_POST["nombre"];
$edad = $_POST["edad"];
$curso = $_POST["curso"];

print "Nombre: $nombre" . "<br>";
print "Edad: $edad" . "<br>";
print "Curso: $curso" . "<br>";

print "<p><a href='formulario2.html'>Volver al formulario</a></p>";

// ## Mostrar problemática de la inyeccion de datos o acceder directo al php
// # <strong>Tonyo</strong>
// # <script>alert("Vete al carajo");</script>
// # <body onload="alert('Hola')">
// # Acceder directamente en el navegador a recoge_datos.php
