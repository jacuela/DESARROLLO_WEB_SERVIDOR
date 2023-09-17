<?php
// src/Entity/Pedido.php
namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity @ORM\Table(name="pedidos")
 */
class Pedido
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer", name="CodPed")
     */
    private $codPed;

    /**
     * @ORM\Column(type="datetime", name = "Fecha")
     */
    private $fecha;
    /**
     * @ORM\Column(type="integer", name = "Enviado")
     */
    private $enviado;
    /**
     * @ORM\ManyToOne(targetEntity="Restaurante")
     * @ORM\JoinColumn(name="Restaurante", referencedColumnName="CodRes")
     *
     */
    private $restaurante;
    public function getCodPed() {
        return $this->codPed;
    }
    public function getFecha() {
        return $this->fecha;
    }
    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    public function getEnviado() {
        return $this->enviado;
    }
    
	public function setEnviado($enviado) {
        $this->enviado = $enviado;
    }
    public function getRestaurante() {
        return $this->restaurante;
    }
    public function setRestaurante($restaurante) {
        $this->restaurante = $restaurante;
    }
}