<?php
//  02_saludar.php
//  Hacer un programa que usando una función saludar($nombre),
//  haga un saludo. La función la definiremos en el mismo archivo
//  @author Cuello
?>

<?php
require_once('funciones/utilidades.php');
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilos.css" title="Color">
    <title>02_saludar</title>
</head>

<body>
    <header>
        <h1>Saludar con función</h1>
    </header>
    <main>
        <?php
        //Si no sale en negrita, ir al inspector web. PISTA: la función debe devolver el valor.
        print "<p><strong>" . saludar("Juanico") . "</strong></p>";
        ?>
    </main>
    <footer>
        <hr>
        <p>Autor: Juan Antonio Cuello</p>
    </footer>
</body>

</html>