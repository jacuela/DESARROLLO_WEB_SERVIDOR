<?php
session_start();
require_once(__DIR__ . "/../includes/funciones.php");


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //print_r($_POST);

    $id = recoge("id");
    $nombre = recoge("nombre");
    $apellidos = recoge("apellidos");

    $_SESSION["modificarOK"] = false; //Parto del false. Si todo va bien, lo cambio a true

    //Comprobaciones. 
    if ($nombre == "") {
        $_SESSION["errorNombre"] = "El nombre no puede estar vacio";
    }
    if ($apellidos == "") {
        $_SESSION["errorApellidos"] = "El apellido no puede estar vacio";
    }

    if (!isset($_SESSION["errorApellidos"]) and !isset($_SESSION["errorNombre"])) {

        //Conexion a la API
        $body_array = array('nombre' => $nombre, 'apellidos' => $apellidos);
        $body = json_encode($body_array);

        $response = conectar_endpoint("PUT", "http://127.0.0.1:8000/personas/" . "$id", $body);

        if ($response) {
            $response = json_decode($response);
            $_SESSION["mensajeAPI"]  = $response->mensaje;
            $_SESSION["modificarOK"] = true;
        } else {
            $_SESSION["mensajeAPI"]  = "ERROR:No se ha podido modificar la persona";
        }

    }

    header("Location: ../modificar-2.php");
    exit();
} else {
    //Si intentamos acceder directamente al archivo, nos vamos a index
    //("no vengo de formulario");

    header("Location: ../index.php");
}
