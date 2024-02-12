<?php
session_start();
require_once(__DIR__ . "/includes/funciones.php");


//////// CON FILE_GET_CONTENTS
//$listaPersonas = json_decode(file_get_contents("http://127.0.0.1:8000/personas"));


/////// CON CURL
$response = conectar_endpoint("GET", "http://127.0.0.1:8000/personas", null);
$listaPersonas = [];

if ($response) {
    $listaPersonas = json_decode($response);
} else {
    $mensaje = "ERROR:No se ha podido recuperar la los datos de la API";
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
    cabecera("Listar", MENU_PRINCIPAL);
    ?>

    <main>
        <p>Listado completo de registros:</p>

        <table class="conborde franjas">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                </tr>
            </thead>

            <?php
            foreach ($listaPersonas as $persona) {
                print "      <tr>\n";
                print "        <td>$persona->nombre</td>\n";
                print "        <td>$persona->apellidos</td>\n";
                print "      </tr>\n";
            }

            ?>
        </table>

        <?php
        if (isset($mensaje)){
            print("<p class='error'>$mensaje</p>");
        }
        
        ?>


    </main>


    <?php
    pie();
    ?>



</body>

</html>