<?php
require_once(__DIR__."/includes/funciones.php");
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilos.css">
    <title>BBDD - Borrar y crear</title>
</head>

<body>

    <?php
    cabecera("Inicio", MENU_VOLVER);
    ?>

    <main>
        <form action="./borrar-todo-2.php" method="post">
            <p>¿Está seguro?</p>
            <p>
                <input type=submit name=borrar value=Si>
                <input type=submit name=borrar value=No>
            </p>
        </form>
    </main>

    <?php
    pie();
    ?>

</body>

</html>

