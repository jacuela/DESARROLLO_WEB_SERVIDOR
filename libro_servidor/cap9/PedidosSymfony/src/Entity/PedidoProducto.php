<?php
// src/Entity/PedidoProducto.php
namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Security\Core\User\UserInterface;
/**
 * @ORM\Entity @ORM\Table(name="pedidosproductos")
 */
class PedidoProducto{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer", name="CodPedProd")
     */
    private $codPedProd;
    /**
     * @ORM\ManyToOne(targetEntity="Pedido")
     * @ORM\JoinColumn(name="Pedido", referencedColumnName="CodPed")
     */
    private $codPed;
    /**
     * @ORM\ManyToOne(targetEntity="Producto")
     * @ORM\JoinColumn(name="Producto",  referencedColumnName="CodProd")
     */
    private $codProd;
    /**
     * @ORM\Column(type="integer", name = "unidades")
     */
    private $unidades;    
    public function getCodPedProd() {
        return $this->codPedProd;
    }
    public function getCodPed() { 
		return $this->codPed;
    }

    public function setCodPed($codPed) {
        $this->codPed = $codPed;
    }
    public function getCodProd() {
        return $this->codProd;
    }
    public function setCodProd($codProd) {
        $this->codProd = $codProd;
    }
    public function getUnidades() {
        return $this->unidades;
    }
    public function setUnidades($unidades) {
        $this->unidades = $unidades;
    }
}