<?php
require_once(__DIR__."/includes/funciones.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $borrar = recoge("borrar");

}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/estilos.css">
    <title>BBDD - Borrar y crear</title>
</head>

<body>

    <?php
    cabecera("Inicio", MENU_VOLVER);
    ?>

    <main>
        <?php
        if ($borrar != "Si") {
            header("Location:./index.php");
            exit;
        }

        $pdo = conectaDb();
        if ($pdo != null) {
            borraTodo();
        } else {
            print("<p>ERROR en la conexion a la bbdd</p>");
        }
        ?>


    </main>


    <?php
    pie();
    ?>



</body>

</html>