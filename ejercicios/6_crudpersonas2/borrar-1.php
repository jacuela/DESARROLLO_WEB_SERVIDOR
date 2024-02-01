<?php
session_start();
require_once(__DIR__ . '/includes/funciones.php');

if (isset($_SESSION["listaPersonas"])) {
    $listaPersonas = $_SESSION["listaPersonas"];
    unset($_SESSION["listaPersonas"]);
} else {
    $_SESSION["borrar"] = true;
    header("Location: ./backend/bbdd-listar.php");
    exit();
}

if (isset($_SESSION["errorNoMarcado"])) {
    $errorNoMarcado = $_SESSION["errorNoMarcado"];
    unset($_SESSION["errorNoMarcado"]);
}

if (isset($_SESSION["borrarOK"])) {
    $borrarOK = $_SESSION["borrarOK"];

    unset($_SESSION["borrarOK"]);
}

?>



<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilos.css">
    <title>CRUD Personas</title>
</head>

<body>

    <?php
    cabecera("Borrar", MENU_PRINCIPAL);
    ?>

    <main>

        <form action='backend/bbdd-borrar.php' method='post'>
            <p>Marque los registros que quiera borrar:</p>

            <table class="conborde franjas">
                <thead>
                    <tr>
                        <th>Borrar</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                    </tr>
                </thead>
                <?php

                foreach ($listaPersonas as $persona) {
                    print " <tr>\n";
                    print " <td class=\"centrado\"><input type=\"checkbox\" name=\"listaids[$persona[id]]\"></td>\n";
                    print " <td>$persona[nombre]</td>\n";
                    print " <td>$persona[apellidos]</td>\n";
                    print " </tr>\n";
                }
                ?>
            </table>

            <p>
                <input type="submit" value="Borrar registros">
                <input type="reset" value="Reiniciar">
            </p>

        </form>

        <?php
        if (isset($errorNoMarcado)) {
            print "<p class='error'>$errorNoMarcado</p>";
        }
        if (isset($borrarOK)) {
            print "<p class='exito fade-in-out'>Personas borradas correctamente</p>";
        }
        ?>

    </main>
    <?php
    pie();
    ?>

</body>

</html>