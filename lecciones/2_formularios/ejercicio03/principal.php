<?php

$nombre = $_REQUEST["nombre"];
$edad = $_REQUEST["edad"];

?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="estilos.css" title="Color">
  <title>Formulario3</title>
</head>

<body>
  <header>
    <h1>PAGINA PRINCIPAL FORMULARIO 3</h1>
  </header>
  <main>
    <h3>Datos recibidos:</h3>
    <?php
    print "Nombre: $nombre" . "<br>";
    print "Edad: $edad" . "<br>";
    ?>


    <p><a href='formulario3.php'>Volver al formulario3</a></p>

  </main>
  <footer>
    <hr>
    <p>Autor: Juan Antonio Cuello</p>
  </footer>
</body>

</html>