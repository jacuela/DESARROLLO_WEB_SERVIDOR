<?php
session_name("sesiones01");
session_start();

require_once('../util/utilidades.php');

print "<pre>";
print "Valores de \$Lista" . "<br>";
print_r($_POST);
print "</pre>\n";

if (isset($_POST["borrar"])) {  //compruebo si he pulsado BORRAR SESION
    session_destroy();
    // Volvemos al formulario
    header("Location:sesiones1_1.php");
    exit();
}

$mayusculas = recoge("mayu");
$minusculas = recoge("minu");

// Guardamos las palabras en la sesión
$_SESSION["mayusculas"] = $mayusculas;
$_SESSION["minusculas"] = $minusculas;

// Comprobamos la palabra en mayúsculas
if ($mayusculas == "") {
    // Si no se recibe palabra, guardamos en la sesión el mensaje de error
    $_SESSION["mayusculasError"] = "No ha escrito ninguna palabra";
} elseif (!ctype_upper($mayusculas)) {
    // Si la palabra está en minúsculas, guardamos en la sesión el mensaje de error
    $_SESSION["mayusculasError"] = "No ha escrito la palabra en mayúsculas";
} else {
    // Si la palabra es correcta, borramos los posibles errores anteriores
    unset($_SESSION["mayusculasError"]);
}

// Comprobamos la palabra en minúsculas
if ($minusculas == "") {
    // Si no se recibe palabra, guardamos en la sesión el mensaje de error
    $_SESSION["minusculasError"] = "No ha escrito ninguna palabra";
} elseif (!ctype_lower($minusculas)) {
    // Si la palabra está en mayúsculas, guardamos en la sesión el mensaje de error
    $_SESSION["minusculasError"] = "No ha escrito la palabra en minúsculas";
} else {
    // Si la palabra es correcta, borramos los posibles errores anteriores
    unset($_SESSION["minusculasError"]);
}

// Volvemos al formulario
header("Location:sesiones1_1.php");
