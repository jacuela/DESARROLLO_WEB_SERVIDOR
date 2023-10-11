<?php

//parsear un post en un objeto json y mostrar "titulo" y "descripcion" de un objeto indicado
//en castellano e ingles

$file = 'bbdd/post_1.json';
$jsonData = file_get_contents("./{$file}", FILE_USE_INCLUDE_PATH);

//$un_post = json_decode($jsonData);  //json --> objeto
$un_post = json_decode($jsonData,true);  //json --> array

imprimirPost($un_post);

function imprimirPost($noticia)
{
    //Me puede llegar un dato tipo OBJETO o tipo ARRAY

    //Lo trato como un objeto
    if (is_object($noticia)){
        echo ("<h2>{$noticia->title->es}</h2>");
        echo ("{$noticia->description->es}");
        echo ("<hr>");
        echo ("<h2>{$noticia->title->en}</h2>");
        echo ("{$noticia->description->en}"); 

    }

    //Lo trato como un array
    if (is_array($noticia)){
        echo ("<h2>{$noticia["title"]["es"]}</h2>");
        echo ("{$noticia["description"]["es"]}");
        echo ("<hr>");
        echo ("<h2>{$noticia["title"]["en"]}</h2>");
        echo ("{$noticia["description"]["en"]}"); 

    }
    

    
}
