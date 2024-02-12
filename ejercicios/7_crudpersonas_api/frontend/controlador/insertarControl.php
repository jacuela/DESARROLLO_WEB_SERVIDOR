<?php

session_start();
require_once(__DIR__ . "/../includes/funciones.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nombre = recoge("nombre");
    $apellidos = recoge("apellidos");

    //Comprobaciones
    if ($nombre == "") {
        $_SESSION["errorNombre"] = "El nombre no puede estar vacio";
    }
    if ($apellidos == "") {
        $_SESSION["errorApellidos"] = "El apellido no puede estar vacio";
    }

    if (!isset($_SESSION["errorApellidos"]) and !isset($_SESSION["errorNombre"])) {
        //Recogida de datos OK

        //Conexion a la API 
        $body_array = array('nombre' => $nombre, 'apellidos' => $apellidos);
        $body = json_encode($body_array);

        $response = conectar_endpoint("POST", "http://127.0.0.1:8000/personas", $body);

        if ($response) {
            $response = json_decode($response);
            $_SESSION["mensajeAPI"]  = $response->mensaje;
            
        } else {
            $_SESSION["mensajeAPI"]  = "ERROR:No se ha podido insertar los datos";
        }
    }
    header("Location: " . APP_FOLDER . "/insertar-1.php");
    exit();
} else {
    //Si intentamos acceder directamente al archivo, nos vamos a index
    header("Location: " . APP_FOLDER . "/index.php");
    exit();
}
