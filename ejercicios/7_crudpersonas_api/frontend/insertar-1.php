<?php
session_start();
require_once(__DIR__ . "/includes/funciones.php");

if (isset($_SESSION["errorNombre"])) {
    $errorNombre = $_SESSION["errorNombre"];
}

if (isset($_SESSION["errorApellidos"])) {
    $errorApellidos = $_SESSION["errorApellidos"];
}

if (isset($_SESSION["mensajeAPI"])) {
    $mensajeAPI = $_SESSION["mensajeAPI"];
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
    cabecera("Insertar", MENU_PRINCIPAL);
    ?>

    <main>
        <form action='controlador/insertarControl.php' method='post'>
            <p>Escriba los datos del nuevo registro:</p>

            <table>
                <tr>
                    <td>Nombre:</td>
                    <td><input type="text" name="nombre" size=50 autofocus></td>
                </tr>
                <tr>
                    <td>Apellidos:</td>
                    <td><input type="text" name="apellidos" size=50></td>
                </tr>
            </table>

            <p>
                <input type="submit" value="Insertar">
                <input type="reset" value="Reiniciar formulario">
            </p>
        </form>

        <?php
        if (isset($errorNombre)) {
            print "<p class='error'>$errorNombre</p>";
        }
        if (isset($errorApellidos)) {
            print "<p class='error'>$errorApellidos</p>";
        }

        if (isset($mensajeAPI)) {
            print "<p class='exito fade-in-out'>$mensajeAPI</p>";
        }

        //En caso de recargar la pagina, no quiero mostrar otra vez los errores
        //Y quiero que aparezca el formulario limpio
        unset($_SESSION["errorNombre"]);
        unset($_SESSION["errorApellidos"]);
        unset($_SESSION["mensajeAPI"]);
        ?>

    </main>


    <?php
    pie();
    ?>



</body>

</html>