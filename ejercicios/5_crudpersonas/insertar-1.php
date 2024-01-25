<?php
require_once("funciones.php");
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
        <form action='insertar-2.php' method='post'>
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
    </main>


    <?php
    pie();
    ?>



</body>

</html>