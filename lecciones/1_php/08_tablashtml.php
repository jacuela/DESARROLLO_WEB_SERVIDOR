<?php

function lista_a_tabla_html($lista)
{
    $s = '<table border="1">';

    $s .= '<tr>';
    foreach ($lista as $valor) {
        $s .= '<td>' . $valor . '</td>';
    }
    $s .= '</tr></table>';

    $s .= '</table>';
    return $s;
}


function matriz_a_tabla_html($matriz)
{
    $s = '<table border="1">';

    //Me creo la cabecera
    $s .= '<thead><tr>';
    foreach ($matriz[0] as $key => $value) {
        //print "$key";
        $s .= "<th>$key</th>";
    }
    $s .= '</tr></thead>';

    //Me creo el cuerpo de la tabla
    foreach ($matriz as $r) {
        $s .= '<tr>';
        foreach ($r as $v) {
            $s .= '<td>' . $v . '</td>';
        }
        $s .= '</tr>';
    }
    $s .= '</table>';
    return $s;
}



$lista = [2, 6, 6, 5, 1, 0, 3, 4, 5];

$matriz = [
    [
        'Nombre' => 'Mauro',
        'Apellido' => 'Chojrin',
        'Correo' => 'mauro.chojrin@leewayweb.com',
    ],
    [
        'Nombre' => 'Alberto',
        'Apellido' => 'Loffatti',
        'Correo' => 'aloffatti@hotmail.com',
    ],
    [
        'Nombre' => 'Foo',
        'Apellido' => 'Bar',
        'Correo' => 'foo_bar@example.com',
    ]
];

// print "<pre>";
// print_r($lista);
// print "</pre>";

// print "<pre>";
// print_r($matriz);
// print "</pre>";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php
print lista_a_tabla_html($lista);

print "<br>";

print matriz_a_tabla_html($matriz);

?>



</body>
</html>



