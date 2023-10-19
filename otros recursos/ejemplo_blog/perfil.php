<?php
session_start();

$jsonData = file_get_contents("./users.json", FILE_USE_INCLUDE_PATH); 
$credenciales = json_decode($jsonData);
$username = $credenciales->Username;
$passwordEncriptada = $credenciales->Password;   
$passwordClaro = $_SESSION['user_password'];

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/estilos.css">
    <title>PEC3 - BLOG</title>
</head>

<body>
    <header>
        <h1>BLOG VERDE. CUIDEMOS ESTE MUNDO</h1>  
        <br>
    </header>

    <!-- BEGIN menu.php INCLUDE -->
    <?php include "./menu.php"; ?>
    <!-- END menu.php INCLUDE -->

    
    <main>
        <?php   
            if (isset($_SESSION['user_id'])){
                echo("<article>\n");
                echo("<h3>DATOS DE PERFIL</h3>");
                echo("<p>Nombre: Juan Antonio Cuello Alarcón</p>");
                echo("<p>usuario:<strong> {$username}</strong></p>");
                echo("<p>password:<strong> {$passwordClaro}</strong></p>");
                //echo("<p>Contraseña: jcuelloa</p>");
                echo("</article>\n");
               
            }
            else{
                echo "Necesitas estar logeado para mostrar el perfil. Vamos a la pagina princoal";
                header("Location: ./blog.php");
            }
        
        ?>
    </main>


</body>
</html>