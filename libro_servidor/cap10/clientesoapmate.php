<?php
require_once '../vendor/autoload.php';
$cliente = new Zend\Soap\Client('http://localhost/cap10/servidorsoapmate.php?wsdl');
$result = $cliente->potencia(['base' => 2, 'exponente' => 3]);
echo $result->potenciaResult;
echo "Response:\n" . $cliente->getLastResponse() . "\n";
