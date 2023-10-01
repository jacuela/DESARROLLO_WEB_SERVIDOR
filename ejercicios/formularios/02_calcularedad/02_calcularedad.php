<?php

require_once('../util/utilidades.php');

/* si va bien redirige a principal.php si va mal, mensaje de error */
if ($_SERVER["REQUEST_METHOD"] == "POST") {    //hemos pulsado

  $datosOK = true;
  $nombre = recoge("nombre");
  $fecha = recoge("fecha");

  if (is_null($nombre)) {
    $nombreERROR = "Falta el nombre";
    $datosOK = false;
  }
  if (is_null($fecha)) {
    $fechaERROR = "Falta la fecha";
    $datosOK = false;
  }

  if ($datosOK) {
    //Calculo la edad edad
    $fecha_hoy = new DateTime("now");
    $fecha_nac = new DateTime($fecha);
    $diff = $fecha_hoy->diff($fecha_nac);
    $edad = $diff->y;
  }

  // print "<pre>";
  // print "Matriz \$_POST" . "<br>";
  // print_r($_POST);
  // print "</pre>\n";

}
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/estilos.css">
  <title>FORMULARIO</title>
</head>

<body>
  <header>
    <h1>F02_Calcular Edad</h1>
  </header>
  <main>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
      <p>Nombre: <input type="text" name="nombre"></p>
      <p>Fecha: <input type="date" name="fecha"></p>
      </p>
      <p>
        <button type="submit" name="calcular" value="mostrar_aqui">Mostrar edad aqui</button>
        <button type="submit" name="calcular" value="mostrar_alli">Ir recibe_datos.php</button>
      </p>

    </form>

    <?php
    if (isset($datosOK)) {

      if ($datosOK == false) {
        //Muestro errores
        if (isset($nombreERROR)) {
          print "<p class='error'>$nombreERROR</p>";
        }
        if (isset($fechaERROR)) {
          print "<p class='error'>$fechaERROR</p>";
        }
      } else {
        //Muestro salida
        if ($_POST["calcular"] == "mostrar_aqui") {
          //Muestro salida aquí
          print "<div class='salida'>Hola $nombre</div>";
          print "<div class='salida'>Tienes $edad años</div>";
        }
        if ($_POST["calcular"] == "mostrar_alli") {
          header("Location: muestra_edad.php?nombre=" . $nombre . "&edad=" . $edad);
        }
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