<?php
session_name("sesiones01");
session_start();

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilos.css">
    <title>Mayusculas y Minusculas</title>
</head>

<body>
    <header>
        <h1>S01_Mayúsculas y Minúsculas__</h1>
    </header>
    <main>

        <?php
        //Aquí mostraremos los datos cuando estén correctos

        // Si hemos detectado un error en la palabra en mayúsculas
        if (isset($_SESSION["mayusculasError"])) {
            print "<p class='error'> Campo mayusculas: $_SESSION[mayusculasError]</p>";
        } else if (isset($_SESSION["mayusculas"])) {
            //print "<p La palabra en Mayúsculas es: <span class='en_verde'>$_SESSION[mayusculas]</span></p>";
            print "<p class='verde'>La palabra en mayusculas es: $_SESSION[mayusculas]</p>";
        }


        // Si hemos detectado un error en la palabra en minusculas
        if (isset($_SESSION["minusculasError"])) {
            print "<p class='error'>Campo minusculas: $_SESSION[minusculasError]</p>";
        } else if (isset($_SESSION["minusculas"])) {
            //print "<p La palabra en Minúsculas es: <span class='en_verde'>$_SESSION[minusculas]</span></p>";
            print "<p class='verde'>La palabra en minusculas es: $_SESSION[minusculas]</p>";
        }

        ?>

        <form action="sesiones1_2.php" method="post">
            <table>
                <tr>
                    <td><label for="mayu">Texto en Mayúsculas:</label></td>
                    <td><input type="text" name="mayu" id="mayu" value="<?php echo isset($_SESSION['mayusculasError']) ? $_SESSION['mayusculas'] : ''; ?>"></td>
                </tr>
                <tr>
                    <td><label for="minu">Texto en Minúsculas:</label></td>
                    <td><input type="text" name="minu" id="minu" value="<?php echo isset($_SESSION['minusculasError']) ? $_SESSION['minusculas'] : ''; ?>"></td>
                </tr>
            </table>

            <p>
                <button type="submit" name="submit" value="comprobar">COMPROBAR</button>
                <!-- <button type="reset" name="reset" value="reset">BORRAR</button>  -->

                <!-- hacemos el boton tipo submit para controlar cuando pulso el boton
                     de BORRAR y eliminar datos de sesión
                -->     
                <button type="submit" name="borrar" value="borrar">BORRAR SESION</button>
            </p>


    </main>
    <footer>
        <hr>
        <p>Autor: Juan Antonio Cuello</p>
    </footer>
</body>

</html>