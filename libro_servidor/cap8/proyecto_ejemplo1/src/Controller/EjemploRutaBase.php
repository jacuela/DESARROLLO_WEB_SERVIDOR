<?php
// src/Controller/EjemploRutaBase.php
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
/**
  * @Route("/base")	 
*/
class EjemploRutaBase extends AbstractController{
	 /**
     * @Route("/hola")	 
     */
	 public function hola(){
        return new Response('<html><body>Hola</body></html>');
	 }
}