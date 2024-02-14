<?php

//=======================================================
//Este ejercicio lo he hecho sin usar el controlador
//Me llamo a mi mismo y hago toda la lógica mezclada con
//la vista.
//
// Ventaja: no necesito variables de sesión
// Desventaja: mezclamos vista con lógica
//=======================================================



session_start();
require_once(__DIR__ . "/includes/funciones.php");

//var_dump($_SESSION);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $response = conectar_endpoint("GET", "http://127.0.0.1:8000/personas", null);
    $listaPersonas = [];

    if ($response) {
        $listaPersonas = json_decode($response);

        $mensaje = "";
        //Borro todos los id's
        foreach ($listaPersonas as $persona) {

            // print("<pre>");
            // print_r($persona->id);
            // print("</pre>");
            $response = conectar_endpoint("DELETE", "http://127.0.0.1:8000/personas/" . "$persona->id", null);
            if (!$response) {
                $mensaje  = "ERROR:No se ha podido borrar correctamente";
                break;
            } else {
                $response = json_decode($response);
                $mensaje = $mensaje . "<p>" . $response->mensaje . "</p>";
            }
        }

        //$_SESSION["mensajeAPI"]=$mensajeAPI;


    } else {
        $mensaje = "ERROR:No se ha podido recuperar la los datos de la API";
    }
}


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
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <p>¿Está seguro?</p>
            <p>
                <input type=submit name=borrar value=Si>
                <input type=submit name=borrar value=No>
            </p>
        </form>

        <?php
        if (isset($mensaje)) {
            print $mensaje;
            unset($mensaje);
        }
        ?>
    </main>

    <?php
    pie();
    ?>

</body>

</html>