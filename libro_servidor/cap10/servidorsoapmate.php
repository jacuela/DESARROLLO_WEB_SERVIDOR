<?php
require_once '../vendor/autoload.php';
require "Mate.php";
$serverUrl = "http://localhost/cap10/servidorsoapmate.php";
if (isset($_GET['wsdl'])) {
    $soapAutoDiscover = new \Zend\Soap\AutoDiscover
		(new \Zend\Soap\Wsdl\ComplexTypeStrategy\ArrayOfTypeSequence());
    $soapAutoDiscover->setBindingStyle(array('style' => 'document'));
    $soapAutoDiscover->setOperationBodyStyle(array('use' => 'literal'));
    $soapAutoDiscover->setClass('Mate');
    $soapAutoDiscover->setUri($serverUrl);
    header("Content-Type: text/xml");
    echo $soapAutoDiscover->generate()->toXml();
} else {
    $soap = new \Zend\Soap\Server($serverUrl . '?wsdl');
    $soap->setObject(new \Zend\Soap\Server\DocumentLiteralWrapper(new Mate()));
    $soap->handle();	
}
