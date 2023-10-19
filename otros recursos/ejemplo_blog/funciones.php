<?php

function imprimirResumenPost($noticia,$id) {
    echo("<article class='resumen'>\n");
    //echo("<h2>".$id."</h2>\n");
    echo("<a href='post.php?id={$id}'><h2>{$noticia->title->es}</h2></a>\n");
    $fecha = date("d/m/Y",$noticia->date);
    echo("<p class='fecha'>Fecha:{$fecha}</p>\n");
    echo("<div>");
    echo("<img src='{$noticia->image}'>\n");
    $texto=acortarTexto($noticia->description->es,500);
    echo("{$texto}\n");
    echo("</div>");
    echo("</article>\n");
}

function imprimirPost($noticia,$id) {
    if ($noticia==""){
        echo("<article>\n");
        echo("<h3>NO EXISTE DICHO ARTÍCULO</h3>");
        echo("</article>\n");
    }
    else{
        echo("<article>\n");
        echo("<a href='post.php?id={$id}'><h2>{$noticia->title->es}</h2></a>\n");
        $fecha = date("d/m/Y",$noticia->date);
        echo("<p class='fecha'>Fecha:{$fecha}</p>\n");
        
        $texto=$noticia->description->es;
        echo("{$texto}\n");
        echo("<img src='{$noticia->image}'>\n");
        echo("</article>\n");

    }
    
}



//Funcion que acorta un texto hasta longitud caracteres, añadiendo puntos
//suspensivos. Si el texto es menor de longitud, lo devuelve al completo.
function acortarTexto($texto,$longitud){
    if (strlen($texto) > $longitud){
        return substr($texto,0,$longitud).'...';
    }
    return $texto;

}








?>