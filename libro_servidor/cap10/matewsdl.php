<?php
require_once '../vendor/autoload.php';
require "Mate.php";
$serverUrl = "http://localhost/cap10/matewsdl.php";
$soapAutoDiscover = new \Zend\Soap\AutoDiscover(new \Zend\Soap\Wsdl\ComplexTypeStrategy\ArrayOfTypeSequence());
$soapAutoDiscover->setBindingStyle(array('style' => 'document'));
$soapAutoDiscover->setOperationBodyStyle(array('use' => 'literal'));
$soapAutoDiscover->setClass('Mate');
$soapAutoDiscover->setUri($serverUrl);
header("Content-Type: text/xml");
echo $soapAutoDiscover->generate()->toXml();
