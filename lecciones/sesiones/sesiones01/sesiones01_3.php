<?php
session_name("sesion_datosnuria");
session_start();

print "<pre>";
print_r($_SESSION);
print "</pre>";

//session_destroy();

// print "<h1>Sesiones01_2</h1>";

// print "<p>El nombre es $_SESSION[nombre]</p>";

//Volver
print "<p><a href='sesiones01_1.php'>Ir a sesiones01_1.php</a></p>";
