<?php
session_name("sesion_datoscuello");
session_start();

print "<pre>";
print_r($_SESSION);
print "</pre>";


$nombre = $_SESSION["nombre"];
$lista = $_SESSION["lista"];
$usuario = $_SESSION["usuario"];

print "<h1>Sesiones01_2</h1>";

print "<p>El nombre es--> $nombre</p>";

print "<strong>Elementos de la lista</strong><br>";
foreach ($lista as $valor) {
    print "Elemento: $valor <br>";
}

print "<strong>Elementos del usuario</strong><br>";
foreach ($usuario as $key => $valor) {
    print "$key --> $valor <br>";
}

print "El email solo es-->" . $_SESSION["usuario"]["email"] . "<br>";

//Volver
print "<p><a href='sesiones01_1.php'>Ir a sesiones01_1.php</a></p>";
