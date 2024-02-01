<?php
session_start();
require_once(__DIR__ . '/includes/funciones.php');

// print("<pre>");
// print_r($_SESSION);
// print("</pre>");


if (isset($_SESSION["errorNombre"])) {
    $errorNombre = $_SESSION["errorNombre"];
}

if (isset($_SESSION["errorApellidos"])) {
    $errorApellidos = $_SESSION["errorApellidos"];
}

if (isset($_SESSION["errorBBDD"])) {
    $errorBBDD = $_SESSION["errorBBDD"];
}

if (isset($_SESSION["modificarOK"])) {
    $modificarOK = $_SESSION["modificarOK"];
}


if (isset($_SESSION["registro_a_actualizar"])) {
    $registro = $_SESSION["registro_a_actualizar"];
} else {
    header("Location: ./index.php");
    exit();
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
        
        if ($registro == "") {
            print "    <p class=\"aviso\">No se ha seleccionado ningún registro.</p>\n";
        } else {

            print "    <form action=\"backend/bbdd-modificar.php\" method=\"post\">\n";
            print "      <p>Modifique los campos que desee:</p>\n";
            print "\n";
            print "      <table>\n";
            print "        <tr>\n";
            print "          <td>Nombre:</td>\n";

            if (isset($modificarOK) and $modificarOK == true) {
                //Los datos han sido ya modificados. Muestro el input vacio
                print "          <td><input type=\"text\" name=\"nombre\" size=50 autofocus></td>\n";
            } else {
                //Los datos aún no han sido modificados. Vengo del listado
                print "          <td><input type=\"text\" name=\"nombre\" size=50 value=\"$registro[nombre]\" autofocus></td>\n";
            }

            print "        </tr>\n";
            print "        <tr>\n";
            print "          <td>Apellidos:</td>\n";


            if (isset($modificarOK) and $modificarOK == true) {
                //Los datos han sido ya modificados. Muestro el input vacio
                print "          <td><input type=\"text\" name=\"apellidos\" size=50 ></td>\n";
            } else {
                //Los datos aún no han sido modificados. Vengo del listado
                print "          <td><input type=\"text\" name=\"apellidos\" size=50 value=\"$registro[apellidos]\"></td>\n";
            }


            print "        </tr>\n";
            print "      </table>\n";
            print "\n";
            print "      <p>\n";
            print "        <input type=\"hidden\" name=\"id\" value=\"$registro[id]\">\n";
            print "        <input type=\"submit\" value=\"Actualizar\">\n";
            print "        <input type=\"reset\" value=\"Reiniciar formulario\">\n";
            print "      </p>\n";
            print "    </form>\n";
        }
        ?>

        <?php
        if (isset($errorNombre)) {
            print "<p class='error'>$errorNombre</p>";
        }
        if (isset($errorApellidos)) {
            print "<p class='error'>$errorApellidos</p>";
        }

        if (isset($errorBBDD)) {
            print "<p class='error'>$errorBBDD</p>";
        }

        if (isset($modificarOK) && $modificarOK == true) {
            print "<p class='exito fade-in-out'>Persona actualizada correctamente</p>";
        }

        //En caso de recargar la pagina, no quiero mostrar otra vez los errores
        //Y quiero que aparezca el formulario limpio
        unset($_SESSION["errorNombre"]);
        unset($_SESSION["errorApellidos"]);
        unset($_SESSION["errorBBDD"]);
        unset($_SESSION["modificarOK"]);



        ?>


    </main>


    <?php
    pie();
    ?>



</body>

</html>