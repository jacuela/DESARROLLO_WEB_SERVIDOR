<?php
require_once("./funciones.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // print_r($_POST);

    $listaids = recogeLista("listaids");

    // foreach ($listaids as $id => $valor) {
    //     print("id a borrar:" . $id . "<br>");
    // }
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
    cabecera("Borrar", MENU_VOLVER);
    ?>

    <main>
        <?php
        $pdo = conectaDb();
        foreach ($listaids as $indice => $valor) {
            $consulta = "DELETE FROM $cfg[nombretabla]
                 WHERE id = :indice";

            $resultado = $pdo->prepare($consulta);
            if (!$resultado) {
                print "    <p class=\"aviso\">Error al preparar la consulta. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
            } elseif (!$resultado->execute([":indice" => $indice])) {
                print "    <p class=\"aviso\">Error al ejecutar la consulta. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
            } else {
                print "    <p>Registro borrado correctamente (si existía).</p>\n";
            }
        }
        $pdo = null;

        ?>

    </main>

    <?php
    pie();
    ?>



</body>

</html>