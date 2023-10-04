<?php

require_once("modelo.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // print "<pre>";
    // print "Matriz \$_FILES" . "<br>";
    // print_r($_POST);
    // print "</pre>\n";


    if ($_POST["submit"] == "subirimagen") {

        print "<pre>";
        print "Matriz \$_FILES" . "<br>";
        print_r($_FILES);
        print "</pre>\n";

        $nombreFichero = $_FILES["fichero"]["name"];
        $tamBytes = $_FILES["fichero"]["size"];
        $tamKB = round($tamBytes / 1024);
        $rutaTemporal = $_FILES["fichero"]["tmp_name"];

        print "Nombre del archivo: $nombreFichero<br>";
        print "Tamaño: $tamBytes bytes | $tamKB KB<br>";
        print "Ruta tamporal: $rutaTemporal<br>";

        //Compruebo tamaño y lo subo

        $ruta_subida = "bbdd/";
        // $res = move_uploaded_file($rutaTemporal, $ruta_subida . $nombreFichero);
        $res = move_uploaded_file($_FILES["fichero"]["tmp_name"], $ruta_subida . $_FILES["fichero"]["name"]);

        if ($res) {
            print "Fichero Guardado correctamente<br>";
        } else {
            print "Error al guardar fichero<br>";
        }
    }

    if ($_POST["submit"] == "subirdatos") {

        print("<h4>Guardando datos usuario en json</h4><br>");

        $nombreUsuario = $_POST["nombre"];
        $passwordUsuario = $_POST["password"];

        print "Nombre: $nombreUsuario <br>";
        print "Contraseña: $passwordUsuario <br>";

        //Aqui puedo hacer comprobaciones

        //Me creo el objeto usuario
        $usuario = new Usuario;
        $usuario->nombre = $nombreUsuario;
        $usuario->password = $passwordUsuario;

        $json_usuario = json_encode($usuario);

        //print_r($json_usuario);

        file_put_contents("bbdd/data.json", $json_usuario);
    }

    if ($_POST["submit"] == "leerdatos") {

        $json_url = "bbdd/data.json";
        $json = file_get_contents($json_url);
        $data = json_decode($json);

        $usuario = new Usuario;
        $usuario->nombre = $data->nombre;
        $usuario->password = $data->password;
        $usuario->imagen = $data->imagen;

        print("<h3>Datos leidos de la BBDD</h3>");
        print("Nombre: $usuario->nombre <br>");
        print("Contraseña: $usuario->password <br>");
        print("Foto perfil: $usuario->imagen <br>");


        print "<table border='1'>";
        print "<tr>";
        print "<th>Imagen</th>";
        print "<th>Nombre</th>";
        print "<th>Apellido</th>";
        print "</tr>";
        print "<tr>";
        print "<td><img src='bbdd/$usuario->imagen' alt='foto perfil' width='100'></td>";
        print "<td>$usuario->nombre</td>";
        print "<td>$usuario->password</td>";
        print "</tr>";
        print "</table>";



        // echo "<pre>";
        // print_r($usuario);
        // echo "</pre>";
    }
}




//Volvemos al formulario
print "<p><a href='formulario06.html'>Volver al formulario</a></p>";
