<?php
session_name("sesiones02");
session_start();

// Si el número no está guardado en la sesión, ponemos el valor a cero
if (!isset($_SESSION["numero"])) {
    $_SESSION["numero"] = 0;
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilos.css">
    <title>Subir y Bajar</title>
</head>

<body>
    <header>
        <h1>S02_Subir y Bajar numero</h1>
    </header>
    <main>

        <form action="sesiones2_2.php" method="post">
            <p>Haga clic en los botones para modificar el valor:</p>

            <p>
                <button type="submit" name="accion" value="bajar" style="font-size: 4rem">-</button>

                <?php
                // Mostramos el número, guardado en la sesión
                print "<span style='font-size: 4rem'>$_SESSION[numero]</span>";
                ?>
                <button type="submit" name="accion" value="subir" style="font-size: 4rem">+</button>
            </p>

            <p>
                <button type="submit" name="accion" value="cero" style="font-size: 1.2rem">Poner a cero</button>
            </p>
        </form>


    </main>
    <footer>
        <hr>
        <p>Autor: Juan Antonio Cuello</p>
    </footer>
</body>

</html>