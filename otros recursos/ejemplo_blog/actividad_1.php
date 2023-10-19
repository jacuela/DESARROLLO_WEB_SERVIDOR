
<?php 
//parsear un post en un objeto json y mostrar "titulo" y "descripcion" de un objeto indicado
//en ambos idiomas

$file = 'json_data/post_1.json';
$jsonData = file_get_contents("./{$file}", FILE_USE_INCLUDE_PATH); 
$un_post = json_decode($jsonData);

imprimirPost($un_post);

function imprimirPost($noticia) {
    
    echo("<h2>{$noticia->title->es}</h2>");
    echo("{$noticia->description->es}");
    echo("<hr>");
    echo("<h2>{$noticia->title->en}</h2>");
    echo("{$noticia->description->en}");
}

?>