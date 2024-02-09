<?php

session_start();
require_once(__DIR__ . "/../includes/funciones.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nombre = recoge("nombre");
    $apellidos = recoge("apellidos");



    //LLAMADA A LA API
    // set post fields
    //$body_json = "{\"nombre\":\"$nombre\", \"apellidos\":\"$apellidos\"}";
    $body_array = array('nombre' => $nombre, 'apellidos' => $apellidos);

    //Header
    $headers = array(
        "Content-Type: application/json; charset=UTF-8"
    );

    $curlHandle = curl_init();
    curl_setopt($curlHandle, CURLOPT_URL, "http://127.0.0.1:8000/personas");
    curl_setopt($curlHandle, CURLOPT_POST, 1);
    curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curlHandle, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curlHandle, CURLOPT_HEADER, false);
    curl_setopt($curlHandle, CURLOPT_POSTFIELDS, json_encode($body_array));

    // execute!
    $response = json_decode(curl_exec($curlHandle));
    $_SESSION["mensajeAPI"] = $response->mensaje;

    // close the connection, release resources used
    curl_close($curlHandle);

    // print("<pre>");
    // print_r(json_decode(($response)));
    // print("</pre>");

    header("Location: " . APP_FOLDER . "/insertar-1.php");
} else {
    //Si intentamos acceder directamente al archivo, nos vamos a index
    header("Location: " . APP_FOLDER . "/index.php");
    exit();
}
