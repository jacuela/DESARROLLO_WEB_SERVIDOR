<?php

if(!empty($_GET['postid']))
{
	$postId=$_GET['postid'];
	$file = "./json_data/post_{$postId}.json";
    $jsonData = file_get_contents("./{$file}", FILE_USE_INCLUDE_PATH); 
   
	if(!empty($jsonData)){
        $un_post = json_decode($jsonData);
        
        $myObj=array(
            "title" => $un_post->title->es,
            "description" => $un_post->description->es,
            "date" => $un_post->date,
            "image" => $un_post->image
        );
       
        $myJSON = json_encode($myObj);
        response(200,$myJSON);
   
    }else{
       //Introduzco un numero de post que no existe
        $myObj="post numero {$postId} no encontrado";
        $myJSON = json_encode($myObj);
        response(404,$myJSON);
   }
	
}
else
{
    
    //***** MUESTRO TODOS LOS POST */
    //Genero un array con los post que luego codifico en json
    $listaPost = [];
    $dir = './json_data';
    $files = scandir($dir);
    $filecount = count($files);
    foreach ($files as $file) {
        if (str_ends_with($file, 'json')){
            //Imprimo el post
            $filePATH = './json_data/'.$file;
            $jsonData = file_get_contents("./{$filePATH}", FILE_USE_INCLUDE_PATH); 
            $un_post = json_decode($jsonData);
            //$id_post = substr_replace(substr_replace($file,"",0,5),"",-5); //sacar el id
            //echo '<h2>'.$id_post.'</h2>'; //para mostrar el id del post (depuracion)
            
            $myObj=array(
                "title" => $un_post->title->es,
                "description" => $un_post->description->es,
                "date" => $un_post->date,
                "image" => $un_post->image
            );
           
            array_push($listaPost, $myObj); 
            
        }
                
    }
    //Ahora convierto el array en json
    $myJSON = json_encode($listaPost);
    response(200,$myJSON);
           

}


function response($status,$data)
{
    header_remove();
    //header('Content-Type: text/html; charset=utf-8');
	header("Content-Type: application/json; charset=utf-8");
    http_response_code($status); 
    echo $data;
}

?>



