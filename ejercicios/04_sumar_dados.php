<?php
//  04_sumar_dados.php
//  Hacer un programa que tire dos dados al alzar y uszando una función sumar(), sume los
//  dos valores y muestre la suma.
//  @author Cuello
?>

<?php
require_once('funciones/utilidades.php');

$dado1 = rand(1, 6);
$dado2 = rand(1, 6);
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/estilos.css" title="Color">
  <title>04_sumardados</title>
</head>

<body>
  <header>
    <h1>Suma de dos dados</h1>
  </header>
  <main>
    <?php
    print "<img src='img/" . $dado1 . ".svg' alt='Dado' width='140' height='140'>\n";
    print "<img src='img/" . $dado2 . ".svg' alt='Dado' width='140' height='140'>\n";
    print "<p>La suma de los dos es:  ";
    print "<span style=\"border: black 2px solid; padding: 10px; font-size: 200%\">" . sumar($dado1, $dado2) . "</span></p>\n";
    ?>
  </main>
  <footer>
    <hr>
    <p>Autor: Juan Antonio Cuello</p>
  </footer>
</body>

</html>