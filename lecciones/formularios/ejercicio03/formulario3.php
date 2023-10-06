<?php


require_once('../../util/utilidades.php');
// function recoge($var)
// {
//   if (isset($_POST[$var])) {
//     if ($_POST[$var] != "") {
//       $tmp = trim(htmlspecialchars(strip_tags($_REQUEST[$var])));
//       return $tmp;
//     }
//   }
//   return null;
// }

/* si va bien redirige a principal.php si va mal, mensaje de error */


if ($_SERVER["REQUEST_METHOD"] == "POST") {    //hemos pulsado
  //if (isset($_POST["submit"])){print("he pulsado");}

  $nombre = recoge("nombre");
  $edad = recoge("edad");
  $OK = true;
  if (is_null($nombre)) {
    $nombreERROR = "Falta el nombre";
    $OK = false;
  }
  if (is_null($edad)) {
    $edadERROR = "Falta la edad";
    $OK = false;
  } elseif (!is_numeric($edad)) {
    $edadERROR = "Edad debe ser un numero";
    $OK = false;
  }
  if ($OK) {
    header("Location: principal.php?nombre=" . $nombre . "&edad=" . $edad);
  }
}
?>

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
    <h1>Formulario 3</h1>
  </header>
  <main>

    <!-- usar 
       action = "< ?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  
     -->
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
      <p>Nombre: <input type="text" name="nombre"></p>
      <p>Edad: <input type="text" name="edad"></p>
      </p>
      <p><input type="submit" name="submit" value="Enviar"></p>
    </form>

    <?php
    if (isset($nombreERROR)) {
      print "<p class='error'>$nombreERROR</p>";
    }
    if (isset($edadERROR)) {
      print "<p class='error'>$edadERROR</p>";
    }
    ?>

  </main>
  <footer>
    <hr>
    <p>Autor: Juan Antonio Cuello</p>
  </footer>
</body>

</html>