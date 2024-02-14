<?php
session_start();
require_once(__DIR__ . "/../includes/funciones.php");


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //print_r($_POST);

    $listaids = recogeLista("listaids");

    //$_SESSION["borrarOK"] = false; //Parto del false. Si todo va bien, lo cambio a true

    //Comprobaciones. Marcar al menos un registro
    if (empty($listaids)) {
        $_SESSION["errorNoMarcado"] = "Debes marcar al menos un registro";
        header("Location: " . APP_FOLDER . "/borrar.php");
        exit();
    }

    //Seguimos si ha ido bien
    foreach ($listaids as $indice => $valor) {
        $response = conectar_endpoint("DELETE", "http://127.0.0.1:8000/personas/" . "$indice", null);

        if (!$response) {
            $_SESSION["mensajeAPI"]  = "ERROR:No se ha podido borrar correctamente";
        } else {
            $response = json_decode($response);
            $_SESSION["mensajeAPI"]  = $response->mensaje;
            $_SESSION["borrarOK"] = true;
        }
    }

    header("Location: " . APP_FOLDER . "/borrar.php");
    exit();
} else {
    //Si intentamos acceder directamente al archivo, nos vamos a index
    //("no vengo de formulario");
    header("Location: ../index.php");
}
