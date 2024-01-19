<?php

function pie()
{

    print "  <footer>\n";
    print "    <p class=\"ultmod\">\n";
    print "      Creado por Juan Antonio Cuello\n";
    print "    </p>\n";
    print "\n";
    print "  </footer>\n";
}

function cabecera($texto, $menu)
{
    print "  <header>\n";
    print "    <h1>Bases de datos - $texto</h1>\n";
    print "\n";
    print "    <nav>\n";
    print "      <ul>\n";
    if ($menu == MENU_PRINCIPAL) {
        print "        <li><a href='confirmar_borrado.php'>Borrar todo</a></li>\n";
    } elseif ($menu == MENU_VOLVER) {
        print "        <li><a href='index.php'>Volver</a></li>\n";
    } else {
        print "        <li>Error en la selección de menú</li>\n";
    }
    print "      </ul>\n";
    print "    </nav>\n";
    print "  </header>\n";
    print "\n";
}