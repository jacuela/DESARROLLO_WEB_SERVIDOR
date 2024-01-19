<?php

require_once "funciones.php";

$pdo = conectaDb();


$nombre    = "Pepito";     // Normalmente estos valores vendrán de un formulario
$apellidos = "Conejo";

$consulta = "DELETE FROM personas 
            WHERE nombre = :nombre AND apellidos = :apellidos";


$resultado = $pdo->prepare($consulta);
if (!$resultado) {
    print "    <p>Error al preparar la consulta. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
} elseif (!$resultado->execute([":nombre" => $nombre, ":apellidos" => $apellidos])) {
    print "    <p>Error al ejecutar la consulta. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
} else {
    print "    <p>Borrados {$resultado->rowCount()} registros</p>\n";
}
