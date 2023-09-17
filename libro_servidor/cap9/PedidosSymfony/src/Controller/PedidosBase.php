<?php
namespace App\Controller;
// src/Controller/PedidosLogin.php
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use App\Entity\Categoria;
use App\Entity\Producto;
use App\Entity\Pedido;
use App\Entity\PedidoProducto;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

/**
 * @Security("has_role('ROLE_USER')")
 */
class PedidosBase extends AbstractController{
    /**
     * @Route("/categorias", name="categorias")
     */
    public function mostrarCategorias() {
        $categorias = $this->getDoctrine()->getRepository(Categoria::class)->findAll();
        return $this->render("categorias.html.twig", array('categorias'=>$categorias));
    }
    /**
     * @Route("/productos/{id}", name="productos")
     */
    public function mostrarProductos($id) {
        $productos = $this->getDoctrine()->getRepository(Categoria::class)->find($id)->getProductos();
        if (!$productos) {
            throw $this->createNotFoundException('Categoría no encontrada');
        }
        return $this->render("productos.html.twig", array('productos'=>$productos));
    }    
    /**
     * @Route("/realizarPedido", name="realizarPedido")
     *
     */
    public function realizarPedido(SessionInterface $session, \Swift_Mailer $mailer) {
        $entityManager = $this->getDoctrine()->getManager();
        $carrito = $session->get('carrito');
        /* si el carrito no existe, o está vacío*/
        if(is_null($carrito) ||count($carrito)==0){
            return $this->render("pedido.html.twig", array('error'=>1));
        }else{
            #crear un nuevo pedido
            $pedido = new Pedido();
            $pedido->setFecha(new \DateTime());
            $pedido->setEnviado(0);
            $pedido->setRestaurante($this->getUser());
            $entityManager->persist($pedido);
            #recorrer carrito creando nuevos pedidoproducto
            foreach ($carrito as $codigo => $cantidad){
                $producto =  $this->getDoctrine()->getRepository(Producto::class)->find($codigo);
                $fila = new PedidoProducto();
                $fila->setCodProd($producto);
                $fila->setUnidades( implode($cantidad));
                $fila->setCodPed($pedido);
                //actualizar el stock
                $cantidad = implode($cantidad);
                $query = $entityManager->createQuery("UPDATE App\Entity\Producto p SET p.stock = p.stock - $cantidad WHERE p.codProd = $codigo");
                $resul = $query->getResult();
                $entityManager->persist($fila);
            }
        }
        try {
            $entityManager->flush();
        }catch (Exception $e) {
            return $this->render("pedido.html.twig", array('error'=>2));
        }
        /*prepara el array de productos para la plantilla*/
        foreach ($carrito as $codigo => $cantidad){
            $producto = $this->getDoctrine()->getRepository(Producto::class)->find((int)$codigo);
            $elem = [];
            $elem['codProd'] = $producto->getCodProd();
            $elem['nombre'] = $producto->getNombre();
            $elem['peso'] = $producto->getPeso();
            $elem['stock'] = $producto->getStock();
            $elem['descripcion'] = $producto->getDescripcion();
            $elem['unidades'] = implode($cantidad);
            $productos[] = $elem;
        }
        //vaciar el carrito
        $session->set('carrito', array());
        /* mandar el correo */
	
        $message = (new \Swift_Message())
            ->setFrom('noreply@empresafalsa.com', 'Sistema de pedidos')
            ->setTo($this->getUser()->getCorreo())
			->setSubject("Pedido ". $pedido->getCodPed() . " confirmado")
            ->setBody(
                $this->renderView(
                    'correo.html.twig',
                    array('id'=>$pedido->getCodPed(), 'productos'=> $productos)
                ),
                'text/html'
            );
        $mailer->send($message);
        return $this->render("pedido.html.twig", array('error'=>0, 'id'=>$pedido->getCodPed(), 'productos'=> $productos));
    }
    /**
     * @Route("/carrito", name="carrito")
     */
    public function mostrarCarrito(SessionInterface $session){
        /* `para cada elemento del carrito se consulta la base de datos y se recuepran sus datos*/
        $productos = [];
        $carrito = $session->get('carrito');
        /* si el carrito no existe se crea como un array vacío*/
        if(is_null($carrito)){
            $carrito = array();
            $session->set('carrito', $carrito);
        }
		/* se crea array con todos los datos de los productos y  la cantidad*/
        foreach ($carrito as $codigo => $cantidad){
            $producto = $this->getDoctrine()->getRepository(Producto::class)->find((int)$codigo);
            $elem = [];
            $elem['codProd'] = $producto->getCodProd();
            $elem['nombre'] = $producto->getNombre();
            $elem['peso'] = $producto->getPeso();
            $elem['stock'] = $producto->getStock();
            $elem['descripcion'] = $producto->getDescripcion();
            $elem['unidades'] = implode($cantidad);
            $productos[] = $elem;
        }
        return $this->render("carrito.html.twig", array('productos'=>$productos));
    }
	/**
     * @Route("/anadir", name="anadir")
     */
    public function anadir(SessionInterface $session) {
        $id = $_POST['cod'];		
		$unidades= $_POST['unidades'];		
        $carrito = $session->get('carrito');
        if(is_null($carrito)){
            $carrito = array();
        }
        /*si existe el código sumamos las unidades, con mínimo de 0*/

        if(isset($carrito[$id])){
            $carrito[$id]['unidades'] += intval($unidades);            
        }else{
            $carrito[$id]['unidades'] = intval($unidades);
        }
        $session->set('carrito', $carrito);
        return $this->redirectToRoute('carrito');
    }
	/**
     * @Route("/eliminar", name="eliminar")
     */
    public function eliminar(SessionInterface $session){
        $id = $_POST['cod'];		
		$unidades= $_POST['unidades'];		
        $carrito = $session->get('carrito');
        if(is_null($carrito)){
            $carrito = array();
        }
        /*si existe el código sumamos las unidades, con mínimo de 0*/
        if(isset($carrito[$id])){
            $carrito[$id]['unidades'] -= intval($unidades);   
			if($carrito[$id]['unidades'] <= 0) {
				unset($carrito[$id]);
			}
        
        }
        $session->set('carrito', $carrito);
        return $this->redirectToRoute('carrito');
    }
    
}