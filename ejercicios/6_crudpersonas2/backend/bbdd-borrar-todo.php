<?php
session_start();
require_once(__DIR__ . "/../includes/funciones.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $borrar = recoge("borrar");
}

if ($borrar != "Si") {
    header("Location:".APP_FOLDER."/index.php");
    exit;
}

$pdo = conectaDb();
if ($pdo != null) {
    $mensaje=borraTodo();
    //$_SESSION["mensajeBorrarTodo"] = "Base de Datos restaurada";
    $_SESSION["mensajeBorrarTodo"] = $mensaje;
} else {
    $_SESSION["mensajeBorrarTodo"] = "<p class='error'>ERROR en la conexion a la bbdd. PDO es null</p>";
}

header ("Location: ".APP_FOLDER."/borrar-todo-1.php");