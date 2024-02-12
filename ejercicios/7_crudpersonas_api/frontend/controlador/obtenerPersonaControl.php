<?php
session_start();
require_once(__DIR__ . "/../includes/funciones.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = recoge("id");

    $response = conectar_endpoint("GET", "http://127.0.0.1:8000/personas/".$id, null);

    if ($response) {
        $persona = json_decode($response);
        $_SESSION["persona"]  = $persona;
        header("Location: ".APP_FOLDER."/modificar-2.php");
        exit();
        
    } else {
        $_SESSION["mensajeAPI"]  = "ERROR:No se ha podido recuperar la persona";
        header("Location: ".APP_FOLDER."/modificar-1.php");
        exit();

    }    

} else {
    //Si intentamos acceder directamente al archivo, nos vamos a index
    //("no vengo de formulario");

    header("Location: ../index.php");
}
