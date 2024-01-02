<?php
session_name("sesion_datoscuello");
session_start();

print "<h1>Sesiones01_1</h1>";

$_SESSION["nombre"] = "Pepito Conejo";
print "<p>El nombre es $_SESSION[nombre]</p>";

//Pasar una lista de la compra
$productos = array("leche", "pan", "huevos");
//print "<pre>";print_r($productos);print "</pre>";
$_SESSION["lista"] = $productos;

//Pasar un array asociativo
$usuario = array(
    "Nombre" => "Pepe",
    "email" => "pepe@kk.com",
    "edad" => 34
);
//print "<pre>";print_r($usuario);print "</pre>";
$_SESSION["usuario"] = $usuario;

//session_destroy();

//Ir a
print "<p><a href='sesiones01_2.php'>Ir a sesiones01_2.php</a></p>";
