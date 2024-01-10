<?php
session_start();

if (isset($_SESSION["errorEmail"])) {
    $errorEmail = $_SESSION["errorEmail"];
}

if (isset($_SESSION["errorPassword"])) {
    $errorPassword = $_SESSION["errorPassword"];
}

if (isset($_SESSION["errorFichero"])) {
    $errorFichero = $_SESSION["errorFichero"];
}

if (isset($_SESSION["datosOK"])) {
    $datosOK = $_SESSION["datosOK"];
}

// print "<pre>";
// print "Matriz \$_SESSION" . "<br>";
// print_r($_SESSION);
// print "</pre>\n";

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css" title="Color">
    <title>FORMULARIO 6</title>
</head>

<body>
    <!-- BEGIN menu.php INCLUDE -->
    <?php include "menu.php"; ?>
    <!-- END menu.php INCLUDE -->
    <main>
        <div class="box_alta">
            <form action="procesar_alta.php" method="post" enctype="multipart/form-data">
                <table>
                    <tr>
                        <td><label for="nombre">Nombre:</label></td>
                        <td><input type="text" name="nombre" id="nombre" value="<?php echo !empty($_SESSION['usuario']) ? $_SESSION["usuario"]["nombre"] : ''; ?>"></td>
                    </tr>
                    <tr>
                        <td><label for="apellidos">Apellidos:</label></td>
                        <td><input type="text" name="apellidos" id="apellidos" value="<?php echo !empty($_SESSION['usuario']) ? $_SESSION["usuario"]["apellidos"] : ''; ?>"></td>
                    </tr>
                    <tr>
                        <td><label for="email">* Email@:</label></td>
                        <td><input type="text" name="email" id="email" value="<?php echo !empty($_SESSION['usuario']) ? $_SESSION["usuario"]["email"] : ''; ?>" required></td>
                    </tr>
                    <tr>
                        <td><label for="password">* Contraseña:</label></td>
                        <td><input type="text" name="password" id="password" value="<?php echo !empty($_SESSION['usuario']) ? $_SESSION["usuario"]["password"] : ''; ?>" required></td>
                    </tr>
                    <tr>
                        <td><label for="password2">* Repita contraseña:</label></td>
                        <td><input type="text" name="password2" id="password2" value="<?php echo !empty($_SESSION['usuario']) ? $_SESSION["usuario"]["password2"] : ''; ?>" required></td>
                    </tr>
                    <tr>
                        <td><label for="fichero">Foto de Perfil (max 1 MB):</label></td>
                        <td> <input type="file" name="fichero" id="fichero"></td>
                    </tr>
                </table>

                <p><button type="submit" name="submit" value="alta">Alta de nuevo usuario</button></p>
                <p>* Campos obligatorios</p>

            </form>
        </div>

        <?php
        if (isset($errorEmail)) {
            print "<p class='error'>$errorEmail</p>";
        }
        if (isset($errorPassword)) {
            print "<p class='error'>$errorPassword</p>";
        }
        if (isset($errorFichero)) {
            print "<p class='error'>$errorFichero</p>";
        }

        if (isset($datosOK) && $datosOK == true) {
            print "<p class='exito fade-in-out'>Alta de usuario correcta</p>";
            unset($_SESSION["datosOK"]); //limpiamos por si intentamos recargar
            //que no vuelva a aparecer el mensaje
        }

        ?>


    </main>
    <!-- BEGIN footer.php INCLUDE -->
    <?php include "footer.php"; ?>
    <!-- END footer.php INCLUDE -->
</body>

</html>