<?php
session_start();
require_once(__DIR__ . "/../includes/funciones.php");


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //print_r($_POST);

    $listaids = recogeLista("listaids");

    $_SESSION["borrarOK"] = false; //Parto del false. Si todo va bien, lo cambio a true

    //Comprobaciones. Marcar al menos un registro
    if (empty($listaids)) {
        $_SESSION["errorNoMarcado"] = "Debes marcar al menos un registro";
        header("Location: " . APP_FOLDER . "/borrar-1.php");
        exit();
    }

    //Seguimos si ha ido bien

    $pdo = conectaDb();
    foreach ($listaids as $indice => $valor) {
        $consulta = "DELETE FROM $cfg[nombretabla]
                WHERE id = :indice";

        $resultado = $pdo->prepare($consulta);
        if (!$resultado) {
            $_SESSION["errorBBDD"] = "<p>Error al preparar la consulta. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>";
        } elseif (!$resultado->execute([":indice" => $indice])) {
            $_SESSION["errorBBDD"] = "<p>Error al ejecutar la consulta. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
        }
    }
    $_SESSION["borrarOK"] = true;
    $pdo = null;


    header("Location: " . APP_FOLDER . "/borrar-1.php");
    exit();
} else {
    //Si intentamos acceder directamente al archivo, nos vamos a index
    //("no vengo de formulario");
    header("Location: ../index.php");
}
