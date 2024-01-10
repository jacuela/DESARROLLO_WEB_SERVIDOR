<?php
session_start();


if (isset($_SESSION["errorLoginPass"])) {
    $errorLoginPass = $_SESSION["errorLoginPass"];
}

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css" title="Color">
    <title>SESIONES04</title>
</head>

<body>
    <!-- BEGIN menu.php INCLUDE -->
    <?php include "menu.php"; ?>
    <!-- END menu.php INCLUDE -->
    <main>
        <form action="procesar_login.php" method="post">
            <div class="box_login">
                <h2>Login</h2>
                <table>
                    <tr>
                        <td><label>Usuario</label></td>
                        <td><input type="text" name="username" class="inputCampo" /></td>
                    </tr>
                    <tr>
                        <td><label>Password</label></td>
                        <td><input type="password" name="password" class="inputCampo" /></td>
                    </tr>
                </table>
                <button class="btn" type="submit" name="login" value="login">Log In</button>

                <?php
                if (isset($errorLoginPass)) {
                    print "<p class='error'>$errorLoginPass</p>";
                }
                ?>

            </div>

        </form>
        <br><br><br>

    </main>
    <!-- BEGIN footer.php INCLUDE -->
    <?php include "footer.php"; ?>
    <!-- END footer.php INCLUDE -->

</body>

</html>