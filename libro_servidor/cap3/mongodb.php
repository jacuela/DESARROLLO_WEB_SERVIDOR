<?php
require 'vendor/autoload.php';
$cliente = new MongoDB\Client("mongodb://localhost:27017");
$bd = $cliente->libroservidor;

try {
   $res = $bd->usuarios->insertOne( [ 'nombre' => 'Ana', 'clave' => '1234', 'saldo' => 1000 ] );
   echo "Id del último registro: " . $res->getInsertedId() . "<br>";
   $res = $bd->usuarios->insertMany( [
      ['nombre' => 'Paco', 'clave' => '1234', 'saldo' => 100],
      ['nombre' => 'Nuria', 'clave' => '1234', 'saldo' => 30],      
   ] );
   echo "Documentos insertados: " . $res->getInsertedCount() . "<br>";
   print_r($res->getInsertedIds());
} catch (Exception $e) {
   print ($e);
} 