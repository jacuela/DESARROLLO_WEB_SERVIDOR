<?php
session_start();
require_once(__DIR__ . "/../includes/funciones.php");

if (isset($_SESSION["listar"])) {  //Para asegurarme que llego desde el menu


    $pdo = conectaDb();
    $consulta = "SELECT * FROM $cfg[nombretabla]";

    $resultado = $pdo->query($consulta);
    if (!$resultado) {
        $_SESSION["errorBBDD"] = "<p>Error en la consulta. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>";
    } else {
        $listaPersonas = array(); //array con los datos

        //Creo un array de arrais asociativos. 
        foreach ($resultado as $registro) {
            $persona = array("id" => $registro["id"], "nombre" => $registro["nombre"], "apellidos" => $registro["apellidos"]);
            array_push($listaPersonas, $persona);
        }
        $_SESSION["listaPersonas"] = $listaPersonas;
    }

    unset($_SESSION["listar"]);
    header("Location:" . APP_FOLDER . "/listar.php");

} else {
    //Si intentamos acceder directamente al archivo, nos vamos a index
    header("Location: " . APP_FOLDER . "/index.php");
}
