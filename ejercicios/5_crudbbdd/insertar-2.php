<?php
require_once("./funciones.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nombre = recoge("nombre");
    $apellidos = recoge("apellidos");

    //Deberiamos hacer comprobaciones, del tipo longitud max y min
    //aquí se pueden comproblar con el mismo formulario
    //Como no comprobamos nada, poenemos el OK a true de los dos
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
    cabecera("Insertar", MENU_VOLVER);
    ?>

    <main>
        <?php
        if (!$nombreOK) {
            print "<p class='aviso'>Error en el nombre</p>";
        }
        if (!$apellidosOK) {
            print "<p class='aviso'>Error en los apellidos</p>";
        }

        if ($nombreOK && $apellidosOK) {
            $pdo = conectaDb();
            $consulta = "INSERT INTO $cfg[nombretabla] 
                        (nombre, apellidos)
                         VALUES (:nombre, :apellidos)";

            $resultado = $pdo->prepare($consulta);
            if (!$resultado) {
                print "    <p class=\"aviso\">Error al preparar la consulta. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
            } elseif (!$resultado->execute([":nombre" => $nombre, ":apellidos" => $apellidos])) {
                print "    <p class=\"aviso\">Error al ejecutar la consulta. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
            } else {
                print "    <p>Registro creado correctamente.</p>\n";
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