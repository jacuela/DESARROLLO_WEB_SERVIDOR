<?php 
    require_once('funciones.php');
?>

<?php
    $postId = $_GET['id'];  //Obtengo el id pasado por parñametro en la URL

    if ($postId == ""){
        echo "No hay ID. Vamos a la pagina princoal";
        header("Location: ./blog.php");
    }
    else{
        $file = "./json_data/post_{$postId}.json";
        $jsonData = file_get_contents("./{$file}", FILE_USE_INCLUDE_PATH);
        $un_post = json_decode($jsonData);
    }
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
        <?php  imprimirPost($un_post,$postId); ?>
    </main>


</body>
</html>