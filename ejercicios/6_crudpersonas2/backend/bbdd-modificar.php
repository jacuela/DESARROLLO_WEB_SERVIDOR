<?php
session_start();
require_once(__DIR__ . "/../includes/funciones.php");


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //print_r($_POST);

    $id = recoge("id");
    $nombre = recoge("nombre");
    $apellidos = recoge("apellidos");

    $_SESSION["modificarOK"] = false; //Parto del false. Si todo va bien, lo cambio a true

    //Comprobaciones. No las hago por ahora
    if ($nombre == "") {
        $_SESSION["errorNombre"] = "El nombre no puede estar vacio";
    }
    if ($apellidos == "") {
        $_SESSION["errorApellidos"] = "El apellido no puede estar vacio";
    }

    if (!isset($_SESSION["errorApellidos"]) and !isset($_SESSION["errorNombre"])) {

        $pdo = conectaDb();
        $consulta = "UPDATE $cfg[nombretabla]
        SET nombre = :nombre, apellidos = :apellidos
        WHERE id = :id";

        $resultado = $pdo->prepare($consulta);
        if (!$resultado) {
            $_SESSION["errorBBDD"] = "<p>Error al preparar la consulta. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
        } elseif (!$resultado->execute([":nombre" => $nombre, ":apellidos" => $apellidos, ":id" => $id])) {
            $_SESSION["errorBBDD"] = "<p class=\"aviso\">Error al ejecutar la consulta. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
        } else {
            $_SESSION["modificarOK"] = true;
            $pdo = null;
        }
    }

    header("Location: ../modificar-2.php");
    exit();
} else {
    //Si intentamos acceder directamente al archivo, nos vamos a index
    //("no vengo de formulario");

    header("Location: ../index.php");
}
