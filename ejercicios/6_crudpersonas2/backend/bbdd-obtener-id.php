<?php
session_start();
require_once(__DIR__ . "/../includes/funciones.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = recoge("id");

    //print("vamos a pedir a la bbdd el id:" . $id);

    $pdo = conectaDb();
    $consulta = "SELECT * FROM $cfg[nombretabla]
        WHERE id = :id";

    $resultado = $pdo->prepare($consulta);
    if (!$resultado) {
        print "    <p class=\"aviso\">Error al preparar la consulta. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
    } elseif (!$resultado->execute([":id" => $id])) {
        print "    <p class=\"aviso\">Error al ejecutar la consulta. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
    } else {
        $registro = $resultado->fetch();
        // print("<pre>");
        // print_r($registro);
        // print("</pre>");
        $_SESSION["registro_a_actualizar"]=$registro;
        header("Location: ../modificar-2.php");
    }
} else {
    //Si intentamos acceder directamente al archivo, nos vamos a index
    //("no vengo de formulario");

    header("Location: ../index.php");
}
