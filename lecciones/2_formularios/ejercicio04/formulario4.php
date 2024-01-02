<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="estilos.css" title="Color">
  <title>FORMULARIO</title>
</head>

<body>
  <header>
    <h1>Formulario 4</h1>
    <h2>Saber que boton he pulsado</h2>
  </header>
  <main>

    <!-- usar 
       action = "< ?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  
     -->
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
      <p>Nombre: <input type="text" name="nombre"></p>
      <p>Edad: <input type="text" name="edad"></p>
      <p>
        <button type="submit" name="boton" value="valor1">Boton Valor1</button>
        <button type="submit" name="boton" value="valor2">Boton Valor2</button>
        <input type="submit" name="boton" value="valor3">
      </p>
    </form>


    <?php
    // //Muestro la matriz $_POST al pulsar el boton
    // print "<pre>";
    // print "Matriz \$_POST" . "<br>";
    // print_r($_SERVER);
    // print "</pre>\n";


    //if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST["boton"])) {  //si he pulsado el botón
      print "<pre>";
      print "Matriz \$_POST" . "<br>";
      print_r($_POST);
      print "</pre>\n";

      if ($_POST["boton"] == "valor1") {
        print "<p>He pulsado <strong>Boton Valor1</strong></p>";
      }
      if ($_POST["boton"] == "valor2") {
        print "<p>He pulsado <strong>Boton Valor2</strong></p>";
      }
      if ($_POST["boton"] == "valor3") {
        print "<p>He pulsado <strong>Valor3</strong></p>";
      }
    }

    ?>

  </main>
  <footer>
    <hr>
    <p>Autor: Juan Antonio Cuello</p>
  </footer>
</body>

</html>