<?php
//session_name("sesion_cuello");
session_start();

print "<h1>Sesiones01_1</h1>";

$_SESSION["nombre"] = "Pepito Conejo";
print "<p>El nombre es $_SESSION[nombre]</p>";

//session_destroy();

//Ir a
print "<p><a href='sesiones01_2.php'>Ir a sesiones01_2.php</a></p>";
