<?php 
    require_once('funciones.php');
    session_start();
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
            $dir = './json_data';
            $files = scandir($dir);
            $filecount = count($files);
            foreach ($files as $file) {
                if (str_ends_with($file, 'json')){
                    //Imprimo el post
                    $filePATH = './json_data/'.$file;
                    $jsonData = file_get_contents("./{$filePATH}", FILE_USE_INCLUDE_PATH); 
                    $un_post = json_decode($jsonData);
                    $id_post = substr_replace(substr_replace($file,"",0,5),"",-5); //sacar el id
                    //echo '<h2>'.$id_post.'</h2>'; //para mostrar el id del post (depuracion)
                    imprimirResumenPost($un_post,$id_post);
                }
                
            }
        ?>

    </main>


</body>
</html>