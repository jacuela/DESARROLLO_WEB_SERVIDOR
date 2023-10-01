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
    <h1>Formulario 5</h1>
    <h2>Preservar valores entre llamadas POST</h2>
  </header>
  <main>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

      if ($_POST["submit"] == "secreto") {
        $valorsecreto = $_POST["secreto"];
      }
    }

    if (isset($valorsecreto)) {
      print "<p>Valor secreto: $valorsecreto </p>";
    } else {
      print "<p>Valor secreto: SIN ASIGNAR </p>";
    }

    ?>


    <!-- usar 
       action = "< ?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  
     -->
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
      <p>Valor secreto: <input type="text" name="secreto"></p>
      <p>
        <button type="submit" name="submit" value="secreto">Enviar Valor</button>
        <button type="submit" name="submit" value="otracosa">Hacer otra cosa</button>

      </p>
    </form>


  </main>
  <footer>
    <hr>
    <p>Autor: Juan Antonio Cuello</p>
  </footer>
</body>

</html>