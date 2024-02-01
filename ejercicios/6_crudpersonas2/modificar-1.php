<?php
session_start();
require_once(__DIR__ . '/includes/funciones.php');

if (isset($_SESSION["listaPersonas"])) {
    $listaPersonas = $_SESSION["listaPersonas"];
    unset($_SESSION["listaPersonas"]);
} else {
    $_SESSION["modificar"] = true;
    header("Location: ./backend/bbdd-listar.php");
    exit();
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
    cabecera("Modificar", MENU_PRINCIPAL);
    ?>

    <main>

        <form action='backend/bbdd-obtener-id.php' method='post'>
            <p>Indique el registro que quiera modificar:</p>

            <table class="conborde franjas">
                <thead>
                    <tr>
                        <th>Mofificar</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                    </tr>
                </thead>
                <?php

                foreach ($listaPersonas as $persona) {
                    print " <tr>\n";
                    print " <td class=\" centrado\"><input type=\"radio\" name=\"id\" value=\"$persona[id]\"></td>\n";
                    print " <td>$persona[nombre]</td>\n";
                    print " <td>$persona[apellidos]</td>\n";
                    print " </tr>\n";
                }
                ?>
            </table>

            <p>
                <input type="submit" value="Actualizar registro">
                <input type="reset" value="Reiniciar">
            </p>

        </form>


    </main>
    <?php
    pie();
    ?>

</body>

</html>