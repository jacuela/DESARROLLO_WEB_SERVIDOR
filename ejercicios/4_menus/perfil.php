<?php
require_once('modelo.php');
session_start();
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    <title>PEC3 - BLOG</title>
</head>

<body>

    <!-- BEGIN menu.php INCLUDE -->
    <?php include "./menu.php"; ?>
    <!-- END menu.php INCLUDE -->


    <main>
        <?php

        if (isset($_SESSION['usuarioObjeto'])) {

            $usuario = $_SESSION["usuarioObjeto"];

            print "<table border='1'>";
            print "<tr>";
            print "<th>Imagen</th>";
            print "<th>Nombre</th>";
            print "<th>Apellido</th>";
            print "<th>Email</th>";
            print "</tr>";
            print "<tr>";
            print "<td><img src='bbdd/$usuario->imagen' alt='foto perfil' width='200'></td>";
            print "<td>$usuario->nombre</td>";
            print "<td>$usuario->apellidos</td>";
            print "<td>$usuario->email</td>";
            print "</tr>";
            print "</table>";
        } else {
            echo "Necesitas estar logeado para mostrar el perfil";
            //header("Location: ./index.php");
        }


        ?>
    </main>
    <!-- BEGIN menu.php INCLUDE -->
    <?php include "footer.php"; ?>
    <!-- END menu.php INCLUDE -->


</body>

</html>