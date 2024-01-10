<?php

session_start();

require_once('modelo.php');
require_once('funciones.php');


// print "<pre>";
// print "Matriz \$_POST" . "<br>";
// print_r($_POST);
// print "</pre>\n";


if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $password = recoge("password");
    $username = recoge("username");

    //######Comprobaciones
    if ($password == null or $username == null) {
        $_SESSION["errorLoginPass"] = "Los campos no pueden estar vacios";
        header("Location: login.php");
        return; //para que no ejecute nada por debajo
    }

    //Si llegamos, es porque los datos no estan vacios
    $usuario = checkuser($username, $password);  //devuelve objeto

    if ($usuario == null) {
        $_SESSION["errorLoginPass"] = "Credenciales inválidas";
        header("Location: login.php");
        return;
    } else {
        unset($_SESSION["errorLoginPass"]);

        $_SESSION["usuarioObjeto"] = $usuario;


        //TODO OK. Muestro datos
        // print("Login OK");

        // print "<table border='1'>";
        // print "<tr>";
        // print "<th>Imagen</th>";
        // print "<th>Nombre</th>";
        // print "<th>Apellido</th>";
        // print "<th>Email</th>";
        // print "</tr>";
        // print "<tr>";
        // print "<td><img src='bbdd/$usuario->imagen' alt='foto perfil' width='200'></td>";
        // print "<td>$usuario->nombre</td>";
        // print "<td>$usuario->apellidos</td>";
        // print "<td>$usuario->email</td>";
        // print "</tr>";
        // print "</table>";

        header("Location: index.php");
    }
}

//Volvemos al formulario
print "<p><a href='login.php'>Ir al formulario de login</a></p>";
print "<p><a href='alta.php'>Ir al formulario de alta</a></p>";
