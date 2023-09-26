<?php
## Recogemos los datos con POST
print "<h2>Mostramos datos con recibe_datos2.php</h2>";

if (isset($_POST["nombre"]) && $_POST["nombre"] != "") {
    //$nombre = $_POST["nombre"];
    $nombre = trim(htmlspecialchars(strip_tags($_POST["nombre"])));
    //$nombre=trim(htmlspecialchars(strip_tags($_POST["nombre"])));

} else {
    $nombreError = "No se ha escrito ningun nombre";
}

if (isset($_POST["edad"]) && $_POST["edad"] != "") {
    $edad = $_POST["edad"];
} else {
    $edadError = "No se ha indicado la edad";
}

if (isset($_POST["curso"])) {
    $curso = $_POST["curso"];
} else {
    $cursoError = "No se ha indicado el curso";
}

//Mostramos los datos
if (isset($nombre)) {
    print "Nombre: $nombre" . "<br>";
} else {
    print "Nombre: $nombreError" . "<br>";
}

if (isset($edad)) {
    print "Edad: $edad" . "<br>";
} else {
    print "Edad: $edadError" . "<br>";
}

if (isset($curso)) {
    print "Curso: $curso" . "<br>";
} else {
    print "Curso: $cursoError" . "<br>";
}

//Volvemos al formulario
print "<p><a href='formulario2.html'>Volver al formulario</a></p>";
