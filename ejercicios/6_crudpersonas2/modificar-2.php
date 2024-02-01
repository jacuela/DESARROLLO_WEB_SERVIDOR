<?php
require_once(__DIR__."/includes/funciones.php");


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // print_r($_POST);

    $id = recoge("id");

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
    <link rel="stylesheet" href="css/estilos.css">
    <title>CRUD Personas</title>
</head>

<body>

    <?php
    cabecera("Modificar", MENU_PRINCIPAL);
    ?>

    <main>

        <?php
        if ($id == "") {
            print "    <p class=\"aviso\">No se ha seleccionado ningún registro.</p>\n";
        } else {
            $pdo = conectaDb();
            $consulta = "SELECT * FROM $cfg[nombretabla]
                WHERE id = :id";

            $resultado = $pdo->prepare($consulta);
            if (!$resultado) {
                print "    <p class=\"aviso\">Error al preparar la consulta. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
            } elseif (!$resultado->execute([":id" =>$id])) {
                print "    <p class=\"aviso\">Error al ejecutar la consulta. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
            } else {
                $registro = $resultado->fetch();
                print "    <form action=\"modificar-3.php\" method=\"post\">\n";
                print "      <p>Modifique los campos que desee:</p>\n";
                print "\n";
                print "      <table>\n";
                print "        <tr>\n";
                print "          <td>Nombre:</td>\n";
                print "          <td><input type=\"text\" name=\"nombre\" size=50 value=\"$registro[nombre]\" autofocus></td>\n";
                print "        </tr>\n";
                print "        <tr>\n";
                print "          <td>Apellidos:</td>\n";
                print "          <td><input type=\"text\" name=\"apellidos\" size=50 value=\"$registro[apellidos]\"></td>\n";
                print "        </tr>\n";
                print "      </table>\n";
                print "\n";
                print "      <p>\n";
                print "        <input type=\"hidden\" name=\"id\" value=\"$id\">\n";
                print "        <input type=\"submit\" value=\"Actualizar\">\n";
                print "        <input type=\"reset\" value=\"Reiniciar formulario\">\n";
                print "      </p>\n";
                print "    </form>\n";
            }
        }
        ?>

    </main>


    <?php
    pie();
    ?>



</body>

</html>