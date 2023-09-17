<?php 
namespace App\Controller;
// src/Controller/PedidosLogin.php
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
class PedidosLogin extends AbstractController{
    /**
     * @Route("/login", name="login")
     */
    public function login(){    
        return $this->render('login.html.twig');
    }    
}