<?php
// src/Controller/EjemploRutaBase.php
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle;
use App\Entity\Equipo;
class EjemploBaseDatos extends AbstractController{
	 /**
     * @Route("/mostrar_equipo")	 
     */
	 public function mostrar_equipo(){
        $entityManager = $this->getDoctrine()->getManager();
		$eq = $entityManager->find(Equipo::class, 1);
		$nombre = $eq->getNombre();
        return new Response('<html><body>'. $nombre . '</body></html>');
	 }
	 /**
     * @Route("/correo")	 
     */
	 public function prueba_correo(\Swift_Mailer $mailer){        
		$message = new \Swift_Message();
        $message->setFrom('pruebas@consymfony.com');
        $message->setTo('direccion@consymfony.com');
        $message->setBody("Pruebas");
		$mailer->send($message);	
		return new Response('<html><body>Enviado</body></html>');
	
	 }
}