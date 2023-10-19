<?php

session_start();

require_once("modelo.php");
require_once('funciones.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // print "<pre>";
    // print "Matriz \$_FILES" . "<br>";
    // print_r($_REQUEST);
    // print "</pre>\n";

    // print "<pre>";
    // print "Matriz \$_FILES" . "<br>";
    // print_r($_FILES);
    // print "</pre>\n";

    $nombre = recoge("nombre");
    $apellidos = recoge("apellidos");
    $email = recoge("email");
    $password = recoge("password");
    $password2 = recoge("password2");

    $_SESSION["usuario"]["nombre"] = $nombre;
    $_SESSION["usuario"]["apellidos"] = $apellidos;
    $_SESSION["usuario"]["email"] = $email;
    $_SESSION["usuario"]["password"] = $password;
    $_SESSION["usuario"]["password2"] = $password2;


    if ($_FILES["fichero"]["error"] == UPLOAD_ERR_OK) {
        $nombreFichero = $_FILES["fichero"]["name"];
        $tamBytes = $_FILES["fichero"]["size"];
    } else {
        print("no hay fichero");
    }


    //######Comprobaciones
    $_SESSION["datosOK"] = true;

    //Email
    if (!str_contains($email, '@') || !str_contains($email, '.')) {
        $_SESSION["errorEmail"] = "Email inválido. Debe contener @ y .";
        $_SESSION["datosOK"] = false;
    } else if (existeUsuario($email)) {
        $_SESSION["errorEmail"] = "El email ya existe. Use otro distinto";
        $_SESSION["datosOK"] = false;
    } else {
        unset($_SESSION["errorEmail"]);
    }

    //Password
    if ($password !== $password2) {    //!== para evitar que '000'=='0000000' --> true
        $_SESSION["errorPassword"] = "El password no coincide";
        $_SESSION["datosOK"] = false;
    } else {
        unset($_SESSION["errorPassword"]);
    }

    //Imagen
    if ($_FILES["fichero"]["error"] == UPLOAD_ERR_OK) {
        if ($_FILES["fichero"]["size"] < 1000000) {
            $ruta_subida = "bbdd/";
            $res = move_uploaded_file($_FILES["fichero"]["tmp_name"], $ruta_subida . $_FILES["fichero"]["name"]);

            if ($res) {
                unset($_SESSION["errorFichero"]);
            } else {
                $_SESSION["errorFichero"] = "Error al guardar fichero";
            }
        } else {
            $_SESSION["errorFichero"] = "Tamaño imagen demasiado grande";
            $_SESSION["datosOK"] = false;
        }
    }


    if ($_SESSION["datosOK"] == true) {

        print("<h2>DATOS OK</h2>");

        //Recupero la lista de usuarios
        $lista_usuarios = [];
        $file = 'bbdd/data.json';    //la carpeta bbdd debe existir

        $jsonData = file_get_contents("./{$file}", FILE_USE_INCLUDE_PATH);
        $lista_usuarios = json_decode($jsonData);


        //Me creo el objeto usuario
        $usuario = new Usuario;
        $usuario->nombre = $nombre;
        $usuario->apellidos = $apellidos;
        $usuario->email = $email;
        $usuario->password = $password;
        if ($_FILES["fichero"]["error"] == UPLOAD_ERR_OK) {
            $usuario->imagen = $nombreFichero;
        }

        array_push($lista_usuarios, $usuario);
        $json_usuarios = json_encode($lista_usuarios, JSON_PRETTY_PRINT);
        // print "<pre>";
        // print_r($json_usuarios);
        // print "</pre>";
        file_put_contents("bbdd/data.json", $json_usuarios);

        unset($_SESSION["usuario"]);

        //session_destroy();
    }
}


header("Location: alta.php");

// //Volvemos al formulario
// print "<p><a href='alta.php'>Volver al formulario de alta</a></p>";
