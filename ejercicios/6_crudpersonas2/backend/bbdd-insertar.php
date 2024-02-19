<?php
session_start();
require_once(__DIR__ . "/../includes/funciones.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nombre = recoge("nombre");
    $apellidos = recoge("apellidos");

    $_SESSION["insertarOK"] = false; //Parto del false. Si todo va bien, lo cambio a true

    //Comprobaciones
    if ($nombre == "") {
        $_SESSION["errorNombre"] = "El nombre no puede estar vacio";
    } else {
        //Voy a guardarme el dato, pot si vuelvo al formulario antes un error
        //poder mostrarlo
        $_SESSION["formulario"]["nombre"] = $nombre;
    }
    if ($apellidos == "") {
        $_SESSION["errorApellidos"] = "El apellido no puede estar vacio";
    } else {
        //Voy a guardarme el dato, pot si vuelvo al formulario antes un error
        //poder mostrarlo
        $_SESSION["formulario"]["apellidos"] = $apellidos;
    }
    //Fin comprobaciones

    if (!isset($_SESSION["errorApellidos"]) and !isset($_SESSION["errorNombre"])) {
        //Recogida de datos OK
        $pdo = conectaDb();
        if ($pdo != null) {
            $consulta = "INSERT INTO $cfg[nombretabla] 
                        (nombre, apellidos)
                         VALUES (:nombre, :apellidos)";

            $resultado = $pdo->prepare($consulta);
            if (!$resultado) {
                $_SESSION["errorBBDD"] = "<p>Error al preparar la consulta. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>";
            } elseif (!$resultado->execute([":nombre" => $nombre, ":apellidos" => $apellidos])) {
                $_SESSION["errorBBDD"] = "<pError al ejecutar la consulta. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>";
            } else {
                //Insercion OK
                $_SESSION["insertarOK"] = true;
                unset($_SESSION["formulario"]["nombre"]);
                unset($_SESSION["formulario"]["apellidos"]);
                $pdo = null;
            }
        } else {
            //$pdo es null
            $_SESSION["errorBBDD"] = "PDO es null";
        }
    }


    header("Location: " . APP_FOLDER . "/insertar-1.php");
    exit();
} else {
    //Si intentamos acceder directamente al archivo, nos vamos a index
    header("Location: " . APP_FOLDER . "/index.php");
    exit();
}
