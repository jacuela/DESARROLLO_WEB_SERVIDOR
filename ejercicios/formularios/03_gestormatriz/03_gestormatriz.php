<?php

require_once('../util/utilidades.php');

// print "<pre>";
// print "Valores de \$Lista" . "<br>";
// print_r($_POST);
// print "</pre>\n";

if (isset($_POST["listaOculta"])) {
  $lista = $_POST["listaOculta"];
} else {
  $lista = [];
}



function rellenar_lista($tam, $min, $max)
{
  global $lista;  //############ IMPORTANTE. SINO, EL AMBITO DE $LISTA EL LOCAL
  // Crea la matriz inicial
  $lista = [];
  for ($i = 0; $i < $tam; $i++) {
    $lista[] = rand($min, $max);
  }
}



/* si va bien redirige a principal.php si va mal, mensaje de error */
if ($_SERVER["REQUEST_METHOD"] == "POST") {    //hemos pulsado

  $datosOK = true;
  $tama = recoge("tama");
  $min = recoge("valorMinimo");
  $max = recoge("valorMaximo");
  $eliminar = recoge("eliminar");

  // print "<pre>";
  // print "Matriz \$_POST" . "<br>";
  // print_r($_POST);
  // print "</pre>\n";

  if ($_POST["submit"] == "generar") {
    rellenar_lista($tama, $min, $max);
  } else if ($_POST["submit"] == "valor") {


    for ($i = 0; $i < count($lista); $i++) {

      if ($lista[$i] == $eliminar) {
        unset($lista[$i]);
      }
    }
    $lista = array_values($lista);  //necesario si borro elementos intermedios de un array

  } else if ($_POST["submit"] == "primero") {
    unset($lista[0]);
  } else if ($_POST["submit"] == "ultimo") {
    unset($lista[count($lista) - 1]);
  }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/estilos.css">
  <title>GESTORMATRICES</title>
</head>

<body>
  <header>
    <h1>F03_Gestor de matrices</h1>
  </header>
  <main>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
      <table>
        <tr>
          <td><label for="tama">Tamaño de la lista:</label></td>
          <td><input type="number" name="tama" min="1" value="10" id="tama"></td>
        </tr>
        <tr>
          <td><label for="valorMinimo">Valor mínimo:</label></td>
          <td><input type="number" name="valorMinimo" min="0" value="0" id="valorMinimo"></td>
        </tr>
        <tr>
          <td><label for="valorMaximo">Valor máximo:</label></td>
          <td><input type="number" name="valorMaximo" min="0" value="10" id="valorMaximo"></td>
        </tr>
      </table>

      <p>
        <!-- evitar enviar formulario al pulsar INTRO
            Al pulsar INTRO, se activa el primer boton definido. Al definir un primer
            boton oculto, no se envia nada
        -->
        <button type="submit" disabled hidden aria-hidden="true"></button>

        <button type="submit" name="submit" value="generar">GENERAR LISTA</button>
        <button type="reset" name="reset" value="reset">RESETEAR DATOS</button>
      </p>


      <hr>

      <?php
      print "<p>Lista con " . count($lista) . " elementos</p>";
      if (count($lista) != 0) {
        //   print '<p>Lista sin generar</p>';
        // } else {
        print lista_a_tabla_html($lista);
      }

      //###### IMPORTANTE. SINO, NO SE PUEDE HACER
      //Preservar la lista entre llamadas POST usando campo HIDDEN
      //var_dump($lista);
      foreach ($lista as $value) {
        echo '<input type="hidden" name="listaOculta[]" value="' . $value . '">';
      }

      ?>
      <br>

      <p>
        <button type="submit" name="submit" value="valor">BORRAR VALOR</button>
        <button type="submit" name="submit" value="primero">BORRAR PRIMERO</button>
        <button type="submit" name="submit" value="ultimo">BORRAR ÚLTIMO</button>
      </p>
      <p>
        <label for="eliminar">Valor a eliminar:</label>
        <input type="text" name="eliminar" min="0" value="0" id="eliminar" maxlength="4" size="4">
      </p>
    </form>




  </main>
  <footer>
    <hr>
    <p>Autor: Juan Antonio Cuello</p>
  </footer>
</body>

</html>