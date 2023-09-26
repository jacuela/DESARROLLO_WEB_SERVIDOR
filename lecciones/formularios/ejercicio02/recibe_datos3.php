<?php
## Recogemos los datos con POST
print "<h2>Mostramos datos con recibe_datos3.php</h2>";

function recoge($var)
{
    if (isset($_POST[$var])) {
        if ($_POST[$var] != "") {
            $tmp = trim(htmlspecialchars(strip_tags($_POST[$var])));
            return $tmp;
        }
    }
    return null;
}

$nombre = recoge("nombre");
$edad = recoge("edad");
$curso = recoge("curso");

//Mostramos los datos
if (!is_null($nombre)) {
    print "Nombre: $nombre" . "<br>";
} else {
    print "Nombre: No se ha indicado nombre" . "<br>";
}


if (!is_null($edad)) {   //Modificar despues para comprobar que sea numerico
    print "Edad: $edad" . "<br>";
} else {
    print "Edad: No se ha indicado edad" . "<br>";
}

if (!is_null($curso)) {
    print "Curso: $curso" . "<br>";
} else {
    print "Curso: No se ha indicado curso" . "<br>";
}

//Volvemos al formulario
print "<p><a href='formulario2.html'>Volver al formulario</a></p>";
