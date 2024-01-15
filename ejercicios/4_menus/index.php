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
    <title>Principal</title>
</head>

<body>

    <!-- BEGIN menu.php INCLUDE -->
    <?php include "menu.php"; ?>
    <!-- END menu.php INCLUDE -->

    <main>

        <?php

        $lista_usuarios = [];
        $file = 'data.json';    //la carpeta bbdd debe existir

        $jsonData = file_get_contents("./bbdd/{$file}");
        $lista_usuarios = json_decode($jsonData);

        echo '<h2> Total de usuarios de alta: ' . count($lista_usuarios) . '</h2>';

        if (isset($_COOKIE["Ultimo_usuario"]) && isset($_COOKIE["Ultimo_usuario_fecha"])) {
            $cookie_usuario = $_COOKIE["Ultimo_usuario"];
            $cookie_fecha = $_COOKIE["Ultimo_usuario_fecha"];
            echo "<p>Ultimo usuario <strong> {$cookie_usuario} </strong> creado el <strong>{$cookie_fecha}</strong></p>";
        }
        ?>


    </main>

    <!-- BEGIN FOOTER INCLUDE -->
    <?php include "footer.php"; ?>
    <!-- END FOOTER INCLUDE -->


</body>

</html>