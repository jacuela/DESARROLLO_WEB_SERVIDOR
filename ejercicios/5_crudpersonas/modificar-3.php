<?php
require_once("./funciones.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    print_r($_POST);

    $id = recoge("id");
    $nombre = recoge("nombre");
    $apellidos = recoge("apellidos");

    //Deberiamos hacer comprobaciones, del tipo longitud max y min
    //o comprobar si esta en blanco el dato
    //aquí se pueden comproblar con el mismo formulario
    //Como no comprobamos nada, poenemos el OK a true de los dos
    $idOK = true;
    $nombreOK    = true;
    $apellidosOK = true;
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
    cabecera("Modificar", MENU_VOLVER);
    ?>

    <main>
        <?php
        if (!$idOK) {
            print "<p class='aviso'>Error en el id</p>";
        }
        if (!$nombreOK) {
            print "<p class='aviso'>Error en el nombre</p>";
        }
        if (!$apellidosOK) {
            print "<p class='aviso'>Error en los apellidos</p>";
        }


        if ($idOK && $nombreOK && $apellidosOK) {
            $pdo = conectaDb();
            $consulta = "UPDATE $cfg[nombretabla]
            SET nombre = :nombre, apellidos = :apellidos
            WHERE id = :id";

            $resultado = $pdo->prepare($consulta);
            if (!$resultado) {
                print "    <p class=\"aviso\">Error al preparar la consulta. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
            } elseif (!$resultado->execute([":nombre" => $nombre, ":apellidos" => $apellidos, ":id" => $id])) {
                print "    <p class=\"aviso\">Error al ejecutar la consulta. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
            } else {
                print "    <p>Registro actualizado correctamente.</p>\n";
                $pdo = null;
            }
        }
        ?>


    </main>


    <?php
    pie();
    ?>



</body>

</html>