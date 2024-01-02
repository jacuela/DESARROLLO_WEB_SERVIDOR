<?php
session_name("sesiones02");
session_start();

require_once('../util/utilidades.php');

print "<pre>";
print "Valores de \$Lista" . "<br>";
print_r($_POST);
print "</pre>\n";

$accion = recoge("accion");

// Dependiendo de la acción recibida, modificamos el número guardado
if ($accion == "cero") {
    $_SESSION["numero"] = 0;
} elseif ($accion == "subir" and $_SESSION["numero"] < 9) {
    $_SESSION["numero"]++;
} elseif ($accion == "bajar" and $_SESSION["numero"] > 0) {
    $_SESSION["numero"]--;
}


// Volvemos al formulario
header("Location:sesiones2_1.php");
